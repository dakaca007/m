FROM php:8.2-apache

# 开启 rewrite
RUN a2enmod rewrite

# 复制代码
COPY ./public /var/www/html
COPY ./src /var/www/html/src

# 设置权限
RUN chown -R www-data:www-data /var/www/html

# 推荐：如需扩展
# RUN docker-php-ext-install pdo_mysql

# 设置时区
ENV TZ=Asia/Shanghai