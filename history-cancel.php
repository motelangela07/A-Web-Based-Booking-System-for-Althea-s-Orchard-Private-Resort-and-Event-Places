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
                    <a href="history.php">HISTORY</a><a href="logout.php">LOG OUT</a>
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
        <p>Cancel Staycation Bookings.</p>

        <div class="card-body p-0 booking-history-table">
            <div class="table-responsive booking-history-table-responsive">
                <table class="table m-0 booking-history-table">
                    <thead>
                        <tr>
                            
                            <th>Booking Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <form  method="post" enctype = "multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
          
                        <?php
                        // Include your database connection file (connect.php)
                        $ref_id = $_GET['ref_id'];
                        $q = $conn->query("SELECT * FROM `book_details` WHERE `booking_ref_no` = '$ref_id'");
						$result = $q->fetch_array();
                            ?>
                           
                            </div>
                                    <input type="hidden" value="<?php echo  $ref_id?>" name="ref_id">
                                
                                </td>
                                
                                <td>
                                <select name="status" class="form-control" required>
                                    <option value="<?php echo $result['status']?>">
                                    Selected Status: <?php 
                                    if($result['status']==1){
                    echo "(Fully Paid) Success";
            }elseif($result['status']==2){
                    echo "(50% Paid) Approved";
            }elseif($result['status']==3){
                    echo "(Unpaid) Pending";
              }elseif($result['status']==4){
              echo "Cancelled";
      } 
            ?></option>
                                    
                                    <option value="4">Cancel My Book</option>
                                </select>
                                    </td>
                                <td>
                                <input type="submit" name="update_status" class="btn bg-danger " value="Cancel" onClick="return confirm('Are you sure you want to Cancel your Booking?')"></td>
                            </tr>
                      
                    </tbody>
      </form>
      <?php
      if(isset($_POST['update_status'])){
                $status = $_POST['status'];            
                $ref_id = $_POST['ref_id'];

                $sql_sched  = "UPDATE book_details SET `status`='$status' WHERE `booking_ref_no`='$ref_id'";	
				if (mysqli_query($conn, $sql_sched)){
									echo '<script>
									function myFunction() {
										swal({
										title: "Success! ",
										text: "Booking are Already Cancelled",
									    icon: "success",
										type: "success"
										}).then(function() {
                                            window.location = "history.php";
									  });}
									
								  </script>';			
				}else{
                    echo '<script>
                    function myFunction() {
                        swal({
                        title: "Failed! ",
                        text: "Booking Failed to Cancel",
                        icon: "error",
                        type: "error"
                        }).then(function() {
                        window.location = "history-cancel.php?ref_id='.$ref_id.'";
                      });}
                    
                  </script>';
								}
      }
      ?>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.content -->





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
