<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Analytics</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600&display=swap" rel="stylesheet"> <!-- New font -->
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
        // Mobile menu functions
        var navLinks = document.getElementById("navLinks");
        var barsIcon = document.querySelector(".fa-bars");

        function showMenu() {
            navLinks.style.right = "0";
            barsIcon.style.display = "none";
            document.body.style.overflow = "hidden";
        }

        function hideMenu() {
            navLinks.style.right = "-250px";
            barsIcon.style.display = "block";
            document.body.style.overflow = "auto";
        }
  


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

        function showMenu() {
            document.getElementById("navLinks").style.right = "0";
        }

        function hideMenu() {
            document.getElementById("navLinks").style.right = "-200px";
        }
</script>
<style>
    * {
        margin: 0;
        padding: 0;
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
    
    .text-box {
      width: 90%;
      color: #000000;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
    }
    
    .text-box h1 {
      font-size: 62px;
    }
    
    .text-box p {
      margin: 10px 0 40px;
      font-size: 20px;
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
      .nav-links.show {
        right: 0;
        overflow: hidden; /* Prevent swipe when the menu is shown */
      }
      .nav-links ul {
          padding: 30px;
      }
    }

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
        font-size: 2.5em; /* Increased font size */
        font-weight: bold;
        text-align: center;
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        background: linear-gradient(90deg, #ff8a00, #e52e71);
        -webkit-background-clip: text;
        background-clip: text; /* Cross-browser compatibility */
        color: transparent;
        font-family: 'Raleway', sans-serif; /* Updated font */
    }

    .Sports {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        justify-items: center;
    }

    .Sports .card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
        position: relative;
        max-width: 600px; /* Limits card width to 200px */
        text-align: center; /* Centers text below the image */
    }

    .Sports .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .Sports img {
        width: 100%;
        height: auto;
        transition: transform 0.3s;
    }

    .Sports img:hover {
        transform: scale(1.05);
    }

    .Sports .card h3 {
        text-align: center;
        margin: 10px 0;
        font-size: 1.5em;
    }

    .row1, .row2, .row3, .row4 {
        padding: 10px;
    }

    /* Form Styling for New Image */
    form .row1 .Sports .card {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    form .row1 .Sports .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    form .row1 .Sports input[type="file"],
    form .row1 .Sports input[type="text"] {
        width: 80%;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    form .row1 .Sports button {
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
            max-width: 80%; /* Keeps modal size the same */
            max-height: 80vh; /* Limits the height to 80% of the viewport height */
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
</style>
<style>
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
  }
  

  
</style>
</head>

<body>
<section class="header">
        <nav>
            <a href="index.php"><img src="images/IETICollegeOfScienceAndTechnology.png" alt="IETI Logo"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>

               
                    <li><a href="index.php">HOME</a></li>
                     <li><a href="announcement.php">ANNOUNCEMENTS</a></li>
                    <li><a href="admis.html">ADMISSION</a></li>
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
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">ABOUT</a>
                        <ul class="dropdown-content">
                            <li><a href="history.html">History</a></li>
                            <li><a href="cert.html">Certifications</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
    </section>

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

<p class="announcement">ANNOUNCEMENTS</p>
<section class="Activity">

    <?php display_images('ANNOUNCEMENT', false); ?>  <!-- Set second argument to false for no add/delete functionality -->
</section>



<?php
// Modified function to display images without add and delete functionality
function display_images($category, $isEditable = true) {
    // Fetch images from the database based on the category
    $conn = new mysqli("localhost", "root", "", "website");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Filter images based on the category
    $sql = "SELECT title, image_data FROM images WHERE category = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category);  // 's' means string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Begin the container for dynamic images
        echo "<div class='row'>";
        echo "<div class='Sports'>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card'>";
            echo "<img src='data:image/jpeg;base64," . $row['image_data'] . "' alt='" . $row['title'] . "' onclick='openModal(this);' />";
            echo "<h3>" . $row['title'] . "</h3>";

            // Only show the delete button if $isEditable is true
            if ($isEditable) {
                echo "<button onclick='deleteImage(this)'>Delete</button>";
            }
            echo "</div>";
        }

        // Close the container for dynamic images
        echo "</div>";
        echo "</div>";
    } else {
        echo "No images found.";
    }

    $stmt->close();
    $conn->close();
}
?>
<div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="img01" alt="Modal Image">
</div>

</body>
</html>
