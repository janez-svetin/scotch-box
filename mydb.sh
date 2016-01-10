#!/bin/bash
DB=$1;

sudo mysql -u root -proot -e "CREATE DATABASE IF NOT EXISTS \`$DB\` DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci";
if [ $2 ]; then
  sudo mysql -u root -proot $DB < $2
fi
