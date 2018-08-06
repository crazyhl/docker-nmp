FROM php:fpm
# 安装 comopser
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# composer 设置国内镜像 安装 MySQL pdo
RUN apt-get update \
    && composer config -g repo.packagist composer https://packagist.phpcomposer.com \
    && apt-get install -y git zip unzip zlib1g-dev --no-install-recommends \
    && docker-php-ext-install pdo_mysql zip \
    && pecl install redis \
    && rm -r /var/lib/apt/lists/*