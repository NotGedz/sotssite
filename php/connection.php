<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "SOTS";

// Вмикаємо звітність про помилки для MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($host, $user, $pass, $db);
    
    // Встановлюємо правильне кодування
    $conn->set_charset("utf8mb4");
    
    // echo "З'єднання встановлено!"; 
} catch (mysqli_sql_exception $e) {
    // Не виводь деталі помилки користувачу на реальному сайті (security risk)
    error_log($e->getMessage());
    die("Помилка підключення до бази даних.");
}
?>
