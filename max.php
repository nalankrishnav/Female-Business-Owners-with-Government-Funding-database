<?php
$servername = "localhost";
$username = "root";
$password = "shanmathi12345";
$database = "students";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to select rows with max profit and join Owners table
$query = "SELECT pm.*, first_name FROM PerformanceMetrics pm
          JOIN Owners o ON pm.owner_id = o.owner_id
          WHERE pm.profit = (SELECT MAX(profit) FROM PerformanceMetrics)";

$result = mysqli_query($conn, $query);

$dataArray = array();

while ($row = mysqli_fetch_assoc($result)) {
    $dataArray[] = $row;
}

// Close the database connection
mysqli_close($conn);

// Convert the PHP array to JSON and output
echo json_encode($dataArray);
?>
