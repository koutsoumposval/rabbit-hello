<?php
require_once __DIR__ . '/app.php';

use PhpAmqpLib\Message\AMQPMessage;
use RabbitHello\RabbitMqMessageProducer;

$msg = new AMQPMessage('Hello World!');

$producer = new RabbitMqMessageProducer($connection);
$producer->open($exchangeName);
$producer->send($exchangeName, $msg);
$producer->close();

echo " [x] Sent 'Hello World!'" . PHP_EOL;
