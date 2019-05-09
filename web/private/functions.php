<?php

function createResponse($text, $message) {
  global $botUsername;

  $userId = $message['from']['id'];
  $username = $message['from']['first_name'];
  $botUsername = strtolower($botUsername);

  $result = false;
  $text = preg_replace('/\s\s+/', ' ', $text);
  $firstWord = substr($text, 0, 1);

  if ($firstWord == '/') {
    $text = substr($text, 1);
  }

  $words = explode(' ', $text);
  $fullWords = $words;
  $command = $words[0];

  array_shift($words);

  switch ($command) {
    case 'start':
      $result = "Ya {$username}~";
      break;
  }

  return $result;
}
