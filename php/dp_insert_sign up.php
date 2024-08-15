<?php
include 'db_connection.php'; // الاتصال بقاعدة البيانات

// التحقق من أن النموذج تم إرساله
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // التحقق من أن جميع الحقول المطلوبة موجودة وليست فارغة باستثناء account_type إذا كان "مستخدم عادي"
    $required_fields = ['username', 'email', 'password', 'phone', 'location'];

    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
            die("Please fill in all required fields: " . $field);
        }
    }

    // التحقق من أن account_type موجودة وصحيحة
    if (!isset($_POST['account_type']) || ($_POST['account_type'] !== '0' && $_POST['account_type'] !== '1')) {
        die("Please select a valid account type.");
    }

    // الحصول على البيانات من النموذج
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $account_type = $_POST['account_type'];

    // إدخال البيانات في جدول users
    $sql_user = "INSERT INTO users (username, email, password, phone, location, account_type) 
                VALUES (?, ?, ?, ?, ?, ?)";

    // استخدام prepared statements لحماية البيانات من SQL Injection
    $stmt = $conn->prepare($sql_user);
    $stmt->bind_param("sssssi", $username, $email, $password, $phone, $location, $account_type);

    if ($stmt->execute()) {
        $account_id = $stmt->insert_id; // الحصول على account_id للربط مع جدول profession_data

        // إذا كان الحساب نوعه محترف
        if ($account_type == '1') { 
            // التحقق من الحقول الإضافية المطلوبة للمحترف
            if (isset($_POST['profession_name']) && !empty(trim($_POST['profession_name'])) && isset($_FILES['photo'])) {
                $profession_name = $_POST['profession_name'];
                $photo = $_FILES['photo']['name'];

                // إعداد مسار رفع الصورة
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($photo);

                // رفع الصورة
                if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                    // إدخال البيانات في جدول profession_data
                    $sql_profession = "INSERT INTO profession_data (account_id, name, photo) 
                                    VALUES (?, ?, ?)";
                    $stmt_profession = $conn->prepare($sql_profession);
                    $stmt_profession->bind_param("iss", $account_id, $profession_name, $target_file);

                    if ($user['account_type'] == 0) {
                        header("Location: ../html/Professional.html"); // توجيه إلى صفحة الحرفي
                    } else {
                        header("Location: ../html/User Profile Page.html"); // توجيه إلى صفحة المستخدم العادي
                    }

                    if ($stmt_profession->execute()) {
                        echo "New record created successfully in both tables";
                    } else {
                        echo "Error: " . $stmt_profession->error;
                    }
                } else {
                    die("Sorry, there was an error uploading your file.");
                }
            } else {
                die("Profession name and photo are required for professional accounts.");
            }
        } else {
            echo "New record created successfully in users table";
        }
    } else {
        echo "Error: " . $stmt->error;
    }
    
    

    // إغلاق الاتصال بقاعدة البيانات
    $stmt->close();
    $conn->close();
}
?>
