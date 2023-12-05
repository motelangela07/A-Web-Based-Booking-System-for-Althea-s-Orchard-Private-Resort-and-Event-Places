<?php
session_start();

require_once "connect.php";


?>
<!DOCTYPE html>
<html>

<head>
<title>Althea's Orchard Private Resort & Event Place</title>
<!-- Add icon link -->
<link rel="icon" href="../img/favicon.ico" type="image/x-icon" style="width: 10%;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-3S8qu9lQWl2clqFAw5M4d1zmzKwVlE9Xjoi2yP9jITKKZ8B6fSh4nlIocY1FDkHl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/reports.css">
     <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Chart</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="../img/logo2.png" class="logo "alt="Logo">
            <div class="header-text">
    <span class="logo-text">Althea's Orchard Private Resort & 
        <br>Events Places</span>
</div>
        </div>
        <a href="home.php" >Dashboard</a>
        <i class="nav-icon fas fa-tachometer-alt"></i>
        </a>
        <a href="staycation.php">Staycation Booking</a>
        <i class="nav-icon fas fa-calendar"></i>
        </a>
        <a href="eventplace.php">Event Place Booking</a>
        <i class="nav-icon fas fa-calendar"></i>
        </a>
        <a href="photoshoot.php">Photo Shoot Booking</a>
        <i class="nav-icon fas fa-calendar"></i>
        </a>
        <a href="management.php">User Management</a>
        <i class="nav-icon fas fa-users"></i>
        </a>
        <a href="available.php">Availability</a>
        <i class="nav-icon fas fa-users"></i>
        </a>
        <a href="reports.php"class="active">Reports</a>
        <i class="nav-icon fas fa-users"></i>
        </a>
        <a href="logout.php" >Logout</a>
        <i class="nav-icon fas fa-power-off"></i>
        </a>
    </div>
    
    <div class="content">
        <h1>Summary Reports</h1>
        <p>Welcome to Monthly Booking Reports SY: 2023-2024</p>
        <!-- Add a canvas element for the chart -->
        <canvas id="monthlyChart" width="400" height="200"></canvas>
    </div>

    <!-- Include your other scripts here -->

    <!-- Your PHP code to retrieve monthly data -->
    <?php
        // Sample SQL queries to get monthly data for each category
        $staycationQuery = $conn->query("SELECT COUNT(*) as count FROM `book_details` GROUP BY MONTH(booking_start)");
        $eventQuery = $conn->query("SELECT COUNT(*) as count FROM `event_details` GROUP BY MONTH(events_date)");
        $photoShootQuery = $conn->query("SELECT COUNT(*) as count FROM `photo_details` GROUP BY MONTH(photo_date)");

       

    

        // Fetch and store the data
        while ($row = $staycationQuery->fetch_assoc()) {
            $staycationData[] = $row['count'];
        }

        while ($row = $eventQuery->fetch_assoc()) {
            $eventData[] = $row['count'];
        }

        while ($row = $photoShootQuery->fetch_assoc()) {
            $photoShootData[] = $row['count'];
        }
    ?>

    <!-- Your chart script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get the canvas element
            var ctx = document.getElementById('monthlyChart').getContext('2d');

            // Create the bar chart
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov'],
                    datasets: [
                        {
                            label: 'Staycation Bookings',
                            backgroundColor: 'lightblue',
                            borderColor: 'lightblue',
                            borderWidth: 2,
                            data: <?php echo json_encode($staycationData); ?>,
                        },
                        {
                            label: 'Event Place Bookings',
                            backgroundColor: 'lightcoral',
                            borderColor: 'lightcoral',
                            borderWidth: 2,
                            data: <?php echo json_encode($eventData); ?>,
                        },
                        {
                            label: 'Photo Shoot Bookings',
                            backgroundColor: 'lightgreen',
                            borderColor: 'lightgreen',
                            borderWidth: 2,
                            data: <?php echo json_encode($photoShootData); ?>,
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
   
   

          

<footer class="main-footer">
    <strong>Copyright &copy; 2023-2024 <a href="#">Althea's Orchard Private Resort & Event Place</a>.</strong>
    All rights reserved.  <b>Version</b> 3.2.0
  </footer>
 
</body>
</html>
