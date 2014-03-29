Инструкция по установке
===========

У моего приложения url будет test.dev.ru (это локальный адрес). Разумеется придётся заменить на тот, что будет использоваться у вас.

Окружение такое: CentOS 6.4, PHP-FMP, PHP 5.4, MySQL

Устанавливаем фреймворк:

```bash
mkdir /var/www/test.dev.ru && cd $_ && wget -O - https://github.com/yiisoft/yii/releases/download/1.1.14/yii-1.1.14.f0fee9.tar.gz | tar -xzp yii-1.1.14.f0fee9/framework --strip=1 && mkdir logs && php framework/yiic.php webapp public
```

Добавляем мой код:

```bash
cd public && wget -O - https://github.com/Webtoucher/link-cutter/archive/master.tar.gz | tar -xzp --strip=1
```

```bash
ln -s config/nginx/nginx.conf /etc/nginx/conf.d/test.dev.ru.conf
```

