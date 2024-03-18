<?php
$insert = false;
if(isset($_POST['name']) && isset($_POST['degree']) && isset($_POST['hosp']) && isset($_POST['fees']) && isset($_POST['city'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "sydb";

    $con = mysqli_connect($server, $username, $password, $database);

    if(!$con) {
        die("Connection has failed ".mysqli_connect_error());
    }
    else {
          echo "Successfully Connection :) ";
      }

    $name = $_POST['name'];
    $degree = $_POST['degree'];
    $hosp = $_POST['hosp'];
    $fees = $_POST['fees'];
    $city = $_POST['city'];

    $sql = $con->prepare("INSERT INTO `docform` (`name`, `degree`, `hosp`, `fees`, `city`) VALUES (?, ?, ?, ?, ?)");

    $sql->bind_param("sssis", $name, $degree, $hosp, $fees, $city);

    if($sql->execute()) {
        $insert = true;
        header("Location: index.html");
        exit(); // Exit to prevent further execution
    } else {
        echo "ERROR: ".$sql->error;
    }

    $sql->close(); // Close the prepared statement
    $con->close(); // Close the connection
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Form </title>
   <link rel="stylesheet" href="reg.css">
</head>
<body>
    <form id="doctorForm">
        <h2> Doctor Registeration Form</h2> 

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    
        <label for="degree">Degree:</label>
        <input type="text" id="degree" name="degree" required>
    
        <label for="hosp">Hospital:</label>
        <input type="text" id="hosp" name="hosp" required>

        <label for="fees">Fees:</label>
        <input type="number" id="fees" name="fees" required>

        <label for="citygrp">City:</label>
        <select id="citygrp" name="city" >
             <option value="" selected disabled>Available in these cities only: </option>
             <option value="pune" > PUNE </option>
             <option value="jalna" >  JALNA</option>
        </select>

   <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo" accept="image/*" required>
    
        <button type="submit">Submit</button>
    </form>
</body>
</html>


