<?php
session_start();

require_once "connect.php";
?>
<html>

<head>
<title>Althea's Orchard Private Resort & Event Place</title>
<!-- Add icon link -->
<link rel="icon" href="img/favicon.ico" type="image/x-icon" style="width: 10%;">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styles.css">
  
  <style>
    body {
        background-image: url("../img/logo2.png");
        background-size: 55% 100%;
        background-repeat: no-repeat;
        margin-left: 10%;
        font-weight: bold;
       
       
        color: black; /* Set default text color to white */
    }

    .mail {
      font-weight: bold;
        color: black; /* Set label text color to white */
    }

    h1 {
      margin-left: 50%;
        color: black; /* Green color for the header */
    }

    .btn {
        color: black; /* White text color for buttons */
    }

    .btn.bg-success {
        background-color: #28a745; /* Green background color for success button */
    }
</style>
</head>
<body class = "bg"onload="myFunction()" >
<div class="container text-center">
  <div class="row align-items-start">
    <div class="col">
    
    </div>
    <div class="col">
        <br>
    <h1 style="font-size: 28px">
    
    </h1>
    </div>
  </div>
</div>


<center>
<h1>REGISTRATION FORM</h1>

</center>
<div class="container "style="margin-top: 10px;">
  <div class="row justify-content-start">
  <div class="col-6 ">
    
  </div>
  <div class="col-6 ">


<form method = "POST"
action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
enctype = "multipart/form-data" autocomplete="off"
>

  <label >Username:</label><br>
  <input type="text"  name="uname"class="form-control" required>
  <label class = "Add" >Address:</label>
  <input type="text" name="add"class="form-control" required >
  <label id = "Con" >Contact:</label><br>
  <input type="text" pattern=".{11}" name="con" class="form-control"   maxlength="11"title="Must 11 numbers only" required>
  <label class="mail">Email:</label>
  <input type="email" name="email"class="form-control"required>
  <label for="pass">Password:</label>
  <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="pass" class="form-control" required id="passInput">
  <input type="checkbox" onclick="togglePasswordVisibility()"> Show Password<br>
 <input type="submit" name="sent" value="Submit"class=" btn bg-success"style="float: left;">
  
</form> 
<?php
if (isset($_POST['sent'])){

 $uname =   $_POST['uname'];
 $add =   $_POST['add'];
 $con =   $_POST['con'];
 $email =   $_POST['email'];
 $pass =   $_POST['pass'];

            $sql_user="INSERT INTO `admin_account` VALUES(null,'$uname','$add','$con','$email','$pass')";
            if(mysqli_query($conn, $sql_user)){
                echo '<script>function myFunction() {
                    swal({
                    title: "Success!",
                    text: "Successfully Registered.",
                      icon: "success",
                    type: "success"
                    }).then(function() {
                    window.location = "login.php";
                    });}
                </script>';
             }else{
                echo '<script>function myFunction() {
                    swal({
                    title: "Failed!",
                    text: "Failed to Register.",
                      icon: "error",
                    type: "error"
                    }).then(function() {
                    window.location = "user.php";
                    });}
                </script>';
            }
        }
   
?>
<script>
    function togglePasswordVisibility() {
      const passInput = document.getElementById("passInput");
      passInput.type = passInput.type === "password" ? "text" : "password";
    }
  </script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>


