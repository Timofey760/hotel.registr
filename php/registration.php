<?php

function logAction($message, $level = 'INFO') {
    // Определите путь к файлу лога
    $logFile = 'actions.log';

    // Определите формат времени
    $timestamp = date('Y-m-d H:i:s');

    // Форматируйте сообщение
    $logMessage = sprintf("[%s] [%s] %s\n", $timestamp, $level, $message);

    // Запишите сообщение в файл лога
    file_put_contents($logFile, $logMessage, FILE_APPEND | LOCK_EX);
}

// 1. Получаем данные от страницы
$data = json_decode(file_get_contents("php://input"),true);
// Подключение к базе данных
require_once 'config.php';

logAction('Попытка создания соединения')

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    logAction('Connection failed')
    die("Connection failed: " . $conn->connect_error);
}

logAction('Connection fine!')

// Получение данных из формы
$email = $data["email"];
$pass = $data["password"];
$timecode = date("Y-m-d H:i:s"); // Текущее время

logAction($email.':'.$pass)
// Подготовка и выполнение SQL запроса
$sql = "INSERT INTO users (email,pass) VALUES ('$email', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "Пользователь зарегистрирован";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

// Закрытие соединения
$conn->close();
?>
