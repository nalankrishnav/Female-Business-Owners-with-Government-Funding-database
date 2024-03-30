<?php
$servername = "localhost";
$username = "root";
$password = "shanmathi12345";
$database = "students";


$conn = mysqli_connect($servername, $username, $password, $database);

$query = "SELECT business_id, employees_count FROM PerformanceMetrics";
$result = mysqli_query($conn, $query);

$dataArray = array();

while ($row = mysqli_fetch_assoc($result)) {
    $business_id = $row['business_id'];
    $employees_count = $row['employees_count'];

    // Add data to the array
    $dataArray[] = array('x' => "Business $business_id", 'value' => $employees_count);
}

// Convert the PHP array to a JavaScript array
echo "var data = " . json_encode($dataArray) . ";";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pie Chart</title>
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-pie.min.js"></script>
</head>
<body>
    <div id="pie-container" style="height: 500px; width: 600px; margin-left: 400px; margin-top:90px;"></div>
<style>
    body{
        background-color: wheat;
        
    }
    
</style>
    <script>
        // Your data
        var data = [{"x":"Business 2","value":"25"},{"x":"Business 3","value":"10"},{"x":"Business 1","value":"12"},{"x":"Business 2","value":"42"}];

        var chart = anychart.pie();

        // Set the chart title
        chart.title("Employees Count by Business");

        // Add the data
        chart.data(data);

        // Display the chart in the container
        chart.container('pie-container');
        chart.sort("desc");
        chart.legend().position("right");
        // Set items layout
        chart.legend().itemsLayout("vertical");

        chart.draw();
    </script>
</body>
</html>