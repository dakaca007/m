#!/bin/bash
set -e

# 等待MySQL启动
if [ -f "config/dbs.php" ]; then
    echo "等待MySQL启动..."
    while ! mysqladmin ping -h"db" -u"${MYSQL_USER}" -p"${MYSQL_PASSWORD}" --silent; do
        sleep 1
    done
fi

# 设置配置文件
if [ ! -f "config/app.php" ]; then
    echo "初始化PhalApi配置..."
    cp config/app.sample.php config/app.php
    cp config/dbs.sample.php config/dbs.php
    cp config/qiniu.sample.php config/qiniu.php
fi

# 设置时区
sed -i "s!date.timezone =.*!date.timezone = Asia/Shanghai!" /usr/local/etc/php/php.ini

echo "启动PHP-FPM..."
exec "$@"
