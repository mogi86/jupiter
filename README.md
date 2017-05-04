# git clone
- git clone https://github.com/mogi86/jupiter.git
- cd jupiter

# docer-compose up
[host]
- cd /dir/jupiter
- docker-compose up -d

# laravel setup
[host]
- docker exec -it [webコンテナID] /bin/bash
[guest]
- cd /var/www/jupiter
- cp .env.docker .env
- composer install
- php artisan key:generate
- php artisan cache:clear

# laravel migrate
- php artisan migrate