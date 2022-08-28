<?php
    require 'header.php';
    require 'navigation.php';
    ?>

    <div class="container">
    <form action="" method="POST" class="creat-user" id="creat-user">
<h1>Вы успешно зарегистрировались, теперь можете войти в свой аккаунт</h1>
        <label for="login">Логин:</label>
        <input type="text" name="login"><br>

        <label for="password">Пароль:</label>
        <input type="password" name="password"><br>

        <input type="submit" name="action" value="Войти">

    </form>
    </div>
    <?php
    $pdo = require 'db_connect.php'; // забираем объект подключения к бд в переменную
    require 'functions.php';

    if (isset($_POST['action']) && $_POST['action'] === 'Войти') {
//        d($_POST);
        if (!empty($_POST['login']) && !empty($_POST['password'])) {
            //экранируем данные, обрезаем пробелы, делаем безопасным
            $login = htmlspecialchars(trim($_POST['login']));
            $password = htmlspecialchars(trim($_POST['password']));

            //пишем текст запроса на создание данных
            $query = "SELECT FROM users WHERE (login =? && password=?);";

            $insert_query = $pdo->prepare($query); // после получаем объект
//            d($insert_query);
            //выполняем запрос
            $login_y = $insert_query->execute([$login]);
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