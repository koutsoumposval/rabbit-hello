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

Receive
----------
```
php receiver.php
```

Produce
----------
```
php producer.php
```

Test
----------
<i>TODO</i>