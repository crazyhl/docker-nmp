FROM php:fpm

# 设置时区
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# 安装 comopser
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# 拷贝 入口文件
COPY entrypoint.sh /usr/local/bin/
# 拷贝 阿里云源
COPY ./conf/source.ustc.list /etc/apt/sources.list
# composer 设置国内镜像 安装 MySQL pdo

# && composer config -g repo.packagist composer https://packagist.phpcomposer.com \
# && apt-get install -y cron \
RUN echo 'debconf debconf/frontend select Noninteractive' | debconf-set-selections \
    && apt-get update && apt-get install -y cron gcc libicu-dev g++ git zip unzip zlib1g-dev libmagick++-dev libmemcached-dev curl libcurl3-dev libcurl4-openssl-dev libmcrypt-dev libgmp-dev libssl-dev libc-client-dev libkrb5-dev libedit-dev librecode-dev librecode0 librecode-dev libsnmp-dev libxml2-dev --no-install-recommends && rm -r /var/lib/apt/lists/* \
    && CFLAGS="-I/usr/src/php" \
    && docker-php-ext-configure hash --with-mhash \
    && docker-php-ext-configure intl \
    && docker-php-ext-install bcmath bz2 calendar exif gd gettext gmp mysqli opcache pcntl pdo_mysql recode shmop soap sockets sysvmsg sysvsem sysvshm wddx xmlrpc zip \
    && pecl install igbinary \
    && pecl install msgpack \
    && pecl install redis \
    && pecl install imagick \
    && pecl install memcached \
    && docker-php-ext-enable opcache \
    && groupadd -g 500 www \
    && useradd -u 500 -g www -s /sbin/nologin www \
    && mkdir -p /etc/cron.d/ \
    && touch /etc/cron.d/cron \
    && chmod 0644 /etc/cron.d/cron \
    && chmod 777 /usr/local/bin/entrypoint.sh

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]