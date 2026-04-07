<?php
$host = "garbagedomains.com";
$user = "mrgarbageman";        // your DB user
$pass = "ilovegarbage1997";            // your DB password
$db   = "garbage_sots";        // your database name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>