<?php



















































































































// функция для вывода массива в документ
function d($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}



$users = [
    ['first_name' => 'Вася', 'last_name' => 'Пупкин', 'country' => 'Сербия', 'age' => 44, 'avatar' => 'images/person.jpg'],
    ['first_name' => 'Петя', 'last_name' => 'Иванов', 'country' => 'Россия', 'age' => 23, 'avatar' => 'images/person.jpg'],
    ['first_name' => 'Светлана', 'last_name' => 'Сидорова', 'country' => 'Россия', 'age' => 18, 'avatar' => 'images/person.jpg'],
    ['first_name' => 'Антон', 'last_name' => 'Пирожков', 'country' => 'Беларусь', 'age' => 32, 'avatar' => 'images/person.jpg'],
    ['first_name' => 'Анна', 'last_name' => 'Мамедова', 'country' => ['Грузия', 'Россия'], 'age' => 36, 'avatar' => 'images/person.jpg'],
];
