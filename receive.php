<?php
require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;

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

echo ' [*] Waiting for messages. To exit press CTRL+C' . PHP_EOL;

$channel->basic_consume(
    'hello',
    '',
    false,
    true,
    false,
    false,
    function ($msg) {
        echo " [x] Received ", $msg->body, "\n";
    }
);

while (count($channel->callbacks)) {
    $channel->wait();
}

$channel->close();
$connection->close();