#!/bin/bash
echo 'removing old paths...';
rm components/classes/path.php;
echo 'creating new...'
echo "<?php \$path = '$(pwd)/db/elephpant.db' ?>" >> components/classes/path.php;
echo 'creating tables';
php components/setup.php;
clear;
echo -n 'do you want to start [y/n]: ';
read start;
if [[ $start = 'y' ]]
then
    ./start.sh;
else
    echo 'to start either run ./start.sh or "php -S localhost at desired port"';
fi