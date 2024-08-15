<?php
session_start();
header('Content-Type: application/json');

// تضمين ملف الاتصال بقاعدة البيانات
include 'db_connection.php';




// تحقق من وجود account_id في الجلسة
if (isset($_SESSION['account_id'])) {
    $account_id = intval($_SESSION['account_id']);
} else {
    die('لم يتم تحديد account_id.');
}

// جلب بيانات الحرفي
$sql_profession = "SELECT * FROM profession_data WHERE account_id = ?";
$stmt = $conn->prepare($sql_profession);

if (!$stmt) {
    die("فشل إعداد الاستعلام: " . $conn->error);
}

$stmt->bind_param("i", $account_id);
$stmt->execute();
$profession_data = $stmt->get_result()->fetch_assoc();

// جلب بيانات الخدمات
$sql_services = "SELECT name FROM services WHERE account_id = ?";
$stmt = $conn->prepare($sql_services);

if (!$stmt) {
    die("فشل إعداد الاستعلام: " . $conn->error);
}

$stmt->bind_param("i", $account_id);
$stmt->execute();
$services = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// جلب بيانات الحجوزات
$sql_bookings = "SELECT name, date, phone FROM booking WHERE account_id = ?";
$stmt = $conn->prepare($sql_bookings);

if (!$stmt) {
    die("فشل إعداد الاستعلام: " . $conn->error);
}

$stmt->bind_param("i", $account_id);
$stmt->execute();
$bookings = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// جلب بيانات التقييمات
$sql_reviews = "SELECT * FROM review WHERE service_id IN (SELECT service_id FROM services WHERE account_id = ?)";
$stmt = $conn->prepare($sql_reviews);

if (!$stmt) {
    die("فشل إعداد الاستعلام: " . $conn->error);
}

$stmt->bind_param("i", $account_id);
$stmt->execute();
$reviews = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// حساب التقييم المتوسط
$total_rating = 0;
foreach ($reviews as $review) {
    $total_rating += $review['rating'];
}
$average_rating = count($reviews) > 0 ? $total_rating / count($reviews) : 0;

// إعداد البيانات للرد
$response = [
    'profile' => $profession_data,
    'services' => $services,
    'bookings' => $bookings,
    'reviews' => $reviews,
    'average_rating' => $average_rating
];

// إرسال البيانات بتنسيق JSON
echo json_encode($response);

// إغلاق الاتصال
$conn->close();
?>
