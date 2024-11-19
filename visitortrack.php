<?php
// Database connection
$servername = "localhost";
$username = "root";  // Update with your database username
$password = "";      // Update with your database password
$dbname = "website";  // Update with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to reset monthly visit count if a new year has started
function resetMonthlyDataIfNewYear($conn) {
    // Get current year
    $currentMonth = date('m');

    // Fetch last reset year
    $sql = "SELECT last_reset_year FROM visitors1 ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);
    $lastResetYear = $result->num_rows > 0 ? $result->fetch_assoc()['last_reset_year'] : null;

    // If last reset year is null or different from the current year, reset monthly data
    if ($lastResetYear === null || $lastResetYear < $currentMonth) {
        // Reset the monthly visit counts (you can customize this query depending on your schema)
        $sqlReset = "UPDATE visitors1 SET visit_count = 0 WHERE YEAR(visit_month) = $currentMonth";
        $conn->query($sqlReset);

        // Update the last reset year
        //$sqlUpdateYear = "UPDATE visitors1 SET last_reset_year = $currentYear WHERE id = (SELECT MAX(id) FROM visitors1)";
        //$conn->query($sqlUpdateYear);
    }
}

// Call the reset function before fetching data
resetMonthlyDataIfNewYear($conn);

// Function to fetch visitor data
function fetchVisitorData($conn) {
// Get current year and month
$currentYear = date('Y');
$currentMonth = date('m');

// Fetch total visitor count
$sqlTotal = "SELECT SUM(visit_count) as total_visits FROM visitors1";
$resultTotal = $conn->query($sqlTotal);
$totalVisits = 0;
if ($resultTotal->num_rows > 0) {
    $totalVisits = $resultTotal->fetch_assoc()['total_visits'];
}

// Fetch current month visitor count
$sqlCurrentMonth = "SELECT visit_count FROM visitors1 WHERE visit_year = '$currentYear' AND visit_month = '$currentMonth'";
$resultCurrentMonth = $conn->query($sqlCurrentMonth);
$currentMonthVisits = $resultCurrentMonth->num_rows > 0 ? $resultCurrentMonth->fetch_assoc()['visit_count'] : 0;

// Fetch visitor data for each month
$sqlMonthly = "SELECT * FROM visitors1 WHERE YEAR(visit_year) = '$currentYear' ORDER BY visit_month ASC";
$resultMonthly = $conn->query($sqlMonthly);

    // Arrays to store monthly data for the chart
    $months = [];
    $years = [];
    $visitor_counts = [];

    if ($resultMonthly->num_rows > 0) {
        while ($row = $resultMonthly->fetch_assoc()) {
            // Convert numeric month to month name
            $monthName = date('F', mktime(0, 0, 0, $row['visit_month'], 1)); // 'F' returns the full month name
            $months[] = $monthName; // Store month name
            $years[] = $row['visit_year'];
            $visitor_counts[] = $row['visit_count'];
    }
}


return [
    'totalVisits' => $totalVisits,
    'currentMonthVisits' => $currentMonthVisits,
    'months' => $months,
    'years' => $years,
    'visitor_counts' => $visitor_counts
];
    
}

// Handle AJAX request
if (isset($_GET['action']) && $_GET['action'] == 'getData') {
    echo json_encode(fetchVisitorData($conn));
    exit();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Analytics</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
         <!-- for ::before -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  
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

        <script>var navLinks = document.getElementById("navLinks");

function showMenu() {
    navLinks.style.right = "0";
}

function hideMenu() {
    navLinks.style.right = "-200px";
}
</script>
    <div class="container">

        <!-- Display total visits and current month visits -->
        <div class="statistics">
            <p>Total Visits: <span id="totalVisits">Loading...</span></p>
            <p>Current Month Visits: <span id="currentMonthVisits">Loading...</span></p>
        </div>

        <!-- Chart Type Selector -->
        <div class="chart-type-selector">
            <label for="chartType">Select Chart Type: </label>
            <select id="chartType">
                <option value="line">Line Chart</option>
                <option value="bar">Bar Chart</option>
            </select>
        </div>
    <div class="year-selector">
    <label for="yearSelect">Analytic Type </label>
    <select id="yearSelect" onchange="window.location.href=this.value">
        <option value="visitortrack.php">Monthly</option>
        <option value="yearlyanalytics.php">Yearly</option>
    </select>
</div>
        <!-- Refresh Button -->
        <button id="refreshButton">Refresh Report</button>

        <!-- Monthly Chart -->
        <div class="chart-container">
            <h2>Current Monthly Visits Count</h2>
            <canvas id="visitorChart" width="400" height="200"></canvas>
        </div>

    </div>

    <script>
        let visitorChart;
        const ctx = document.getElementById('visitorChart').getContext('2d');
        let chartType = 'line';  // Default chart type

        // Function to update the chart with new data
        const updateChart = (months, visitorCounts, chartType) => {
            if (visitorChart) visitorChart.destroy();
            visitorChart = new Chart(ctx, {
                type: chartType,
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Monthly Visits',
                        data: visitorCounts,
                        borderColor: '#1abc9c',
                        backgroundColor: chartType === 'bar' ? 'rgba(26, 188, 156, 0.8)' : 'rgba(26, 188, 156, 0.2)',
                        fill: chartType === 'line', // Only fill for line chart
                        borderWidth: 2,
                        pointBackgroundColor: '#2980b9',
                        pointRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
            });
        };

        // Function to fetch data via AJAX
        const fetchData = () => {
            fetch(window.location.href + '?action=getData')
                .then(response => response.json())
                .then(data => {
                    // Update stats
                    document.getElementById('totalVisits').textContent = data.totalVisits;
                    document.getElementById('currentMonthVisits').textContent = data.currentMonthVisits;

                    // Update chart
                    updateChart(data.months, data.visitor_counts, chartType);
                });
        };

        // Initial data fetch
        fetchData();

        // Event listener for the chart type change
        document.getElementById('chartType').addEventListener('change', function() {
            chartType = this.value;
            fetchData();
        });

        // Event listener for the refresh button
        document.getElementById('refreshButton').addEventListener('click', function() {
            fetchData();  // Fetch the latest data
        });
    </script>
 <script>
      function logout() {
          // Display notification before redirecting
          alert("You have been logged out successfully.");
          // Redirect to the logout page
          window.location.href = "index.php"; 
      }
      </script>
</body>
</html>

  <!-- Custom CSS for Styling -->
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

    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f4f8fb;
        color: #2c3e50;
        margin: 0;
        padding: 0;
    }
    h2 {
        font-weight: 700;
        color: #2c3e50;
    }
    .container {
        width: 90%;
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px 0;
    }
    .statistics {
        background: linear-gradient(135deg, #3498db, #8e44ad);
        padding: 25px;
        color: #fff;
        border-radius: 8px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        font-size: 1.2em;
    }
    .chart-container {
        margin: 30px 0;
    }
    canvas {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
    }
    .chart-type-selector, .year-selector {
        margin-bottom: 15px;
        display: inline-block;
    }
    label {
        font-weight: bold;
        color: #34495e;
    }
    select, button {
        font-size: 1em;
        padding: 8px 12px;
        border-radius: 5px;
        border: 1px solid #bdc3c7;
        background-color: #ecf0f1;
        color: #34495e;
        transition: 0.3s;
        cursor: pointer;
    }
    select:hover, button:hover {
        background-color: #3498db;
        color: #fff;
        box-shadow: 0px 4px 10px rgba(52, 152, 219, 0.3);
    }
    #refreshButton {
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #27ae60;
        color: #fff;
        border: none;
    }
    #refreshButton:hover {
        background-color: #2ecc71;
        box-shadow: 0px 4px 10px rgba(46, 204, 113, 0.3);
    }

    </style>