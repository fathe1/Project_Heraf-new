<?php
$servername = "localhost";  // أو اسم السيرفر إذا كان مختلفًا
$username = "root";         // اسم المستخدم لقاعدة البيانات
$password = "";             // كلمة المرور لقاعدة البيانات
$dbname = "project_heraf";    // اسم قاعدة البيانات

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
