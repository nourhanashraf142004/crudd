<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // استلام البيانات من النموذج
    $id         = (int)$_POST['id'];
    $first_name = trim($_POST['first_name']);
    $last_name  = trim($_POST['last_name']);
    $age        = (int)$_POST['age'];

    // التحقق من أن البيانات غير فارغة
    if (!empty($first_name) && !empty($last_name) && $age > 0) {
        // إضافة المستخدم
        $stmt = $connect->prepare("INSERT INTO users (id, first_name, last_name, age) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $id, $first_name, $last_name, $age);

        if ($stmt->execute()) {
            header("Location: view.php");
            exit;
        } else {
            echo "❌ حدث خطأ أثناء الإضافة: " . $connect->error;
        }
    } else {
        echo "❌ من فضلك املأ جميع الحقول بشكل صحيح.";
    }
} else {
    header("Location: view.php");
    exit;
}
?>