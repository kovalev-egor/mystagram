<?php

$db = new mysqli('localhost', 'root', 'root', 'mystagram');

// Проверка на подключение
if (!$db) {
    // Если проверку не прошло, то выводится надпись ошибки и заканчивается работа скрипта
    echo "Не удается подключиться к серверу базы данных!";
    exit;
}