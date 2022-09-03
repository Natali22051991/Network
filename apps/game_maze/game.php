
<!--echo '<h2>Раздел находится в разработке</h2>';-->
<!--echo '<a href="../vhod.php">Вернуться назад</a>';-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
<div class="container">
    <table class="table">
        <tr class="row">
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
        </tr>
        <tr class="row">
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
        </tr>
        <tr class="row">
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
        </tr>
        <tr class="row">
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
        </tr>
        <tr class="row">
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
        </tr>
        <tr class="row">
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
        </tr>
        <tr class="row">
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
        </tr>
        <tr class="row">
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
        </tr>
        <tr class="row">
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column "></td>
            <td class="column"></td>
        </tr>
        <tr class="row">
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column "></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column"></td>
            <td class="column "></td>
            <td class="column"></td>
        </tr>
    </table>
    <span>Схема управления героем</span>
    <div class="scheme">
        <button id="ArrowUp" class="up">↑</button>
        <div class="bottom-btn">
            <button id="ArrowLeft" class="left">←</button>
            <button id="ArrowDown" class="down">↓</button>
            <button id="ArrowRight" class="right">→</button>
        </div>
    </div>
    <div class="information-board">
        <p class="counterStep">Сделано шагов: 0</p>
        <p class="counterWrong">Сделано ударов: 0</p>
        <p class="counterTime">Время выполнения: 00:00:00</p>
    </div>
</div>
<div class="backdrop hidden">
    <div class="modal">
        <h2>Вы добрались до финиша!</h2>
        <p>Ваш результат:</p>
        <p id="text"></p>
    </div>
</div>
<a class="exit" href="../../vhod.php">Выйти</a>;
<script src="script.js"></script>
</body>

</html>