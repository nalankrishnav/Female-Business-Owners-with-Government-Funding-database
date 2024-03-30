<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owners Information</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        body {
            height: 100vh;
            margin:0;
            background-image:url(https://images.pexels.com/photos/5125223/pexels-photo-5125223.jpeg);
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
            z-index: -1;
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
            background-color:#E6DADA;/* Adjust the alpha value for transparency */
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #ff8cbe; /* Lighter shade of the background gradient */
            color: #333;
            cursor: pointer;
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



.round {
  border-radius: 50%;
}
        
.material-icons {vertical-align:-14%}
.button {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
.buttons-container {
            text-align: center;
            margin-top: 20px;
        }

        .home-button, .previous-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 0 10px;
            font-size: 18px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            
        }

        .home-button {
            background-color: #04AA6D;
            color: white;
        }

        .previous-button {
            
            color: black;
        }
        #searchInput{
            width:10%;
            height: 30px;
        }

        
    </style>
</head>
<body>
<div class="overlay"></div>

<h1><u>Owners Information</u></h1>
<a href="index.php" class="home-icon">

</a>
<div class="buttons-container">
<p>Search for First_Name ,Last_Name,Year</p>
    <input type="text"  id="searchInput" placeholder="Search...">
    <button class="home-button" onclick="searchTable()">Search</button>
</div>
<table>
    <thead>
        <tr>
            <th onclick="sortingOwner()">Owner ID <i id="sortIcon" class="fa fa-sort"></i></th>
            <th onclick="sortColumn(2)" onclick="sortingFirst()">First Name<i id="sortIcon" class="fa fa-sort"></i></th>
            <th onclick="sortColumn(3)">Last Name</th>
            <th onclick="sortColumn(4)" onclick="sortingdate()">Date of Birth<i id="sortIcon" class="fa fa-sort"></i></th>
            <th>Contact Number</th>
            <th>Email</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>
        <?php displayOwnerData(); ?>
    </tbody>
</table>
<div class="buttons-container">
    <a href="index.php" class="home-button"><i class="material-icons w3-spin w3-jumbo">home</i></li>Home</a>
    <a href="owneroption.html" ><button class="previous-button" >Previous</button></a>
</div>


<script>
    var ascendingOrder = true;

    function sortingOwner() {
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

function sortingFirst() {
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

function sortingdate() {
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

function sortColumn(columnIndex) {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector("table");
    switching = true;

    // Toggle the sorting order
    ascendingOrder = !ascendingOrder;

    // Change the sort icon based on the order
    var sortIcon = document.getElementById("sortIcon" + columnIndex);
    sortIcon.className = ascendingOrder ? "fa fa-sort-asc" : "fa fa-sort-desc";

    while (switching) {
        switching = false;
        rows = table.rows;

        for (i = 1; i < rows.length - 1; i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("td")[columnIndex];
            y = rows[i + 1].getElementsByTagName("td")[columnIndex];

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

    function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.querySelector("table");
        tr = table.getElementsByTagName("tr");

        for (i = 1; i < tr.length; i++) { // Start from 1 to skip the header row
            var found = false;

            for (var j = 0; j < tr[i].cells.length; j++) {
                // Include First Name (column index 1), Last Name (column index 2),
                // and Date of Birth (column index 3) in the search
                if (j == 1 || j == 2 || j == 3) {
                    td = tr[i].getElementsByTagName("td")[j];
                    if (td) {
                        txtValue = td.textContent || td.innerText;

                        // If searching by date of birth, extract only the year
                        if (j == 3) {
                            var yearMatch = filter.match(/\b\d{4}\b/);
                            if (yearMatch) {
                                var year = yearMatch[0];
                                if (txtValue.includes(year)) {
                                    found = true;
                                    break;
                                }
                            }
                        } else {
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                found = true;
                                break;
                            }
                        }
                    }
                }
            }

            if (found) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
</script>

<?php
function displayOwnerData()
{
    $servername = "localhost";
    $username = "root";
    $password = "shanmathi12345";
    $database = "students";
    $conn = mysqli_connect($servername, $username, $password, $database);

    $query = "SELECT * FROM owners";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
        $owner_id = $row['owner_id'];
        $owner_first_name = $row['first_name'];
        $owner_last_name = $row['last_name'];
        $owner_date_of_birth = $row['date_of_birth'];
        $owner_contact_number = $row['contact_number'];
        $owner_email = $row['email'];
        $owner_address = $row['address'];

        // Output the data in the table
        echo "<tr>";
        echo "<td class='det'>$owner_id</td>";
        echo "<td class='det'>$owner_first_name</td>";
        echo "<td class='det'>$owner_last_name</td>";
        echo "<td class='det'>$owner_date_of_birth</td>";
        echo "<td class='det'>$owner_contact_number</td>";
        echo "<td class='det'>$owner_email</td>";
        echo "<td class='det'>$owner_address</td>";
        echo "</tr>";
    }
}
?>

</body>
</html>
