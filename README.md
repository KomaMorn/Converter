# Конвертация валют

<h3>Установка</h3>
Для разработки используется стек LAMP.

<h4>Установка Apache</h4>

```
apt-get install apache2
```
После установки веб-сервера Apache настроим конфигурацию веб-приложения.
Для этого перейдем в папку /etc/apache2/sites-available и создадим файл converter.ru.conf со следующим содержимым:

```
<VirtualHost *:80>
	# The ServerName directive sets the request scheme, hostname and port that
	# the server uses to identify itself. This is used when creating
	# redirection URLs. In the context of virtual hosts, the ServerName
	# specifies what hostname must appear in the request's Host: header to
	# match this virtual host. For the default virtual host (this file) this
	# value is not decisive as it is used as a last resort host regardless.
	# However, you must set it for any further virtual host explicitly.
	ServerName converter.ru

	ServerAdmin webmaster@localhost
	DocumentRoot /var/www/converter.ru

	<Directory /var/www/converter.ru>
	    DirectoryIndex index.php index.html
	    Options Indexes FollowSymLinks MultiViews
	    AllowOverride All
	    Require all granted
	</Directory>

	# Available loglevels: trace8, ..., trace1, debug, info, notice, warn,
	# error, crit, alert, emerg.
	# It is also possible to configure the loglevel for particular
	# modules, e.g.
	#LogLevel info ssl:warn

	ErrorLog ${APACHE_LOG_DIR}/converter.ru-error.log
	CustomLog ${APACHE_LOG_DIR}/converter.ru-access.log combined

	# For most configuration files from conf-available/, which are
	# enabled or disabled at a global level, it is possible to
	# include a line for only one particular virtual host. For example the
	# following line enables the CGI configuration for this host only
	# after it has been globally disabled with "a2disconf".
	#Include conf-available/serve-cgi-bin.conf
</VirtualHost>
```

Как можно видеть, корень веб-приложения лежит в папке /var/www/converter.ru, где и будет лежать содержимое репозитория.
Теперь активируем веб-приложение с помощью команды:

```
a2ensite converter.ru.conf
```

После этого перезагрузим веб-сервер:

```
service apache2 restart
```

<h4>Установка PHP</h4>

Для установки PHP выполним команду:

```
apt-get install php libapache2-mod-php
```
Перезапустим веб-сервер:

```
service apache2 restart
```

<h4>Установка MySQL</h4>

Выполним команду:

```
apt-get install mysql-server
```

<h4>Установка phpmyadmin</h4>

Для установки phpmyadmin выполним следующие команды:

```
sudo apt install php-mbstring php-zip php-gd php-json php-curl
```

```
sudo phpenmod mbstring
```

```
sudo apt install phpmyadmin
```

Перезагрузим веб-сервер:

```
service apache2 restart
```

<h4>Запуск</h4>

После установки стека необходимо иметь правильную базу данных. Для этого в папке db существует файл dump.sql, с помощью которого можно импортировать базу данных.
Также надо убедиться, что подключение к БД корректно. Для этого надо перейти в папку config, в файл db.php. Этот скрипт возвращает необходимые данные для подключения к базе данных,
в них нужно указать собственные настройки - хост, имя пользователя, пароль, порт при необходимости, имя базы данных.

После этого приложение готово к запуску: 

Страница регистрации:

```
http://localhost/converter.ru/register
```

Страница авторизации:

```
http://localhost/converter.ru/login
```

Основная страница с конвертером:

```
http://localhost/converter.ru/
```

