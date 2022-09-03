<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>TEXTAREA</title>
</head>

<body>
<div class="container">
<h1>Рады вас видеть!</h1>
<h3>Введите текст:</h3>
<p id="block"><b></b></p>
<textarea class="inputText" name="inputText" rows="10" cols="45"></textarea>
<div>Общее количество знаков: <span id="txt1">0</span></div>
<div>Общее количество слов: <span id="txt2">0</span></div>
<div>Длина самого короткого слова: <span id="txt3">0</span></div>
<div>Длина самого длинного слова: <span id="txt4">0</span></div>
<div>Количество предложений: <span id="txt5">0</span></div>
<div>Общее количество букв: <span id="txt6">0</span></div>
<div>Общее количество цифр: <span id="txt7">0</span></div>
<button id="send">отправить</button>
<button id="clear">очистить</button>
<button><a class="exit" href="../apps.php">Выйти</a></button>
</div>
<script src="script.js"></script>
</body>

</html>