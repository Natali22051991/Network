<?php

session_start();

echo '<h2>Привет, ' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . '</h2>';
echo '<p><a href="user.php">Перейти в профиль</a></p>';
echo '<p><a href="exit.php">Выйти</a></p>';
