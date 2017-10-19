<?php
namespace RabbitHello;

/**
 * Interface Message
 * @package RabbitHello
 */
interface Message
{
    /**
     * @param string $exchangeName
     */
    public function open(string $exchangeName): void;

    public function close(): void;
}