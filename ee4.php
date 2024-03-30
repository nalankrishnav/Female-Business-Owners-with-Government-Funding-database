<?php
$servername = "localhost";
$username = "root";
$password = "shanmathi12345";
$database = "students";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $owner_id = $_POST["owner_id"];
    $program_id = $_POST["program_id"];
    $application_date = $_POST["application_date"];
    $status = $_POST["status"];

    // Generate a unique application_id
    $application_id = generateUniqueApplicationId($conn);

    // Insert data into FundingApplications table
    $sqlApplications = "INSERT INTO FundingApplications (application_id, owner_id, program_id, application_date, status)
                        VALUES ('$application_id', '$owner_id', '$program_id', '$application_date', '$status')";

    if ($conn->query($sqlApplications) === TRUE) {
        echo "Information saved successfully";
    } else {
        echo "Error: " . $sqlApplications . "<br>" . $conn->error;
    }
}

function generateUniqueApplicationId($conn)
{
    $query = "SELECT MAX(application_id) + 1 AS new_application_id FROM FundingApplications";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row['new_application_id'] ?: 1; // If there are no existing records, start with 1
}

$conn->close();
?>
