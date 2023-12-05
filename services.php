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
<link rel="stylesheet" href="your-fonts.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/services.css">
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
    <a href="rooms.php">ROOMS</a> |
    <a href="events.php">EVENTS</a> |
    <a href="services.php"class="active">SERVICES</a> 
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
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row justify-content-start">
            <div class="col-12">
                <div id="bg2">
                <div class="centered-title">
                        <h2>SERVICES</h2>
                        <p class="services-paragraph">
                        <br> "Althea's Orchard: Where Memories Are Made, Beauty Is Captured,
                            <br> and Realaxation Begins."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center">
    <div class="row justify-content-center"> <!-- Changed justify-content-start to justify-content-center -->
        <div class="col-12">
            <div id="bg3">
                <h2 class="background-text"><b>GARDEN VENUE</b>
                <br>"Where Nature Meets Celebration"</h2>
            </div>
        </div>
    </div>
</div>
<div class="container text-center">
    <div class="row justify-content-center"> <!-- Changed justify-content-start to justify-content-center -->
        <div class="col-12">
            <div id="bg4">
            <Br><b>
            <h2>PACKAGE A</h2>
                        <h6>PHP 50,000</h6>
                        <Br><b>
                        <h5>(OUTDOOR)</h5>
                            <li><b> 5 hours use of garden venue</li> <!-- Changed ul to li for list items -->
                            <li> For ceremony up to 100 pax or for reception up to 60 pax</li>
                            <li> Includes stage with a platform at the side, carpeted grass, rustic door, bridge, and local lights.</li>
                            <li> No corkage fees</li>
                            <li> Bundle with overnight stay at Villa Althea for 20 pax (on the day of the event, check in: 2 PM; check out: 12 NN)</li>
                        </li>
            </div>
        </div>
    </div>
</div>
<div class="container text-center">
    <div class="row justify-content-center"> <!-- Changed justify-content-start to justify-content-center -->
        <div class="col-12">
            <div id="bg5">
                <h2 class="background-text"><b>GRAND PAVILION</b>
                <br>"Where Elegance Meets Your 
                <br>Special Moments."</h2>
            </div>
        </div>
    </div>
</div>
<div class="container text-center">
    <div class="row justify-content-center"> <!-- Changed justify-content-start to justify-content-center -->
        <div class="col-12">
            <div id="bg6">
            <Br><b>
            <h2>PACKAGE B</h2>
                        <h6>PHP 60,000</h6>
                        <Br><b>
                        <h5>(INDOOR)</h5>
                            <li><b> 5 hours use of air-conditioned grand pavilion</li> <!-- Changed ul to li for list items -->
                            <li>  Additional 2 hours for suppliers setup / ingress</li>
                            <li>  Up to maximum of 150 guests</li>
                            <li>  No corkage fees</li>
                           <br> <h5>AMENITIES</h5>
                            <li>  Comfort room for men & women</li>
                            <li>  1 kitchen / caterer preparation room</li>
                            <li>  Cocktail area / Photo booth area</li>
                            <li>  Bridal make up room</li>
                        </li>
            </div>
        </div>
    </div>
</div>
<div class="container text-center">
    <div class="row justify-content-center"> <!-- Changed justify-content-start to justify-content-center -->
        <div class="col-12">
            <div id="bg7">
            <Br><b>
            <h2>PACKAGE C</h2>
                        <h6>PHP 70,000</h6>
                        <h5>(INDOOR)</h5>
                            <li> 5 hours use of air-conditioned grand pavilion</li> <!-- Changed ul to li for list items -->
                            <li> Additional 2 hours for suppliers setup / ingress</li>
                            <li> Up to maximum of 150 guests</li>
                            <li> No corkage fees</li>
                            <li> Bundled with overnight stay at Villa Althea for pax (on the day of the event, check in: 2 PM;)</li>
                            <br> <h5>AMENITIES</h5>
                            <li> Comfort room for men & women</li>
                            <li> 1 kitchen / caterer preparation room</li>
                            <li> Cocktail area / Photo booth area</li>
                            <li> Bridal make up room</li>
                        </li>
            </div>
        </div>
    </div>
</div>
<div class="container text-center">
    <div class="row justify-content-center"> <!-- Changed justify-content-start to justify-content-center -->
        <div class="col-12">
            <div id="bg8">
            <Br><b>
            <h2>PACKAGE D</h2>
                        <h6>PHP 80,000</h6>
                        <h5>(INDOOR + OUTDOOR)</h5>
                            <li><b> 5 hours use of air-conditioned grand pavilion up to 150 pax</li> <!-- Changed ul to li for list items -->
                            <li> 3 hours use of garden venue for ceremony, up to 100 pax</li>
                            <li> Additional 2 hours for suppliers setup / ingress</li>
                            <li> Ceremony and photo shoot</li>
                            <li> No corkage fees</li>
                            <li> Bundled with overnight stay at Villa Althea for 20 pax (on the day of the event, check in: 2 PM; check out: 12NN)</li>                           
                            <br> <h5>AMENITIES</h5>
                            <li> Comfort room for men & women</li>
                            <li> 1 kitchen / caterer preparation room</li>
                            <li> Cocktail area / Photo booth area</li>
                            <li> Bridal make up room</li>
                        </li>
            </div>
        </div>
    </div>
</div>
<div class="container text-center">
    <div class="row justify-content-center"> <!-- Changed justify-content-start to justify-content-center -->
        <div class="col-12">
            <div id="bg9">
                <h2 class="background-text"><b>PHOTO SHOOT VENUE</b>
                <br>"Our Venue, Your Masterpiece."</h2>
            </div>
        </div>
    </div>
</div>
<div class="container text-center">
    <div class="row justify-content-center"> <!-- Changed justify-content-start to justify-content-center -->
        <div class="col-12">
            <div id="bg10">
            <Br><b>
            <h2>EXCLUSIVE PHOTO SHOOT</h2>
                        <h6>PHP 9,000</h6>
                            <Br><b>       
                            <li> 6 hours photo shoot around the whole party</li>
                            <li> Free use of 1 air-conditioned preparation room</li>
                            <li> Lounge Area</li>
                        </li>
            </div>
        </div>
    </div>
</div>
<div class="container text-center">
    <div class="row justify-content-center"> <!-- Changed justify-content-start to justify-content-center -->
        <div class="col-12">
            <div id="bg11">
                <h2 class="background-text"><b>STAYCATION</b>
                <br>"Recharge, Relax, Repeat: Your 
                <br>Staycation Haven."</h2>
            </div>
        </div>
    </div>
</div>
<div class="container text-center">
    <div class="row justify-content-center"> <!-- Changed justify-content-start to justify-content-center -->
        <div class="col-12">
            <div id="bg12">
            <h2>STAYCATION</h2>
                       <h5>(EASTER, CHRISTMAS, & NEW YEAR)
                        <br><h6>PHP 27,000</h6>
                        <h5>(WEEKDAYS)
                        <br><h6>PHP 23,500</h6>
                        </h5>
                        </h5>
                        <h5>(WEEKENDS)
                        <br><h6>PHP 25,000</h6>
                        </h5>
                         <h6>CHECK IN: 2:00 PM</h6>
                             <h6>CHECK OUT: 12:00 NN</h6>
                            <li><b>For additional pax, pay 500 per pax
                                (Limited to 5-10 excess only for comfy sleeping capacity)</li> <!-- Changed ul to li for list items -->
                            <li> Kids below 6 years old can stay for free</li>
                            <li> Exclusive and private access of all amenities and air-conditioned rooms</li>
                            <li> Complimentary morning kapeng barako and  FREE 1 gallon of mineral water</li>
                            <li> Outdoor BBQ grill (just bring charcoal)</li>
                            <li> WIFI Fiber (150Mbps)</li>
                        </li>
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
