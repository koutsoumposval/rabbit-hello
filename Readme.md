Hello Rabbit
======================
Easily produce & receive messages with RabbitMQ.

Build
----------
```
composer install
docker-compose up -d
```

Hosts
----------
```
# /etc/hosts
192.168.99.100 rabbit-hello.dev
```

RabbitMQ Management
----------
```
rabbit-hello.dev:15672
# username: guest
# password: guest

```

Example
----------
In `example` directory
```
# Terminal 1 - Open Connection - waiting to consume messages
$ php receiver.php
[*] Waiting for messages...

# Terminal 2 - Open Connection - send message
$ php producer.php
[x] Sent 'Hello World!'

# Terminal 1 - Message received
$ php receiver.php
[*] Waiting for messages...
[x] Received Hello World!
```

Test
----------
<i>TODO</i>