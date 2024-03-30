<?php
$servername = "localhost";
$username = "root";
$password = "shanmathi12345";
$database = "students";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check if the POST request contains the 'owner_delete' parameter
if (isset($_POST['pm'])) {
    // Get the owner_id from the POST request
    $pm1 = $_POST['pm'];

    // Delete the row from the Owners table
    $sqlDelete = "DELETE FROM PerformanceMetrics WHERE metrics_id = '$pm1'";

    if ($conn->query($sqlDelete) === TRUE) {
        echo "Row deleted successfully";
    } else {
        echo "Error: " . $sqlDelete . "<br>" . $conn->error;
    }
} else {
    // Handle the case when 'owner_delete' is not set
    echo "Error: 'owner_delete' not set in the request.";
}

$metricsIdToDelete = filter_input(INPUT_POST, 'pm', FILTER_SANITIZE_NUMBER_INT);

if (!empty($metricsIdToDelete)) {
    // Perform the deletion in your database using $metricsIdToDelete
    // ...
    echo "Deletion successful";
} else {
    echo "Invalid input";
}


$conn->close();
?>
