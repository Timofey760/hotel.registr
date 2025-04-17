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

// Пример использования функции
logAction('login', 'INFO');

require_once 'config.php';
logAction('config.php connected', 'INFO');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['login-email'];
    $passw = $_POST['login-password'];


// Создание соединения

    $conn = new mysqli($servername, $username, $password, $dbname);
    logAction('попытка доступа к базен данных', 'INFO');
// Проверка соединения
if ($conn->connect_error) {
    logAction('Ошибка при обработке запроса', 'ERROR');
    die(json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]));
}
    
// Подготовка и выполнение SQL-запроса
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND passw = ?");
$stmt->bind_param("ss", $email, $passw);
$stmt->execute();

// Получение результата
$result = $stmt->get_result();

if ($result->num_rows > 0) {

     echo '<script>alert("зашли");window.location.href = "../index.html";</script> '; //json_encode(["success" => true]);
    } else {
        echo '<script>alert("не зашли");window.location.href = "../login.html";</script> '; //json_encode(["success" => true]);        
    }
    $conn->close();
}

?>