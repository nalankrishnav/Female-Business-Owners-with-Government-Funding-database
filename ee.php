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
        // Insert operation
        $owner_first_name = $_POST["first_name"];
        $owner_last_name = $_POST["last_name"];
        $owner_date_of_birth = $_POST["date_of_birth"];
        $owner_contact_number = $_POST["contact_number"];
        $owner_email = $_POST["email"];
        $owner_address = $_POST["address"];

        $owner_id = generateUniqueOwnerId($conn);

        $sqlOwners = "INSERT INTO Owners (owner_id, first_name, last_name, date_of_birth, contact_number, email, address)
                      VALUES ('$owner_id', '$owner_first_name', '$owner_last_name', '$owner_date_of_birth', '$owner_contact_number', '$owner_email', '$owner_address')";

        if ($conn->query($sqlOwners) === TRUE) {
            echo "Information saved successfully";
        } else {
            echo "Error: " . $sqlOwners . "<br>" . $conn->error;
        }
    }


function generateUniqueOwnerId($conn)
{
    $query = "SELECT MAX(owner_id) + 1 AS new_owner_id FROM Owners";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row['new_owner_id'] ?: 1;
}

$conn->close();
?>
