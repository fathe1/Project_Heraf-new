<?php

// تضمين ملف الاتصال بقاعدة البيانات
include 'db.php';

// التحقق من أن النموذج قد أرسل بيانات عبر POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // استلام البيانات من النموذج
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];
  $location = $_POST['location'];
  $userType = $_POST['user-type'];
  $profession = isset($_POST['profession']) ? $_POST['profession'] : null;

  // تشفير كلمة المرور
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // الاستعلام لإدخال البيانات في قاعدة البيانات
  $sql = "INSERT INTO users (username, email, password, phone, location, user_type, profession)
          VALUES (?, ?, ?, ?, ?, ?, ?)";
  
  // تنفيذ الاستعلام
  $params = array($username, $email, $hashedPassword, $phone, $location, $userType, $profession);
  $stmt = sqlsrv_query($conn, $sql, $params);

  // التحقق من نجاح التنفيذ
  if($stmt === false) {
      die(print_r(sqlsrv_errors(), true));
  } else {
      echo "تم إنشاء الحساب بنجاح!";
  }

  // إغلاق الاتصال بقاعدة البيانات
  sqlsrv_free_stmt($stmt);
  sqlsrv_close($conn);
}
?>
