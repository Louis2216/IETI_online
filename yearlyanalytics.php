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
    $currentYear = date('Y');
    $sql = "SELECT last_reset_year FROM visitors1 ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);
    $lastResetYear = $result->num_rows > 0 ? $result->fetch_assoc()['last_reset_year'] : null;

    if ($lastResetYear === null || $lastResetYear < $currentYear) {
        $sqlReset = "UPDATE visitors1 SET visit_count = 0 WHERE visit_year = $currentYear";
        $conn->query($sqlReset);

        $sqlUpdateYear = "INSERT INTO visitors1 (last_reset_year) VALUES ($currentYear) 
                          ON DUPLICATE KEY UPDATE last_reset_year = $currentYear";
        $conn->query($sqlUpdateYear);
    }
}

// Function to fetch visitor data for a specific year or all data
function fetchVisitorData($conn, $selectedYear = null) {
    $yearCondition = $selectedYear ? "YEAR(visit_year) = $selectedYear" : "1=1";
    $sqlTotal = "SELECT SUM(visit_count) as total_visits FROM visitors1";
    $resultTotal = $conn->query($sqlTotal);
    $totalVisits = $resultTotal->num_rows > 0 ? $resultTotal->fetch_assoc()['total_visits'] : 0;

    $sqlMonthly = "SELECT SUM(visit_count) as visit_count, visit_month FROM visitors1 
                   WHERE $yearCondition GROUP BY visit_month";
    $resultMonthly = $conn->query($sqlMonthly);

    $months = [];
    $visitor_counts = [];

    if ($resultMonthly->num_rows > 0) {
        while ($row = $resultMonthly->fetch_assoc()) {
            $monthName = date('F', mktime(0, 0, 0, $row['visit_month'], 1));
            $months[] = $monthName;
            $visitor_counts[] = $row['visit_count'];
        }
    }

    $sqlYearly = "SELECT visit_year, SUM(visit_count) as visit_count 
                  FROM visitors1 
                  GROUP BY visit_year 
                  HAVING SUM(CASE WHEN visit_month != 0 OR visit_count != 0 THEN 1 ELSE 0 END) > 0";
    $resultYearly = $conn->query($sqlYearly);

    $years = [];
    $yearly_counts = [];

    if ($resultYearly->num_rows > 0) {
        while ($row = $resultYearly->fetch_assoc()) {
            $years[] = $row['visit_year'];
            $yearly_counts[] = $row['visit_count'];
        }
    }

    return [
        'totalVisits' => $totalVisits,
        'months' => $months,
        'visitor_counts' => $visitor_counts,
        'years' => $years,
        'yearly_counts' => $yearly_counts
    ];
}

$sqlDistinctYears = "
    SELECT DISTINCT YEAR(visit_year) AS year 
    FROM visitors1 
    WHERE YEAR(visit_year) IN (
        SELECT visit_year 
        FROM visitors1 
        GROUP BY visit_year 
        HAVING SUM(visit_count) > 0
    )
    ORDER BY year DESC
";
$resultDistinctYears = $conn->query($sqlDistinctYears);

$resultDistinctYears = $conn->query($sqlDistinctYears);

$distinctYears = [];
if ($resultDistinctYears->num_rows > 0) {
    while ($row = $resultDistinctYears->fetch_assoc()) {
        $distinctYears[] = $row['year'];
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'resetYearlyData') {
    resetMonthlyDataIfNewYear($conn);
    echo json_encode(['status' => 'success', 'message' => 'Data reset for the new year']);
    exit();
}

if (isset($_GET['action']) && $_GET['action'] == 'getData') {
    $selectedYear = isset($_GET['year']) ? $_GET['year'] : null;
    echo json_encode(fetchVisitorData($conn, $selectedYear));
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
        
     <!-- Display total visits -->
    <div class="statistics">
                    <p>Total Visits: <span id="totalVisits">Loading...</span></p> 
                </div>
        <!-- Year Selector Dropdown -->
       

             
 <div class="chart-type-selector">
            <label for="secondChartType">Select Second Chart Type: </label>
            <select id="secondChartType">

                <option value="bar">Bar Chart</option>
                <option value="line">Line Chart</option>
            </select>
        </div>

        <div class="year-selector">
        <label for="yearSelect">Analytic Type </label>
        <select id="yearSelector" onchange="window.location.href=this.value">
            <option value="yearlyanalytics.php">Yearly</option>
            <option value="visitortrack.php">Monthly</option>
        </select>
        </div>

        <button id="refreshButton">Refresh Report</button> 

        
        <!-- Second Chart for Yearly Visits (All Years) -->
        <div class="chart-container">
            <h2>Yearly Visits Count</h2>
            <canvas id="secondChart" width="400" height="200"></canvas>
        </div>
        <div class="year-selector">
    <label for="yearSelect">Select Year: </label>
    <select id="yearSelect">
        <?php
        $currentYear = date('Y');
        foreach ($distinctYears as $year):
        ?>
            <option value="<?= $year; ?>" <?= $year == $currentYear ? 'selected' : ''; ?>>
                <?= $year; ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>


        <!-- Chart Type Selector for Monthly Chart -->
        <div class="chart-type-selector">
            <label for="chartType">Select Chart Type: </label>
            <select id="chartType">
                
                <option value="line">Line Chart</option>
                <option value="bar">Bar Chart</option>
                
                
            </select>
        </div>
 <!-- Monthly Chart -->
        <div class="chart-container">
            <h2>Monthly Visits Count</h2>
            <canvas id="visitorChart" width="400" height="200"></canvas>
        </div>
        <!-- Second Chart Type Selector -->
       

   

    <script>
        let visitorChart, secondChart;
        const ctx = document.getElementById('visitorChart').getContext('2d');
        const ctx2 = document.getElementById('secondChart').getContext('2d');
        
        let chartType = 'line';  // Default chart type
        let secondChartType = 'bar'; // Default second chart type

        // Function to update the first chart with new data
        const updateChart = (months, visitorCounts, chartType) => {
            if (visitorChart) visitorChart.destroy();
            visitorChart = new Chart(ctx, {
                type: chartType,
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Monthly Visits',
                        data: visitorCounts,
                        borderColor: '#3498db',
                        backgroundColor: chartType === 'bar' ? 'rgba(52, 152, 219, 0.8)' : 'rgba(52, 152, 219, 0.2)',
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

        // Function to update the second chart with yearly data
        const updateSecondChart = (years, yearlyCounts, chartType) => {
            if (secondChart) secondChart.destroy();
            secondChart = new Chart(ctx2, {
                type: chartType,
                data: {
                    labels: years,
                    datasets: [{
                        label: 'Yearly Visits',
                        data: yearlyCounts,
                        borderColor: '#e74c3c',
                        backgroundColor: chartType === 'bar' ? 'rgba(231, 76, 60, 0.8)' : 'rgba(231, 76, 60, 0.2)',
                        fill: chartType === 'line', // Only fill for line chart
                        borderWidth: 2,
                        pointBackgroundColor: '#c0392b',
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
    const selectedYear = document.getElementById('yearSelect').value || ''; // Use selected year or default to all data
    fetch(window.location.href + '?action=getData&year=' + selectedYear)
        .then(response => response.json())
        .then(data => {
            document.getElementById('totalVisits').textContent = data.totalVisits;
            updateChart(data.months, data.visitor_counts, chartType);
            updateSecondChart(data.years, data.yearly_counts, secondChartType);
        });


// Initial fetch on page load with the current year selected by default
document.addEventListener('DOMContentLoaded', fetchData);


            // Fetch data for the second chart (yearly data) without changing year
            fetch(window.location.href + '?action=getData')
                .then(response => response.json())
                .then(data => {
                    // Update the second chart with all years
                    updateSecondChart(data.years, data.yearly_counts, secondChartType);
                });
        };

        // Event listener for year select dropdown (affects only the first chart)
        document.getElementById('yearSelect').addEventListener('change', fetchData);

        // Event listener for chart type select dropdown (affects first chart)
        document.getElementById('chartType').addEventListener('change', (e) => {
            chartType = e.target.value;
            fetchData();  // Refresh first chart with new type
        });

        // Event listener for second chart type select dropdown (affects second chart)
        document.getElementById('secondChartType').addEventListener('change', (e) => {
            secondChartType = e.target.value;
            fetchData();  // Refresh second chart with new type
        });

        // Initial fetch
        fetchData();

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