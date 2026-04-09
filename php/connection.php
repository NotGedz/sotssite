<?php
$conn = mysqli_init();
// TiDB Cloud вимагає SSL
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL); 

$host = getenv('TIDB_HOST');
$user = getenv('TIDB_USER');
$password = getenv('TIDB_PASSWORD');
$dbname = getenv('TIDB_DB');
$port = 4000; // Стандартний порт TiDB

mysqli_real_connect($conn, $host, $user, $password, $dbname, $port, NULL, MYSQLI_CLIENT_SSL);

if (mysqli_connect_errno()) {
    die("Помилка підключення: " . mysqli_connect_error());
}
