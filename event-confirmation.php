<?php
session_start();

require_once "connect.php";

?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" media="print" href="css/print.css" />
<title>Althea's Orchard Private Resort & Event Place</title>
<!-- Add icon link -->
<link rel="icon" href="img/favicon.ico" type="image/x-icon" style="width: 10%;">
<link rel="stylesheet" href="your-fonts.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-3S8qu9lQWl2clqFAw5M4d1zmzKwVlE9Xjoi2yP9jITKKZ8B6fSh4nlIocY1FDkHl" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/event-confirmation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="bg" onload="myFunction()">
    <div class="container text-center printHidden">
        <div class="row align-items-start">
            <div class="col-12">
                <img src="img/logo.jpg" class="logo" alt="Logo">
                <div class="signup-link">
                <?php 
                if(isset( $_SESSION['login'])) {
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
                              window.location = "book-events.php";
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
                ?>
            </div>
        </div>
    </div>
</div>  

<?php
    $ref_no = $_SESSION['ref_no'];
        $query = $conn->query("SELECT * FROM event_info WHERE event_ref_no = '$ref_no'");
		$fetch = $query->fetch_array();    
        //photo  ref_no for photo_details
        $query1 = $conn->query("SELECT * FROM event_details WHERE events_ref_no = '$ref_no'");
		$fetch1 = $query1->fetch_array(); 
       //
        $query2 = $conn->query("SELECT * FROM event_info WHERE event_ref_no = '$ref_no'");
        $fetch2 = $query2->fetch_array(); 

        $query3 = $conn->query("SELECT * FROM event_info WHERE event_ref_no = '$ref_no'");
        $fetch3 = $query3->fetch_array(); 
        $query4 = $conn->query("SELECT * FROM event_info WHERE event_ref_no = '$ref_no'");
        $fetch4 = $query4->fetch_array(); 


    ?>
<body class="bg" onload="myFunction()">
    <div class="container text-center">
        <div class="row justify-content-start">
            <div class="col-12">
                <div id="bg1">
                    <div class="user-info-item">
                    <h4>Event Place Itinerary</h4>
            <b>Event Place Reference No. :</b>
            <?php echo $ref_no;?> <br>

            <b>Event Date:</b> 
            <?php echo $fetch1['events_date'];?> <br>

            <b>Event Time :</b>
            <?php echo $fetch1['events_time'];?> <br>

            <b>Total Fee :  </b> 
            <?php echo $fetch1['event_package'];?> <br>
            
                    <b> Full Name: </b>
                    <?php echo $fetch2['event_fname'];  ?> 
                    <?php echo $fetch2['event_lname'];  ?> <br>
                    <b>Contact : </b>
                    <?php echo $fetch2['event_contact'];  ?> <br>
                    <b>Address : </b>
                    <?php echo $fetch2['event_address'];  ?> <br>
                    <b>Email : </b>
                    <?php echo $fetch2['event_email'];  ?> <br>
         
    </div>
  
    <form class="user" method="POST" action="home.php" enctype="multipart/form-data" autocomplete="off">
 
<!-- ... your existing form fields ... -->

<!-- Checkbox for certification -->

<!-- Proceed button -->
<input type="submit" name="sent" value="Proceed" class="btn bg-success printHidden">
    
</button>

</form>
<button onclick="printSummary()" class="btn bg-primary printHidden">Print</button>

<script>
    function printSummary() {
        // Open a new window for printing
        var printWindow = window.open('', '_blank');
        
        // Write the content to the new window
        printWindow.document.write('<html><head><title>Staycation Booking Summary</title></head><body>');
        printWindow.document.write(document.getElementById('bg1').innerHTML);
        printWindow.document.write('</body></html>');

        // Close the new window after writing the content
        printWindow.document.close();

        // Trigger the print function
        printWindow.print();
    }
</script>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const startDateInput = document.getElementById('startDate');
            const endDateInput = document.getElementById('endDate');

            startDateInput.addEventListener('input', updateCalendar);
            endDateInput.addEventListener('input', updateCalendar);

            function updateCalendar() {
                // Get the selected start and end dates
                const startDate = new Date(startDateInput.value);
                const endDate = new Date(endDateInput.value);

                // Logic to check availability and update the calendar and note
                const isAvailable = checkAvailability(startDate, endDate);

                // Update the calendar (replace this with your logic or use a library)
                updateCalendarUI(startDate, endDate, isAvailable);

                // Update the availability note
                // This is just a placeholder, you can update it based on your logic
                const availabilityNote = document.getElementById('availabilityNote');
                availabilityNote.textContent = isAvailable ? 'This is available.' : 'This is not available.';
            }

            function checkAvailability(startDate, endDate) {
                // Implement your logic to check availability in the database
                // For example, check if the dates are already booked or reserved
                // Return true if available, false otherwise
                // Replace this with your actual implementation
                return true;
            }

            function updateCalendarUI(startDate, endDate, isAvailable) {
                // Implement your logic to update the calendar UI
                // You can use a library like FullCalendar or manually update the styles
                // For simplicity, let's change the background color for unavailable dates
                const calendarDates = document.querySelectorAll('.fc-day');

                calendarDates.forEach(date => {
                    const dateValue = new Date(date.getAttribute('data-date'));
                    if (dateValue >= startDate && dateValue <= endDate && !isAvailable) {
                        date.classList.add('unavailable');
                    } else {
                        date.classList.remove('unavailable');
                    }
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



    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
        <!-- Add these links to include Bootstrap CSS and JavaScript -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
