<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the uploaded file and the container ID
    $containerId = $_POST['containerId'];
    $videoFile = $_FILES['newVideoFile'];

    // Check if the file was uploaded without errors
    if ($videoFile['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/videos/'; // Directory where videos will be stored
        $fileName = basename($videoFile['name']);
        $filePath = $uploadDir . $fileName;

        // Ensure the upload directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Detect the MIME type using finfo
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($videoFile['tmp_name']);

        // List of allowed MIME types
      $allowedTypes = [
    'video/mp4', // MP4
    'video/webm', // WebM
    'video/3gpp', // 3GP
    'video/H265', // HEVC/H.265
    'video/x-xvid', // XVID
];


        if (in_array($mimeType, $allowedTypes)) {
            // Move the uploaded file to the server directory
            if (move_uploaded_file($videoFile['tmp_name'], $filePath)) {
                // Save the video file path and MIME type to the database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "word";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Prepare the query to insert the file path and MIME type into the database
                $sql = "INSERT INTO videos (video_url, mime_type, container_id) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssi", $filePath, $mimeType, $containerId);
                $stmt->execute();
                $stmt->close();
                $conn->close();

                // Redirect back to the video management page
                header("Location: adminvid.php");
                exit;
            } else {
                echo "Failed to upload video. Please try again.";
            }
        } else {
            echo "Invalid video file type. Supported formats are: " . implode(", ", array_map(function($type) {
                return strtoupper(explode('/', $type)[1]);
            }, $allowedTypes)) . ".";
            

        }
    } else {
        echo "Error uploading file. Error code: " . $videoFile['error'];
    }
}
?>
