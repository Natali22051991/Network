<?php


function validate_form(){

    // 1 объявляем массивы для данных пользователя и возможных ошибок
    $errors = [];
    $input = [];
    //d($_POST);

    // 2 экранируем данные и удаляем пробелы с концов строк
    $input['first_name'] = htmlspecialchars(trim($_POST['first_name']));
    $input['$last_name'] = htmlspecialchars(trim($_POST['last_name']));
    $input['$country'] = htmlspecialchars(trim($_POST['country']));
    $input['$email'] = htmlspecialchars(trim($_POST['email']));
    $input['$login'] = htmlspecialchars(trim($_POST['login']));
    $input['$avatar'] = htmlspecialchars(trim($_FILES['avatar']));
    d($input);

    $_SESSION['id'] = htmlspecialchars(trim($_POST['id']));
    $_SESSION['first_name'] = htmlspecialchars(trim($_POST['first_name']));
    $_SESSION['last_name'] = htmlspecialchars(trim($_POST['last_name']));
    $_SESSION['country'] = htmlspecialchars(trim($_POST['country']));
    $_SESSION['email'] = htmlspecialchars(trim($_POST['email']));
    $_SESSION['login'] = htmlspecialchars(trim($_POST['login']));
    $_SESSION['password'] = htmlspecialchars(trim($_POST['password']));
    // 3 проверяем введенные данные
    /**
     * функция для проверки имени
     */
    // объявляем функцию
    function validate_first_name( $first_name ){
        $reg_exp = "/^[А-ЯЁ][а-яё]+$/u";

        if( empty($first_name) ){ // проверяем на пустоту
            return 'Введите имя!';
        }elseif( mb_strlen($first_name) < 2 ){ // если строка короче 2 символов
            return 'Имя должно состоять не менее чем из двух букв!';
        }elseif( !preg_match($reg_exp, $first_name) ){ // если введенная строка НЕ соответствует рег выражению
            return 'Имя должно состоять только из русских букв, первая заглавная!';
        }
    }
    // вызываем функцию
    $res_validate_first_name = validate_first_name( $input['first_name'] ); // 'Введите имя!'
    if($res_validate_first_name){ // если при вводе пользователь ошибся
        $errors['first_name'] = $res_validate_first_name; // записываем в массив $errors текст ошибки
    }

    /**
     * функция для проверки фамилии
     */
    function validate_last_name($last_name){
        $reg_exp = "/^[А-ЯЁ][а-яё]+$/u";

        if(empty($last_name)){
            return 'Поле не заполнено!';
        }elseif( mb_strlen($last_name) < 2 ){
            return 'Фамилия должна содержать не менее 2-ух букв!';
        }elseif( !preg_match($reg_exp, $last_name) ){
            return 'Используйте русские буквы для заполнения формы, первая заглавная!';
        }
    }

    $res_validate_last_name = validate_last_name($input['last_name']);
    if($res_validate_last_name){
        $errors['last_name'] = $res_validate_last_name;
    }

    /**
     * функция для проверки Логина
     */
    function validate_login( $login ){
        $reg_exp = "/^[a-z][a-z0-9]{2,}$/i";

        if( strlen($login) === 0 ){
            return 'Введите логин';
        }elseif ( strlen($login) < 3 ){
            return 'Логин должен быть не короче трех символов!';
        }elseif ( !preg_match($reg_exp, $login) ){
            return 'Логин должен начинаться с буквы и должен содержать только латинские буквы и цифры';
        }
    }
    $res_validate_login = validate_login( $input['login'] );
    if( $res_validate_login ){
        $errors['login'] = $res_validate_login;
    }

    /**
     * функция для проверки Электронной почты
     */
    function validate_email( $email ){
        $reg_exp = "/^.+@.+\..+$/u";

        if( strlen($email) === 0 ){
            return 'Введите адрес электронной почты';
        }elseif ( !preg_match($reg_exp, $email) ){
            return 'Адрес электронной почты введен в неверном формате';
        }
    }
    $res_validate_email = validate_email( $input['email'] );
    if($res_validate_email){
        $errors['email'] = $res_validate_email;
    }

    /**
     * функция для проверки пароля
     */
    function validate_password( $password ){
        $reg_exp = "/^.{8,}$/u";

        if( strlen($password) === 0 ){
            return 'Введите пароль';
        }elseif ( !preg_match($reg_exp, $password) ){
            return 'Пароль должен содержать не менее восьми любых символов';
        }
    }
    $res_validate_password = validate_password( $input['password'] );
    if( $res_validate_password ){
        $errors['password'] = $res_validate_password;
    }

    function validate_avatar( $avatar ){
        if($_FILES['avatar']['error'] != 0){
            echo '<h2>При загрузке файла произошла ошибка</h2>';
        } elseif($_FILES['avatar']['size'] > 500000){
            echo '<h2>Размер файла превышает допустимый - 500кб</h2>';
        } elseif($_FILES['avatar']['type'] != 'image/jpeg' && $_FILES['avatar']['type'] != 'image/png'){
            echo '<h2>Размер файла превышает допустимый - 500кб</h2>';
            echo '<h2>Допускается только загрузка картинок .jpeg и .png</h2>';}

    }

    // 4 возвражаем массивы
    return [$errors, $input];
} // конец функции validate_form()


/**
 *
 * функция для отображения данных при успешной регистрации
 *
 */
function process_form($input = []){
    echo <<<_HTML_
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Добро пожаловать, $input[first_name]</title>
</head>
<body>
    <h2>Вы успешно зарегистрировались, $input[first_name]</h2>
    
    <p>Ваше имя: $input[first_name]</p>
    <p>Ваша фамилия: $input[last_name]</p>
    <p>Ваш логин: $input[login]</p>
    <p>Ваш емейл: $input[email]</p>
    <p>Ваш пароль: $input[password]</p>
</body>
</html>

_HTML_;

}




/**
 *
 * функция для отображения формы
 *
 */
function show_form( $errors = [], $input = [] ){

//    if( !isset($input['first_name']) ){
//        $input['first_name'] = '';
//    }
//    if( !isset($errors['first_name']) ){
//        $errors['first_name'] = '';
//    }

    echo <<<_HTML_

<!--<!doctype html>-->
<!--<html>-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>Регистрация</title>-->
<!--    <style>-->
<!--        div{-->
<!--            margin: 5px 0;-->
<!--        }-->
<!--        span{-->
<!--            color: red;-->
<!--        }-->
<!--    </style>-->
<!--</head>-->
<!--<body>-->
<!--    <h1>Регистрация</h1>-->
<!--    -->
    <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <label for="first_name">Имя</label>
                <input type="text" name="first_name" placeholder="Введите имя" value="">
            </div>
            <div> 
                <label for="last_name">Фамилия:</label>
                <input type="text" name="last_name" placeholder="Введите фамилию">
            </div>
              <div> 
                <label for="country">Страна проживания:</label>
                <input type="text" name="country" placeholder="Страна проживания">
            </div>
             <div>    
                <label for="email">Почта:</label>
                <input type="email" name="email" placeholder="Ваша почта">
            </div>
            <div>   
                <label for="login">Логин:</label>
                <input type="text" name="login" placeholder="Логин">
            </div>
           
            <div>    
                <label for="password">Пароль:</label>
                <input type="password" name="password" placeholder="Пароль">                               
            </div>  
             <div class="row">
                <label for="avatar">Аватарка</label>
                <input type="file" name="avatar" placeholder="Аватарка">
            </div>           
            <input type="submit" value="Зарегистрироваться">
        </form>
    
</body>
</html>

_HTML_;

}

