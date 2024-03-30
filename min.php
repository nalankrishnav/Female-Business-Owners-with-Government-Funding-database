<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance Metrics</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        body {
            height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #95aebe, #86cade, #7aa7e9, #62a6f3);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h1 {
            width: auto;
            text-align: center;
            margin-top: 50px;
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        table {
            width: 70%;
            margin-left: 200px;
            border-collapse: collapse;
            margin-top: 100px;
            align-self: center;
            background-color: #fff;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .home-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 36px;
        }

        a {
            text-decoration: none;
            display: inline-block;
            padding: 8px 16px;
        }

        a:hover {
            background-color: #ddd;
            color: black;
        }

        .previous {
            background-color: #f1f1f1;
            color: black;
        }

        .next {
            background-color: #04AA6D;
            color: white;
        }

        .round {
            border-radius: 50%;
        }

        .material-icons {
            vertical-align: -14%;
        }
    </style>
</head>
<body>

<h1><u>Performance Metrics </u></h1>
<a href="index.php" class="home-icon">
    <i class="material-icons w3-spin w3-jumbo">home</i>Home
</a>
<table>
    <thead>
        <tr>
            <th onclick="displayMinMax('profit')">Profit</th>
            <th onclick="displayMinMax('revenue_profit')">Revenue Profit</th>
            <th onclick="displayMinMax('employee_count')">Employee Count</th>
        </tr>
    </thead>
    <?php display_performance_metrics_data(); ?>
</table>

<script>
    function displayMinMax(metricType) {
        var metrics_id = 1; // Replace with the actual metricsId
        $.ajax({
            url: 'getMinMaxRow.php',
            type: 'POST',
            data: { metrics_id: metrics_id, metric_type: metric_type },
            success: function (data) {
                $('table').html(data);
            },
            error: function () {
                alert('Error fetching data');
            }
        });
    }
</script>

<?php

function display_performance_metrics_data()
{
    $servername = "localhost";
    $username = "root";
    $password = "shanmathi12345";
    $database = "students";
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    $query = "SELECT * FROM PerformanceMetrics";
    $result = mysqli_query($conn, $query);
    
    while ($row = mysqli_fetch_array($result)) {
        $metrics_id = $row['metrics_id'];
        
        // Check if the keys exist in the $row array before accessing them
        $revenue_profit = isset($row['revenue_profit']) ? $row['revenue_profit'] : null;
        $employee_count = isset($row['employee_count']) ? $row['employee_count'] : null;
    
        echo "<tr>";
        echo "<td class='det'>$revenue_profit <button onclick='displayMinMaxRow($metrics_id, \"revenue_profit\")'>Min/Max</button></td>";
        echo "<td class='det'>$employee_count <button onclick='displayMinMaxRow($metrics_id, \"employee_count\")'>Min/Max</button></td>";
        echo "</tr>";
    }
    
    mysqli_close($conn);
}    

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['metricsId']) && isset($_POST['metricType'])) {
    $metricsId = $_POST['metricsId'];
    $metricType = $_POST['metricType'];
    displayMinMaxRow($metricsId, $metricType);
}


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['metrics_id']) && isset($_POST['metricType'])) {
        $metricsId = $_POST['metrics_id'];
        $metricType = $_POST['metricType'];
        displayMinMaxRow($metricsId, $metricType);
    }
    
    function displayMinMaxRow($metricsId, $metricType)
    {
        $servername = "localhost";
        $username = "root";
        $password = "shanmathi12345";
        $database = "students";
        $conn = mysqli_connect($servername, $username, $password, $database);
    
        $query = "SELECT MIN($metricType) AS minValue, MAX($metricType) AS maxValue FROM PerformanceMetrics WHERE metrics_id = $metricsId";
        $result = mysqli_query($conn, $query);
    
        if ($row = mysqli_fetch_assoc($result)) {
            $minValue = $row['minValue'];
            $maxValue = $row['maxValue'];
    
            echo "<tr>";
            echo "<td class='det'>Min: $minValue<br>Max: $maxValue</td>";
            echo "</tr>";
        }
    }
    


?>
<script>
    function displayMinMax(metricType) {
    var metrics_id = 1; // Replace with the actual metricsId
    $.ajax({
        url: 'getMinMaxRow.php',
        type: 'POST',
        data: { metrics_id: metrics_id, metricType: metricType },
        success: function (data) {
            $('table').html(data);
        },
        error: function () {
            alert('Error fetching data');
        }
    });
}
</script>
</body>
</html>
