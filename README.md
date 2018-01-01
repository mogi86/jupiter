# git clone
- git clone https://github.com/mogi86/jupiter.git
- cd jupiter

# docer-compose up
- [host]
 - cd /dir/jupiter
 - docker-compose up -d

# laravel setup
- [host]
 - docker exec -it jupiter_web /bin/bash
- [guest]
 - cd /var/www/jupiter
 - cp .env.docker .env
 - composer install
 - php artisan key:generate
 - php artisan cache:clear

# laravel migrate
- php artisan migrate

# DynamoDB install(仮)

## jupiter_web

```
$ yum -y install java-1.8.0-openjdk.x86_64
$ cd /tmp
$ yum -y install wget
$ wget http://dynamodb-local.s3-website-us-west-2.amazonaws.com/dynamodb_local_latest.tar.gz
```
