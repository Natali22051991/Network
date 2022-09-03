<?php
session_start();
$pdo = require 'db_connect.php';
include 'functions.php';
require 'header.php';



 // начинаем сессию
// сессии
$input = [];
    if( isset($_SESSION['first_name']) ) { // если данные сессии установлены
        header('location:user.php');
    } else {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // если отправлена форма



            if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['country']) && !empty($_POST['email']) && !empty($_POST['login']) && !empty($_POST['password'])) {


                $first_name = htmlspecialchars(trim($_POST['first_name']));
                $last_name = htmlspecialchars(trim($_POST['last_name']));
                $country = htmlspecialchars(trim($_POST['country']));
                $email = htmlspecialchars(trim($_POST['email']));
                $login = htmlspecialchars(trim($_POST['login']));
                $password = htmlspecialchars(trim($_POST['password']));
                $_SESSION['id'] = htmlspecialchars(trim($_POST['id']));
                $_SESSION['first_name'] = htmlspecialchars(trim($_POST['first_name']));
                $_SESSION['last_name'] = htmlspecialchars(trim($_POST['last_name']));
                $_SESSION['country'] = htmlspecialchars(trim($_POST['country']));
                $_SESSION['email'] = htmlspecialchars(trim($_POST['email']));
                $_SESSION['login'] = htmlspecialchars(trim($_POST['login']));
                $_SESSION['password'] = htmlspecialchars(trim($_POST['password']));


                    $image = $_FILES['avatar'];

                //проверяем наличие картинки и если есть помещаем в папку images
                if (!empty($image['name'])) {
                    $image['name'] = 'registration/images/' . $image['size'] . '_' . $image['name'];
                    move_uploaded_file($image['tmp_name'], $image['name']);
                    $_SESSION['avatar'] = str_replace('registration/','',$image['name']);
                } else {
                    $image['name'] = 'images/undefined.png';
                    $_SESSION['avatar'] = $image['name'];
                }



                //пишем текст запроса на создание данных
                $query = "INSERT INTO users VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $insert_query = $pdo->prepare($query); // после получаем объект
                //выполняем запрос
                $result = $insert_query->execute([null, $first_name, $last_name, $country, $email, $login, $password, $image['name'], null]);
                $query = "SELECT id FROM users
                    WHERE login=?";
                $result = $pdo->prepare($query);
                $result->execute([$_POST['login']]);
                $row = $result->fetch(PDO::FETCH_ASSOC);
                d($row);
                if(!empty($row)) {
                    $_SESSION['id'] = $row['id'];
                }

                header('location:vhod.php');


            } else {
                $errors['empty_error'] = 'Заполните все поля!!!';
                header('location:registration.php?errors=empty_error_vhod');
            }


        } else { // если страница загружена впервые
            // просто показываем форму

            echo '<div class="container">';
            require 'navigation.php';

            echo '<div class="container-menu">';
            require 'left-side-menu.php';
            require 'feed-menu.php';
            require 'rigth-side-menu.php';

            echo '</div>';
            echo '</div>';
            ?>
//
<div class="backdrop">
    <div class="modal">

<div class="registration">

        <form action="" method="POST" enctype="multipart/form-data">
            <?php

            if(!empty($_GET['errors'])){
                if($_GET['errors'] === 'empty_error'){
                    echo '<span>Заполните все поля</span>';
                }
            }
            ?>
            <div>
                <label for="first_name">Имя</label>
                <input type="text" name="first_name">

            </div>
            <div>
                <label for="last_name">Фамилия:</label>
                <input type="text" name="last_name">

            </div>
              <div>
                <label for="country">Страна проживания:</label>
                <input type="text" name="country">
            </div>
             <div>
                <label for="email">Почта:</label>
                <input type="email" name="email">
            </div>
            <div>
                <label for="login">Логин:</label>
                <input type="text" name="login">
            </div>

            <div>
                <label for="password">Пароль:</label>
                <input type="password" name="password">
            </div>
             <div class="row">
                <label for="avatar">Аватарка</label>
                <input type="file" name="avatar">
            </div>

            <input id="reg" type="submit" value="Зарегистрироваться">
        </form>
</div>
</div>
</div>
<?php


        }
    }