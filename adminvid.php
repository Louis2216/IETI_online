

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Video Manager</title>
    <link rel="stylesheet" href="#">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
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

// Fetch videos grouped by container_id
$sql = "SELECT id, video_url, mime_type, container_id FROM videos"; // Add mime_type here
$result = $conn->query($sql);


$videosByContainer = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $videosByContainer[$row['container_id']][] = $row; // Store entire row for access to ID
    }
}


// Do not close the connection yet, we need it for both queries
$conn->close();

?>

<section class="header">
        <nav>
            <a href="adminpagelogout.php"><img src="images/IETICollegeOfScienceAndTechnology.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>

                  <li class="dropdown">
                    <a href="#" class="dropbtn">ADMIN</a>
                   <ul class="dropdown-content">
                   <li><a href="visitortrack.php">Analytics</a></li>
                   <li><a href="#" onclick="logout()">Log Out</a></li>
  
                   </ul>

                    <li><a href="adminpagelogout.php">HOME</a></li>
                    <li><a href="adminannouncement.php">ANNOUNCEMENTS</a></li>
                    <li><a href="adminadmis.html">ADMISSION</a></li>
                </li>
                <li class="dropdown">
                <a href="#" class="dropbtn">MORE INFO</a>
               <ul class="dropdown-content">
               <li><a href="adminunif.php">School Uniforms</a></li>
               <li><a href="adminschoolact.php">School Activities</a></li>
               <li><a href="adminfacility.php">School Facility</a></li>
               <li><a href="adminvid.php">Videos</a></li>
               </ul>
                    
                        
                    </li>
                             <li class="dropdown">
                             <a href="#" class="dropbtn">CONTACT</a>
                            <ul class="dropdown-content">
                            <li><a href="adminregs.html">Inquery</a></li>
                            </ul>

                    <li class="dropdown">
                        <a href="#" class="dropbtn">ABOUT</a>
                        <ul class="dropdown-content">
                            <li><a href="adminhistory.html">History</a></li>
                            <li><a href="admincert.html">Certifications</a></li>
                            
                            
                    
        
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        </section>
          <script>
      function logout() {
          // Display notification before redirecting
          alert("You have been logged out successfully.");
          // Redirect to the logout page
          window.location.href = "index.php"; 
      }

      var navLinks = document.getElementById("navLinks");

function showMenu() {
    navLinks.style.right = "0";
}

function hideMenu() {
    navLinks.style.right = "-200px";
}
      </script>
      
<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "PT Serif", serif;
    }


    .header {
    min-height: 5vh;
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
    }
</style>


<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "word";

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
        $stmt->bind_param("ss", $new_content, $identifier);
        $stmt->execute();
        $stmt->close();
    }
}

// Fetch content for each section individually
$sections = [];
$sql = "SELECT identifier, paragraph_content FROM content_table WHERE identifier IN ('section6', 'section7', 'section8')";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $sections[$row['identifier']] = $row['paragraph_content'];
}
$conn->close();
?>
    <h1>Manage Videos</h1>
    <style>

    .editable-content {
        font-size: 3em;
        font-weight: 700;
        text-align: center;
        margin: 20px 0;
        padding: 15px 30px;
        color: #000;
        font-family: 'Raleway', sans-serif;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        background: linear-gradient(135deg, #ffffff, #bababa);
        border-radius: 50px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

  
    .editable-content::before {
        content: '';
        position: absolute;
        top: 0;
        left: -75px;
        width: 150%;
        height: 100%;
        background: linear-gradient(120deg, rgba(255,255,255,0.1), rgba(255,255,255,0));
        transform: skewX(-20deg);
        transition: left 0.7s ease;
    }

    .editable-content:hover::before {
        left: 100%;
    }

    @media(max-width: 700px) {
        .editable-content {
            font-size: 2em;
            padding: 10px 20px;
        }
    }
</style>
    <!-- Container 1 -->
    <section class="video-container" id="container-1">
        <p class="editable-content"><?php echo htmlspecialchars($sections['section6'] ?? ''); ?></p>
        <form method="post" action="">
            <label for="section6">Edit Section 1:</label>
            <input type="text" id="section6" name="section6" value="<?php echo htmlspecialchars($sections['section6'] ?? ''); ?>" placeholder="Enter text here...">
            <input type="submit" value="Update Section 1">
        </form>
        <div class="video-list">
            <?php if (isset($videosByContainer[1])): ?>
                <?php foreach ($videosByContainer[1] as $video): ?>
                    <div class="video-item">
    <?php
    $videoPath = htmlspecialchars($video['video_url']);
    $mimeType = htmlspecialchars($video['mime_type']);
    ?>
    <video width="640" height="360" controls>
        <source src="<?php echo $videoPath; ?>" type="<?php echo $mimeType; ?>">
        Your browser does not support the video tag.
    </video>
    <!-- Delete Button -->
    <form method="POST" action="admindeletevid.php">
        <input type="hidden" name="videoId" value="<?php echo $video['id']; ?>">
        <button type="submit">Delete</button>
    </form>
</div>

                <?php endforeach; ?>
            <?php else: ?>
                <p>No videos available for this container.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Container 2 -->
    <section class="video-container" id="container-2">
        <p class="editable-content"><?php echo htmlspecialchars($sections['section7'] ?? ''); ?></p>
        <form method="post" action="">
            <label for="section7">Edit Section 2:</label>
            <input type="text" id="section7" name="section7" value="<?php echo htmlspecialchars($sections['section7'] ?? ''); ?>" placeholder="Enter text here...">
            <input type="submit" value="Update Section 2">
        </form>
        <div class="video-list">
            <?php if (isset($videosByContainer[2])): ?>
                <?php foreach ($videosByContainer[2] as $video): ?>
                    <div class="video-item">
    <?php
    $videoPath = htmlspecialchars($video['video_url']);
    $mimeType = htmlspecialchars($video['mime_type']);
    ?>
    <video width="640" height="360" controls>
        <source src="<?php echo $videoPath; ?>" type="<?php echo $mimeType; ?>">
        Your browser does not support the video tag.
    </video>
    <!-- Delete Button -->
    <form method="POST" action="admindeletevid.php">
        <input type="hidden" name="videoId" value="<?php echo $video['id']; ?>">
        <button type="submit">Delete</button>
    </form>
</div>

                <?php endforeach; ?>
            <?php else: ?>
                <p>No videos available for this container.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Container 3 -->
    <section class="video-container" id="container-3">
        <p class="editable-content"><?php echo htmlspecialchars($sections['section8'] ?? ''); ?></p>
        <form method="post" action="">
            <label for="section8">Edit Section 3:</label>
            <input type="text" id="section8" name="section8" value="<?php echo htmlspecialchars($sections['section8'] ?? ''); ?>" placeholder="Enter text here...">
            <input type="submit" value="Update Section 3">
        </form>
        <div class="video-list">
            <?php if (isset($videosByContainer[3])): ?>
                <?php foreach ($videosByContainer[3] as $video): ?>
                    <div class="video-item">
    <?php
    $videoPath = htmlspecialchars($video['video_url']);
    $mimeType = htmlspecialchars($video['mime_type']);
    ?>
    <video width="640" height="360" controls>
        <source src="<?php echo $videoPath; ?>" type="<?php echo $mimeType; ?>">
        Your browser does not support the video tag.
    </video>
    <!-- Delete Button -->
    <form method="POST" action="admindeletevid.php">
        <input type="hidden" name="videoId" value="<?php echo $video['id']; ?>">
        <button type="submit">Delete</button>
    </form>
</div>

                <?php endforeach; ?>
            <?php else: ?>
                <p>No videos available for this container.</p>
            <?php endif; ?>
        </div>
    </section>

    <section class="video-container">
        <h2>Add a New Video</h2>
        <form action="adminuploadvid.php" method="POST" enctype="multipart/form-data">
            <label for="newVideoFile">Upload Video File:</label>
            <input type="file" id="newVideoFile" name="newVideoFile" accept="video/*" required>
            <label for="containerId">Select Container:</label>
            <select id="containerId" name="containerId" required>
                <option value="1">Container 1</option>
                <option value="2">Container 2</option>
                <option value="3">Container 3</option>
            </select>
            <button type="submit">Add Video</button>
        </form>
    </section>
</body>
</html>




<style>
 

    h1, h2 {
        text-align: center;
        color: #4CAF50;
        margin-bottom: 20px;
    }

    .video-container {
        background: #fff;
        padding: 20px;
        margin: 20px auto;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 900px;
        width: 100%;
    }

    .editable-content {
        font-size: 1.2em;
        margin-bottom: 10px;
    }

    form {
        margin: 20px 0;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    form input[type="text"], form select {
        padding: 10px;
        font-size: 1em;
        margin: 5px 0;
        width: 100%;
        max-width: 400px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    form input[type="submit"], form button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
        font-size: 1em;
    }

    form input[type="submit"]:hover, form button:hover {
        background-color: #45a049;
    }

    .video-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .video-item {
        background-color: #f9f9f9;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    video {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }

    button[type="submit"] {
        margin-top: 10px;
        background-color: #f44336;
    }

    button[type="submit"]:hover {
        background-color: #e53935;
    }

    /* For the add video section */
    section h2 {
        margin-top: 0;
    }

    section form {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    section form input[type="file"], section form select {
        padding: 10px;
        font-size: 1em;
        margin: 5px 0;
        width: 100%;
        max-width: 400px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    section form button {
        padding: 10px 20px;
        background-color: #2ecc71;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
        font-size: 1em;
    }

    section form button:hover {
        background-color: #27ae60;
    }

    /* Media query for responsiveness */
    @media (max-width: 60px) {
        .video-item {
            width: 100%;
        }

        form input[type="text"], form select, section form input[type="file"], section form select {
            max-width: 100%;
        }

        .video-container {
            padding: 15px;
            margin: 15px;
        }
    }
</style>



<!-- <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1, h2 {
            color: #333;
        }

        .video-container {
            background-color: #fff;
            border-radius: 8px;
            margin: 20px;
            padding: 20px;
            width: 80%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .video-container h2 {
            margin-top: 0;
            font-size: 1.5em;
        }

        .video-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .video-item {
            width: 100%;
            max-width: 300px;
            background-color: #fafafa;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        iframe {
            width: 100%;
            height: 200px;
            border-radius: 8px;
        }

        button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #c0392b;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 400px;
            margin-top: 30px;
        }

        form input, form select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        form button {
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #27ae60;
        }

</style> -->
