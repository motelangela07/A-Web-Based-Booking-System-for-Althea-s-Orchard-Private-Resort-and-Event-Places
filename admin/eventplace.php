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
    <link rel="stylesheet" type="text/css" href="css/eventplace.css">
     <!-- Ionicons -->
     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
   
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
        <a href="staycation.php">Staycation Booking</a>
        <i class="nav-icon fas fa-calendar"></i>
        </a>
        <a href="eventplace.php"class="active">Event Place Booking</a>
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
    <h1>Althea's Event Place </h1>
    <p>Welcome to Althea's Event Place Records.</p>

    <!-- /.card-headers -->
<h3>Event Place Details</h3>
<div class="card-body p-0 booking-table">
    <div class="table-responsive booking-table-responsive">
        <table class="table m-0 booking-table">
            <thead>
                <tr>
                    
                    <th>Events Reference No.</th>
                    <th>Booking Services</th>
                    <th>Event Date</th>
                    <th>Event Time</th>
                    <th>Event Fee</th>
                    <th>Booking Status</th> <!-- Added Status column -->
                    <th>Action</th> <!-- Added Status column -->
                </tr>
            </thead>
            <tbody>
                <?php
                $q_e = $conn->query("SELECT * FROM `event_details`");
                while ($f_e = $q_e->fetch_array()) {
                ?>
                    <tr>
                        
                        <td><?php echo $f_e['events_ref_no'] ?> </td>
                        <td><?php echo $f_e['events_selected_services'] ?> </td>
                        <td><?php echo $f_e['events_date'] ?> </td>
                        <td><?php echo $f_e['events_time'] ?> </td>
                        <td><?php echo $f_e['event_package'] ?> </td>
                        <td><?php if($f_e['status']==1){
                    echo "(Fully Paid) Success";
            }elseif($f_e['status']==2){
                    echo "(50% Paid) Approved";
            }elseif($f_e['status']==3){
                    echo "(Unpaid) Pending";
              }elseif($f_e['status']==4){
              echo "Cancelled";
      } 
            ?> </td>

                        <td><a href="eventplace.php?app_id=<?php echo $f_e['events_id']?>&action=1" class="btn bg-success" ><i class=" fas fa-check"></i> Save</a><br>
                          <a href="eventplace-update.php?app_id=<?php echo $f_e['events_id']?>&action=2" class="btn bg-danger" ><i class="fas fa-ban"></i> Update</a> 
                          <a href="eventplace.php?app_id=<?php echo $f_e['events_id']?>&action=3" class="btn bg-danger" ><i class="fas fa-ban"></i> Cancel</a> 
                           
                        </td>

                             </tr>
                          <?php   
                }
                    if(isset($_GET['action'])){
                      $action=$_GET['action'];
                      $app_id=$_GET['app_id'];
                   
                      $update = $conn->query("UPDATE `event_details` SET `status`= '$action' WHERE `events_id`= '$app_id'");
                      if ($update){
                        echo '<script>
                        function myFunction() {
                          swal({
                            title: "Success!",
                            text: "Payment Status is Confirm.",
                            icon: "success",
                            type: "success"
                          }).then(function() {
                            window.location = "eventplace.php";
                          });
                        }
                      </script>';
                    } else {
                      echo '<script>
                        function myFunction() {
                          swal({
                            title: "Failed!",
                            text: "Payment Status is not Process.",
                            icon: "error",
                            type: "error"
                          }).then(function() {
                            window.location = "eventplace.php";
                          });
                        }
                      </script>';
                    }




                    }
                    ?>

                  
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
             
          <!-- /.col -->



   
   <!-- /.card-header -->
   <h3>Event Place User Information</h3>
<div class="card-body p-0 user-info-table">
    <div class="table-responsive user-info-table-responsive">
        <table class="table m-0 user-info-table">
            <thead>
                <tr>
                   
                <th>Events Reference No.</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Contact</th>
                    <th>Postal Code</th>
                    <th>Address</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $q_e = $conn->query("SELECT * FROM `event_info`");
                while ($f_e = $q_e->fetch_array()) {
                ?>
                    <tr>
                       
                        <td><?php echo $f_e['event_ref_no'] ?> </td>
                        <td><?php echo $f_e['event_fname'] ?> </td>
                        <td><?php echo $f_e['event_lname'] ?> </td>
                        <td><?php echo $f_e['event_contact'] ?> </td>
                        <td><?php echo $f_e['event_postal_code'] ?> </td>
                        <td><?php echo $f_e['event_address'] ?> </td>
                        <td><?php echo $f_e['event_email'] ?> </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /.card -->

 
</body>
</html>
