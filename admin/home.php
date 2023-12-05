<?php
session_start();

require_once "connect.php";


?>
<!DOCTYPE html>
<html>

<head>
<title>Althea's Orchard Private Resort & Event Place</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/home.css" integrity="sha384-o0JV6FXsE7SsOG8HGFvJMyQFmDrSzdQfuDTdAiS+1z+qLOg8Pz4+LSTLp5V8yiPb" crossorigin="anonymous">
<!-- Add icon link -->
<link rel="icon" href="../img/favicon.ico" type="image/x-icon" style="width: 10%;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-3S8qu9lQWl2clqFAw5M4d1zmzKwVlE9Xjoi2yP9jITKKZ8B6fSh4nlIocY1FDkHl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/home.css">
     <!-- Ionicons -->

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
</head>
<body class="hold-transition sidebar-mini layout-fixed" onload="myfunction()">
<div class="wrapper">
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="../img/logo2.png" class="logo "alt="Logo">
            <div class="header-text">
    <span class="logo-text">Althea's Orchard Private Resort & 
        <br>Events Places</span>
</div>
        </div>
        <a href="home.php" class="active">Dashboard</a>
        <i class="nav-icon fas fa-tachometer-alt"></i>
        </a>
        <a href="staycation.php" >Staycation Booking</a>
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
        <a href="reports.php">Reports</a>
        <i class="nav-icon fas fa-users"></i>
        </a>
        <a href="logout.php" >Logout</a>
        <i class="nav-icon fas fa-power-off"></i>
        </a>
    </div>
    <div class="content">
    <!-- Content for your admin section goes here -->
    <h1>Althea's Dashboard</h1>
    <p>Welcome to Althea's Admin Dashboard.</p>

  <!-- Info Boxes Table -->
<table class="info-table">
    <tr>
        <td>
            <div class="info-box user-box">
                <i class="fas fa-users"></i>
                <span class="info-box-text"> Althea's Orchard Users<br><br></span>
                <span class="info-box-number">
                    <?php
                    $query = $conn->query("SELECT * FROM `user_account` ");
                    $count_uname = mysqli_num_rows($query);
                    echo $count_uname;
                    ?>
                </span>
            </div>
        </td>
        <td>
            <div class="info-box staycation-box">
                <i class="fas fa-hotel"></i>
                <span class="info-box-text">Staycation Bookings<br><br></span>
                <span class="info-box-number">
                    <?php
                    $query = $conn->query("SELECT * FROM `book_info` ");
                    $count_uname = mysqli_num_rows($query);
                    echo $count_uname;
                    ?>
                </span>
            </div>
        </td>
        <td>
            <div class="info-box event-box">
                <i class="fas fa-calendar-alt"></i>
                <span class="info-box-text">Event Place Bookings<br><br></span>
                <span class="info-box-number">
                    <?php
                    $query = $conn->query("SELECT * FROM `event_info` ");
                    $count_uname = mysqli_num_rows($query);
                    echo $count_uname;
                    ?>
                </span>
            </div>
        </td>
        <td>
            <div class="info-box photo-box">
                <i class="fas fa-camera"></i>
                <span class="info-box-text">Photo Shoot Bookings<br><br></span>
                <span class="info-box-number">
                    <?php
                    $query = $conn->query("SELECT * FROM `photo_info` ");
                    $count_uname = mysqli_num_rows($query);
                    echo $count_uname;
                    ?>
                </span>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="info-box pending-box">
                <i class="fas fa-check"></i>
                <span class="label">Unpaid Bookings<br></span>
                <span class="info-box-number">
                    <?php
                    $query1 = $conn->query("SELECT * FROM `book_details` WHERE `status`='3' ");
                    $count_uname1 = mysqli_num_rows($query1);
                    ?>
                     <?php
                    $query2 = $conn->query("SELECT * FROM `event_details`WHERE `status`='3' ");
                    $count_uname2 = mysqli_num_rows($query2);
                    ?>
                     <?php
                    $query3 = $conn->query("SELECT * FROM `photo_details`WHERE `status`='3' ");
                    $count_uname3 = mysqli_num_rows($query3);

                     echo "".($count_uname1 + $count_uname2 + $count_uname3);
                    ?>
            </div>
        </td>
        <td>
            <div class="info-box unpaid-box">
                <i class="fas fa-check"></i>
                <span class="label">50% Paid Bookings<br></span>
                <span class="info-box-number">
                    <?php
                    $query1 = $conn->query("SELECT * FROM `book_details`WHERE `status`='2' ");
                    $count_uname1 = mysqli_num_rows($query1);
                    ?>
                     <?php
                    $query2 = $conn->query("SELECT * FROM `event_details`WHERE `status`='2' ");
                    $count_uname2 = mysqli_num_rows($query2);
                    ?>
                     <?php
                    $query3 = $conn->query("SELECT * FROM `photo_details`WHERE `status`='2' ");
                    $count_uname3 = mysqli_num_rows($query3);

                     echo "".($count_uname1 + $count_uname2 + $count_uname3);
                    ?>
            </div>
        </td>
        <td>
        <div class="info-box confirm-box">
                <i class="fas fa-check"></i>
                <span class="label">Fully Paid Bookings<br></span>
                <span class="info-box-number">
                    <?php
                    $query1 = $conn->query("SELECT * FROM `book_details`WHERE `status`='1' ");
                    $count_uname1 = mysqli_num_rows($query1);
                    ?>
                     <?php
                    $query2 = $conn->query("SELECT * FROM `event_details`WHERE `status`='1' ");
                    $count_uname2 = mysqli_num_rows($query2);
                    ?>
                     <?php
                    $query3 = $conn->query("SELECT * FROM `photo_details`WHERE `status`='1' ");
                    $count_uname3 = mysqli_num_rows($query3);

                     echo "".($count_uname1 + $count_uname2 + $count_uname3);
                    ?>
            </div>
        </td>
        <td>
            <div class="info-box cancel-box">
                <i class="fas fa-times"></i>
                <span class="label">Cancelled Bookings<br></span>
                <span class="info-box-number">
                    <?php
                    $query1 = $conn->query("SELECT * FROM `book_details`WHERE `status`='4' ");
                    $count_uname1 = mysqli_num_rows($query1);
                    ?>
                     <?php
                    $query2 = $conn->query("SELECT * FROM `event_details` WHERE `status`='4'");
                    $count_uname2 = mysqli_num_rows($query2);
                    ?>
                     <?php
                    $query3 = $conn->query("SELECT * FROM `photo_details`WHERE `status`='4' ");
                    $count_uname3 = mysqli_num_rows($query3);

                     echo "".($count_uname1 + $count_uname2 + $count_uname3);
                    ?>
            </div>
        </td>
    </tr>
</table>

 
</body>
</html>
