<?php
    require 'header.php';
    require 'navigation.php';
    ?>

    <div class="container">
        <h2>Зарегистрируйтесь,если у вас нет аккаунта</h2>
    <form action="" method="POST" class="creat-user" id="creat-user">
        <label for="first_name">Имя:</label>
        <input type="text" name="first_name"><br>

        <label for="last_name">Фамилия:</label>
        <input type="text" name="last_name"><br>

        <label for="login">Логин:</label>
        <input type="text" name="login"><br>

        <label for="email">Email:</label>
        <input type="email" name="email"><br>

        <label for="password">Пароль:</label>
        <input type="password" name="password"><br>

        <input type="submit" name="action" value="Зарегистрироваться">

    </form>
    </div>
    <?php
    $pdo = require 'db_connect.php'; // забираем объект подключения к бд в переменную
    require 'functions.php';


    $query = "CREATE TABLE IF NOT EXISTS users(
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(255) NOT NULL,
        last_name VARCHAR(255) NOT NULL,
        login VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL
);";
    $pdo->exec($query);

    if (isset($_POST['action']) && $_POST['action'] === 'Создать') {
//d($_POST);

        if (!empty($_POST['first_name']) &&
            !empty($_POST['last_name']) &&
            !empty($_POST['login']) &&
            !empty($_POST['email']) &&
            !empty($_POST['password'])) {
            //экранируем данные, обрезаем пробелы, делаем безопасным
            $first_name = htmlspecialchars(trim($_POST['first_name']));
            $last_name = htmlspecialchars(trim($_POST['last_name']));
            $login = htmlspecialchars(trim($_POST['login']));
            $email = htmlspecialchars(trim($_POST['email']));
            $password = htmlspecialchars(trim($_POST['password']));

            //пишем текст запроса на создание данных
            $query = "INSERT INTO users VALUES (?, ?, ?, ?, ?, ?)";

            $insert_query = $pdo->prepare($query); // после получаем объект
            //выполняем запрос
            $insert_query->execute([null, $first_name, $last_name, $login, $email, $password]);
            echo '<h2>Вы успешно зарегистрировались!</h2>';
           header('location:form_entrance.php');
        } else {
            echo '<span>Заполните все поля!!!</span>';
        }
    }

    ?>

</head>
</body>
</html>