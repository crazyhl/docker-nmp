FROM php:fpm
# 安装 comopser
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# composer 设置国内镜像 安装 MySQL pdo
RUN apt-get update \
    && composer config -g repo.packagist composer https://packagist.phpcomposer.com \
    && apt-get install -y git zip unzip zlib1g-dev --no-install-recommends \
    && docker-php-ext-install pdo_mysql zip \
    && rm -r /var/lib/apt/lists/*
# 安装 git

# re2c 是 reids 用的 不要删除
# RUN apk update \
#     && apk add --no-cache autoconf g++ gcc make file re2c \
#     &&curl -fsSL 'http://pecl.php.net/get/redis-4.0.0.tgz' -o redis-4.0.0.tgz \
#     && mkdir -p redis \
#     && tar -xf redis-4.0.0.tgz -C redis --strip-components=1 \
#     && rm redis-4.0.0.tgz \
#     && ( \
#         cd redis \
#         && phpize \
#         && ./configure \
#         && make -j$(nproc) \
#         && make install \
#     ) \
#     && rm -r redis \
#     && docker-php-ext-enable redis \
#     && docker-php-ext-install pdo_mysql \
#     && apk del autoconf g++ gcc make file \
