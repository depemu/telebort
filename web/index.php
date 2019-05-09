<?php

require('../vendor/autoload.php');

$botUsername = '@telebortbot';
$botToken = '750295559:AAHFZuX98qhYlCwroJppnMmbQ1w4EfJ4vMs';

include dirname(__FILE__) . '/private/functions.php';
include dirname(__FILE__) . '/private/telegram.php';

$entityBody = file_get_contents('php://input');
$receivedMessage = json_decode($entityBody, true);
processMessage($receivedMessage);
