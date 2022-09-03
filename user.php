<?php
session_start(); // начинаем сессию
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
            href="https://fonts.googleapis.com/css2? family=Barlow:wght@600;900 & family= Fraunces:opsz,wght@9..144,700;9..144,900 & display=swap"
            rel="stylesheet">
    <link rel="stylesheet" href="styles/user-style.css">
    <title>Cabinet</title>
</head>
<body>
<div class="container">
<div class="user-navigation-1">
    <div class="logo-lk">
        <h1>Личный кабинет</h1>
    </div>
    <div class="options">
        <a href="vhod.php"><img src="img/home2.svg">Моя страница</a>
        <a href="message/message.php" ><img src="img/message.svg">Сообщения</a>
        <a href="registration/exit.php">Выйти</a>
    </div>
</div>
<?php
echo '<div class="user-container">';
echo '<div class="user">';
//echo '<h1>Личный кабинет</h1>';
echo "<img class='avatar' src='registration/$_SESSION[avatar]' alt='$_SESSION[avatar]'>";
echo "</div>";
echo "<div class='user-property'>";
echo "<p>Имя:<span> $_SESSION[first_name]</span></p>";
echo "<p>Фамилия : <span>$_SESSION[last_name]</span></p>";
echo "<p>Страна проживания :<span> $_SESSION[country]</span></p>";
echo "<p>Логин:<span> $_SESSION[login]</span></p>";
echo "<p>Электронная почта:<span> $_SESSION[email]</span></p>";
echo "<p>Пароль: <span>$_SESSION[password]</span></p>";
echo "<div class='contact'>";

echo '</div>';
echo '</div>';
echo '</div>';

?>
</div>
