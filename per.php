<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owners Information</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
        
.material-icons {vertical-align:-14%}
    </style>
</head>
<body>

<h1><u>Performance Metrics </u></h1>
<a href="index.php" class="home-icon">
<i class="material-icons w3-spin w3-jumbo">home</i>Home</li>
</a>
<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th onclick="metrics()">Metrics ID <i id="sortIcon" class="fa fa-sort"></i></th>
            <th>Business ID</th>
            <th>Year</th>
            <th>Revenue Profit</th>
            <th>Profit</th>
            <th onclick="count()">Employee Count <i id="sortIcon" class="fa fa-sort"></i></th>


        </tr>
    </thead>
    <?php display_performance_metrics_data(); ?>
        <tr>
            <td class="det" action="ee6.php">
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
        $business_id = $row['business_id'];
        $year = $row['Year'];
        $revenue = $row['revenue'];
        $profit = $row['profit'];
        $employee_count = $row['employees_count'];
        

        // Output the data in the table
        echo "<tr>";
        echo "<td class='det'>$metrics_id</td>";
        echo "<td class='det'>$business_id</td>";
        echo "<td class='det'>$year</td>";
        echo "<td class='det'>$revenue</td>";
        echo "<td class='det'>$profit</td>";
        echo "<td class='det'>$employee_count</td>";
        echo "</tr>";
    }
}
?>
</tr>
</table>
</table>
<script>