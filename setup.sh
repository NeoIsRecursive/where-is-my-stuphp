#!/bin/bash
rm components/classes/path.php;
echo "<?php \$path = '$(pwd)/db/elephpant.db' ?>" >> components/classes/path.php;
php -S localhost:8000;