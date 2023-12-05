<?php
session_start();

require_once "connect.php";


?>
<!DOCTYPE html>
<html>

<head>
<title>Althea's Orchard Private Resort & Event Place</title>
<!-- Add icon link -->
<link rel="icon" href="../img/favicon.ico" type="image/x-icon" style="width: 10%;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-3S8qu9lQWl2clqFAw5M4d1zmzKwVlE9Xjoi2yP9jITKKZ8B6fSh4nlIocY1FDkHl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/available.css">
     <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js"></script>
   
</head>
<body>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="../img/logo2.png" class="logo "alt="Logo">
            <div class="header-text">
    <span class="logo-text">Althea's Orchard Private Resort & 
        <br>Events Places</span>
</div>
</div>
        <a href="home.php" class="active">Dashboard</a>
        <i class="nav-icon fas fa-tachometer-alt"></i>
        </a>
        <a href="staycation.php" >Staycation Booking</a>
        <i class="nav-icon fas fa-calendar"></i>
        </a>
        <a href="eventplace.php">Event Place Booking</a>
        <i class="nav-icon fas fa-calendar"></i>
        </a>
        <a href="photoshoot.php">Photo Shoot Booking</a>
        <i class="nav-icon fas fa-calendar"></i>
        </a>
        <a href="management.php">User Management</a>
        <i class="nav-icon fas fa-users"></i>
        </a>
        <a href="available.php">Availability</a>
        <i class="nav-icon fas fa-users"></i>
        </a>
        <a href="reports.php">Reports</a>
        <i class="nav-icon fas fa-users"></i>
        </a>
        <a href="logout.php" >Logout</a>
        <i class="nav-icon fas fa-power-off"></i>
        </a>
    </div>
    
    <div class="content">
    <!-- Content for your admin section goes here -->
    <h1>Availability Calendar</h1>
    <p>Welcome to Althea's Availability Calendar Records.</p>

    <!-- Calendar container -->
    <div id="availabilityCalendar"></div>
</div>



<script>
    // Sample data for staycation, event, and photoshoot details
    var staycationData = [
        <?php
            $query = $conn->query("SELECT * FROM `book_details`");
            while($query_fetch1=$query->fetch_array()){
                $date_end1 = $query_fetch1['booking_end'];
                $givenDate1 = $date_end1;

                $dateTime1 = new DateTime($givenDate1);
                $dateTime1->modify('+1 day');
                $newDate1 = $dateTime1->format('Y-m-d');
        ?>
        { title: 'Booked - Staycation: <?php echo $query_fetch1['booking_ref_no']?>', start: '<?php echo $query_fetch1['booking_start']?>' , end: '<?php echo $newDate1?>', color: 'lightblue' },
        <?php } ?>
    ];

    var eventData = [
        <?php
            $query = $conn->query("SELECT * FROM `event_details`");
            while($query_fetch2=$query->fetch_array()){
                
        ?>
        { title: 'Booked - Event Place: <?php echo $query_fetch2['events_ref_no']?>', start: '<?php echo $query_fetch2['events_date']?>', color: 'lightcoral' },
        <?php } ?>
    ];

    var photoshootData = [
        <?php
            $query = $conn->query("SELECT * FROM `photo_details`");
            while($query_fetch3=$query->fetch_array()){
        ?>
        { title: 'Booked - Photoshoot: <?php echo $query_fetch3['photo_ref_no']?>', start: '<?php echo $query_fetch3['photo_date']?>', color: 'lightgreen' },
        <?php } ?>
    ];

    // Initialize FullCalendar
    var calendar = $('#availabilityCalendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        locale: 'en', // Set your desired locale
        editable: true, // Make the calendar editable
        eventSources: [
            {
                events: staycationData,
                color: 'red', // Customize color for staycation
                textColor: 'white' // Customize text color for staycation
            },
            {
                events: eventData,
                color: 'blue', // Customize color for event
                textColor: 'white' // Customize text color for event
            },
            {
                events: photoshootData,
                color: 'green', // Customize color for photoshoot
                textColor: 'white' // Customize text color for photoshoot
            }
        ],
        dayClick: function(date, jsEvent, view) {
            // Handle day click event (e.g., toggle availability)
            var isAvailable = !calendar.fullCalendar('getDate').hasTime();
            var eventData = {
                title: isAvailable ? 'Available' : 'Booked',
                start: date.format('YYYY-MM-DD'),
                color: isAvailable ? 'green' : 'red'
            };
            calendar.fullCalendar('renderEvent', eventData, true);
        },
        eventClick: function(calEvent, jsEvent, view) {
            // Handle event click event (e.g., edit availability)
            var isAvailable = calEvent.color === 'green';
            calEvent.title = isAvailable ? 'Booked' : 'Available';
            calEvent.color = isAvailable ? 'red' : 'green';
            calendar.fullCalendar('updateEvent', calEvent);
        }
    });
</script>


 
</body>
</html>
