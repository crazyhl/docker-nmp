FROM php:fpm

# #  设置时区
# ENV TZ=Asia/Shanghai
# RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# # 安装 comopser
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# # composer 设置国内镜像 安装 MySQL pdo

# # && composer config -g repo.packagist composer https://packagist.phpcomposer.com \
# RUN echo 'debconf debconf/frontend select Noninteractive' | debconf-set-selections \
#     && apt-get update \
# 	&& apt-get upgrade -y \
#     && apt-get install -y apt-utils \
# 	# && apt-get install -y cron \
#     && apt-get install -y gcc libicu-dev g++ git zip unzip zlib1g-dev libmagick++-dev libmemcached-dev curl libcurl3-dev libcurl4-openssl-dev libmcrypt-dev libgmp-dev libssl-dev libc-client-dev libkrb5-dev libedit-dev librecode-dev librecode0 librecode-dev libsnmp-dev libxml2-dev --no-install-recommends \
#     && CFLAGS="-I/usr/src/php" \
#     && docker-php-ext-configure hash --with-mhash \
#     && docker-php-ext-configure intl \
#     && docker-php-ext-install bcmath bz2 calendar exif gd gettext gmp mcrypt mysqli opcache pcntl pdo_mysql recode shmop soap sockets sysvmsg sysvsem sysvshm wddx xmlrpc zip \
#     # && pecl install igbinary \
#     # && pecl install msgpack \
#     # && pecl install redis \
#     # && pecl install imagick \
#     # && pecl install memcached \
#     && docker-php-ext-enable bcmath bz2 calendar exif gd gettext gmp mcrypt mysqli opcache pcntl pdo_mysql recode shmop soap sockets sysvmsg sysvsem sysvshm wddx xmlrpc zip \
#     && rm -r /var/lib/apt/lists/* \
#     && groupadd -g 500 www \
#     && useradd -u 500 -g www -s /sbin/nologin www

# Create the log file to be able to run tail
# ADD ./crontab/crontab /etc/cron.d/cron
# RUN chmod 0644 /etc/cron.d/cron
# RUN touch /var/log/php/crontab.log
