<?php
$servername = "localhost";
$username = "root";
$password = "shanmathi12345";
$database = "students";

$conn = mysqli_connect($servername, $username, $password, $database);
// Check if the POST request contains the 'userInput' parameter
if (isset($_POST['owner_delete'])) {
    // Get the user input from the POST request
    $userInput = $_POST['owner_delete'];
    $sqlDelete = "DELETE FROM Owners WHERE owner_id = '$userInput'";

    if ($conn->query($sqlDelete) === TRUE) {
        echo "Row deleted successfully";
    } else {
        echo "Error: " . $sqlDelete . "<br>" . $conn->error;
    }
    
} else {
    // Handle the case when 'userInput' is not set
    echo "Error: 'userInput' not set in the request.";
}
?>
