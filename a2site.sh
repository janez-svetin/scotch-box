#!/bin/bash

cat << VIRTUALHOSTCONF > /etc/apache2/sites-available/$1.conf
<VirtualHost *:80>
    ServerAdmin    webmaster@localhost
    ServerName     $1
    ServerAlias    *.$1
    DocumentRoot   $2
    DirectoryIndex index.php index.html
    ErrorLog  \${APACHE_LOG_DIR}/error.log
    CustomLog \${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
VIRTUALHOSTCONF

sudo a2ensite $1.conf
sudo service apache2 restart
