<?php
$servername = "localhost";  // أو اسم السيرفر إذا كان مختلفًا
$username = "root";         // اسم المستخدم لقاعدة البيانات
$password = "";             // كلمة المرور لقاعدة البيانات
$dbname = "artisansdb";    // اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التأكد من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// تحديد مجموعة الأحرف المستخدمة في الاتصال
$conn->set_charset("utf8");

?>
