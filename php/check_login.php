<?php
session_start();
include 'db_connection.php'; // الاتصال بقاعدة البيانات

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // البحث عن المستخدم بناءً على البريد الإلكتروني
    $sql = "SELECT account_id, username, password, account_type FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // التحقق من كلمة المرور
        if (password_verify($password, $user['password'])) {
            // حفظ بيانات المستخدم في الجلسة
            $_SESSION['account_id'] = $user['account_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['account_type'] = $user['account_type'];

            // إعادة التوجيه بناءً على نوع الحساب
            if ($user['account_type'] == 1) {
                header("Location: ../html/Professional.html"); // توجيه إلى صفحة الحرفي
            } else {
                header("Location: ../html/User Profile Page.html"); // توجيه إلى صفحة المستخدم العادي
            }
            exit;
        } else {
            echo "كلمة المرور غير صحيحة.";
        }
    } else {
        echo "لا يوجد حساب مسجل بهذا البريد الإلكتروني.";
    }

    $stmt->close();
    $conn->close();
}
?>
