<?php
session_start(); // начинаем сессию

session_destroy();// уничтожаем сессию

header('Location: ../index.php');