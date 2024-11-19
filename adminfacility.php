<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Analytics</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600&display=swap" rel="stylesheet"> 
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
        // JavaScript functions for modal, menu, and other interactions remain the same
        function openModal(img) {
            var modal = document.getElementById("myModal");
            var modalImg = document.getElementById("img01");
            modal.style.display = "block";
            modalImg.src = img.src;
        }
        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            var modal = document.getElementById("myModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
       
        
</script>
<script>
      function logout() {
          // Display notification before redirecting
          alert("You have been logged out successfully.");
          // Redirect to the logout page
          window.location.href = "index.php"; 
      }
</script>
<script>

    function openModal(img) {
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("img01");
        modal.style.display = "block";
        modalImg.src = img.src;
    }

    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }

  
</script>
<script>
  function deleteImage(button) {
            var card = button.closest('.card');
            var imageElement = card.querySelector('img');
            var imageId = card.getAttribute('data-id');  // Get the ID from data-id attribute

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "admindeleteimage4.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (xhr.status === 200) {
                    card.remove();
                    alert("Image deleted successfully!");
                } else {
                    alert("Error deleting image.");
                }
            };
            xhr.send("id=" + encodeURIComponent(imageId));  // Send the ID of the image
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
</head>
<body>
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
        function showMenu() {
            document.getElementById("navLinks").style.right = "0";
        }

        function hideMenu() {
            document.getElementById("navLinks").style.right = "-200px";
        }
</script>








<style>

.announcement {
    font-size: 3em;
    font-weight: 700;
    text-align: center;
    margin: 20px 0;
    padding: 15px 30px;
    color: #fff;
    font-family: 'Raleway', sans-serif;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    background: linear-gradient(135deg, #ff6a00, #ee0979);
    border-radius: 50px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.announcement:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 30px rgba(0, 0, 0, 0.4);
}

.announcement::before {
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

.announcement:hover::before {
    left: 100%;
}

@media(max-width: 700px) {
    .announcement {
        font-size: 2em;
        padding: 10px 20px;
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
$sql = "SELECT identifier, paragraph_content FROM content_table WHERE identifier IN ('section9')";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $sections[$row['identifier']] = $row['paragraph_content'];
}
$conn->close();
?>
<p class="announcement"><?php echo htmlspecialchars($sections['section9'] ?? ''); ?></p>
    <form method="post" action="">
    <label for="section9">Edit Title:</label>
    <input type="text" id="section9" name="section9" value="<?php echo htmlspecialchars($sections['section9'] ?? ''); ?>" placeholder="Enter text here...">
    <input type="submit" value="Update Section 9">
</form>
<section class="Activity">

    <?php display_images('building'); ?>
    
    <form action="adminuploadimage4.php" method="POST" enctype="multipart/form-data">
        <div class="row1">
            <div class="Sports"> <!-- Changed "sports" to "Sports" -->
                <div class="card">
                    <input type="file" name="image" id="newImage" />
                    <input type="text" name="title" id="newTitle" placeholder="Image Title (Optional)" />
                    <input type="hidden" name="category" value="building" />
                    <button type="submit">Add Image</button>
                </div>
            </div>
        </div>
    </form>
</section>




<?php
// Function to display images based on the category
function display_images($category) {
    // Fetch images from the database based on the category
    $conn = new mysqli("localhost", "root", "", "website");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Filter images based on the category
    $sql = "SELECT id, title, image_data FROM images WHERE category = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category);  // 's' means string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<div class='row'>";
        echo "<div class='Sports'>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card' data-id='" . $row['id'] . "'>";  // Pass the image id here
            echo "<img src='data:image/jpeg;base64," . $row['image_data'] . "' alt='" . $row['title'] . "' onclick='openModal(this);' />";
            if (!empty($row['title'])) {
                echo "<h3>" . $row['title'] . "</h3>";
            }
            echo "<button class='delete-btn' onclick='deleteImage(this)'>Delete</button>"; // Add delete button
            echo "</div>";
        }

        echo "</div>";
        echo "</div>";
    } else {
        echo "No images found.";
    }

    $stmt->close();
    $conn->close();
}

// Handling image upload and insertion remains the same
?>


    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="img01" alt="Modal Image">
    </div>
</body>
</html>
