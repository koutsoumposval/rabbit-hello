<?php
namespace RabbitHello;

use PhpAmqpLib\Message\AMQPMessage;

/**
 * Class RabbitMqMessageProducer
 * @package RabbitHello
 * @author Chrysovalantis Koutsoumpos <chrysovalantis.koutsoumpos@devmob.com>
 */
class RabbitMqMessageProducer extends RabbitMqMessaging implements MessageProducer
{
    /**
     * @param string $exchangeName
     * @param AMQPMessage $msg
     */
    public function send(string $exchangeName, AMQPMessage $msg): void
    {
        $this->channel($exchangeName)->basic_publish(
            $msg,
            $exchangeName
        );
    }
}