<?php
namespace RabbitHello;

/**
 * Interface MessageReceiver
 * @package RabbitHello
 */
interface MessageReceiver extends Message
{
    /**
     * @param string $exchangeName
     * @param callable $callback
     */
    public function receive(string $exchangeName, Callable $callback): void;

    /**
     * @param string $exchangeName
     */
    public function wait(string $exchangeName): void;
}