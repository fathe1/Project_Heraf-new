<?php
// الاتصال بقاعدة البيانات
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // التحقق من أن الحقول المطلوبة موجودة
    if (!empty($_POST['service_type']) && !empty($_POST['name']) && !empty($_POST['rating']) && !empty($_POST['comment'])) {

        // الحصول على اسم الحرفي ونوع الخدمة من النموذج
        $service_type = $_POST['service_type'];
        $name = $_POST['name'];
        $rating = intval($_POST['rating']);
        $comment = $_POST['comment'];

        // البحث عن service_id في جدول booking بناءً على اسم الحرفي ونوع الخدمة
        $sql_get_service_id = "SELECT service_id FROM booking WHERE service_type = ? AND name = ?";
        
        // استخدام prepared statements لحماية البيانات من SQL Injection
        $stmt_get_service_id = $conn->prepare($sql_get_service_id);
        $stmt_get_service_id->bind_param("ss", $service_type, $name);
        $stmt_get_service_id->execute();
        $result = $stmt_get_service_id->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $service_id = $row['service_id'];

            // إدخال البيانات في جدول review
            $sql_review = "INSERT INTO review (service_id, rating, comment) VALUES (?, ?, ?)";

            // استخدام prepared statements
            $stmt_review = $conn->prepare($sql_review);
            $stmt_review->bind_param("iis", $service_id, $rating, $comment);

            if ($stmt_review->execute()) {
                echo "تم إرسال التقييم بنجاح!";
            } else {
                echo "خطأ: " . $stmt_review->error;
            }

            // إغلاق الاتصال
            $stmt_review->close();
        } else {
            echo "لم يتم العثور على خدمة بهذا الاسم ونوع الخدمة.";
        }

        // إغلاق الاتصال بقاعدة البيانات
        $stmt_get_service_id->close();
        $conn->close();
    } else {
        echo "يرجى ملء جميع الحقول المطلوبة.";
    }
}
?>
