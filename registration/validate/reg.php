<?php
// регистрация пользователей

$pdo = require 'connect_db.php';


// обработка формы регистрации
if($_SERVER['REQUEST_METHOD'] === 'POST'){ // если форма отправлена

    list($errors, $input) = validate_form();// получаем данные после проверки

    if($errors){ // если есть ошибки
        show_form($errors, $input);// показываем форму снова
    } else { // если ошибок нет
        process_form($input);// кладем данные в бд, начинаем сессию, переходим в лк
    }

}else{// иначе - форма загружена впервые
    show_form(); // отображаем форму
}