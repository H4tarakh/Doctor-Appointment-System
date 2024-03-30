<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "sydb"; 

// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get today's date
$today = date('Y-m-d');

// Query to fetch appointments for today
$sql = "SELECT * FROM registration WHERE DATE(date) = '$today'";
$result = $conn->query($sql);

// Associative array to store appointments grouped by date
$appointments_by_date = array();

if ($result->num_rows > 0) {
    // Group appointments by date
    while ($row = $result->fetch_assoc()) {
        $appointment_date = $row['date'];
        $appointments_by_date[$appointment_date][] = $row; 
    }
} else {
    echo "No appointments scheduled for today.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Appointments</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
    <h1>Today's Appointments </h1>

    <?php
    // Display appointments grouped by date
    foreach ($appointments_by_date as $date => $appointments) {
        echo "<h2>$date</h2>"; // Display date
       
        echo "<ul>";
        foreach ($appointments as $appointment) 
        {
            echo "<li>{$appointment['name']} - {$appointment['slot']}</li>"; // Display appointment details
        }
        echo "</ul>";
    }

    ?>
</body>
</html>
