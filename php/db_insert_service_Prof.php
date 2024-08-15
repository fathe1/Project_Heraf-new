<?php
// فرضًا أن لديك جلسة (session) لتخزين بيانات المستخدم بعد تسجيل الدخول
session_start();
include 'db_connection.php'; // الاتصال بقاعدة البيانات

// تحقق من تسجيل الدخول
if (!isset($_SESSION['account_id'])) {
    // إعادة التوجيه إلى صفحة تسجيل الدخول أو عرض رسالة خطأ
    die("الرجاء تسجيل الدخول أولاً.");
}

// جلب الـ account_id من الجلسة
$account_id = $_SESSION['account_id'];

// تحقق من أن اسم الخدمة قد تم إدخاله
if (isset($_POST['service_name'])) {
    $service_name = $_POST['service_name'];

    // الكود الخاص بإضافة الخدمة إلى قاعدة البيانات
    $insert_query = "INSERT INTO services (account_id, name) VALUES ('$account_id', '$service_name')";
    
    // للعرض فقط
    echo "Query: " . $insert_query;
} else {
    echo "الرجاء إدخال اسم الخدمة.";
}
?>
