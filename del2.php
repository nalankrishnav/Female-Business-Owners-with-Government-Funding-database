<?php
$servername = "localhost";
$username = "root";
$password = "shanmathi12345";
$database = "students";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check if the POST request contains the 'owner_delete' parameter
if (isset($_POST['business_delete'])) {
    // Get the owner_id from the POST request
    $business_delet = $_POST['business_delete'];

    // Delete the row from the Owners table
    $sqlDelete = "DELETE FROM businesses WHERE business_id = '$business_delet'";

    if ($conn->query($sqlDelete) === TRUE) {
        echo "Row deleted successfully";
    } else {
        echo "Error: " . $sqlDelete . "<br>" . $conn->error;
    }
} else {
    // Handle the case when 'owner_delete' is not set
    echo "Error: 'owner_delete' not set in the request.";
}

$conn->close();
?>
