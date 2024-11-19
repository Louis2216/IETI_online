<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming 'id' is sent via POST
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM images WHERE id = ?");
        $stmt->bind_param("i", $id); // 'i' means integer
        
        if ($stmt->execute()) {
            echo "Image deleted successfully!";
        } else {
            echo "Error deleting image: " . $stmt->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>
