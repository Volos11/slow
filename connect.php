<?php
//объявим переменные для подключения БД
    $host = 'localhost';
    $user = 'user';
    $password = '782354179177';
    $db = 'VR1';

//создаём подключение к БД используя функцию mysqli_connect
    $link = mysqli_connect($host, $user, $password, $db);
//если значения в переменную $link небыли переданы, то выводим код и текст ошибки 
    if (!$link)
    {
        echo "Ошибка: Невозможно установить соединение с базой данных provider.";
        echo '<br>';
        echo "Код ошибки errno: " . mysqli_connect_errno();
        echo '<br>';
        echo "Текст ошибки error: " . mysqli_connect_error();
        exit;
    }
    