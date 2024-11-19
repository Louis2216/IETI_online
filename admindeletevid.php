<?php
// Database connection
$servername = "localhost";
$username = "root"; // Update as needed
$password = ""; // Update as needed
$dbname = "word"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['videoId'])) {  // Check if videoId is set in POST
        $videoId = intval($_POST['videoId']); // Sanitize input

        // Delete the video from the database
        $sql = "DELETE FROM videos WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $videoId);

            if ($stmt->execute()) {
                echo "Video deleted successfully!";
            } else {
                echo "Error deleting video: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "No video ID provided!";
    }

    $conn->close();

    // Redirect back to the video manager page
    header("Location: adminvid.php"); // Replace with your page name
    exit;
}
?>
