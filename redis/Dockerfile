ARG redisVersion
FROM redis:${redisVersion}

#  设置时区
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone \
  	&& groupadd -g 1002 www \
    && useradd -u 1002 -g www -s /sbin/nologin www
