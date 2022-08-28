<?php

$db_name = 'users_0651'; // имя бд
$login = 'root'; // логин пользователя бд
$password = ''; // пароль пользователя
$host = 'localhost'; // адрес сервера с бд

// подключаемся к бд - создаем объект подключения к бд
//$pdo = new PDO("mysql:host=$host; dbname=$db_name", $login, $password);

return new PDO("mysql:host=$host;dbname=$db_name", $login, $password);