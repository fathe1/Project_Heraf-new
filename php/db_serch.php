<?php 
include 'db.php'
// جلب البيانات من قاعدة البيانات
$sql = "SELECT id, name, profession, location, rating FROM professionals";
$result = $conn->query($sql);

$professionals = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $professionals[] = $row;
    }
}

// تحويل البيانات إلى JSON
echo json_encode($professionals);

$conn->close();



?>