<?php
$servername = "localhost";
$username = "root";
$password = "shanmathi12345";
$database = "students";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check if the POST request contains the required parameters
if (isset($_POST['history_id']) && isset($_POST['column_name']) && isset($_POST['column_value'])) {

    // Get the update values from the POST request
    $historyIdUpdate = $_POST['history_id'];
    $columnName = $_POST['column_name'];
    $columnValue = $_POST['column_value'];

    // Validate the selected column to prevent SQL injection
    $allowedColumns = ['history_id', 'owner_id', 'first_name', 'last_name', 'date_of_birth', 'contact_number', 'email', 'address', 'funding_date', 'funding_amount'];
    if (!in_array($columnName, $allowedColumns)) {
        echo "Error: Invalid column selection";
        exit;
    }

    // Update the specified column for the given row in the FundingHistory table
    $sqlUpdate = "UPDATE FundingHistory SET $columnName = '$columnValue' WHERE history_id = '$historyIdUpdate'";

    if ($conn->query($sqlUpdate) === TRUE) {
        echo "Row Updated successfully";
    } else {
        echo "Error: " . $sqlUpdate . "<br>" . $conn->error;
    }
} else {
    // Handle the case when required parameters are not set
    echo "Error: Required parameters not set in the request.";
}

$conn->close();
?>
