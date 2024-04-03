<?php

define('DB_SERVERNAME', 'localhost:3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', '01_university');


$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);


var_dump($connection);


if ($connection && $connection->connect_error) {
    echo 'database connection failed';
    die;
}
