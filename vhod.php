<?php
include 'functions.php';
require 'header.php';
$pdo = require 'db_connect.php';

session_start(); // начинаем сессию
// сессии

    if( isset($_SESSION['login'])){ // если данные сессии установлены
             //будем выводить приветствие
         echo '<div class="container">';
        require 'navigation.php';

         echo '<div class="container-menu">';
        require 'left-side-menu.php';
        require 'feed-menu.php';
        require 'rigth-side-menu.php';

        echo '</div>';
        echo '</div>';
//            echo '<h2>Привет, ' . $_SESSION['first_name'].' '.$_SESSION['last_name'] . '</h2>';
//            echo '<p><a href="registration/user.php">Перейти в профиль</a></p>';
//            echo '<p><a href="registration/exit.php">Выйти</a></p>';
    }else{
         if( $_SERVER['REQUEST_METHOD'] === 'POST' ) { // если отправлена форма
         d($_POST);
//экранируем

             $login = htmlspecialchars(trim($_POST['login']));
             $password = htmlspecialchars(trim($_POST['password']));

             //проверяем логи и пароль с админ
                 if (!empty($_POST['login']) && !empty($_POST['password'])) {
                     // сравниваем с данными регистрации

                     $query ="SELECT id, first_name, last_name,country, email, login, password, avatar, add_date 
                        FROM users WHERE login=? and password=?";
//                     $result = $pdo->query($query,PDO::FETCH_ASSOC);
                     $result = $pdo->prepare($query);
                     $result->execute([$login, $password]);
                     $row = $result->fetch(PDO::FETCH_ASSOC);
                     if(!empty($row)){
                         $_SESSION['login'] = htmlspecialchars(trim($_POST['login']));
                         $_SESSION['password'] = htmlspecialchars(trim($_POST['password']));
                         $_SESSION['first_name'] = $row['first_name'];
                         $_SESSION['last_name'] = $row['last_name'];
                         $_SESSION['country'] = $row['country'];
                         $_SESSION['email'] = $row['email'];
                         $_SESSION['avatar'] = $row['avatar'];
                         header('Location: vhod.php');
                     } else {
                         echo 'Вы ввели неверно логин или пароль! Попробуйте еще раз!';
                         echo '<p><a href="vhod.php">Перейти</a></p>';
                     }

                 } else {
         echo 'Заполните все поля';
         echo '<p><a href="registration/vhod.php">Перейти</a></p>';
                     }

        } else { // если страница загружена впервые
        // просто показываем форму
        echo <<<_HTML
<div class="backdrop">
    <div class="modal">
    <div>
        <form action="" method="POST" enctype="multipart/form-data>
        
                <label for="login">Логин:</label>
                <input type="text" name="login">
            </div>
         
            <div>    
                <label for="password">Пароль:</label>
                <input type="password" name="password">                               
            </div>             

            <input id="vhod" type="submit" value="Войти">
        </form>
  </div> 
  </div> 
</div>

_HTML;

    }}