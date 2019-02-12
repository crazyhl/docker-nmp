FROM mysql:5.7

#  设置时区
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone \
	&& groupadd -g 500 www \
	&& useradd -u 500 -g www -s /sbin/nologin www