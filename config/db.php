<?php

if (file_exists(dirname(__FILE__) . "/db-local.php")) {
    return require(dirname(__FILE__) . "/db-local.php");
}
else {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=kursy',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
    ];
}
