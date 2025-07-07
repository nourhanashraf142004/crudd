<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST["id"]);
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $age = intval($_POST["age"]);

   
    $check = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($check);

    if ($result && $result->num_rows > 0) {
        
        $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', age=$age WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "✅ done.";
        } else {
            echo "❌ an error " . $conn->error;
        }
    } else {
        echo "⚠️ there is no user with this ID.";
    }
} else {
    echo "❌ invaild order";
}
?>
