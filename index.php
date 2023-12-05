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
    rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Additional link for Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-3S8qu9lQWl2clqFAw5M4d1zmzKwVlE9Xjoi2yP9jITKKZ8B6fSh4nlIocY1FDkHl" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="bg">
    <!-- Welcome Modal -->
    <div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="welcomeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="img/logo1.jpg" alt="Logo" class="img-fluid">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h5 class="modal-title" id="welcomeModalLabel">Welcome to Althea's Booking System</h5><br>
                     </div> <!-- GIF below the <p> -->
                        <div class="gif-container">
                            <img src="https://media.giphy.com/media/klES1W6eoE5k0xTPCk/giphy.gif" alt="Loading GIF">
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                    <marquee style="background-color: rgb(119, 176, 241);color: white;">  
              <text style="margin-left: 300px;"> Welcome to Althea's Orchard Private Resort & Events Place.
              We offer : Tranquil Oasis for Relaxation - Immersive Natural Beauty - Tailored Wellness Retreats -
              Sustainable Eco-Friendly Practices - Picturesque Event Settings - and - Exceptional Concierge Services.</text>
           </p></marquee>
        </div>
    </h1>
</div>
</div>
</div>
<!-- Sliding Pictures (Carousel) in bg1 -->
<div id="bg1" class="carousel slide" data-ride="carousel" data-interval="3000">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/s1.jpg" class="d-block w-40" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="img/s3.jpg" class="d-block w-40" alt="Slide 2">
        </div>
        <div class="carousel-item">
            <img src="img/r1.jpg" class="d-block w-40" alt="Slide 3">
        </div>
        <div class="carousel-item">
            <img src="img/a2.jpg" class="d-block w-40" alt="Slide 3">
        </div>
        <div class="carousel-item">
            <img src="img/s2(3).jpg" class="d-block w-40" alt="Slide 3">
        </div>
        <div class="carousel-item">
            <img src="img/s2.jpg" class="d-block w-40" alt="Slide 3">
        </div>
        <div class="carousel-item">
            <img src="img/q1.jpg" class="d-block w-40" alt="Slide 3">
        </div>
        <div class="carousel-item">
            <img src="img/q2.jpg" class="d-block w-40" alt="Slide 3">
        </div>
        <div class="carousel-item">
            <img src="img/x3.jpg" class="d-block w-40" alt="Slide 3">
        </div>
        <!-- Add more slides here --> </div>
    <!-- Navigation arrows -->
    <a class="carousel-control-prev" href="#bg1" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#bg1" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
    </div>
</div>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row justify-content-start">
            <div class="col-12">
                <div id="bg2">
                <div class="centered-title"></div>
                        <h2>GALLERY</h2>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- New section with a different background color -->
<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-4">
            <img src="img/a3.jpg" alt="Picture 1" class="img-fluid" data-toggle="modal" data-target="#myModal1">
        </div>
        <div class="col-4">
            <img src="img/a5.jpg" alt="Picture 2" class="img-fluid" data-toggle="modal" data-target="#myModal2">
        </div>
        <div class="col-4">
            <img src="img/b4.jpg" alt="Picture 3" class="img-fluid" data-toggle="modal" data-target="#myModal3">
        </div>
        <div class="col-4">
            <img src="img/CR.jpg" alt="Picture 4" class="img-fluid" data-toggle="modal" data-target="#myModal4">
        </div>
        <div class="col-4">
            <img src="img/e4(1).jpg" alt="Picture 5" class="img-fluid" data-toggle="modal" data-target="#myModal5">
        </div>
        <div class="col-4">
            <img src="img/e1.jpg" alt="Picture 6" class="img-fluid" data-toggle="modal" data-target="#myModal6">
        </div>
        <div class="col-4">
            <img src="img/am10.jpg" alt="Picture 7" class="img-fluid" data-toggle="modal" data-target="#myModal7">
        </div>
        <div class="col-4">
            <img src="img/am10(2).jpg" alt="Picture 8" class="img-fluid" data-toggle="modal" data-target="#myModal8">
        </div>
        <div class="col-4">
            <img src="img/a12.jpg" alt="Picture 9" class="img-fluid" data-toggle="modal" data-target="#myModal9">
        </div>
        <div class="col-4">
            <img src="img/s1(1).jpg" alt="Picture 10" class="img-fluid" data-toggle="modal" data-target="#myModal10">
        </div>
        <div class="col-4">
            <img src="img/g1.jpg" alt="Picture 11" class="img-fluid" data-toggle="modal" data-target="#myModal11">
        </div>
        <div class="col-4">
            <img src="img/rm4(1).jpg" alt="Picture 12" class="img-fluid" data-toggle="modal" data-target="#myModal12">
        </div>
    </div>
</div>

<!-- Modal for Picture 1 -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Picture 1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="img/a3.jpg" alt="Picture 1" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<!-- Modal for Picture 2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Picture 2</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="img/a5.jpg" alt="Picture 2" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<!-- Modal for Picture 3 -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Picture 3</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="img/b4.jpg" alt="Picture 3" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- Modal for Picture 3 -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Picture 4</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="img/CR.jpg" alt="Picture 4" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- Modal for Picture 3 -->
<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Picture 5</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="img/e4(1).jpg" alt="Picture 5" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- Modal for Picture 3 -->
<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Picture 6</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="img/e1.jpg" alt="Picture 6" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- Modal for Picture 3 -->
<div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Picture 7</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="img/am10.jpg" alt="Picture 7" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- Modal for Picture 3 -->
<div class="modal fade" id="myModal8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Picture 8</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="img/am10(2).jpg" alt="Picture 8" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- Modal for Picture 3 -->
<div class="modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Picture 9</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="img/a12.jpg" alt="Picture 9" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- Modal for Picture 3 -->
<div class="modal fade" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Picture 10</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="img/s1(1).jpg" alt="Picture 10" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- Modal for Picture 3 -->
<div class="modal fade" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Picture 11</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="img/g1.jpg" alt="Picture 11" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- Modal for Picture 3 -->
<div class="modal fade" id="myModal12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Picture 12</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="img/rm4(1).jpg" alt="Picture 12" class="img-fluid">
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

    <script src="script.js"></script>
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
  <!-- JavaScript and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        
        // Show welcome modal after the page has loaded
        $(document).ready(function () {
            $('#welcomeModal').modal('show');
            // Hide loading icon after the modal is displayed
            document.getElementById('loading').style.display = 'none';
        });
    </script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

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
<!-- Add Font Awesome for the spinner icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</body>

</html>