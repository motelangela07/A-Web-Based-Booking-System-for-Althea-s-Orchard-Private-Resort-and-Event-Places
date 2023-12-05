<?php
session_start();

require_once "connect.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$checkin = $_GET['checkin'];
$checkout = $_GET['checkout'];

// Use prepared statements to prevent SQL injection
$sql = "SELECT * FROM book_details WHERE (booking_start BETWEEN ? AND ?) OR (booking_end BETWEEN ? AND ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $checkin, $checkout, $checkin, $checkout);
$stmt->execute();
$result = $stmt->get_result();

$response = array('available' => true);

if ($result->num_rows > 0) {
    $response['available'] = false;
}

header('Content-Type: application/json');
echo json_encode($response);

$stmt->close();
$conn->close();
?>
