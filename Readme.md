RabbitMQ Hello World
======================
Simple rabbitMQ example for learning purposes

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
php receive.php
```

Receive
----------
```
php send.php
```