<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'])) {
        $id = intval($_POST['id']);

       
        $check = "SELECT * FROM users WHERE id = $id";
        $result = $conn->query($check);

        if ($result->num_rows > 0) {
            
            $sql = "DELETE FROM users WHERE id = $id";
            if ($conn->query($sql) === TRUE) {
                echo "✅ USER NUMBER DELEDED$id SUCCESSFULLY";
            } else {
                echo "❌AN ERROR OCCURED WHILE DELEDING " . $conn->error;
            }
        } else {
            echo "⚠️ User With Number ID = $id NOT IN DATABASE";
        }
    } else {
        echo "❌Inter Your ID Please.";
    }
} else {
    echo "❌Invalid Request";
}
?>


