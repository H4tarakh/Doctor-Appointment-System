<?php
$insert = false;
if(isset($_POST['name']) && isset($_POST['degree']) && isset($_POST['hosp']) && isset($_POST['fees']) && isset($_POST['city']) && isset($_POST['photo'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "sydb";

    $con = mysqli_connect($server, $username, $password, $database);

    if(!$con) {
        die("Connection has failed ".$mysqli_connect_error());
    }
    else {
        //  echo "Successfully Connection :) ";
      }

    $name = $_POST['name'];
    $degree = $_POST['degree'];
    $hosp = $_POST['hosp'];
    $fees = $_POST['fees'];
    $city = $_POST['city'];
    $_FILES['photo'];

    // $sql = $con->prepare("INSERT INTO `sydb`.`docform` (`name`, `degree`, `hosp`, `fees`, `city`, `photo`) VALUES (?, ?, ?, ?, ?,?)");

    // $sql->bind_param("sssiss", $name, $degree, $hosp, $fees, $city);

    // if($sql->execute()) {
    //     $insert = true;
    //     header("Location: index.php");
    // } else {
    //     echo "ERROR: ".$con->error;
    // }

 // Handle Image Upload
 $targetDirectory = "uploads/"; // Specify the directory where you want to store uploaded images
 $targetFile = $targetDirectory . basename($_FILES["photo"]["name"]); // Get the file name
 $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION)); // Get the file extension

 // Check if image file is a actual image or fake image
 $check = getimagesize($_FILES["photo"]["tmp_name"]);
 if($check !== false) {
     // Allow certain file formats
     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
     && $imageFileType != "gif" ) {
         echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
     } else {
         // Move uploaded file to specified directory
         if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
             // Insert data into database
             $sql = $con->prepare("INSERT INTO `docform` (`name`, `degree`, `hosp`, `fees`, `city`, `photo`) VALUES (?, ?, ?, ?, ?, ?)");
             $sql->bind_param("ssssss", $name, $degree, $hosp, $fees, $city, $targetFile);
             if($sql->execute()) {
                 $insert = true;
                 header("Location: index.php");
                 exit(); // Exit to prevent further execution
             } else {
                 echo "ERROR: " . $con->error;
             }
         } else {
             echo "Sorry, there was an error uploading your file.";
         }
     }
 } else {
     echo "File is not an image.";
 }


    $con->close(); // Close the connection
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Form </title>
   <link rel="stylesheet" href="book.css">
</head>
<body>
    <form id="doctorForm" method=post enctype="multipart/form-data" >
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


