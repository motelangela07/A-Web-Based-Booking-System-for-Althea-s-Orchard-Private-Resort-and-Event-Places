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
<link rel="stylesheet" type="text/css" href="css/amenities.css">
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
    <a href="amenities.php"class="active">AMENITIES</a> |
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
 <!-- bg1 -->
    <div class="container text-center">
        <div class="row justify-content-start">
            <div class="col-12">
                <div id="bg1">
                     <div class="centered-title">
                         <h2>AMENITIES</h2>
                        <p class="amenities-paragraph">
                            Explore our exceptional amenities designed to make your stay
                             unforgettable. Discover a world of relaxation, recreation, 
                             and indulgence amid lush surroundings. Whether you seek a
                              tranquil retreat or an eventful gathering, our resort offers
                               a wide range of amenities to suit your every need.
                                Dive into the details below and envision your perfect getaway.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- bg2 -->
<div class="container text-center">
    <div class="row justify-content-start">
        <div class="col-12">
            <div id="bg2">
                <div class="right-section">
                    <div class="right-title">
                        <h2>INFINITY POOL & KIDDIE POOL</h2>
                        <p class="infinity-paragraph">
                            <br>Experience Elevated Relaxation: Enjoy an overlooking view of 
                            <br>Taal volcano while relaxing in our 3ft, 4ft, and 6ft depths
                           <br> infinity pool with a kiddie pool for kids, both equipped with 
                           <br> a heater to ensure your comfort, even in cooler weather.
                        </p>
                    </div>
                    <img src="img/a2.jpg" class="right-image" alt="Right Image">
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- bg3 -->
<div class="container text-center">
    <div class="row justify-content-start">
        <div class="col-12">
            <div id="bg3">
                <div class="left-section">
                    <div class="left-title">
                        <h2>FULLY-EQUIPPED KITCHEN</h2>
                        <p class="kitchen-paragraph">
                           <br> Experience Culinary Freedom: Our fully-equipped kitchen,
                           <br> with high-quality appliances, is designed for your
                           <br> staycation pleasure. You can prepare delicious meals with
                           <br>  ease during your relaxing stay at Althea's Orchard.
                        </p>
                    </div>
                    <img src="img/a3.jpg" class="left-image" alt="Left Image">
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- bg4 -->
 <div class="container text-center">
    <div class="row justify-content-start">
        <div class="col-12">
            <div id="bg4">
                <div class="right-section">
                    <div class="right-title">
                        <h2>BONFIRE</h2>
                        <p class="bonfire-paragraph">
                            <br>Experience Elevated Relaxation: Enjoy an overlooking view of 
                            <br>Taal volcano while relaxing in our 3ft, 4ft, and 6ft depths
                           <br> infinity pool with a kiddie pool for kids, both equipped with 
                           <br> a heater to ensure your comfort, even in cooler weather.
                        </p>
                    </div>
                    <img src="img/a4.jpg" class="right-image" alt="Right Image">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bg5 -->
<div class="container text-center">
    <div class="row justify-content-start">
        <div class="col-12">
            <div id="bg5">
                <div class="left-section">
                    <img src="img/a5.jpg" class="left-image" alt="Left Image">
                    <div class="left-title">
                        <h2>HOT KAWA BATH</h2>
                        <p class="kawa-paragraph">
                           <br> Relax and Share the Serenity: Our Kawa Bath is a blissful
                           <br> retreat  where you can take turns with your companions, all for
                            <br>just 300 pesos per hour. Immerse yourself in this unique experience
                            <br> and enjoy the soothing ambiance at Althea's Orchard.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bg6 -->
<div class="container text-center">
    <div class="row justify-content-start">
        <div class="col-12">
            <div id="bg6">
                <div class="right-section">
                    <div class="right-title">
                        <h2>OUTDOOR TOILET & SHOWER AREA</h2>
                        <p class="shower-paragraph">
                           <br> Our outdoor toilet and shower areas are designed for your convenience,
                            <br> allowing you to freshen up and rejuvenate while enjoying the great
                             <br> outdoors at Althea's Orchard. Stay comfortable and make the most
                              <br> of your time by the pool.
                        </p>
                    </div>
                    <img src="img/a6.jpg" class="right-image" alt="Right Image">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bg7 -->
<div class="container text-center">
    <div class="row justify-content-start">
        <div class="col-12">
            <div id="bg7">
                <div class="left-section">
                    <img src="img/a7.jpg" class="left-image" alt="Left Image">
                    <div class="left-title">
                        <h2>TREE HOUSE</h2>
                        <p class="house-paragraph">
                           <br> Our tree house is not just a place to stay; it's an experience.
                            <br>With breathtaking views and a spacious interior, it's the
                           <br> perfect haven for relaxation and creating unforgettable moments.
                           <br> Your treetop escape awaits.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bg8 -->
<div class="container text-center">
    <div class="row justify-content-start">
        <div class="col-12">
            <div id="bg8">
                <div class="right-section">
                    <div class="right-title">
                        <h2>KOI POND & MINI FARM</h2>
                        <p class="mini-paragraph">
                            <br>Take a leisurely stroll around our enchanting koi pond and mini farm.
                             <br>Immerse yourself in the peaceful ambiance of the pond while enjoying
                              <br>the charm of our mini farm. It's a serene experience for all ages,
                               <br>where nature's wonders come to life.
                        </p>
                    </div>
                    <img src="img/a8.jpg" class="right-image" alt="Right Image">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bg9 -->
<div class="container text-center">
    <div class="row justify-content-start">
        <div class="col-12">
            <div id="bg9">
                <div class="left-section">
                    <img src="img/a9.jpg" class="left-image" alt="Left Image">
                    <div class="left-title">
                        <h2>GARDEN AND PICNIC AREA</h2>
                        <p class="picnic-paragraph">
                            <br>Our garden and picnic area invite you to bask in the beauty of nature.
                            <br> Stroll through vibrant blooms, find the perfect spot for a picnic,
                             <br> and savor the serenity of the great outdoors. It's the ideal setting
                             <br> for relaxation and creating lasting memories with loved ones.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bg10 -->
<div class="container text-center">
    <div class="row justify-content-start">
        <div class="col-12">
            <div id="bg10">
                <div class="right-section">
                    <div class="right-title">
                        <h2>SWING AREA</h2>
                        <p class="swing-paragraph">
                           <br> Our swing area is the perfect spot to let your cares drift away.
                             <br>Whether you're looking for a peaceful moment alone or a playful
                             <br> escape with friends and family, our swings offer a touch of 
                              <br>whimsy and relaxation amid our beautiful surroundings. Come, 
                             <br> swing into serenity and make cherished memories.
                        </p>
                    </div>
                    <img src="img/a10.jpg" class="right-image" alt="Right Image">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bg11 -->
<div class="container text-center">
    <div class="row justify-content-start">
        <div class="col-12">
            <div id="bg11">
                <div class="left-section">
                    <img src="img/a11.jpg" class="left-image" alt="Left Image">
                    <div class="left-title">
                        <h2>OUTDOOR TERRACE AND ROOF TOP</h2>
                        <p class="roof-paragraph">
                           <br> Unwind on the terrace, surrounded by lush landscapes, or ascend
                             <br>to the rooftop for stunning panoramic views. Whether you're
                              <br>seeking a serene escape or a picturesque vantage point, our
                              <br> outdoor spaces offer the perfect backdrop for your moments of
                               <br> relaxation and inspiration.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bg12 -->
<div class="container text-center">
    <div class="row justify-content-start">
        <div class="col-12">
            <div id="bg12">
                <div class="right-section">
                    <div class="right-title">
                        <h2>ENTERTAINMENT ROOM</h2>
                        <p class="entertainment-paragraph">
                           <br> Our music room at Althea's Orchard is your sanctuary for sound and fun.
                            <br> Sing your heart out with our videoke play games, read books, or groove
                            <br> to your favorite tunes with Bluetooth speakers. It's your space to create
                            <br> memorable musical moments, where the sound of joy fills the air.
                        </p>
                    </div>
                    <img src="img/a12.jpg" class="right-image" alt="Right Image">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bg13 -->
<div class="container text-center">
    <div class="row justify-content-start">
        <div class="col-12">
            <div id="bg13">
                <div class="left-section">
                    <img src="img/a13.jpg" class="left-image" alt="Left Image">
                    <div class="left-title">
                        <h2>LIVING AREA</h2>
                        <p class="living-paragraph">
                            <br>Enjoy cozy moments with our television, complete with Netflix for
                            <br> your entertainment. Whether you're seeking a quiet escape or a fun
                            <br>  movie night, our living area is your retreat in style.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bg14 -->
<div class="container text-center">
    <div class="row justify-content-start">
        <div class="col-12">
            <div id="bg14">
                <div class="right-section">
                    <div class="right-title">
                        <h2>PARKING SPACES</h2>
                        <p class="parking-paragraph">
                          <br> Convenient Parking: At Althea's Orchard, we understand the importance of
                          <br> hassle-free parking. Our ample and secure parking spaces provide you with
                          <br> peace of mind, ensuring a stress-free arrival and departure during your visit.
                           <br>Your convenience is our priority.
                        </p>
                    </div>
                    <img src="img/a14.jpg" class="right-image" alt="Right Image">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bg15 -->
<div class="container text-center">
    <div class="row justify-content-start">
        <div class="col-12">
            <div id="bg15">
                <div class="left-section">
                    <img src="img/a15.jpg" class="left-image" alt="Left Image">
                    <div class="left-title">
                        <h2>LOUNGE AREA</h2>
                        <p class="lounge-paragraph">
                           <br>Our lounge area at Althea's Orchard is designed for your utmost comfort.
                            <br>Whether you seek a moment of tranquility or a cozy spot to socialize, our
                            <br>inviting lounge provides the perfect setting. It's your space to unwind,
                            <br>connect, and make the most of your stay.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bg16 -->
<div class="container text-center">
    <div class="row justify-content-start">
        <div class="col-12">
            <div id="bg16">
                <div class="right-section">
                    <div class="right-title">
                        <h2>POOLSIDE LOUNGE</h2>
                        <p class="poolside-paragraph">
                        <br>Our poolside lounge, equipped with a plush furniture set, invites you to savor 
                        <br>your time, whether in solitary contemplation or with cherished company by your side
                        </p>
                    </div>
                    <img src="img/a16.jpg" class="right-image" alt="Right Image">
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
