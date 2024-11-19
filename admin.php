<?php
session_start();

// Database connection
$servername = "localhost";
$dbUsername = "root";
$password = "";  // This is your database password, it's empty here
$dbname = "website";

// Create connection
$conn = new mysqli($servername, $dbUsername, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password']; // Plaintext password entered by the user

    // Query to fetch user data based on username
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Check if user exists and password matches (verify the password hash)
    if ($user) {
        if (password_verify($password, $user['password'])) {
            // If password is correct, create session
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // JavaScript alert and redirection
            echo "<script>
                    alert('" . ucfirst($_SESSION['role']) . " successfully logged in!');
                    setTimeout(function() {
                        window.location.href = '" . ($_SESSION['role'] === 'admin' ? 'adminpagelogout.php' : 'testing2.php') . "';
                    }, 100);
                  </script>";
            exit;

        } else {
            // If password is incorrect
            $error = "Invalid login credentials!";
        }
    } else {
        // User not found
        $error = "Invalid login credentials!";
    }

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - IETI SAN PEDRO LAGUNA</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            text-align: center;
            font-weight: bold;
            margin-bottom: 15px;
        }
    </style>

<style>
footer {
        margin-top: 9%;
        padding: 1rem 0;
        background-color: #72ac8a;
        text-align: center;
        color: white;
        width: 100%;
    }
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
<script>
    function showMenu() {
        document.getElementById("navLinks").style.right = "0";
    }

    function hideMenu() {
        document.getElementById("navLinks").style.right = "-200px";
    }
</script>
</head>
<body>
<div>
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
                            <li><a href="admin.php">Login</a></li>
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
</div>

<div class="container">
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
</div>


<footer>
    <p>&copy; 2024 IETI San Pedro Laguna. All rights reserved.</p>
</footer>

</body>
</html>
