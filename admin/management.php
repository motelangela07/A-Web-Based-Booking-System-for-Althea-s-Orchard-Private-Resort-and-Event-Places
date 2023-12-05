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
    <link rel="stylesheet" type="text/css" href="css/management.css">
     <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 
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
        <a href="home.php">Dashboard</a>
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
        <a href="management.php" class="active">User Management</a>
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
    <h1>Althea's User Management </h1>
    <p>Welcome to Althea's User Management Records.</p>

   
  <!-- /.card-header -->
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table m-0">
        <thead>
          <tr>
          <th>User ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $q_e = $conn->query("SELECT * FROM `user_account`");
          while ($f_e = $q_e->fetch_array()) {
          ?>
            <tr>
            <td><?php echo $f_e['user_id'] ?> </td>
              <td><?php echo $f_e['user_name'] ?> </td>
              <td><?php echo $f_e['user_address'] ?> </td>
              <td><?php echo $f_e['user_contact'] ?> </td>
              <td><?php echo $f_e['user_email'] ?> </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


  
          


    <footer class="main-footer">
    <strong>Copyright &copy; 2023-2024 <a href="#">Althea's Orchard Private Resort & Event Place</a>.</strong>
    All rights reserved.  <b>Version</b> 3.2.0
  </footer>
 
</body>
</html>
