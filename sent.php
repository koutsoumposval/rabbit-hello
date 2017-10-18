<?php
require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection(
    'rabbit-hello.dev',
    5672,
    'guest',
    'guest'
);

$channel = $connection->channel();

$channel->queue_declare(
    'hello',
    false,
    false,
    false,
    false
);

$channel->basic_publish(
    new AMQPMessage('Hello World!'),
    '',
    'hello'
);

echo " [x] Sent 'Hello World!'" . PHP_EOL;

$channel->close();
$connection->close();
