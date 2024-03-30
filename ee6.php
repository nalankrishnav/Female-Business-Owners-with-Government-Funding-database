<?php
$servername = "localhost";
$username = "root";
$password = "shanmathi12345";
$database = "students";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $business_id = $_POST["business_id"];
    $year = $_POST['Year'];
    $revenue = $_POST["revenue"];
    $profit = $_POST["profit"];
    $employees_count = $_POST["employees_count"];

    // Generate a unique metrics_id
    $metrics_id = generateUniqueMetricsId($conn);

    // Insert data into PerformanceMetrics table
    $sqlMetrics = $query = "INSERT INTO PerformanceMetrics (metrics_id, business_id, Year, revenue, profit, employees_count) 
    VALUES ('$metrics_id', '$business_id', '$year', '$revenue', '$profit', '$employees_count')";


    if ($conn->query($sqlMetrics) === TRUE) {
        echo "Information saved successfully";
    } else {
        echo "Error: " . $sqlMetrics . "<br>" . $conn->error;
    }
    $year = isset($_POST['Year']) ? $_POST['Year'] : null;

}

function generateUniqueMetricsId($conn)
{
    $query = "SELECT MAX(metrics_id) + 1 AS new_metrics_id FROM PerformanceMetrics";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row['new_metrics_id'] ?: 1; // If there are no existing records, start with 1
}

$conn->close();
?>
