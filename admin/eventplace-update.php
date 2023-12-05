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
    <link rel="stylesheet" type="text/css" href="css/staycation.css">
     <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
</head>
<body onload="myfunction()" class="hold-transition sidebar-mini layout-fixed" >
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
        <a href="staycation.php" class="active" >Staycation Booking</a>
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

        <a href="logout.php" >Logout</a>
        <i class="nav-icon fas fa-power-off"></i>
        </a>
    </div>
    
    <div class="content">
    <!-- Content for your admin section goes here -->
    <h1>Althea's Staycation</h1>
    <p>Welcome to Althea's Staycation Records.</p>

<!-- /.card-headers -->
<h3>Staycation Details</h3>
<div class="card-body p-0 booking-table">
    <div class="table-responsive booking-table-responsive">
                <?php
                $app_id = $_GET['app_id'];
                $q_e = $conn->query("SELECT * FROM `event_details` WHERE `events_id`='$app_id'");
    		    $f_e = $q_e->fetch_array();
                ?>
                   
		<form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype = "multipart/form-data"autocomplete="off" >
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="events_ref_no">Booking Reference Number:</label>
                <b><?php echo $f_e['events_ref_no'] ?><b>
            </div>
            <div class="form-group">
                <label for="events_selected_services">Booking Services:</label>
                <b><?php echo $f_e['events_selected_services'] ?></b>
            </div>
            <!-- Add more fields as needed -->
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="events_date">Booking Date:</label>
                <input type="text" class="form-control" value="<?php echo $f_e['events_date'] ?>" readonly>
                <input type="hidden" class="form-control" value="<?php echo $f_e['events_id'] ?>" name="events_id">
            </div>
            <!-- Add more fields as needed -->
        </div>
    </div>
    <!-- Add more rows and columns as needed -->

    <div class="form-group">
        <label for="status">Status:</label>
        <select class="form-control" name="status">
            <option value="<?php echo $f_e['status'] ?>">Selected Status: <?php  
            if($f_e['status']==1){
                echo "(Fully Paid) Success";
        }elseif($f_e['status']==2){
                echo "(50% Paid) Approved";
        }elseif($f_e['status']==3){
                echo "(Unpaid) Pending";
        }elseif($f_e['status']==4){
            echo "Cancelled";
    }
            //add ka nalang dito ng if else na gusto mo papa try mo nga mag sample book ng staycation
            ?></option>
            <option value="1">(Fully Paid) Success</option>
            <option value="2">(50% Paid) Approved</option>
            <option value="3">(Unpaid) Pending</option>
            <option value="4">Cancelled</option>
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="save_update">Save</button>
        <a href="eventplace.php" class="btn btn-danger">Cancel</a>
    </div>
</form>
                          <?php   
                
                    if(isset($_POST['save_update'])){
                      $status       =$_POST['status'];
                      $booking_id   =$_POST['events_id'];
                   
                      $update = $conn->query("UPDATE `event_details` SET `status`= '$status' WHERE `events_id`= '$booking_id'");
                      if ($update) {
                        echo '<script>
                            swal({
                                title: "Success!",
                                text: "Status is Successfully Update.",
                                icon: "success",
                                type: "success"
                            }).then(function() {
                                window.location = "eventplace.php";
                            });
                        </script>';
                    } else {
                        echo '<script>
                            swal({
                                title: "Failed!",
                                text: "Status is Failed to Update",
                                icon: "error",
                                type: "error"
                            }).then(function() {
                                window.location = "eventplace-update.php?app_id=' . $booking_id . '";
                            });
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
             
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
<!-- /.card -->


   
   

          

<footer class="main-footer">
    <strong>Copyright &copy; 2023-2024 <a href="#">Althea's Orchard Private Resort & Event Place</a>.</strong>
    All rights reserved.  <b>Version</b> 3.2.0
  </footer>
 
</body>
</html>
