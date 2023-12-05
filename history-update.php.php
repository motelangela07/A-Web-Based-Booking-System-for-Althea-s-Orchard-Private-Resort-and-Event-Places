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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-3S8qu9lQWl2clqFAw5M4d1zmzKwVlE9Xjoi2yP9jITKKZ8B6fSh4nlIocY1FDkHl" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        <p>Modify Staycation Bookings.</p>

        <div class="card-body p-0 booking-history-table">
            <div class="table-responsive booking-history-table-responsive">
                <table class="table m-0 booking-history-table">
                    <thead>
                        <tr>
                            
                          
                        </tr>
                        
                    </thead>
                    <tbody>
                    <form  method="post" enctype = "multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
          
                        <?php
                        // Include your database connection file (connect.php)
                        $ref_id = $_GET['ref_id'];
                        $q = $conn->query("SELECT * FROM `book_details` WHERE `booking_ref_no` = '$ref_id'");
						$result = $q->fetch_array();
                        
                        $q1 = $conn->query("SELECT * FROM `book_info` WHERE `ref_no` = '$ref_id'");
						$result1 = $q1->fetch_array();
                            ?>
                            <tr>
                            <td>
                            <div class="form-group">
                            <label for="check-in">Check-in Date:</label>
                            <input type="date" id="check-in" name="checkin" class="form-control" required value="<?php echo $result['booking_start']?>">
                            </div>
                           </div>
                            </td>

                            <td>
                            <div class="form-group">
                            <label for="check-out">Check-out Date:</label>
                            <input type="date" id="check-out" name="checkout" class="form-control" required value="<?php echo $result['booking_end']?>">
                            </div>
                           </div>
                            </td>

                            <td>
                            <div class="form-group">
                            <label for="additional-guests">Additional Guests (max 10):</label>
                            <input type="number" id="additional-guests" name="additionalguests" min="0" max="10"class="form-control" required value="<?php echo $result['additional_package']?>">
                            </div>
                            </div>
                           </td>
                           <td>
                           <button onclick="calculateTotal()" type="button">Calculate Total</button>
                            </td>

                           <td>
                           <p>Chosen Date Range: &nbsp<span id="date-range-info" class="form-control" ></span></p>
                            </td>
                            <td>
                            <p>Accommodation Type: &nbsp<span id="accommodation-type" class="form-control"></span></p>
                            </td>
                            <td>
                            <p>Total Fee: &nbsp<span id="total" class="form-control"></span></p>
                            </td>

                            <td>
                            <input type="hidden" name="ref_id"value="<?php echo $result['booking_ref_no']?>">
                            <input type="hidden" name="feeTotal" id="feeTotalInput" value="">
                            <input type="hidden" name="accomodation" id="accommodationInput" value="">
                            <input type="hidden" name="daterange" id="dateRangeInput" value="">

                            </tr>
                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                            
    <script>
        function calculateTotal() {
            var checkInDate = new Date(document.getElementById('check-in').value + 'T14:00:00'); 
            var checkOutDate = new Date(document.getElementById('check-out').value + 'T12:00:00'); 
            var additionalGuests = parseInt(document.getElementById('additional-guests').value) || 0; 

            if (isNaN(checkInDate) || isNaN(checkOutDate) || checkInDate >= checkOutDate) {
                alert("Invalid date range");
                return;
            }

    var weekendRate = 25000; 
    var weekdayRate = 23500;
    var peakSeasonRate = 27000;
    var additionalGuestFee = 500; 

    var totalFee = 0;

    var oneDay = 24 * 60 * 60 * 1000;
    var nights = Math.ceil(Math.abs((checkOutDate - checkInDate) / oneDay));

    for (var i = 0; i < nights; i++) {
        var currentDate = new Date(checkInDate);
        currentDate.setDate(checkInDate.getDate() + i);

        // Check if the current date is a weekend (Friday, Saturday, or Sunday)
        var isWeekend = currentDate.getDay() === 5 || currentDate.getDay() === 6 || currentDate.getDay() === 0;

        // Check if the current date is a Peak Season (December 24 to 25 and December 31 to January 1)
        var isPeakSeason = (
            (currentDate.getMonth() === 11 && (currentDate.getDate() === 24 || currentDate.getDate() === 25)) ||
            (currentDate.getMonth() === 0 && (currentDate.getDate() === 31 || currentDate.getDate() === 1))
        );

        // Apply the appropriate rate based on whether it is a weekend, peak season, or weekday
        if (isPeakSeason) {
            totalFee += peakSeasonRate;
        } else {
            totalFee += isWeekend ? weekendRate : weekdayRate;
        }
    }

            totalFee += additionalGuests * additionalGuestFee;
            var totalInput = document.getElementById('total');
            totalInput.innerHTML = '<input type="text" name="feeTotal" value="' + totalFee + '" style="border:white;">';


          // Display the chosen date range 
          var dateRangeText = '' + formatDateString(checkInDate) + ' to ' + formatDateString(checkOutDate);
          document.getElementById('date-range-info').innerHTML = '<input type="text" name="daterange" value="' + dateRangeText + '" style="border:white;">';


            // Determine accommodation type based on the date range
            var accommodationType = getAccommodationType(checkInDate, checkOutDate);
            document.getElementById('accommodation-type').innerHTML = '<input type="text" name="accomodation" value="' + accommodationType + '" style="border:white;">';
            
            document.getElementById('feeTotalInput').value = totalFee;
            document.getElementById('dateRangeInput').value = dateRangeText;
            document.getElementById('accommodationInput').value = accommodationType;
            // Rest of your existing code for calculating total... PAPA GINAYA KO LANG YUNG FORMAT NIYAN DUN SA BOOK-DETAILS EH TAS NILAGYAN KO LNG NG
        }

        function getAccommodationType(checkInDate, checkOutDate) {
            var daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            var weekdays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday'];
            var weekends = ['Friday','Saturday', 'Sunday'];
            var peakSeason = ['Dec 24', 'Dec 25', 'Dec 31', 'Jan 1'];

            var currentDay = new Date(checkInDate);
            var accommodationTypes = [];

            while (currentDay < checkOutDate) {
                var dayOfWeek = daysOfWeek[currentDay.getDay()];

                if (weekdays.includes(dayOfWeek)) {
                    accommodationTypes.push('Weekdays');
                } else if (weekends.includes(dayOfWeek)) {
                    accommodationTypes.push('Weekends');
                }

                if (peakSeason.includes(formatDateString(currentDay))) {
                    accommodationTypes.push('Peak Season');
                }

                currentDay.setDate(currentDay.getDate() + 1);
            }

            // Remove duplicate accommodation types
            accommodationTypes = [...new Set(accommodationTypes)];

            return accommodationTypes.join(', ');
        }

        function formatDateString(date) {
            var options = { month: 'short', day: 'numeric' };
            return date.toLocaleDateString('en-US', options);
        }
    </script>
                           </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.content -->

    <div class="card-body p-0 booking-history-table">
            <div class="table-responsive booking-history-table-responsive">
                <table class="table m-0 booking-history-table">
                    <thead>
                        <tr>
                            
                        </tr>
                        
                    </thead>
                    <tbody>
                  
                        <?php
                        // Include your database connection file (connect.php)
                            ?>
                            <tr>
                            <td>
                            <div class="form-group">
                           <label class="fname">First Name:</label>
                           <input type="text" name="fname" class="form-control" required value="<?php echo $result1['book_fname']?>">
                           </div>
                           </div>

                            </td>
                            <td>
                            <div class="form-group">
                           <label class="lname">Last Name:</label>
                           <input type="text" name="lname" class="form-control" required value="<?php echo $result1['book_lname']?>" >
                           </div>
                           </div>
                            </td>

                            <td>
                            <div class="form-group">
                            <label id="con">Contact:</label>
                            <input type="text" pattern=".{11}" name="con" class="form-control" value="<?php echo $result1['book_contact']?>" maxlength="11"title="Must 11 numbers only" required>
                            </div>
                            </div>
                           </td>

                           <td>
                           <div class="form-group">
                           <label class="pcode">Postal Code:</label>
                           <input type="number" name="pcode" class="form-control" required  value="<?php echo $result1['book_postal_code']?>">
                           </div>
                           </div>
                            </td>

                            <td>
                            <div class="form-group">
                            <label class="add">Address:</label>
                            <input type="text" name="add" class="form-control" required value="<?php echo $result1['book_address']?>">
                            </div>
                            </div>
                            </td>

                            <td>
                            <div class="form-group">
                            <label class="email">Email Address:</label>
                            <input type="email" name="email" class="form-control" required value="<?php echo $result1['book_email']?>">
                            </div>
                            </div>
                            </td>
                            <td><input type="submit" name="update_status" class="btn bg-success" value="Update"></td>
                           

                            </tr>
                    </tbody>
      </form>
      <?php
      if(isset($_POST['update_status'])){
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $con = $_POST['con'];
                $pcode = $_POST['pcode'];
                $add = $_POST['add'];
                $email = $_POST['email'];
                $ref_id = $_POST['ref_id'];

                          $checkin = $_POST['checkin'];
                          $checkout = $_POST['checkout'];
                          $accomodation = $_POST['accomodation'];
                          $daterange = $_POST['daterange'];
                          $additionalguests = $_POST['additionalguests'];
                          $feeTotal = $_POST['feeTotal'];
          
                $sql_sched1  = "UPDATE book_details SET `booking_start`='$checkin',`booking_end`='$checkout',
                `regular_accommodation`='$accomodation',`date_range`='$daterange',`additional_package`='$additionalguests',`total`='$feeTotal' WHERE `booking_ref_no`='$ref_id'";	
                if (mysqli_query($conn, $sql_sched1)){}
                
                $sql_sched  = "UPDATE book_info SET `book_fname`='$fname',`book_lname`='$lname'
                ,`book_contact`='$con',`book_postal_code`='$pcode'
                ,`book_address`='$add',`book_email`='$email' WHERE `ref_no`='$ref_id'";	
				if (mysqli_query($conn, $sql_sched)){
									echo '<script>
									function myFunction() {
										swal({
										title: "Success! ",
										text: "Booking Successfully Updated",
									    icon: "success",
										type: "success"
										}).then(function() {
                                            window.location = "history.php?ref_id='.$ref_id.'";
									  });}
									
								  </script>';			
				}else{
                    echo '<script>
                    function myFunction() {
                        swal({
                        title: "Failed! ",
                        text: "Booking Failed to Update",
                        icon: "error",
                        type: "error"
                        }).then(function() {
                        window.location = "history-update.php?ref_id='.$ref_id.'";
                      });}
                    
                  </script>';
								}
      }
      ?>
                </table>
            </div>
          
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
