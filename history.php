<?php
session_start();

require_once "connect.php";


?>

<!DOCTYPE html>
<html>

<head>
<title>Althea's Orchard Private Resort & Event Place</title>
<!-- Add icon link -->
<link rel="icon" href="img/favicon.ico" type="image/x-icon" style="width: 10%;">
<link rel="stylesheet" href="your-fonts.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/home.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="bg" onload="myFunction()">
    <div class="container text-center">
        <div class="row align-items-start">
            <div class="col-12">
                <img src="img/logo2.png" class="logo" alt="Logo">
                <div class="signup-link">
                <?php 
                if(isset( $_SESSION['login'])) {
                    $u_id = $_SESSION['user_id'];
                    
                    ?>
                    <a href="history.php"class="active">HISTORY</a><a href="logout.php">LOG OUT</a>
               <?php
                } else{
                ?>
                <a href="login.php">SIGN IN/</a><span class="divider"> </span><a href="register.php">SIGN UP</a>
                <?php }?>
            </div>
           

    <div class="header-text">
    <span class="logo-text">Althea's Orchard Private Resort & 
        <br>Events Places</span>
</div>
<h1 class="main-heading">
    <a href="home.php" class="active">HOME</a> |
    <a href="amenities.php">AMENITIES</a> |
    <a href="rooms.php">ROOMS</a> |
    <a href="events.php">EVENTS</a> |
    <a href="services.php">SERVICES</a> 
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bookNowModal">Book Now</button>
    
</div>
    </h1>
     </div>
    </div>
 </div>
<!-- Book Now Modal -->
<div class="modal fade" id="bookNowModal" tabindex="-1" role="dialog" aria-labelledby="bookNowModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookNowModalLabel">Book Now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add a small logo at the top -->
                <div class="text-center">
                    <img src="img/logo1.jpg" alt="Logo" class="img-fluid">
                </div>
                <form class="user"  method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype = "multipart/form-data" autocomplete="off">

                <div >
                        <label >Select Services:</label>
                        <select name="selectedService" required>
                            <option value="">Select a service</option>
                            <option value="Staycation">Staycation</option>
                            <option value="EventPlace">Event Place</option>
                            <option value="PhotoShoot">Photo Shoot Venue</option>
                           
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="proceed">Proceed</button>
                </form>
                <?php
                    if(isset($_POST['proceed'])){
                        $_SESSION['selectedService'] = $_POST['selectedService'];
                       
                        if(isseT($_SESSION['selectedService'])){
                            echo'<script>
                            function myFunction() {
                              swal({
                              title: "Successfully!",
                              text: "Selected Services",
                              icon: "success",
                              type: "success"
                              }).then(function() {
                              window.location = "book-details.php";
                            });}
                          </script>';
                        }else{
                           
                            echo'<script>
                            function myFunction() {
                              swal({
                              title: "Failed!",
                              text: "Failed Updated",
                              icon: "success",
                              type: "success"
                              }).then(function() {
                              window.location = "home.php";
                            });}
                          </script>';
                        }

                    }
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST['proceed'])) {
                            $_SESSION['selectedService'] = $_POST['selectedService'];
                    
                            if ($_SESSION['selectedService'] == "Staycation") {
                                // Redirect to the Staycation page
                                header("Location: book-details.php");
                                exit();
                            } elseif ($_SESSION['selectedService'] == "EventPlace") {
                                // Redirect to the Event Place page
                                header("Location: book-events.php");
                                exit();
                            } elseif ($_SESSION['selectedService'] == "PhotoShoot") {
                                // Redirect to the Photo Shoot page
                                header("Location: book-photoshoot.php");
                                exit();
                            } else {
                                // Handle other cases or show an error message
                                echo "Invalid selected service.";
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="content" style="margin-top:100px; text-align: center;">
        <h1>Staycation Summary</h1>
        <p>View a history of staycation bookings.</p>

        <div class="card-body p-0 booking-history-table">
            <div class="table-responsive booking-history-table-responsive">
                <table class="table m-0 booking-history-table">
                    <thead>
                        <tr>
                            <th>Staycation Reference No.</th>
                            <th>Booking Services</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Regular Accommodation</th>
                            <th>Additional Pax</th>
                            <th>Staycation Fee</th>
                            <th>Booking Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Include your database connection file (connect.php)

                        $q_e = $conn->query("SELECT * FROM `book_details` WHERE `book_by`='$u_id'");
                        while ($f_e = $q_e->fetch_array()) {
                            ?>
                            <tr>
                                <td><?php echo $f_e['booking_ref_no']?></td>
                                <td><?php echo $f_e['booking_services']?></td>
                                <td><?php echo $f_e['booking_start']?></td>
                                <td><?php echo $f_e['booking_end']?></td>
                                <td><?php echo $f_e['regular_accommodation']?></td>
                                <td><?php echo $f_e['additional_package']?></td>
                                <td><?php echo $f_e['total']?></td>
                                <td><?php if($f_e['status']==1){
                    echo "(Fully Paid) Success";
            }elseif($f_e['status']==2){
                    echo "(50% Paid) Approved";
            }elseif($f_e['status']==3){
                    echo "(Unpaid) Pending";
              }elseif($f_e['status']==4){
              echo "Cancelled";
      } 
            ?></td>
                                 <td>
    <a href="history-update.php?ref_id=<?php echo $f_e['booking_ref_no']?>">Modify</a><br>
    <a href="history-cancel.php?ref_id=<?php echo $f_e['booking_ref_no']?>">Cancel</a>
    
</td> </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.content -->
 
    <div class="content" style="margin-top:100px; text-align: center;">
        <h1>Event Place Summary</h1>
        <p>View a history of event bookings.</p>

        <div class="card-body p-0 booking-history-table">
            <div class="table-responsive booking-history-table-responsive">
                <table class="table m-0 booking-history-table">
                    <thead>
                        <tr>
                            <th>Event Reference No.</th>
                            <th>Booking Services</th>
                            <th>Date and Time</th>
                            <th>Package</th>
                            <th>Booking Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Include your database connection file (connect.php)

                        $q_e = $conn->query("SELECT * FROM `event_details` WHERE `book_by`='$u_id'");
                        while ($f_e = $q_e->fetch_array()) {
                            ?>
                            <tr>
                                <td><?php echo $f_e['events_ref_no']?></td>
                                <td><?php echo $f_e['events_selected_services']?></td>
                                <td><?php echo $f_e['events_date']?> - <?php echo $f_e['events_time']?></td>
                                <td><?php echo $f_e['event_package']?></td>
                                <td><?php if($f_e['status']==1){
                    echo "(Fully Paid) Success";
            }elseif($f_e['status']==2){
                    echo "(50% Paid) Approved";
            }elseif($f_e['status']==3){
                    echo "(Unpaid) Pending";
              }elseif($f_e['status']==4){
              echo "Cancelled";
      } 
      ?></td>
      <td>
<a href="history-eupdate.php?ref_id=<?php echo $f_e['events_ref_no']?>">Modify</a><br>
<a href="history-ecancel.php?ref_id=<?php echo $f_e['events_ref_no']?>">Cancel</a>

</td> </tr>
<?php
}
?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
    </div>
    <div class="content" style="margin-top:100px; text-align: center;">
        <h1>Photo Shoot Summary</h1>
        <p>View a history of photo shoot bookings.</p>

        <div class="card-body p-0 booking-history-table">
            <div class="table-responsive booking-history-table-responsive">
                <table class="table m-0 booking-history-table">
                    <thead>
                        <tr>
                            <th>Photo Shoot Reference No.</th>
                            <th>Booking Services</th>
                            <th>Date and Time</th>
                            <th>Price</th>
                            <th>Booking Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Include your database connection file (connect.php)

                        $q_e = $conn->query("SELECT * FROM `photo_details` WHERE `book_by`='$u_id'");
                        while ($f_e = $q_e->fetch_array()) {
                            ?>
                            <tr>
                                <td><?php echo $f_e['photo_ref_no']?></td>
                                <td><?php echo $f_e['photo_selected_services']?></td>
                                <td><?php echo $f_e['photo_date']?> - <?php echo $f_e['photo_time']?></td>
                                <td><?php echo $f_e['photo_price']?></td>
                                <td><?php if($f_e['status']==1){
                    echo "(Fully Paid) Success";
            }elseif($f_e['status']==2){
                    echo "(50% Paid) Approved";
            }elseif($f_e['status']==3){
                    echo "(Unpaid) Pending";
              }elseif($f_e['status']==4){
              echo "Cancelled";
      }  ?></td>
      <td>
<a href="history-pupdate.php?ref_id=<?php echo $f_e['photo_ref_no']?>">Modify</a><br>
<a href="history-pcancel.php?ref_id=<?php echo $f_e['photo_ref_no']?>">Cancel</a>

</td> </tr>
<?php
}
?>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
    </div>


<script>/* Show select options when label is clicked */
function toggleOptions(label) {
    var options = label.nextElementSibling;
    if (options.style.display === "block") {
        options.style.display = "none";
    } else {
        options.style.display = "block"; // Corrected this line
    }
}
</script>


        <!-- Add these links to include Bootstrap CSS and JavaScript -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
