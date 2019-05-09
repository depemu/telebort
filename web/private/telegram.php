<?php

$debug = false;

function requestUrl($method) {
  global $botToken;

  return 'https://api.telegram.org/bot' . $botToken . '/'. $method;
}

function sendReply($chatId, $msgId, $text) {
  global $debug;

  $data = array(
    'chat_id' => $chatId,
    'text'  => $text,
    'parse_mode' => 'markdown'
  );
  $options = array(
    'http' => array(
      'header' => 'Content-type: application/x-www-form-urlencoded\r\n',
      'method' => 'POST',
      'content' => http_build_query($data)
    ),
  );
  $context = stream_context_create($options);
  $result = file_get_contents(requestUrl('sendMessage'), false, $context);

  if ($debug) {
    print_r($result);
  }
}

function processMessage($message) {
  $updateId = $message['update_id'];
  $messageData = $message['message'];

  if (isset($messageData['text'])) {
    $chatId = $messageData['chat']['id'];
    $messageId = $messageData['message_id'];
    $text = $messageData['text'];
    $response = createResponse($text, $messageData);

    if (!empty($response)) {
      sendReply($chatId, $messageId, $response);
    }
  }

  return $updateId;
}
