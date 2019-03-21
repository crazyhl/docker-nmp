FROM php:fpm

# 设置时区
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# 安装 comopser
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# 拷贝 入口文件
COPY entrypoint.sh /usr/local/bin/
# 拷贝 阿里云源
# COPY ./conf/source.ali.list /etc/apt/sources.list
# composer 设置国内镜像 安装 MySQL pdo


# && apt-get install -y cron \
RUN echo 'debconf debconf/frontend select Noninteractive' | debconf-set-selections \
    && composer config -g repo.packagist composer https://packagist.phpcomposer.com \
    && apt-get update && apt-get install -y libzip-dev zip cron gcc libicu-dev g++ git zip unzip zlib1g-dev libmagick++-dev libmemcached-dev curl libcurl3-dev libcurl4-openssl-dev libmcrypt-dev libgmp-dev libssl-dev libc-client-dev libkrb5-dev libedit-dev librecode-dev librecode0 librecode-dev libsnmp-dev libxml2-dev --no-install-recommends && rm -r /var/lib/apt/lists/* \
    && CFLAGS="-I/usr/src/php" \
    && docker-php-ext-configure hash --with-mhash \
    && docker-php-ext-configure intl \
    && docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-install bcmath bz2 calendar exif gd gettext gmp mysqli opcache pcntl pdo_mysql recode shmop soap sockets sysvmsg sysvsem sysvshm wddx xmlrpc zip \
    # && pecl install igbinary \
    && curl -fsSL 'https://github.com/igbinary/igbinary/archive/3.0.1.tar.gz' -o igbinary.tar.gz \
    && mkdir -p igbinary \
    && tar -xf igbinary.tar.gz -C igbinary --strip-components=1 \
    && rm igbinary.tar.gz \
    && ( \
        cd igbinary \
        && phpize \
        && ./configure \
        && make -j$(nproc) \
        && make install \
    ) \
    && rm -r igbinary \
    # && pecl install msgpack \
    && curl -fsSL 'https://github.com/msgpack/msgpack-php/archive/msgpack-2.0.3.tar.gz' -o msgpack.tar.gz \
    && mkdir -p msgpack \
    && tar -xf msgpack-2.0.2.tar.gz -C msgpack --strip-components=1 \
    && rm msgpack-2.0.2.tar.gz \
    && ( \
        cd msgpack \
        && phpize \
        && ./configure \
        && make -j$(nproc) \
        && make install \
    ) \
    && rm -r msgpack \
    # && pecl install redis \
    && curl -fsSL 'https://github.com/phpredis/phpredis/archive/4.3.0.tar.gz' -o redis.tar.gz \
    && mkdir -p redis \
    && tar -xf redis.tar.gz -C redis --strip-components=1 \
    && rm redis.tar.gz \
    && ( \
        cd redis \
        && phpize \
        && ./configure --enable-redis-igbinary \
        && make -j$(nproc) \
        && make install \
    ) \
    && rm -r redis \
    # && pecl install imagick \
    && curl -fsSL 'https://github.com/mkoppanen/imagick/archive/3.4.3.tar.gz' -o imagick.tar.gz \
    && mkdir -p imagick \
    && tar -xf imagick.tar.gz -C imagick --strip-components=1 \
    && rm imagick.tar.gz \
    && ( \
        cd imagick \
        && phpize \
        && ./configure \
        && make -j$(nproc) \
        && make install \
    ) \
    && rm -r imagick \
    # && pecl install memcached \
    && curl -fsSL 'https://github.com/php-memcached-dev/php-memcached/archive/v3.1.3.tar.gz' -o memcached.tar.gz \
    && mkdir -p memcached \
    && tar -xf memcached.tar.gz -C memcached --strip-components=1 \
    && rm memcached.tar.gz \
    && ( \
        cd memcached \
        && phpize \
        && ./configure \
        && make -j$(nproc) \
        && make install \
    ) \
    && rm -r memcached \
    && docker-php-ext-enable opcache igbinary msgpack redis imagick memcached \
    && groupadd -g 1002 www \
    && useradd -u 1002 -g www -s /sbin/nologin www \
    && mkdir -p /etc/cron.d/ \
    && touch /etc/cron.d/cron \
    && chmod 0644 /etc/cron.d/cron \
    && chmod 777 /usr/local/bin/entrypoint.sh

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]