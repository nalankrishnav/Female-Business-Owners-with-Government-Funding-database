<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Information</title>
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
<h1><u>Business</u></h1>

<!-- Container for the home icon -->


</a>
<div class="buttons-container">
    <p>Search for Business_Name and Business_Type</p>
    <input type="text"  id="searchInput" placeholder="Search...">
    <button class="home-button" onclick="searchTable()">Search</button>
</div>

<table>
    <thead>
        <tr>
            <th onclick="sortingBusiness()">Business ID <i id="sortIcon" class="fa fa-sort"></i></th>
            <th>Owner ID</th>
            <th onclick="sortColumn(2)">Business Name</th>
            <th onclick="sortColumn(3)">Business Type</th>
            <th onclick="sortingstartdate()">Start Date <i id="sortIcon" class="fa fa-sort"></i></th>
        </tr>
    </thead>
    
    <?php business_id(); ?>
     
        <tr>
            <td class="det" action="ee2.php">
            <?php
                function business_id()
                {
                    $servername = "localhost";
                    $username = "root";
                    $password = "shanmathi12345";
                    $database = "students";
                    $conn = mysqli_connect($servername, $username, $password, $database);

                    $query = "SELECT * FROM businesses";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result)) {
                        $business_id = $row['business_id'];
                        $owner_id = $row['owner_id'];
                        $business_name = $row['business_name'];
                        $business_type = $row['business_type'];
                        $start_date = $row['start_date'];

                        // Output the data in the table
                        echo "<tr>";
                        echo "<td class='det'>$business_id</td>";
                        echo "<td class='det'>$owner_id</td>";
                        echo "<td class='det'>$business_name</td>";
                        echo "<td class='det'>$business_type</td>";
                        echo "<td class='det'>$start_date</td>";
                        echo "</tr>";
                    }
                }
            ?>
            </td>
            <td class="det"></td>
            <td class="det"></td>
            <td class="det"></td>
            
        </tr>
        <tr class="grey">
            <td class="det"></td>
            <td class="det"></td>
            <td class="det"></td>
            
        </tr>
    </table>
    <div class="buttons-container">
    <a href="index.php" class="home-button"><i class="material-icons w3-spin w3-jumbo">home</i></li>Home</a>
    <a href="businesoption.html" ><button class="previous-button" >Previous</button></a>
</div> 
<script>
    var ascendingOrder = true;

    function sortingBusiness() {
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
                x = rows[i].getElementsByTagName("td")[0]; // Get the Business ID cell
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

    function sortingstartdate() {
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
                x = rows[i].getElementsByTagName("td")[0]; // Get the Business ID cell
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
                // Include Business Type (column index 3) in the search
                if (j == 0 || j == 2 || j == 3 || j == 4) {
                    td = tr[i].getElementsByTagName("td")[j];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                            break;
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

</body>
</html>
