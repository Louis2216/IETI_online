


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IETI SAN PEDRO LAGUNA WEBSITE</title>
    <link rel="stylesheet" href="#">
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

        // Open login modal
        function openLoginModal() {
            document.getElementById("loginModal").style.display = "block";
        }

        // Close login modal
        function closeLoginModal() {
            document.getElementById("loginModal").style.display = "none";
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
                          <li><a href="adminregs.html">Inquiery</a></li>
                          </ul>

                  <li class="dropdown">
                      <a href="#" class="dropbtn">ABOUT</a>
                      <ul class="dropdown-content">
                          <li><a href="adminhistory.html">History</a></li>
                          <li><a href="admincert.html">Certifications</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <h2>WELCOME TO</h2>
            <h1>IETI COLLEGE OF SCIENCE & TECHNOLOGY, INC.</h1>
            <p>San Pedro Campus<br>COLLEGE DEPARTMENT<br>"The School That Cares & Makes Your Dreams Come True"</p>
        </div>
    </section>

    <!-------------COURSES------------------>
    <section class="courses">
        <p>AIM HIGH WITH IETI</p>
        <div class="row">
            <div class="column">
                <img src="images/BSIT.jpg" style="width: 20%;" onclick="openModal(this);">
                <img src="images/BSCPE.jpg" style="width: 20%;" onclick="openModal(this);">
                <img src="images/BSBA.jpg" style="width: 20%;" onclick="openModal(this);">
                <img src="images/BSCA.jpg" style="width: 20%;" onclick="openModal(this);">
            </div>
        </div>
        <div class="row2">
            <div class="column2">
                <img src="images/BSED.jpg" style="width: 20%;" onclick="openModal(this);">
                <img src="images/BEED.jpg" style="width: 20%;" onclick="openModal(this);">
                <img src="images/BSHRM.jpg" style="width: 20%;" onclick="openModal(this);">
            </div>
        </div>
        <!-- The Modal -->
        <div id="myModal" class="modal">
            <span class="close" onclick="closeModal()">&times;</span>
            <img class="modal-content" id="img01">
        </div>
    </section>
 
    <section class="container">
        <!-- Video and Paragraph side by side -->
        <div class="video-section">
            <!-- Video on the left -->
            <div class="video">
                <video controls muted src="vid.mp4"></video>
            </div>
            <!-- Paragraph beside the video -->
            <div class="description">
                <p>
                    <strong>Watch this video to learn more about IETI College of Science and Technology.</strong><br>
                    Explore the campus, facilities, and student life in this informative video. Gain insights into the courses offered and why IETI is a great place for your education.
                </p>
            </div>
        </div>
    
        <!-- Map and Paragraph on the bottom right -->
        <div class="map-section">
            <!-- Paragraph on the top -->
            <div class="location-description">
                <p>
                    <strong>Location of IETI College of Science and Technology:</strong><br>
                    Conveniently located for students in the region, this map shows the exact location of the IETI campus.
                </p>
            </div>
    
            <!-- Map on the bottom -->
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7731.16950411631!2d121.02489034773401!3d14.335536399999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d6dfc6eae38f%3A0x232dee210b46c0ac!2sIETI%20COLLEGE%20OF%20SCIENCE%20AND%20TECHNOLOGY%2C%20INC!5e0!3m2!1sen!2sph!4v1727965012069!5m2!1sen!2sph"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <!-- Login Modal -->
    <div id="loginModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" onclick="closeLoginModal()">&times;</span>
            <h2>Login</h2>
            <form>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
                <button type="submit">Login</button>
            </form>
        </div>
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
   * {
      margin: 0;
      padding: 0;
      font-family: "PT Serif", serif;
     
    }
    
    .header {
      min-height: 90vh;
      width: 100%;
      background-image: url(images/bg1.jpg);
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
    
    /*-------COURSES-------------*/
    /* Style for the Courses Section */
    .courses {
      width: 100%;
      margin: auto;
      text-align: center;
      padding: 50px 0;
      background-color: #A5CF61;
    }
    
    .courses h1 {
      font-size: 36px;
      font-weight: 700;
      color: rgb(0, 0, 0);
      margin-bottom: 20px;
    }
    
    .courses p {
      color: #000000;
      font-size: 24px;
      font-weight: 300;
      margin-bottom: 40px;
    }
    
    /* Row for course images */
    .row, .row2 {
      display: flex;
      justify-content: center;
      gap: 20px; /* Spacing between images */
      flex-wrap: wrap; /* Make the row wrap to multiple lines if needed */
      margin-bottom: 40px;
    }
    
    /* Style for individual images */
    .row img, .row2 img {
      width: 220px; /* Set a smaller width for the images */
      height: auto; /* Maintain the aspect ratio */
      border-radius: 20px; /* Add rounded corners for a cleaner look */
      transition: transform 0.3s ease; /* Add a smooth hover effect */
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1); /* Soft shadow for visual depth */
    }
    
    /* Hover effect for images */
    .row img:hover, .row2 img:hover {
      transform: scale(1.05); /* Slightly enlarge the image on hover */
    }
    
    
    
    /* Container styles */
    .container {
      display: flex;
      flex-direction: column;
      gap: 20px;
      padding: 40px;
      max-width: 1200px; /* Sets a maximum width for better layout */
      margin: auto; /* Center the container */
    }
    
    /* Video section styling */
    .video-section {
      display: flex;
      flex-direction: column; /* Stack elements vertically to match map layout */
      align-items: center; /* Center align for a better look */
      gap: 20px; /* Adjusted gap for better spacing */
      background-color: #ffffff; /* White background for contrast */
      padding: 20px;
      border-radius: 10px; /* Rounded corners */
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1); /* Soft shadow */
    }
    
    /* Video styling */
    .video video {
      width: 100%; /* Responsive width */
      max-width: 800px; /* Increased max width for consistency with the map */
      height: 450px; /* Fixed height for better alignment */
      border-radius: 10px; /* Match the rounded corners of the map */
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2); /* Consistent shadow */
    }
    
    /* Description styling */
    .description {
      max-width: 500px; /* Match the width of the location description */
      text-align: center; /* Center text for a balanced appearance */
    }
    
    /* Paragraph styling */
    .description p {
      font-size: 18px; /* Keep the same font size for consistency */
      line-height: 1.6; /* Maintain readability */
      color: #333; /* Consistent color */
    }
    
    
    /* Map section styling */
    /* Map section styling */
    .map-section {
      display: flex;
      flex-direction: column; /* Stack elements vertically */
      align-items: center; /* Center align for a better look */
      gap: 20px; /* Adjusted gap for better spacing */
      background-color: #ffffff; /* White background for contrast */
      padding: 20px;
      border-radius: 10px; /* Rounded corners */
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    /* Location description styling */
    .location-description {
      max-width: 500px; /* Reduced width for better space management */
      text-align: center; /* Center text for a balanced appearance */
    }
    
    /* Location description paragraph styling */
    .location-description p {
      font-size: 18px; /* Reduced font size for compactness */
      color: #555;
    }
    
    /* Map iframe styling */
    .map iframe {
      width: 100%; /* Use full width of its parent */
      max-width: 800px; /* Increased max width for the iframe */
      height: 450px; /* Adjust height as needed */
      border-radius: 10px;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
    }
    
    
    
     /* Modal styles */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0, 0, 0); /* Fallback color */
      background-color: rgba(0, 0, 0, 0.9); /* Black w/ opacity */
      padding: 20px; /* Padding for mobile */
    }
    
    /* Modal content */
    .modal-content {
      margin: auto;
      display: block;
      max-width: 90%; /* Reduced width for better mobile view */
      height: auto; /* Auto height to maintain aspect ratio */
      max-height: 70%; /* Adjusted limit height to reduce size */
    }
    
    /* Close button */
    .close {
      position: absolute;
      top: 10px; /* Move closer to the top */
      right: 50px; /* Move closer to the left */
      color: white;
      font-size: 30px; /* Font size for desktop */
      font-weight: bold;
      cursor: pointer;
      z-index: 2; /* Ensure it's above the modal */
      border: 2px solid white; /* Added border for visibility */
      border-radius: 50%; /* Make it circular */
      padding: 5px; /* Added padding for touch targets */
    }
    
    /* Close button hover effect */
    .close:hover,
    .close:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
    }
    
    /* Responsive styles */
    @media (max-width: 768px) {
      .close {
        font-size: 28px; /* Adjust close button size for mobile */
        padding: 8px; /* Increased padding for better touch response */
      }
      
      .modal-content {
        max-height: 60%; /* Reduce max height for mobile to keep image smaller */
      }
    }
    
    
    
    
    
    </style>