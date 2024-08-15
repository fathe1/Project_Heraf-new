<?php
session_start(); // بدء الجلسة
include 'db_connection.php'; // الاتصال بقاعدة البيانات

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // التحقق من أن جميع الحقول المطلوبة موجودة وليست فارغة
    $required_fields = ['service_type', 'name', 'date', 'time', 'payment_method'];

    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
            die("Please fill in all required fields: " . $field);
        }
    }

    // الحصول على البيانات من النموذج
    $service_type = $_POST['service_type'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $payment_method = $_POST['payment_method'];

    // التحقق من أن المستخدم مسجل الدخول وجلب account_id من الجلسة
    if (isset($_SESSION['account_id'])) {
        $account_id = $_SESSION['account_id'];
    } else {
        die("User is not logged in.");
    }

    // إدخال البيانات في جدول booking
    $sql_booking = "INSERT INTO booking (service_type, name, date, time, payment_method, account_id) 
                    VALUES (?, ?, ?, ?, ?, ?)";

    // استخدام prepared statements لحماية البيانات من SQL Injection
    $stmt = $conn->prepare($sql_booking);
    $stmt->bind_param("sssssi", $service_type, $name, $date, $time, $payment_method, $account_id);

    if ($stmt->execute()) {
        echo "Booking successfully created!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // إغلاق الاتصال بقاعدة البيانات
    $stmt->close();
    $conn->close();
}
?>
