<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IETI San Pedro Laguna Website</title>
    <link rel="stylesheet" href="#"> <!-- Link to the CSS file -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        // Open the modal and display the clicked image
        function openModal(img) {
            var modal = document.getElementById("myModal");
            var modalImg = document.getElementById("img01");
            modal.style.display = "block";
            modalImg.src = img.src; // Get the source of the clicked image
        }
    
        // Close the modal
        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }
    
        // Close the modal when clicking outside of the image
        window.onclick = function(event) {
            var modal = document.getElementById("myModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
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
    <section class="courses">
        <p>School Uniforms and Organizational Shirts by Course</p>

        
        <div class="row">
    <!-- BSIT Images (displayed without the add and delete buttons) -->
    <div class="column">
        <div class="image-container">
            <p> UNIFORM </p>
            <?php display_course_images_view('UNIFORMS'); ?>
        </div>
    </div>
</div>


        <div class="row">
    <!-- BSIT Images (displayed without the add and delete buttons) -->
    <div class="column">
        <div class="image-container">
            <p>BSIT UNIFORM </p>
            <?php display_course_images_view('BSIT'); ?>
        </div>
    </div>
</div>

<div class="row">
    <!-- BSCPE Images (displayed without the add and delete buttons) -->
    <div class="column">
        <div class="image-container">
            <p>BSCPE UNIFORM </p>
            <?php display_course_images_view('BSCPE'); ?>
        </div>
    </div>
</div>

<div class="row">
    <!-- BSHRM Images (displayed without the add and delete buttons) -->
    <div class="column">
        <div class="image-container">
            <p>BSHRM UNIFORM </p>
            <?php display_course_images_view('BSHRM'); ?>
        </div>
    </div>
</div>

<div class="row">
    <!-- BSBA Images (displayed without the add and delete buttons) -->
    <div class="column">
        <div class="image-container">
            <p>BSBA UNIFORM </p>
            <?php display_course_images_view('BSBA'); ?>
        </div>
    </div>
</div>

<div class="row">
    <!-- BEED Images (displayed without the add and delete buttons) -->
    <div class="column">
        <div class="image-container">
            <p>BEED UNIFORM </p>
            <?php display_course_images_view('BEED'); ?>
        </div>
    </div>
</div>



    <div class="row">
    <!-- BSIT Images (displayed without the add and delete buttons) -->
    <div class="column">
        <div class="image-container">
            <p>SIZES </p>
            <?php display_course_images_view('SIZES'); ?>
        </div>
    </div>
</div>  


    </section>

 

    <?php
// Function to display images for view mode (without add/delete functionality)
function display_course_images_view($category) {
    $conn = new mysqli("localhost", "root", "", "website");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, title, image_data FROM images WHERE category = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<div class='image-container'>";

        while ($row = $result->fetch_assoc()) {
            echo "<div class='card' data-id='" . $row['id'] . "'>";
            echo "<img src='data:image/jpeg;base64," . $row['image_data'] . "' alt='" . $row['title'] . "' class='course-image' onclick='openModal(this)' />"; // Added onclick attribute
            if (!empty($row['title'])) {
                echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
            }
            echo "</div>";
        }

        echo "</div>";
    } else {
        echo "No images found for " . htmlspecialchars($category);
    }

    $stmt->close();
    $conn->close();
}
?>


    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="img01">
    </div>   
    <script>
        var navLinks = document.getElementById("navLinks");

        function showMenu() {
            navLinks.style.right = "0";
        }

        function hideMenu() {
            navLinks.style.right = "-200px";
        }
    </script>
</body>
</html>

<style>
        /* Card styling for images */
    .card {
        width: 200px;
        margin: 20px;
        text-align: center;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 15px;
        position: relative;
        transition: transform 0.3s;
    }

    .card:hover {
        transform: scale(1.05);
    }

    /* Course images */
    .course-image {
        width: 100%;
        height: auto;
        border-radius: 10px;
        cursor: pointer;
        transition: transform 0.3s;
    }

    .course-image:hover {
        transform: scale(1.05);
    }

    /* Delete button styling */
    .delete-btn {
        margin-top: 10px;
        padding: 5px 10px;
        font-size: 14px;
        color: #ffffff;
        background-color: #e74c3c;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .delete-btn:hover {
        background-color: #c0392b;
    }

</style>

<style>
    
    /* Reset and base styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'PT Serif', serif;
    
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
    /* Section styling */
    .courses {
        padding: 60px 20px;
        background-color: #e0ffe3;
        text-align: center;
        max-width: 1200px;
        margin: auto;
        border-radius: 12px;
        box-shadow: 0 6px 24px rgba(0, 0, 0, 0.12);
    }

    /* Heading paragraph styling */
    .courses p {
        font-size: 30px;
        color: #2c3e50;
        margin-bottom: 40px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 700;
        font-family: 'PT Serif', serif;
    }

    /* Row styling */
   
    /* Column styling */
    .column {
        flex: 1;
        max-width: 600px;
        padding: 20px;
        text-align: center;
        transition: transform 0.3s ease;
    }

    .column:hover, .column1:hover, .column2:hover, .column3:hover, .column4:hover {
        transform: scale(1.05);
    }

    /* Image container */
     /* Overall Layout */
 /* Adjust row and image container styling */
    .row {
        display: flex;
        justify-content: center;
        padding: 20px;
        background-color: #f5f5f5;
        flex-wrap: wrap; /* Allows images to wrap if there are too many for one row */
    }

    .column {
        width: 100%; /* Ensure full width for the container */
        padding: 10px;
    }

    /* Image Container Styling */
    .image-container {
        display: flex; /* Horizontal alignment of image cards */
        gap: 20px; /* Add space between images */
        background-color: #ffffff;
        border: 1px solid #000000;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        justify-content: center; /* Center images in the container */
        flex-wrap: wrap; /* Allows images to wrap in multiple rows */
    }

    /* Individual image card styling */
    .card {
        width: 200px; /* Fixed width for each card */
        margin: 10px;
        text-align: center;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 15px;
        position: relative;
        transition: transform 0.3s;
    }


    .image-container p {
        font-size: 2.2em;
        font-weight: bold;
        color: #333;
        margin-bottom: 15px;
    }

    /* Form Styling */
    .image-container form {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .image-container input[type="file"],
    .image-container input[type="text"] {
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 0.9em;
    }

    .image-container button[type="submit"] {
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1em;
    }

    .image-container button[type="submit"]:hover {
        background-color: #0056b3;
    }


        /* Image styling */
        .left-image, .right-image {
            width: 45%; /* Set width for larger screens */
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .left-image:hover, .right-image:hover {
            transform: scale(1.08);
        }

        .left-image {
            margin-right: 10px;
        }

        .right-image {
            margin-left: 10px;
        }

        /* Label styling */
        .uniform-label {
            font-size: 22px;
            color: #3498db;
            font-weight: 600;
            margin: 0 10px;
            align-self: center;
            white-space: nowrap;
        }


        /* Responsive styles */
        @media (max-width: 768px) {
            .courses {
                padding: 30px 10px; /* Reduce padding for smaller screens */
            }

            .courses p {
                font-size: 24px; /* Adjust font size for headings */
                margin-bottom: 30px;
            }

            .column, .column1, .column2, .column3, .column4 {
                max-width: 100%; /* Allow full width for mobile */
                padding: 10px; /* Reduce padding */
            }

            .left-image, .right-image {
                width: 100%; /* Images take full width on mobile */
                margin: 0; /* Remove margins for better fit */
            }

        

            .uniform-label {
                font-size: 18px; /* Adjust label font size for readability */
            }
        }

        @media (max-width: 480px) {
            .courses p {
                font-size: 20px; /* Further adjust font size for small devices */
            }
        }
        /* Modal Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.8); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            margin: auto;
            display: block;
            max-width: 80%; /* Use a percentage for responsiveness */
            max-height: 80%; /* Ensure it doesn't exceed the viewport height */
            border-radius: 10px; /* Optional: Add rounded corners */
        }

        /* Close Button */
        .close {
            color: white; /* Keep the color white for contrast */
            float: right;
            font-size: 32px; /* Increased size */
            font-weight: bold; /* Keep bold for better visibility */
            padding: 10px; /* Add padding for easier clicking */
            border: none; /* Remove any border */
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            border-radius: 50%; /* Make it circular */
            transition: background-color 0.3s; /* Smooth background change */
        }

        .close:hover,
        .close:focus {
            color: #bbb; /* Change color on hover */
            background-color: rgba(255, 0, 0, 0.7); /* Change background color on hover */
            cursor: pointer; /* Change cursor to pointer on hover */
        }

</style>