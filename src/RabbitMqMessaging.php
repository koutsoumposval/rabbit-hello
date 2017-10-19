<?php
namespace RabbitHello;

use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;

/**
 * Class RabbitMqMessaging
 * @package RabbitHello
 * @author Chrysovalantis Koutsoumpos <chrysovalantis.koutsoumpos@devmob.com>
 */
abstract class RabbitMqMessaging implements Message
{
    /**
     * @var AMQPStreamConnection
     */
    protected $connection;

    /**
     * @var null|AMQPChannel
     */
    protected $channel;

    /**
     * RabbitMqMessaging constructor.
     * @param AMQPStreamConnection $aConnection
     */
    public function __construct(AMQPStreamConnection $aConnection)
    {
        $this->connection = $aConnection;
        $this->channel = null;
    }

    /**
     * @param string $exchangeName
     */
    private function connect(string $exchangeName): void
    {
        if (null !== $this->channel) {
            return;
        }

        $channel = $this->connection->channel();
        $channel->exchange_declare($exchangeName, 'fanout', false, true, false);
        $channel->queue_declare($exchangeName, false, true, false, false);
        $channel->queue_bind($exchangeName, $exchangeName);
        $this->channel = $channel;
    }

    /**
     * @param string $exchangeName
     */
    public function open(string $exchangeName): void
    {
        $this->channel($exchangeName);
    }

    /**
     * @param string $exchangeName
     * @return AMQPChannel
     */
    protected function channel(string $exchangeName): AMQPChannel
    {
        $this->connect($exchangeName);

        return $this->channel;
    }

    public function close(): void
    {
        $this->channel->close();
        $this->connection->close();
    }
}