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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/book-details.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"  crossorigin="anonymous">

<!-- ... other links ... -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.6/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.6/dist/flatpickr.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">  


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
if (isset($_POST['proceed'])) {
    $_SESSION['selectedService'] = $_POST['selectedService'];

    if (isset($_SESSION['selectedService'])) {
        echo '<script>
            function myFunction() {
                swal({
                    title: "Successfully!",
                    text: "Selected Services",
                    icon: "success",
                    type: "success"
                }).then(function () {
                    window.location = "book-details.php";
                });
            }
        </script>';
    } else {
        echo '<script>
        function myFunction() {
            swal({
                title: "Failed!",
                text: "Failed Updated",
                icon: "error",
                type: "error"
            }).then(function () {
                window.location = "home.php";
            });
        }
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
            <h6 class="centered-title">Check-In: 02:00 PM <a>|<a> Check-Out: 12:00 NN</h6>
             <!-- Note Box -->
             <div class="note-box">
                    <p><b>Note:</b> Staycation property is good for 20 pax. 
                        For additional pax, pay 500 per pax (Limited to 5-10 excess only for comfy sleeping capacity).
                    </p>
                </div>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" autocomplete="off">
           
                <div class="row">
    <!-- Row 1 -->
    <div class="col-md-4">
        <div class="form-group">
            <label for="select">Selected Services:</label>
            <input type="text" disabled value="<?php echo $_SESSION['selectedService']; ?>" class="form-control" required>
            <input type="hidden" name="select" value="<?php echo $_SESSION['selectedService']; ?>" class="form-control" required>
        </div>
    </div>
    <label for="check-in">Check-in Date:</label>
  <input type="text" id="check-in" name="checkin" placeholder="Select a date" onchange="updateCheckoutMin()">

  <label for="check-out">Check-out Date:</label>
  <input type="text" id="check-out" name="checkout" placeholder="Select a date">

    <label for="additional-guests">Additional Guests (max 10):</label>
    <input type="number" id="additional-guests" name="additionalguests" min="0" max="10">
<div>
    <button onclick="calculateTotal()" type="button">Calculate Total</button>

    <p>Chosen Date Range: &nbsp<span id="date-range-info"></span></p>
    <p>Accommodation Type: &nbsp<span id="accommodation-type"></span></p>
    <p>Total Fee: &nbsp<span id="total"></span></p>
 </p>

<?php

$sql = "SELECT * FROM booking_calendar";
$result = $conn->query($sql);

$unavailableDates = array();
while ($row = $result->fetch_assoc()) {
    $bookingStartDate = new DateTime($row['staycation_booking_dates']);
    $bookingEndDate   = new DateTime($row['staycation_booking_datesout']);
    $bookingEndDate->modify('+2 day'); // Increment by one day to include the end date

    while ($bookingStartDate < $bookingEndDate) {
        $unavailableDates[] = $bookingStartDate->format('Y-m-d');
        $bookingStartDate->modify('+1 day');
    }
}

?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
    function updateCheckoutMin(checkinDate) {
      flatpickr('#check-out', {
        enableTime: false,
        dateFormat: 'Y-m-d',
        minDate: checkinDate,  // Set minDate dynamically based on check-in date
        disable: <?php echo json_encode($unavailableDates, JSON_UNESCAPED_SLASHES); ?>,
        onValueUpdate: function (selectedDates, dateStr, instance) {
          updateDateColors(instance);
        }
      });
    }

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
            

            // Rest of your existing code for calculating total...
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


<input type="submit" name="sent" value="Proceed" class="btn bg-success ">

</form>

                <?php
                if (isset($_POST['sent'])){
                    $ref_id_no = "REF".date('mhdysi',time());
                    $select = $_POST['select'];
                    $checkin = $_POST['checkin'];
                    $checkout = $_POST['checkout'];
                    $accomodation = $_POST['accomodation'];
                    $daterange = $_POST['daterange'];
                    $additionalguests = $_POST['additionalguests'];
                    $feeTotal = $_POST['feeTotal'];

                    $sql_booking_details = "INSERT INTO book_details VALUES(null,'$ref_id_no','$select','$checkin','$checkout',
                    '$accomodation','$daterange',
                    '$additionalguests','$feeTotal','3','$u_id')";
                    if(mysqli_query($conn, $sql_booking_details)){ 
                        
                        
                    $sql_date_details = "INSERT INTO booking_calendar VALUES(null,'$checkin','$checkout','$ref_id_no')";
                    if(mysqli_query($conn, $sql_date_details)){ }
                    $_SESSION['ref_no'] = $ref_id_no;

                    echo '<script>
                    function myFunction() {
                      swal({
                        title: "Success!",
                        text: "Schedule is Successful.",
                        icon: "success",
                        type: "success"
                      }).then(function() {
                        window.location = "book-info.php";
                      });
                    }
                  </script>';
                } else {
                  echo '<script>
                    function myFunction() {
                      swal({
                        title: "Failed!",
                        text: "Schedule is Unsuccessful.",
                        icon: "error",
                        type: "error"
                      }).then(function() {
                        window.location = "book-details.php";
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
<!-- Add a message to display availability  //AVAILABILITY CALENDAR-->
<div id="availabilityMessage"></div>


        <!-- Add these links to include Bootstrap CSS and JavaScript -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>