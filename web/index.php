<?php

require('../vendor/autoload.php');

$botUsername = 'YOUR_BOT_USERNAME';
$botToken = 'YOUR_BOT_TOKEN';

include dirname(__FILE__) . '/private/functions.php';
include dirname(__FILE__) . '/private/telegram.php';

$entityBody = file_get_contents('php://input');
$receivedMessage = json_decode($entityBody, true);
processMessage($receivedMessage);
