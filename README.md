test

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

- DynamoDBインストール

```
$ yum -y install java-1.8.0-openjdk.x86_64
$ cd /tmp
$ yum -y install wget
$ wget http://dynamodb-local.s3-website-us-west-2.amazonaws.com/dynamodb_local_latest.tar.gz
$ tar -zxvf dynamodb_local_latest.tar.gz
```

- DynamoDB起動

```
$ cd /tmp
$ java -Djava.library.path=./DynamoDBLocal_lib -jar DynamoDBLocal.jar -sharedDb &
```

# aws cli(仮)

## jupiter_web

- pyenvを動かすために必要なパッケージインストール

```
$ yum -y install gcc bzip2 bzip2-devel openssl openssl-devel readline readline-devel
```

- pyenvインストール

```
$ cd /usr/local/
$ git clone git://github.com/yyuu/pyenv.git ./pyenv
$ mkdir -p ./pyenv/versions ./pyenv/shims
```

- pyenv-virtualenvインストール

```
$ cd /usr/local/pyenv/plugins/
$ git clone git://github.com/yyuu/pyenv-virtualenv.git
```

- path設定

```
$ echo 'export PYENV_ROOT="/usr/local/pyenv"' | tee -a /etc/profile.d/pyenv.sh
$ echo 'export PATH="${PYENV_ROOT}/shims:${PYENV_ROOT}/bin:${PATH}"' | tee -a /etc/profile.d/pyenv.sh
$ source /etc/profile.d/pyenv.sh
```

- pythonインストール

```
$ pyenv install -v 3.6.4

```

- pythonバージョン切り替え

```
$ pyenv global 3.6.4
```

- awscliインストール

```
$ pip install awscli
```


- aws configure

```
$ aws configure
AWS Access Key ID [None]: local_key
AWS Secret Access Key [None]: local_secret_key
Default region name [None]: local
Default output format [None]: json
```

- memcachedインストール
    - [インストール手順参考](https://cloudpack.media/929)
    - [pecl公式](http://pecl.php.net/package/memcached)
    - [github](https://github.com/php-memcached-dev/php-memcached)
    - [makeに失敗する場合](https://qiita.com/wata727/items/927ae072ccefe9e3de8c)
        - libmemcachedのバージョンが古い可能性があるので、1.0以上のものを入れる

```
$ yum -y install memcached-devel libmemcached-devel wget
$ cd /tmp
$ wget http://pecl.php.net/get/memcached-3.0.4.tgz
$ tar xfvz memcached-3.0.4.tgz
$ cd memcached-3.0.4
$ yum -y install php-pear
$ yum -y install gcc gcc-c++ autoconf automake zlib-devel telnet
$ phpize
$ ./configure --disable-memcached-sasl
$ yum -y remove libmemcached
$ cd /tmp/
$ wget https://launchpad.net/libmemcached/1.0/1.0.18/+download/libmemcached-1.0.18.tar.gz
$ tar xfvz libmemcached-1.0.18.tar.gz
$ cd libmemcached-1.0.18
$ ./configure
$ make
$ make install
$ cd /tmp/memcached-3.0.4
$ make
$ make install
```

- php.ini編集
    - [参考](http://d.hatena.ne.jp/puruhime/touch/20170111/1484126006)

```
$ vi /etc/php.ini 
「extension=memcached.so」を追加
```