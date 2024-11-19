<?php
// Database connection
$servername = "localhost"; // Change as needed
$username = "root"; // Your DB username
$q_a = ""; // Your DB password
$dbname = "regsforms"; // Your DB name

$conn = new mysqli($servername, $username, $q_a, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $q_a = $_POST['q_a']; // Hash the password
  $contact_num = $_POST['contact_num'];
  $date_time = date("Y-m-d H:i:s");

  // Insert data into the `registration` table
  $sql = "INSERT INTO registration (username, q_a, email, contact_num, date_time) 
          VALUES ('$username', '$q_a', '$email', '$contact_num', '$date_time')";


  if ($conn->query($sql) === TRUE) {
    // Registration successful, redirect to main HTML page
    header("Location: successreg.html"); // Change 'main.html' to your actual main page filename
    exit(); // Terminate the script after redirection
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
