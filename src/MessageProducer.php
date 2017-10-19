<?php
namespace RabbitHello;

use PhpAmqpLib\Message\AMQPMessage;

/**
 * Interface MessageProducer
 * @package RabbitHello
 */
interface MessageProducer extends Message
{
    /**
     * @param string $exchangeName
     * @param AMQPMessage $msg
     */
    public function send(string $exchangeName, AMQPMessage $msg): void;
}