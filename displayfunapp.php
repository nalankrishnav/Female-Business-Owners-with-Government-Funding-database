<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owners Information</title>
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
    </style>
</head>
<body>

<h1><u>Funding Application</u></h1>

<table>
    <thead>
        <tr>
            <th>Application ID</th>
            <th>Owner ID</th>
            <th>Program ID</th>
            <th>Application Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <?php display_funding_app_data(); ?>
        <tr>
            <td class="det" action="ee4.php">
        <?php
function display_funding_app_data()
{
    $servername = "localhost";
    $username = "root";
    $password = "shanmathi12345";
    $database = "students";
    $conn = mysqli_connect($servername, $username, $password, $database);

    $query = "SELECT * FROM FundingApplications";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
        $application_id = $row['application_id'];
        $owner_id = $row['owner_id'];
        $program_id = $row['program_id'];
        $application_date = $row['application_date'];
        $status = $row['status'];

        // Output the data in the table
        echo "<tr>";
        echo "<td class='det'>$application_id</td>";
        echo "<td class='det'>$owner_id</td>";
        echo "<td class='det'>$program_id</td>";
        echo "<td class='det'>$application_date</td>";
        echo "<td class='det'>$status</td>";
        echo "</tr>";
    }
}
?>
            </td>
            <td class="det"></td>
            <td class="det"></td>
            <td class="det"></td>
            <td class="det"></td>
            <td class="det"></td>
        </tr>
        <tr class="grey">
            <td class="det"></td>
            <td class="det"></td>
            <td class="det"></td>
            <td class="det"></td>
            <td class="det"></td>
        </tr>
    </table>

</body>
</html>