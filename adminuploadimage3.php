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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = isset($_POST['title']) ? $_POST['title'] : "";  // Set title to an empty string if not provided
    $category = $_POST['category']; // Capture the category
    $image = $_FILES['image']['tmp_name'];

    if ($image && $category) {  // Ensure only category and image are required
        // Convert image to base64
        $imageData = base64_encode(file_get_contents($image));

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO images (title, image_data, category) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $imageData, $category);  // Bind category as well

        // Execute the query
        if ($stmt->execute()) {
            // Display a success pop-up message
            echo "<script type='text/javascript'>
                    alert('Image added successfully!');
                    window.location.href = 'adminannouncement.php'; // Redirect back to adminannouncement.php
                  </script>";
        } else {
            echo "Error uploading image: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please provide an image and category.";
    }
}

$conn->close();
?>
