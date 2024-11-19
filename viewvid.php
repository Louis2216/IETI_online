<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos Display</title>
    <link rel="stylesheet" href="#">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>


<section class="header">
        <nav>
            <a href="index.php"><img src="images/IETICollegeOfScienceAndTechnology.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="announcement.php">ANNOUNCEMENTS</a></li>
                    <li><a href="admis.html">ADMISSION</a></li>
                </li>
                <li class="dropdown">
                <a href="#" class="dropbtn">MORE INFO</a>
               <ul class="dropdown-content">
               <li><a href="unif.php">School Uniforms</a></li>
               <li><a href="schoolact.php">School Activities</a></li>
               <li><a href="facility.php">School Facility</a></li>
               <li><a href="viewvid.php">Videos</a></li>
               </ul>                    
                    </li>
                             <li class="dropdown">
                             <a href="#" class="dropbtn">CONTACT</a>
                            <ul class="dropdown-content">
                              <li><a href="regs.html">Inquery</a></li>
                              <li><a href="admin.php" >Login</a></li>
                            </ul>

                    <li class="dropdown">
                        <a href="#" class="dropbtn">ABOUT</a>
                        <ul class="dropdown-content">
                            <li><a href="history.html">History</a></li>
                            <li><a href="cert.html">Certifications</a></li>
                            
                            
                    
        
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        </section>
        <script>
        var navLinks = document.getElementById("navLinks");

        function showMenu() {
            navLinks.style.right = "0";
        }

        function hideMenu() {
            navLinks.style.right = "-200px";
        }
    </script>




<style>

    /* General Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "PT Serif", serif;
    }

    .header {
        min-height: 15vh;
        width: 100%;
        background-color: #72ac8a;
        background-position: center;
        background-size: cover;
        position: relative;
    }

    nav {
        display: flex;
        padding: 2% 6%;
        justify-content: space-between;
        align-items: center;
    }

    nav img {
        width: 100px;
    }

    .nav-links {
        flex: 10;
        text-align: right;
    }

    .nav-links ul {
        list-style: none;
    }

    .nav-links ul li {
        display: inline-block;
        padding: 10px 12px;
        position: relative;
    }

    .nav-links ul li a {
        color: hsl(160, 86%, 5%);
        text-decoration: none;
        font-size: 20px;
    }

    .nav-links ul li::after {
        content: '';
        width: 0%;
        height: 2px;
        background: #0b925e;
        display: block;
        margin: auto;
        transition: 0.5s;
    }

    .nav-links ul li:hover::after {
        width: 100%;
    }

    /* Dropdown Styles */
    .dropdown {
        position: relative;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f0f1f0;
        min-width: 160px;
        z-index: 1;
        list-style: none;
        padding: 0;
        text-align: left;
    }

    .dropdown-content li a {
        color: rgb(0, 0, 0);
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content li a:hover {
        background-color: #ebdada;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    nav .fa {
        display: none;
    }

    @media(max-width: 700px) {
    .text-box h1 {
        font-size: 30px;
    }

    .nav-links ul li {
        display: block;
    }

    .nav-links {
        position: fixed;
        background: rgb(20, 204, 13);
        height: 100vh;
        width: 200px;
        top: 0;
        right: -200px;
        text-align: left;
        z-index: 2;
        transition: 1s;
    }

    nav .fa {
        display: block;
        color: hsl(157, 100%, 9%);
        margin: 10%;
        font-size: 22px;
        cursor: pointer;
    }

    .nav-links ul {
        padding: 30px;
    }

    .Sports .card {
        flex-direction: column;
        padding: 15px;
        width: 100%; /* Adjust card to be 100% width on smaller screens */
    }

    .Sports .card img {
        width: 100%; /* Ensure image is responsive */
    }
    }

    /* Section Styles */
    section.Activity {
        padding: 20px;
        margin: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease-in-out;
    }

    section.Activity:hover {
        transform: scale(1.02);
    }

    section.Activity p {
        font-size: 2.5em;
        font-weight: bold;
        text-align: center;
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        background: linear-gradient(90deg, #ff8a00, #e52e71);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-family: 'Raleway', sans-serif;
    }

    /* Sports Grid Styles */
    .Sports {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        justify-items: center;
    }

    /* Card Styles */
    .Sports .card {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
        position: relative;
        text-align: center;
        padding: 20px;
        margin: 10px;
        max-width: 600px;
    }

    .Sports .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        background-color: #f7f7f7;
    }

    .Sports .card img {
        width: 100%;
        height: auto;
        transition: transform 0.3s ease-in-out;
        border-radius: 8px;
    }

    .Sports .card img:hover {
        transform: scale(1.05);
    }

    .Sports .card h3 {
        font-size: 1.6em;
        font-weight: 600;
        margin: 15px 0;
        color: #333;
        text-transform: capitalize;
        letter-spacing: 1px;
    }

    .Sports .card button {
        background-color: #72ac8a;
        color: white;
        padding: 12px 18px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        margin-top: 10px;
        transition: background-color 0.3s ease;
    }

    .Sports .card button:hover {
        background-color: #4f8765;
    }

    .Sports .card .delete-btn {
        background-color: #e74c3c;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        margin-top: 10px;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .Sports .card .delete-btn:hover {
        background-color: #c0392b;
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 10;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.8);
    }

    .modal-content {
        margin: auto;
        display: block;
        max-width: 80%;
        max-height: 80vh;
        border-radius: 10px;
    }

    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: white;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover, .close:focus {
        color: #f1f1f1;
        text-decoration: none;
        cursor: pointer;
    }

    form  .Sports .card {
        display: flex;
        flex-direction: column; /* Adjusted to column for mobile view */
        align-items: center;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    form  .Sports .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    form  .Sports input[type="file"],
    form  .Sports input[type="text"] {
        width: 80%;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    form  .Sports button {
        background-color: #72ac8a;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    form .row1 .Sports button:hover {
        background-color: #4f8765;
    }
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 15px;
    }

    form label {
        font-weight: bold;
        margin-bottom: 5px;
        color: #333;
    }

    form input[type="text"],
    form input[type="file"] {
        width: 90%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 16px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: border-color 0.3s;
    }

    form input[type="text"]:focus,
    form input[type="file"]:focus {
        border-color: #72ac8a;
        outline: none;
    }

    form input[type="submit"],
    form button {
        width: auto;
        background-color: #72ac8a;
        color: white;
        padding: 10px 20px;
        margin-top: 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    form input[type="submit"]:hover,
    form button:hover {
        background-color: #4f8765;
    }

    form label {
        font-family: "Roboto", sans-serif;
        color: #666;
    }
</style>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "word";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $identifier => $new_content) {
        $sql = "UPDATE content_table SET paragraph_content = ? WHERE identifier = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die('MySQL prepare error: ' . $conn->error);
        }
        $stmt->bind_param("ss", $new_content, $identifier);
        $stmt->execute();
        $stmt->close();
    }
}

// Fetch content for each section individually
$sections = [];
$sql = "SELECT identifier, paragraph_content FROM content_table WHERE identifier IN ('section6', 'section7', 'section8')";
$result = $conn->query($sql);
if ($result === false) {
    die('MySQL query error: ' . $conn->error);
}
while ($row = $result->fetch_assoc()) {
    $sections[$row['identifier']] = $row['paragraph_content'];
}
$conn->close();
?>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        color: #4CAF50;
        margin-top: 20px;
        margin-bottom: 30px;
        font-size: 2.5em;
    }

    .video-container {
        background: #fff;
        padding: 20px;
        margin: 20px auto;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 900px;
    }

    .editable-content {
        font-size: 1.2em;
        color: #444;
        margin-bottom: 15px;
        text-align: justify;
    }

    .video-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .video-item {
        background: #f9f9f9;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 320px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .video-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    iframe, video {
        width: 100%;
        max-height: 300px;
        aspect-ratio: 16 / 9;
        border: none;
        border-radius: 8px;
    }

    .video-item video {
        max-height: 200px; /* Set a maximum height for videos */
    }

    /* Responsiveness for smaller screens */
    @media (max-width: 768px) {
        .video-container {
            max-width: 100%;
            padding: 15px;
        }

        h1 {
            font-size: 2em;
        }

        .video-list {
            gap: 15px;
        }

        .video-item {
            max-width: 100%;
        }
    }

    /* Section Titles */
    .section-title {
        font-size: 1.8em;
        font-weight: bold;
        margin-bottom: 15px;
        color: #333;
    }

</style>
<h1>🎥 Video List</h1>

<!-- Section 1 -->
<section id="section-1" class="video-container">
    <p class="editable-content"><?php echo htmlspecialchars($sections['section6'] ?? ''); ?></p>
    <div id="videos-container-1" class="video-list"></div>
</section>

<!-- Section 2 -->
<section id="section-2" class="video-container">
    <p class="editable-content"><?php echo htmlspecialchars($sections['section7'] ?? ''); ?></p>
    <div id="videos-container-2" class="video-list"></div>
</section>

<!-- Section 3 -->
<section id="section-3" class="video-container">
    <p class="editable-content"><?php echo htmlspecialchars($sections['section8'] ?? ''); ?></p>
    <div id="videos-container-3" class="video-list"></div>
</section>




<script>
    // Helper function to create the correct video tag for local videos
function createLocalVideoElement(videoUrl) {
    const video = document.createElement('video');
    video.src = videoUrl; // Path to the local video
    video.controls = true; // Optionally add video controls
    video.autoplay = false; // Disable autoplay
    video.muted = true; // Mute the video by default

    return video;
}

// Fetch videos and display them in corresponding sections
fetch("videofetch.php")
    .then(response => response.json())
    .then(data => {
        // Group videos by container ID
        const groupedVideos = {
            1: [],
            2: [],
            3: [],
        };

        data.forEach(video => {
            if (groupedVideos[video.container_id]) {
                groupedVideos[video.container_id].push(video.video_url);
            }
        });

        // Render videos for each section
        Object.keys(groupedVideos).forEach(containerId => {
            const container = document.getElementById(`videos-container-${containerId}`);
            
            groupedVideos[containerId].forEach(videoUrl => {
                const videoItem = document.createElement("div");
                videoItem.classList.add("video-item");

                const videoElement = createLocalVideoElement(videoUrl); // Create a local video element
                videoItem.appendChild(videoElement);
                container.appendChild(videoItem);
            });
        });
    })
    .catch(error => {
        console.error("Error fetching videos:", error);
    });
</script>



</body>
</html>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        color: #4CAF50;
        margin-top: 20px;
        margin-bottom: 30px;
        font-size: 2.5em;
    }

    .video-container {
        background: #fff;
        padding: 20px;
        margin: 20px auto;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 900px;
    }

    .editable-content {
        font-size: 1.2em;
        color: #444;
        margin-bottom: 15px;
        text-align: justify;
    }

    .video-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .video-item {
        background: #f9f9f9;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 320px;
        transition: transform 0.2s;
    }

    .video-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    iframe {
        width: 100%;
        aspect-ratio: 16 / 9;
        border: none;
        border-radius: 8px;
    }
</style>
