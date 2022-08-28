<?php

session_start(); // начинаем сессию
require '../header.php';
echo '<h1>Личный кабинет</h1>';
echo "<img src='$_SESSION[avatar]' alt='$_SESSION[avatar]'>";
echo "<p>Имя: $_SESSION[first_name]</p>";
echo "<p>Фамилия : $_SESSION[last_name]</p>";
echo "<p>Страна проживания : $_SESSION[country]</p>";
echo "<p>Логин: $_SESSION[login]</p>";
echo "<p>Электронная почта: $_SESSION[email]</p>";
echo "<p>Пароль: $_SESSION[password]</p>";

echo '<p><a href="../index.php">Перейти на главную</a></p>';
echo '<p><a href="exit.php">Выйти</a></p>';
print_r($_SESSION);
//$rigt_form = require '../rigth-side-menu.php';