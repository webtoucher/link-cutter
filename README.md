Инструкция по установке
===========

В принципе, я уже выложил приложение на http://wt6.ru, но если есть непреодолимое желание развернуть его у себя, то вот инструкция.

Окружение такое: CentOS 6.0, PHP-FPM, PHP 5.4, SQLLite3

Устанавливаем фреймворк:

```bash
mkdir /var/www/wt6.ru && cd $_ && wget -O - https://github.com/yiisoft/yii/releases/download/1.1.14/yii-1.1.14.f0fee9.tar.gz | tar -xzp yii-1.1.14.f0fee9/framework --strip=1 && php framework/yiic.php webapp ./
```

Добавляем мой код:

```bash
wget -O - https://github.com/Webtoucher/link-cutter/archive/master.tar.gz | tar -xzp --strip=1
```

Прокидываем конфиг для nginx:

```bash
ln -s /var/www/test.dev.ru/protected/config/nginx/nginx.conf /etc/nginx/conf.d/test.dev.ru.conf
```

Так же не забываем поправить хост в protected/config/nginx/nginx.conf и fcgi слушателя. Перезапускаем nginx:

```bash
service nginx restart
```
