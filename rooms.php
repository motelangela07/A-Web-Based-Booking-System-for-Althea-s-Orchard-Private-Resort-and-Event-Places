<?php
session_start();

require_once "connect.php";
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Althea's Orchard Private Resort & Event Place</title>
<!-- Add icon link -->
<link rel="icon" href="img/favicon.ico" type="image/x-icon" style="width: 10%;">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/rooms.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="bg" onload="myFunction()">
    <div class="container text-center">
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
                <a href="login.php">SIGN IN/</a><span class="divider"> </span><a href="register.php">SIGN UP</a>
                <?php }?>
            </div>

            <div class="header-text">
    <span class="logo-text">Althea's Orchard Private Resort & 
        <br>Events Places</span>
</div>

<h1 class="main-heading">
    <a href="home.php" >HOME</a> |
    <a href="amenities.php">AMENITIES</a> |
    <a href="rooms.php"class="active">ROOMS</a> |
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

<div class="container text-center">
        <div class="row justify-content-start">
            <div class="col-12">
                <div id="bg1">
                <div class="centered-title">
                        <h2>BEDROOMS</h2>
                        <p class="amenities-paragraph">
                             "Cozy Comfort: Find Tranquility in Our Bedrooms."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center">
    <div class="row justify-content-center"> <!-- Changed justify-content-start to justify-content-center -->
        <div class="col-12">
            <div id="bg2">
                <div class="left-section">
                    <div class="left-title">
                        <h2>ROOM 1</h2>
                        <h6>(1st floor)</h6>
                            <li>Good for 4 pax</li> <!-- Changed ul to li for list items -->
                            <li>2 queen size beds</li>
                            <li>Vanity</li>
                            <li>1 lounge chair</li>
                            <li>Facing the pool & Batangas ridge</li>
                            <li>Have quick access to the pool area</li>
                            <li>Air conditioning</li>
                            <li>Lamp shade</li>
                            <li>Own bathroom with hot/cold shower</li>
                            <li>Free toiletries and towels</li>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- New section with a different background color -->
<div class="container text-center">
    <div class="row justify-content-center"> <!-- Changed justify-content-start to justify-content-center -->
        <div class="col-12">
            <div id="bg3">
                <div class="right-section">
                    <div class="right-title">
                        <h2>ROOM 2</h2>
                        <h6>(2nd floor)</h6>
                            <li>Good for 4 pax</li>
                            <li>2 queen size beds</li>
                            <li>Glass walls</li>
                            <li>Vanity</li>
                            <li>1 velvet bench</li>
                            <li>Balcony</li>
                            <li>Facing Balayan bay and Taal Volcano view</li>
                            <li>Lamp shade</li>
                            <li>Air conditioning</li>
                            <li>Own bathroom with hot/cold shower</li>
                            <li>Free toiletries and towels</li>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container text-center">
    <div class="row justify-content-center"> <!-- Changed justify-content-start to justify-content-center -->
        <div class="col-12">
            <div id="bg4">
                <div class="left-section">
                    <div class="left-title">
                        <h2>ROOM 3</h2>
                        <h6>(2nd floor)</h6>
                            <li>Good for 6 - 8 pax</li> <!-- Changed ul to li for list items -->
                            <li>2 queen size beds</li>
                            <li>Bigger balcony with table set & connecting to room 4</li>
                            <li>1 lounge chair</li>
                            <li>Air conditioning</li>
                            <li>Lamp shade</li>
                            <li>Own bathroom with hot/cold shower</li>
                            <li>Free toiletries and towels</li>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container text-center">
    <div class="row justify-content-center"> <!-- Changed justify-content-start to justify-content-center -->
        <div class="col-12">
            <div id="bg5">
                <div class="right-section">
                    <div class="right-title">
                        <h2>ROOM 4</h2>
                        <h6>(2nd floor)</h6>
                            <li>Good for 6 - 8 pax</li> <!-- Changed ul to li for list items -->
                            <li>2 queen size beds</li>
                            <li>Balcony facing the road</li>
                            <li>Air conditioning</li>
                            <li>Lamp shade</li>
                            <li>Own bathroom with hot/cold shower</li>
                            <li>Free toiletries and towels</li>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="main-footer">
        <p>Althea's Orchard Private Resort and Events Place<br>
            Barangay Mayasan<br>
            Lemery, Batangas<br>
            Philippines</p>
           <h6> <a><a> <span class="footer-icons"><i class="fas fa-phone"></i></span> 0949 038 5949<a><a><a><a>
            <a href="mailto:altheasorchard@yahoo.com"><span class="footer-icons"><i class="fas fa-envelope"></i></span> altheasorchard@yahoo.com</a><br>
        </h6>

    
    </footer>
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
