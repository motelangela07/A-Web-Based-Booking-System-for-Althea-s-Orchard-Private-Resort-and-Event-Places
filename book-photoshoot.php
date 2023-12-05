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
     <link rel="stylesheet" type="text/css" href="css/book-photoshoot.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.6/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.6/dist/flatpickr.min.js"></script>
</head>

<body class="bg" onload="myFunction()">
    <div class="container text-center">
        <div class="row align-items-start">
            <div class="col-12">
                <img src="img/logo.jpg" class="logo" alt="Logo">
                <div class="signup-link">
                <?php 
                if(isset( $_SESSION['login'])) {
                    $u_id = $_SESSION['user_id'];
                    ?>
                    <a href="logout.php">LOG OUT</a>
               <?php
                } else{
                ?>
                <a href="login.php">SIGN IN/</a><span class="divider"> </span><a href="index.php">SIGN UP</a>
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

 <?php

$sql = "SELECT * FROM booking_calendar";
$result = $conn->query($sql);

$unavailableDates = array();
while ($row = $result->fetch_assoc()) {
    $bookingStartDate = new DateTime($row['staycation_booking_dates']);
    $bookingEndDate   = new DateTime($row['staycation_booking_datesout']);
    $bookingEndDate->modify('+1 day'); // Increment by one day to include the end date

    while ($bookingStartDate < $bookingEndDate) {
        $unavailableDates[] = $bookingStartDate->format('Y-m-d');
        $bookingStartDate->modify('+1 day');
    }
}

?>
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
                              window.location = "book-photoshoot.php";
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
  
<div class="container text-center">
    <div class="row justify-content-start">
        <div class="col-12">
            <div id="bg1">
           
            <!-- Note Box -->
             <div class="note-box">
                    <p><b>Note:</b> It is a FREE use of air-conditioned preparation/ make up room and
                        6 hours photo shoot around the whole property.
                    </p>
                </div>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" autocomplete="off">
           
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="select">Selected Services:</label>
                                <input type="text" disabled  
                                value="<?php echo $_SESSION['selectedService'];?>" 
                                class="form-control" required>

                                <input type="hidden" name="select"  
                                value="<?php echo $_SESSION['selectedService'];?>" 
                                class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="date">Date:</label>
  <input type="text" id="check-in" name="checkin" placeholder="Select a date" onchange="updateCheckoutMin()">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                            <label class="time">Time:</label>
                            <select name="time" required  class="form-control">
                            <option value="">Select Time</option>
                            <option value="Between: 8:00 AM - 3: 00 PM">Between: 8:00 AM - 3: 00 PM</option>
                            <option value="Between: 4:00 PM - 12: 00 MN">Between: 4:00 PM - 12: 00 MN</option>
                            </select>
                        </div>
                        </div>
                
                            <div class="col-md-3">
                            <div class="form-group">
                                <label class="price">Price:</label>
                                <select name="price" required  class="form-control">
                            <option value="PHP">₱</option>
                            <option value="PHP 9, 000">PHP 9, 000</option>
                            
                           
                        </select>
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="sent" value="Proceed" class="btn bg-success ">

                </form>
                <?php
                if (isset($_POST['sent'])){
                    $ref_id_no = "REF".date('mhdysi',time());
                    $select = $_POST['select'];
                    $date = $_POST['checkin'];
                    $time = $_POST['time'];
                    $price = $_POST['price'];
                    $sql_photo_details = "INSERT INTO photo_details VALUES(null,'$ref_id_no','$select','$date','$time','$price','3','$u_id')";
                    if(mysqli_query($conn, $sql_photo_details)){ 
                        
                    $sql_details = "INSERT INTO booking_calendar VALUES(null,'$date','$date','$ref_id_no')";
                    if(mysqli_query($conn, $sql_details)){ }
                    $_SESSION['ref_no'] = $ref_id_no;

                    echo '<script>
                    function myFunction() {
                      swal({
                        title: "Success!",
                        text: "Schedule is Successful.",
                        icon: "success",
                        type: "success"
                      }).then(function() {
                        window.location = "photo-info.php";
                      });
                    }
                  </script>';
                } else {
                  echo '<script>
                    function myFunction() {2
                      swal({
                        title: "Failed!",
                        text: "schedule is Unsuccessful.",
                        icon: "error",
                        type: "error"
                      }).then(function() {
                        window.location = "book-photoshoot.php";
                      });
                    }
                  </script>';
                }
            
            }
                    
                ?>
              
            </div>
        </div>
    </div>
</div>
<script>
    
    document.addEventListener('DOMContentLoaded', function () {
        flatpickr('#check-in', {
      enableTime: false,
      dateFormat: 'Y-m-d',
      minDate: 'today',
        disable: <?php echo json_encode($unavailableDates, JSON_UNESCAPED_SLASHES); ?>,
        onValueUpdate: function (selectedDates, dateStr, instance) {
          updateDateColors(instance);
        },
      onChange: function(selectedDates, dateStr) {
        updateCheckoutMin(dateStr);
      }
    });

    function updateDateColors(instance) {
      const calendar = instance.calendarContainer;

      // Reset previous coloring
      const allDates = calendar.querySelectorAll('.flatpickr-day');
      allDates.forEach(date => {
        date.style.backgroundColor = '';
      });

      // Highlight unavailable dates in red
      const disabledDates = calendar.querySelectorAll('.flatpickr-disabled');
      disabledDates.forEach(date => {
        date.style.backgroundColor = 'red';
      });
    }

});
    </script>

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
