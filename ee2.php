<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          body {
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-size: cover;
            background-position: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white; /* Text color */
             /* Semi-transparent background color */
            font-size: larger;
            font-size: 26px; /* Increased font size */
            font-weight: bolder;
        }

        .blur-container {
        z-index: -2;
        position: absolute;
        height: 100vh;
        margin: 0;
        width: 1600px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-image: url('https://images.pexels.com/photos/4050320/pexels-photo-4050320.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
        background-size: cover;
        background-position: center;
        filter: blur(8px);
    }

        .message-container {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background color */
            box-shadow: 0 0 10px rgba(0, 0, 0, 1);
            
        }

        .success-message {
            color: #4CAF50;
            
            
        }
    </style>
</head>
<body>
<div class="blur-container">
        <!-- ... your PHP code and other content ... -->
        </div>
<?php
$servername = "localhost";
$username = "root";
$password = "shanmathi12345";
$database = "students";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $business_name = $_POST["business_name"];
    $business_type = $_POST["business_type"];
    $start_date = $_POST["start_date"];
    $owner_id = $_POST["owner_id"]; // Assuming you have an owner_id field in your form

    // Generate a unique business_id
    $business_id = generateUniqueBusinessId($conn);

    // Insert data into Businesses table
    $sqlBusinesses = "INSERT INTO businesses (business_id, owner_id, business_name, business_type, start_date)
                      VALUES ('$business_id', '$owner_id', '$business_name', '$business_type', '$start_date')";

    if ($conn->query($sqlBusinesses) === TRUE) {
        echo "<h1 style='z-index:2;'>Information saved successfully </h1>";
    } else {
        echo "Error: " . $sqlBusinesses . "<br>" . $conn->error;
    }
}

function generateUniqueBusinessId($conn)
{
    $query = "SELECT MAX(business_id) + 1 AS new_business_id FROM Businesses";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row['new_business_id'] ?: 1; // If there are no existing records, start with 1
}

$conn->close();
?>


</body>
</html>
