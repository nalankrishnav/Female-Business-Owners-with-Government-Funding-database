<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "p1.css">
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-pie.min.js"></script>
</head>
<body>

<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

#navbar {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 90px 10px;
  transition: 0.4s;
  position: fixed;
  width: 100%;
  top: 0;
  z-index: 99;
}

#navbar a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  line-height: 25px;
  border-radius: 4px;
}

#navbar #logo {
  font-size: 35px;
  font-weight: bold;
  transition: 0.4s;
}

#navbar a:hover {
  background-color: #ddd;
  color: black;
}

#navbar a.active {
  background-color: black;
  color: white;
}

#navbar-right {
  float: right;
}

@media screen and (max-width: 580px) {
  #navbar {
    padding: 20px 10px !important;
  }
  #navbar a {
    float: none;
    display: block;
    text-align: left;
  }
  #navbar-right {
    float: none;
  }
}

body {
  font-family: 'lato', sans-serif;
}
.container {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
}

h2 {
  font-size: 26px;
  margin: 20px 0;
  text-align: center;
  small {
    font-size: 0.5em;
  }
}

.responsive-table {
  li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
  }
  .table-header {
    background-color: #95A5A6;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.03em;
  }
  .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
  }
  .col-1 {
    flex-basis: 10%;
  }
  .col-2 {
    flex-basis: 40%;
  }
  .col-3 {
    flex-basis: 25%;
  }
  .col-4 {
    flex-basis: 25%;
  }
  
  @media all and (max-width: 767px) {
    .table-header {
      display: none;
    }
    .table-row{
      
    }
    li {
      display: block;
    }
    .col {
      
      flex-basis: 100%;
      
    }
    .col {
      display: flex;
      padding: 10px 0;
      &:before {
        color: #6C7A89;
        padding-right: 10px;
        content: attr(data-label);
        flex-basis: 50%;
        text-align: right;
      }
    }
  }
}
.container{
  top: 900px;
}
</style>
</head>
<body>

<div id="navbar">
  <a href="#default" id="logo">WaterMeter services</a>
  <div id="navbar-right">
    <a class="active" href="#home">Home</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
  </div>
</div>


<div class="right-container" id="right-container">

<script>
    anychart.onDocumentReady(function() {

var data = [
    {x: "Vecant", value: 21},
    {x: "one occupant", value: 200},
    {x: "two occupants", value: 25},
    {x: "three occupants", value: 19},
    {x: "four occupants", value: 21},
    {x: "five occupants", value: 21},
    {x: "six occupants", value: 15},
    {x: "seven occupants", value: 19},
    {x: "eight occupants", value: 17}
];

// create the chart
var chart = anychart.pie();

// set the chart title
chart.title("Population by Race for the United States: 2010 Census");

// add the data
chart.data(data);

// display the chart in the container
chart.container('right-container');
chart.sort("desc");
chart.legend().position("right");
// set items layout
chart.legend().itemsLayout("vertical");
chart.draw();

});
  </script>

</div>

<div class="left-container">
    <div class="family-avg"></div>
    <div class="bach-avg"></div>
    <div class="single-avg"></div>
    <div class="empty-avg"></div>
</div>

<div class="input-container">
    <input type="text" name="text" class="input" placeholder="search...">
    <span class="icon"> 
      <svg width="19px" height="19px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="1" d="M14 5H20" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="1" d="M14 8H17" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 11.5C21 16.75 16.75 21 11.5 21C6.25 21 2 16.75 2 11.5C2 6.25 6.25 2 11.5 2" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="1" d="M22 22L20 20" stroke="#000" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
    </span>
  </div>


<script>
// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.padding = "30px 10px";
    document.getElementById("logo").style.fontSize = "25px";
    document.getElementById("navbar").style.backgroundColor = "white";
  } else {
    document.getElementById("navbar").style.padding = "80px 10px";
    document.getElementById("logo").style.fontSize = "35px";
    document.getElementById("navbar").style.backgroundColor = "#f1f1f1";
  }
}
</script>


<div class="container">
  <h2><small></small></h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">Meter_id</div>
      <div class="col col-2">Active</div>
      <div class="col col-3">Occupants</div>
      <div class="col col-4">Amount</div>
      <div class="col col-4">Staff_id</div>
    </li>
      <?php business_id(); ?>

<?php


                function business_id()
                {
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "dbmspro";
                    $conn = mysqli_connect($servername, $username, $password, $database);

                    $query = "select * from payment_data;";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result)) {
                      
                      
                        $apartment = $row['Apartment_id'];
                        $occupants = $row['Occupants'];
                        $consumption = $row['Consumption_level'];
                        $staff = $row['Staff_id'];
                        $amount = $row['Amount'];
                        $payment = $row['Payment_date'];

                        // Output the data in the table
                        echo '<li class="table-row">';
                        echo '<div class="col col-1" data-label="Job Id">'.$apartment.'</div>';
                        echo '<div class="col col-2" data-label="Customer Name">'.$occupants.'</div>';
                        echo '<div class="col col-3" data-label="Amount">'.$consumption.'</div>';
                        echo '<div class="col col-4" data-label="Payment Status">'.$staff.'</div>';
                        echo '<div class="col col-5" data-label="Payment Status">'.$amount.'</div>';
                        echo '<div class="col col-6" data-label="Payment Status">'.$payment.'</div>';
                        echo '</li>';
                    }
                }
            ?>

  </ul>
  <p class="a" style = "position: absolute; top: 1900px;">Find which house used the maximum</p>
  <p class="b">find the average of all the houses</p>
  <form action="maxavg.php" method = "post">
  <label class="container-check">

  <input type="checkbox">
  <input type="submit" value="Submit">
  <div class="checkmark"></div>
  
</label>
  </form>
</div>
<style>
  .container-check input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

.container-check {
  position: relative;
  cursor: pointer;
  font-size: 17px;
  width: 2em;
  height: 2em;
  user-select: none;
  border: 5px solid white;
  display: block;
  bottom: 25300px;
  left:-200px
}

.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.checkmark:after {
  content: '';
  position: absolute;
  top: 25%;
  left: 25%;
  background-color: white;
  width: 50%;
  height: 50%;
  transform: scale(0);
  transition: .1s ease;
}

.container-check input:checked ~ .checkmark:after {
  transform: scale(1);
}
</style>
</body>