<?php
// الاتصال بقاعدة البيانات
include 'db_connection.php';

// ID الخاص بالحساب الذي تريد جلب بياناته
$account_id = $_GET['account_id'];

// جلب بيانات المستخدم
$user_sql = "SELECT username, email, phone, location FROM users WHERE account_id = $account_id";
$user_result = $conn->query($user_sql);
$user_data = $user_result->fetch_assoc();

// جلب بيانات الحجزات
$booking_sql = "SELECT service_type, name, date, time FROM booking WHERE account_id = $account_id";
$booking_result = $conn->query($booking_sql);

$bookings = [];
while($row = $booking_result->fetch_assoc()) {
    $bookings[] = $row;
}

// تحويل البيانات إلى JSON
$response = [
    'user' => $user_data,
    'bookings' => $bookings
];

echo json_encode($response);

$conn->close();
?>
