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
logAction('registration', 'INFO');

require_once 'config.php';
logAction('config.php connected', 'INFO');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['register-email'];
    $passw = $_POST['register-password'];
    $passw2 = $_POST['register-confirm-password'];
    if ($passw!=$passw2)
    {
        echo '<script>alert("пароли не совпадают")</script> '; //json_encode(["success" => true]);
        die();    
    }


// Создание соединения

    $conn = new mysqli($servername, $username, $password, $dbname);
    logAction('попытка доступа к базен данных', 'INFO');
// Проверка соединения
if ($conn->connect_error) {
    logAction('Ошибка при обработке запроса', 'ERROR');
    die(json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]));
}
    
    $sql = "INSERT INTO users (email, passw) VALUES ('$email', '$passw')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("пользователь зарегистрирован"); window.location.href = "../index.html";</script> '; //json_encode(["success" => true]);
    } else {
        echo '<script>alert("произошла ошибка"); window.location.href = "../index.html";</script> '; //json_encode(["success" => true]);
        logAction("message: " . $sql . "<br>" . $conn->error, 'ERROR');
        //echo json_encode(["success" => false, "message" => "Error: " . $sql . "<br>" . $conn->error]);
    }
    $conn->close();
}

?>