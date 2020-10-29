<?php

// этот файлн конфигурационный подключается в каждый файл

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// домен которую надо поменять на свою, заменится сразу во всем проекте
$domain = 'test.loc';

// PDO хендлер
$dbh = new PDO ('mysql:host=localhost; dbname=sandbox;', 'root', 'root');
