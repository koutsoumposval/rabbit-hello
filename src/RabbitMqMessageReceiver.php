<?php
namespace RabbitHello;

/**
 * Class RabbitMqMessageReceiver
 * @package RabbitHello
 * @author Chrysovalantis Koutsoumpos <chrysovalantis.koutsoumpos@devmob.com>
 */
class RabbitMqMessageReceiver extends RabbitMqMessaging implements MessageReceiver
{

    /**
     * @param string $exchangeName
     * @param callable $callback
     * @param string $consumerTag
     * @param bool $noLocal
     * @param bool $noAck
     * @param bool $exclusive
     * @param bool $noWait
     */
    public function receive(
        string $exchangeName,
        Callable $callback,
        string $consumerTag = '',
        bool $noLocal = false,
        bool $noAck = true,
        bool $exclusive = false,
        bool $noWait = false
    ): void {
        $this->channel($exchangeName)->basic_consume(
            $exchangeName,
            $consumerTag,
            $noLocal,
            $noAck,
            $exclusive,
            $noWait,
            $callback
        );
    }

    /**
     * @param string $exchangeName
     */
    public function wait(string $exchangeName): void
    {
        while (count($this->channel($exchangeName)->callbacks)) {
            $this->channel($exchangeName)->wait();
        }
    }
}