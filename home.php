<?php
session_start();

require_once "connect.php";
unset($_SESSION['selectedService']);

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
                    <h1 class="background-text">"Book Your Escape, Create Your Story:
                        <br>Althea's Orchard Awaits"</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row justify-content-start">
            <div class="col-12">
                <div id="bg2">
                <div class="centered-title">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row justify-content-start">
            <div class="col-12">
                <div id="bg3">
                <div class="centered-title">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center">
    <div class="row justify-content-start">
        <div class="col-12">
            <div id="bg4">
                <video controls>
                    <source src="video/h1.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="centered-title">
                    <h1>Video Tour</h1>
                    <p class="video-paragraph">Explore ALthea's Orchard Resort like never before.
                         Walk through lush gardens, luxurious accommodations, and event spaces
                          from your screen. Experience the resort's beauty, amenities, and ambiance,
                           and easily make reservations. Get a taste of what awaits you, backed by 
                           guest reviews and testimonials, and plan your visit with confidence.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container text-center"></div>
    <div class="row justify-content-start">
        <div class="col-12">
            <div id="bg5">
                <div class="centered-title"></div>
                <h2>Frequently Asked Questions</h2>
            </div>
        </div>
    </div>
</div>


<div class="container1">
    <div class="row1">
        <div class="question" onclick="toggleAnswer('q1')">What events can be hosted at Althea's Orchard? </div>
        <div class="answer" id="q1">Weddings, birthdays, baptismals, family or friends outings, and corporate events.</div>

        <div class="question" onclick="toggleAnswer('q2')">What are the check-in and check-out times?</div>
        <div class="answer" id="q2">Check-in is 02:00 PM and check-out is 12:00 NN</div>

        <div class="question" onclick="toggleAnswer('q3')">Are pets allowed at Althea's Orchard?</div>
        <div class="answer" id="q3">Yes, Althea’s Orchard is pet-friendly.</div>

        <div class="question" onclick="toggleAnswer('q4')">Is there parking available?</div>
        <div class="answer" id="q4">Yes, we have 3 parking areas.</div>

        <div class="question" onclick="toggleAnswer('q5')">Can I modify or upgrade my reservation?</div>
        <div class="answer" id="q5">Yes, just simply visit our website and look for the History in the upper left corner.</div>
    </div>

    <div class="row2">
        <div class="question" onclick="toggleAnswer('q6')">Are there any age restrictions for guests?</div>
        <div class="answer" id="q6">None, Althea’s Orchard is open for all ages..</div>

        <div class="question" onclick="toggleAnswer('q7')">Is there Wi-Fi available, and is it free?</div>
        <div class="answer" id="q7"> Yes, we have a 150 mbps fiber internet and it is free</div>

        <div class="question" onclick="toggleAnswer('q8')">Are there nearby attractions?</div>
        <div class="answer" id="q8">Yes, we are close to Fantasy World, Tagaytay, and to the famous beaches and churches in Calatagan and Nasugbu.</div>

        <div class="question" onclick="toggleAnswer('q9')">Can I request a late check-out?</div>
        <div class="answer" id="q9">Unfortunately, no. The check-out time is strictly 12 NN because we have to prepare the property for the next guest.</div>

        <div class="question" onclick="toggleAnswer('q10')">What is the policy on outside food and beverages?</div>
        <div class="answer" id="q10">The guests can bring outside food and beverages without corkage fees.</div>
    </div>
</div>
<!-- Add more rows as needed -->

<div class="container text-center"></div>
    <div class="row justify-content-start">
        <div class="col-12">
            <div id="bg6">
                <div class="centered-title"></div>
                <h2>TESTIMONIALS</h2>
            </div>
        </div>
    </div>
</div>
<div class="testimonial-container">
    <div class="testimonial">
        <img src="img/pic9.jpg" alt="Guest 1">
        <h3>Cam & Rannie Vlog</h3>
            <p>"Share ko lang itong mala-paraisong view ng Althea's Orchard Private Resort & Events Place dito sa Lemery Batangas. Grabe meron palang ganito dito. 😍"</p>  
    </div>

    <div class="testimonial">
        <img src="img/pic9.jpg" alt="Guest 2">
        <h3>Cherry Bells</h3>
        <p>"Althea's Orchard Private Resort & Events Place is the perfect 
            minimalist designer venue to host your events and parties.
             Enjoy a kawa bath and lounge in their pool with a view of taal lake. 
             The Outdoor Garden Venue and Indoor Pavilion is open to all kinds 
             of events and some of their packages are bundled with overnight stay. 
             This resort is situated along Diokno highway Tagaytay-Lemery boundary,
             near Fantasy World. <br>
             P.S We super enjoyed our stay. Dito kami nag moment ng mga blogger/content
              creator friends ko. Super fun girl bonding."</p>
    </div>

    <div class="testimonial">
        <img src="img/pic9.jpg" alt="Guest 3">
        <h3>Henie Bayas Punzalan</h3>
        <p>"Magandang tanawin… kaysarap pagmasdan. Nakakawala ng stress…kaya ang sarap balik balikan..Althea's Orchard Private Resort & Events Place"</p>
    </div>
</div>

<div class="testimonial-container">
    <div class="testimonial-card">
        <img src="img/pic9.jpg" alt="Guest 4">
        <div class="card-content">
            <h3>Mimi Lalonga del Rosario</h3>
            <p>"'PAMPERING Me Myself and I,,,,love this place💋♥️💋♥️💋♥️💋♥️💋'"</p>
        </div>
    </div>

    <div class="testimonial-card">
        <img src="img/pic9.jpg" alt="Guest 5">
        <div class="card-content">
            <h3>Love, Nikki</h3>
            <p>"A 4-bedroom modern designer resort villa with infinity pool and a million dollar view! ✨🍃"</p>
        </div>
    </div>

    <div class="testimonial-card">
        <img src="img/pic9.jpg" alt="Guest 6">
        <div class="card-content">
        <h3>OBR Lourdes</h3>
        <p>"'Grabe! lakas maka-Fairytale ng resort na to. Breathtaking!"</p>
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
 <script>
        function toggleAnswer(questionId) {
            var answer = document.getElementById(questionId);
            if (answer.style.display === "none") {
                answer.style.display = "block";
            } else {
                answer.style.display = "none";
            }
        }
    </script>


        <!-- Add these links to include Bootstrap CSS and JavaScript -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
