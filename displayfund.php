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

<h1><u>Funding History </u></h1>
<a href="index.php" class="home-icon">
<i class="material-icons w3-spin w3-jumbo">home</i>Home</li>
</a>

<table>
    <thead>
        <tr>
            <th onclick=" historyid()">History ID<i id="sortIcon" class="fa fa-sort"></i></th>
            <th>Application ID</th>
            <th>Funding Date</th>
            <th onclick=" funding()">Funding Amount <i id="sortIcon" class="fa fa-sort"></i></th>
        </tr>
    </thead>
    <?php display_date_data(); ?>
        <tr>
            <td class="det" action="ee5.php">
        <?php
function display_date_data()
{
    $servername = "localhost";
    $username = "root";
    $password = "shanmathi12345";
    $database = "students";
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM FundingHistory";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    while ($row = mysqli_fetch_array($result)) {
        $history_id = $row['history_id'];
        $application_id = $row['application_id'];
        $funding_date = $row['funding_date'];
        $funding_amount = $row['funding_amount'];

        // Output the data in the table
        echo "<tr>";
        echo "<td class='det'>$history_id</td>";
        echo "<td class='det'>$application_id</td>";
        echo "<td class='det'>$funding_date</td>";
        echo "<td class='det'>$funding_amount</td>";
        echo "</tr>";
    }
}

?>
            </td>
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
        </tr>
    </table>
</table>
<script>
     var ascendingOrder = true;

function historyid() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector("table");
    switching = true;

    // Toggle the sorting order
    ascendingOrder = !ascendingOrder;

    // Change the sort icon based on the order
    var sortIcon = document.getElementById("sortIcon");
    sortIcon.className = ascendingOrder ? "fa fa-sort-asc" : "fa fa-sort-desc";

    while (switching) {
        switching = false;
        rows = table.rows;

        for (i = 1; i < rows.length - 1; i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("td")[0]; // Get the Owner ID cell
            y = rows[i + 1].getElementsByTagName("td")[0];

            if (ascendingOrder) {
                if (parseInt(x.textContent) > parseInt(y.textContent)) {
                    shouldSwitch = true;
                    break;
                }
            } else {
                if (parseInt(x.textContent) < parseInt(y.textContent)) {
                    shouldSwitch = true;
                    break;
                }
            }
        }

        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}
</script>
<script>
     var ascendingOrder = true;

function funding() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector("table");
    switching = true;

    // Toggle the sorting order
    ascendingOrder = !ascendingOrder;

    // Change the sort icon based on the order
    var sortIcon = document.getElementById("sortIcon");
    sortIcon.className = ascendingOrder ? "fa fa-sort-asc" : "fa fa-sort-desc";

    while (switching) {
        switching = false;
        rows = table.rows;

        for (i = 1; i < rows.length - 1; i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("td")[0]; // Get the Owner ID cell
            y = rows[i + 1].getElementsByTagName("td")[0];

            if (ascendingOrder) {
                if (parseInt(x.textContent) > parseInt(y.textContent)) {
                    shouldSwitch = true;
                    break;
                }
            } else {
                if (parseInt(x.textContent) < parseInt(y.textContent)) {
                    shouldSwitch = true;
                    break;
                }
            }
        }

        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}
</script>
<footer><a href="fundingoption.html" class="previous">&laquo; Previous</a></footer>
</body>
</html>