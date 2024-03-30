<?php
$servername = "localhost";
$username = "root";
$password = "shanmathi12345";
$database = "students";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $program_name = $_POST["program_name"];
    $description = $_POST["description"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];

    // Generate a unique program_id
    $program_id = generateUniqueProgramId($conn);

    // Insert data into GovernmentFundingPrograms table
    $sqlPrograms = "INSERT INTO GovernmentFundingPrograms (program_id, program_name, description, start_date, end_date)
                    VALUES ('$program_id', '$program_name', '$description', '$start_date', '$end_date')";

    if ($conn->query($sqlPrograms) === TRUE) {
        echo "Information saved successfully";
    } else {
        echo "Error: " . $sqlPrograms . "<br>" . $conn->error;
    }
}

function generateUniqueProgramId($conn)
{
    $query = "SELECT MAX(program_id) + 1 AS new_program_id FROM GovernmentFundingPrograms";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row['new_program_id'] ?: 1; // If there are no existing records, start with 1
}

$conn->close();
?>
