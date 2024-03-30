<?php
$servername = "localhost";
$username = "root";
$password = "shanmathi12345";
$database = "students";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check if the POST request contains the 'owner_delete' parameter
if (isset($_POST['fa'])) {
    // Get the owner_id from the POST request
    $fa1 = $_POST['fa'];

    // Delete the row from the Owners table
    $sqlDelete = "DELETE FROM FundingApplications WHERE application_id = '$fa1'";

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
