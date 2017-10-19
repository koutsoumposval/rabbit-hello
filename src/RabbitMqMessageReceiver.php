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
     */
    public function receive(string $exchangeName, Callable $callback): void
    {
        $this->channel($exchangeName)->basic_consume(
            $exchangeName,
            '',
            false,
            true,
            false,
            false,
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