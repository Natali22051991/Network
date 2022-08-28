<?php
session_start();
$pdo = require 'db_connect.php'; // забираем объект подключения к бд в переменную
require 'functions.php';
    ?>

    <div class="container">
    <form action="" method="POST" class="creat-user" id="creat-user">
<h1>Вход в личный кабинет</h1>
        <label for="login">Логин:</label>
        <input type="text" name="login"><br>

        <label for="password">Пароль:</label>
        <input type="password" name="password"><br>

        <input type="submit" name="action" value="Войти">

    </form>
    </div>
    <?php


    if (isset($_POST['action']) && $_POST['action'] === 'Войти') {
//        d($_POST);
        if (!empty($_POST['login']) && !empty($_POST['password'])) {
            //экранируем данные, обрезаем пробелы, делаем безопасным
            $login = htmlspecialchars(trim($_POST['login']));
            $password = htmlspecialchars(trim($_POST['password']));

            //пишем текст запроса на создание данных
            $query = "SELECT login, password FROM users WHERE login = ? and password = ?;";
//            SELECT id, login, password
//FROM users
//WHERE login = $_POST['login'];
            $pdo->prepare($query); // после получаем объект
//            d($insert_query);
            //выполняем запрос
            $login_y = $pdo->execute([$login, $password]);
            d($login_y);

           // d($user);
//            if($_POST['login'] === $login && $_POST['password'] === $password){
//                echo '<h2>Вы успешно вошли!</h2>';
//            }

//            header('location:registration.php');
//        } else {
//            echo '<span>Заполните все поля!!!</span>';
//        }
        }
    }

    ?>

</head>
</body>
</html>