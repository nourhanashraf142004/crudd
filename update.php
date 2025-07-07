<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // استلام البيانات
    $id         = (int)$_POST['id'];
    $first_name = trim($_POST['first_name']);
    $last_name  = trim($_POST['last_name']);
    $age        = (int)$_POST['age'];

    if (!empty($first_name) && !empty($last_name) && $age > 0 && $id > 0) {
        // تعديل البيانات
        $stmt = $connect->prepare("UPDATE users SET first_name = ?, last_name = ?, age = ? WHERE id = ?");
        $stmt->bind_param("ssii", $first_name, $last_name, $age, $id);

        if ($stmt->execute()) {
            header("Location: view.php");
            exit;
        } else {
            echo "❌ فشل التحديث: " . $connect->error;
        }
    } else {
        echo "❌ تأكد من تعبئة الحقول بشكل صحيح.";
    }
} else {
    header("Location: view.php");
    exit;
}
?>