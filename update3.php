<?php
$servername = "localhost";
$username = "root";
$password = "shanmathi12345";
$database = "students"; // Change this to your actual database name

$conn = mysqli_connect($servername, $username, $password, $database);

// Check if the POST request contains the required parameters
if (
    isset($_POST['metrics_id']) &&
    isset($_POST['column_name']) &&
    isset($_POST['column_value'])
) {
    // Get the update values from the POST request
    $metricsIdUpdate = $_POST['metrics_id'];
    $columnName = $_POST['column_name'];
    $columnValue = $_POST['column_value'];

    // Validate the selected column to prevent SQL injection
    $allowedColumns = ['business_id', 'Year', 'revenue', 'profit', 'employees_count'];
    if (!in_array($columnName, $allowedColumns)) {
        echo "Error: Invalid column selection";
        exit;
    }

    // Update the specified column for the given row in the metrics table
    $sqlUpdate = "UPDATE PerformanceMetrics SET $columnName = ? WHERE metrics_id = ?";

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sqlUpdate);

    if (!$stmt) {
        echo "Error: " . $conn->error;
        exit;
    }

    $stmt->bind_param("ss", $columnValue, $metricsIdUpdate);

    if ($stmt->execute()) {
        echo "Row Updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Handle the case when required parameters are not set
    echo "Error: Required parameters not set in the request.";
    exit;
}
?>
