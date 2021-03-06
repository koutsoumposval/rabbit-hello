<?php
require_once __DIR__ . '/app.php';

use RabbitHello\RabbitMqMessageReceiver;

$callback = function ($msg) {
    echo " [x] Received ", $msg->body, PHP_EOL;
};

$receiver = new RabbitMqMessageReceiver($connection);
$receiver->open($exchangeName);
$receiver->receive($exchangeName, $callback);

echo " [*] Waiting for messages..." . PHP_EOL;

$receiver->wait($exchangeName);
$receiver->close();