<?php

if (file_exists(dirname(__FILE__) . "/db-local.php")) {
    return require(dirname(__FILE__) . "/db-local.php");
}
else {
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=host1340501_kursy',
        'username'=>'host1340501',
        'password'=>'qwerty23111992',
        'charset' => 'utf8',
    ];
}
