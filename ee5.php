<?php
$servername = "localhost";
$username = "root";
$password = "shanmathi12345";
$database = "students";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $application_id = $_POST["application_id"];
    $funding_date = $_POST["funding_date"];
    $funding_amount = $_POST["funding_amount"];

    // Generate a unique history_id
    $history_id = generateUniqueHistoryId($conn);

    // Insert data into FundingHistory table
    $sqlHistory = "INSERT INTO FundingHistory (history_id, application_id, funding_date, funding_amount)
                   VALUES ('$history_id', '$application_id', '$funding_date', '$funding_amount')";

    if ($conn->query($sqlHistory) === TRUE) {
        echo "Information saved successfully";
    } else {
        echo "Error: " . $sqlHistory . "<br>" . $conn->error;
    }
}

function generateUniqueHistoryId($conn)
{
    $query = "SELECT MAX(history_id) + 1 AS new_history_id FROM FundingHistory";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row['new_history_id'] ?: 1; // If there are no existing records, start with 1
}

$conn->close();
?>
