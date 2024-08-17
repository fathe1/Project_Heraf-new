<?php

$host = 'localhost';
$dbname = 'heraf';
$User = 'root';
$pass = '';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $User, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>