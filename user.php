<?php

session_start(); // начинаем сессию
require '../header.php';
echo '<div class="container">';
require '../navigation.php';
echo '<div>';
echo '<div class="user">';
echo '<h1>Личный кабинет</h1>';
echo "<img class='avatar' src='$_SESSION[avatar]' alt='$_SESSION[avatar]'>";
echo "<p>Имя: $_SESSION[first_name]</p>";
echo "<p>Фамилия : $_SESSION[last_name]</p>";
echo "<p>Страна проживания : $_SESSION[country]</p>";
echo "<p>Логин: $_SESSION[login]</p>";
echo "<p>Электронная почта: $_SESSION[email]</p>";
echo "<p>Пароль: $_SESSION[password]</p>";

echo '<p><a href="../vhod.php">Перейти на главную</a></p>';
echo '<p><a href="exit.php">Выйти</a></p>';
echo '</div>';

