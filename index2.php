



<section id="features" class="features">
      
      <div class="container">
        <style>
          .det{
    padding-left: 25px;
    border-left: 1px solid black;
    border-right: 1px solid black;
}
.grey{
    background-color: #dfdfe2;
}
.trow3{
    width: 200px;
    text-align: center;
    padding-bottom: 10px;
    padding-top: 10px;
    background-color: #F2E4DA;
    border-left: 1px solid black;
    border-right: 1px solid black;
   
}

table{
    margin: auto;
    margin-top: 60px;
    margin-bottom: 60px;
}
table, th, td {
  border: 1px solid black;
  border-left: none;
  border-right:none ;
  border-collapse: collapse;
  
}
td{
    padding-top: 5px;
    padding-bottom: 5px;
    border-left: 1px solid black;
    border-right: 1px solid black;
}
table {
  border-collapse: collapse;
  border: 1px solid #ddd;
  width: 100%;
  margin: 0 auto;
}

th, td {
  padding: 10px;
  border: 1px solid #ddd;
}

th {
  background-color: #f1f1f1;
  font-weight: bold;
}

tr:nth-child(odd) {
  background-color: #f9f9f9;
}

.highlight {
  background-color: #fffaeb;
}
        </style>











        <table>
          <tr>
              <h2>OWNER</h2>

              <th class="trow3">Owner ID</th>
              <th class="trow3">First Name</th>
              <th class="trow3">Last Name</th>
              <th class="trow3">Date of Birth</th>
              <th class="trow3">Contact Number</th>
              <th class="trow3">Email</th>
              <th class="trow3">Address</th>
          </tr>
          <?php owner_id(); ?>
          <tr>
            <td class="det" action="ee.php">
            <?php
function owner_id()
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

              
          </td>
          
              <td class="det"></td>
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
              <td class="det"></td>
              <td class="det"></td>
          </tr>
      </table>

      <table>
        <tr>
            <h2>BUSINESS</h2>
            <th class="trow3">Business ID</th>
            <th class="trow3">Owner ID</th>
            <th class="trow3">Business Name</th>
            <th class="trow3">Business Type</th>
            <th class="trow3">Start Date</th>
        </tr>
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
    <table>
        <tr>
            <h2>PERFORMANCE METRICS</h2>
            <th class="trow3">metrics_id</th>
            <th class="trow3">business_id</th>
            <th class="trow3">Year</th>
            <th class="trow3">Revenue</th>
            <th class="trow3">Profit</th>
            <th class="trow3">Email</th>
            <th class="trow3">Employee-count</th>
        </tr>
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
        $year = $row['year'];
        $revenue = $row['revenue'];
        $profit = $row['profit'];
        $email = $row['email'];
        $employee_count = $row['employee_count'];

        // Output the data in the table
        echo "<tr>";
        echo "<td class='det'>$metrics_id</td>";
        echo "<td class='det'>$business_id</td>";
        echo "<td class='det'>$year</td>";
        echo "<td class='det'>$revenue</td>";
        echo "<td class='det'>$profit</td>";
        echo "<td class='det'>$email</td>";
        echo "<td class='det'>$employee_count</td>";
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
            <td class="det"></td>
            <td class="det"></td>
        </tr>
        <tr class="grey">
            <td class="det"></td>
            <td class="det"></td>
            <td class="det"></td>
            <td class="det"></td>
            <td class="det"></td>
            <td class="det"></td>
            <td class="det"></td>
        </tr>
    </table>
    <table>
        <tr>
            <h2>FundingHistory</h2>
            <th class="trow3">history_id</th>
            <th class="trow3">application_id</th>
            <th class="trow3">funding_date</th>
            <th class="trow3">funding_amount</th>
        </tr>
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
    <table>
        <tr>
            <h2>FUNDING APP</h2>
            <th class="trow3">Application ID </th>
            <th class="trow3">Owner ID</th>
            <th class="trow3">Program ID</th>
            <th class="trow3">Application Date</th>
            <th class="trow3">Status</th>
        </tr>
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
    <table>
        <tr>
            <h2>GOVT FUNDING PROGRAM</h2>
            <th class="trow3">Program ID </th>
            <th class="trow3">Program Name</th>
            <th class="trow3">Description</th>
            
        </tr>
        <<?php display_govt_funding_program_data(); ?>

        <tr>
            <td class="det" action="ee3.php">
        <?php
function display_govt_funding_program_data()
{
    $servername = "localhost";
    $username = "root";
    $password = "shanmathi12345";
    $database = "students";
    $conn = mysqli_connect($servername, $username, $password, $database);

    $query = "SELECT * FROM GovernmentFundingPrograms";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
        $program_id = $row['program_id'];
        $program_name = $row['program_name'];
        $description = $row['description'];

        // Output the data in the table
        echo "<tr>";
        echo "<td class='det'>$program_id</td>";
        echo "<td class='det'>$program_name</td>";
        echo "<td class='det'>$description</td>";
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
       

      </div>
    </section><!-- End Features Section -->
