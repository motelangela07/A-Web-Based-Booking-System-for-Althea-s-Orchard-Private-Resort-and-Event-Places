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
    <link rel="stylesheet" type="text/css" href="css/book-info.css">
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
                ?>
            </div>
        </div>
    </div>
</div>
<?php
    $ref_no = $_SESSION['ref_no'];
        $query = $conn->query("SELECT * FROM event_info WHERE event_ref_no = '$ref_no'");
		$fetch = $query->fetch_array();    
        
        
        $query1 = $conn->query("SELECT * FROM book_details WHERE booking_ref_no = '$ref_no'");
		$fetch1 = $query1->fetch_array();   
    ?>
<div class="container text-center">
    <div class="row justify-content-start">
        <?php echo $ref_no;?>
        <div class="col-12">
            <div id="bg1">
  
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" autocomplete="off">

                 <div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label class="fname">First Name:</label>
            <input type="text" name="fname" class="form-control" required>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="lname">Last Name:</label>
            <input type="text" name="lname" class="form-control" required>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label id="con">Contact:</label>
            <input type="text" pattern=".{11}" name="con" class="form-control"  maxlength="11"title="Must 11 numbers only" required>
   </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="pcode">Postal Code:</label>
            <input type="number" name="pcode" class="form-control" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="add">Address:</label>
            <input type="text" name="add" class="form-control" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="email">Email Address:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
    </div>
</div>
                    
<!-- Checkbox for certification -->
<div class="form-check">
    <input class="form-check-input" type="checkbox" name="certify" id="certifyCheckbox" required>
    <label class="form-check-label" for="certifyCheckbox">
        I certify that all the information provided above is complete, true, and correct.
    </label>
</div>

<!-- Proceed button -->
<input type="submit" name="sent" value="Proceed" class="btn bg-success ">
    
</button>

</form>

<?php
if (isset($_POST['sent'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $con = $_POST['con'];
    $pcode = $_POST['pcode'];
    $add = $_POST['add'];
    $email = $_POST['email'];
    $ref_no = $_SESSION['ref_no'];
    $sql_book_info = "INSERT INTO book_info VALUES(null,'$ref_no','$fname','$lname','$con','$pcode','$add','$email')";
    if(mysqli_query($conn, $sql_book_info)){ 

    echo '<script>
    function myFunction() {
      swal({
        title: "Success!",
        text: "Information is Successful.",
        icon: "success",
        type: "success"
      }).then(function() {
        window.location = "book-confirmation.php";
      });
    }
  </script>';
} else {
  echo '<script>
    function myFunction() {
      swal({
        title: "Failed!",
        text: "Information is Unsuccessful.",
        icon: "error",
        type: "error"
      }).then(function() {
        window.location = "book-info.php";
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