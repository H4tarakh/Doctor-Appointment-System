<?php
$insert = false;
if(isset($_POST['username']) &&isset($_POST['email']) &&isset($_POST['password']) && isset($_POST['name']) && isset($_POST['degree']) && isset($_POST['hosp']) && isset($_POST['fees']) && isset($_POST['city']) ) 
{
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

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $degree = $_POST['degree'];
    $hosp = $_POST['hosp'];
    $fees = $_POST['fees'];
    $city = $_POST['city'];


    $sql = $con->prepare("INSERT INTO `sydb`.`docform` (`username`, `email`, `password`, `name`, `degree`, `hosp`, `fees`, `city`) VALUES ( ? , ? , ? , ? , ? , ? , ? , ? )");

    $sql->bind_param("ssssssis", $username,$email,$password, $name, $degree, $hosp, $fees, $city);

    if($sql->execute()) {
        $insert = true;
        header("Location: login.php");
    } else {
        echo "ERROR: ".$con->error;
    }


    // INSERT INTO `docform` (`username`, `email`, `password`, `name`, `degree`, `hosp`, `fees`, `city`) VALUES 
    //  ('hariom', 'h@gmail.com', '1234', 'Hariom Tarakh', 'MBBS MS', 'Appollo', '500', 'pune');


//  // Handle Image Upload
//  $targetDirectory = "uploads/"; // Specify the directory where you want to store uploaded images
//  $targetFile = $targetDirectory . basename($_FILES["photo"]["name"]); // Get the file name
//  $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION)); // Get the file extension

//  // Check if image file is a actual image or fake image
//  $check = getimagesize($_FILES["photo"]["tmp_name"]);
//  if($check !== false) {
//      // Allow certain file formats
//      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//      && $imageFileType != "gif" ) {
//          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//      } else {
//          // Move uploaded file to specified directory
//          if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
//              // Insert data into database
//              $sql = $con->prepare("INSERT INTO `docform` (`name`, `degree`, `hosp`, `fees`, `city`, `photo`) VALUES (?, ?, ?, ?, ?, ?)");
//              $sql->bind_param("ssssss", $name, $degree, $hosp, $fees, $city, $targetFile);
//              if($sql->execute()) {
//                  $insert = true;
//                  header("Location: login.php");
//                  exit(); // Exit to prevent further execution
//              } else {
//                  echo "ERROR: " . $con->error;
//              }
//          } else {
//              echo "Sorry, there was an error uploading your file.";
//          }
//      } 
//  } else {
//      echo "File is not an image.";
//  }


    $con->close(); 
}
?>


  <!-- 2nd TABLE EXPERIMENT   -->

  <?php

     $insert = false;
     if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']))
   {
   $server = "localhost";
   $username = "root";
   $password = "";
   
   $con = mysqli_connect($server, $username, $password);
       
   if(!$con)
   {
       die("Connection has failed ".$mysqli_connect_error());
   }
   else {
     //  echo "Successfully Connection :) ";
   }
   
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $who = 'doctor';
   
   $sql = "INSERT INTO `sydb`.`login` (`who`,`username`, `email`, `password`) VALUES ('$who' , '$username', '$email', '$password');";
   
   if( $con->query($sql) == true )
   {
      $insert = true ;
     // header("Location: login.php");
   }
   else
   {
      echo "ERROR $sql <br> $con->error";
   }

   $con->close() ;
   }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Form </title>
   <link rel="stylesheet" href="preg.css">

   
</head>
<body>
<div class="wrapper">
    <form id="doctorForm" method=post enctype="multipart/form-data" >
        
        <h2>Doctor Registeration Form</h2>
            <div class="input-box">
                 <i class="fas fa-user"></i> 
                 <input type="text" id="username" placeholder="Username" name="username" required><br>
            </div>
            <div class="input-box">
                <i class="fas fa-lock"></i> 
                 <input type="email" placeholder="Email" name="email" required><br>
            </div>
            <div class="input-box">
                <i class="fas fa-lock"></i> 
                 <input type="password" placeholder="Password" name="password" required><br>
            </div>
            <div class="input-box">
                <i class="fas fa-lock"></i> 
                 <input type="text" placeholder="Name" name="name" required><br>
            </div>
            <div class="input-box">
                <i class="fas fa-lock"></i> 
                 <input type="text" placeholder="Degree:" name="degree" required><br>
            </div>
            <div class="input-box">
                <i class="fas fa-lock"></i> 
                 <input type="text" placeholder="Hospital" name="hosp" required><br>
            </div>
            <div class="input-box">
                <i class="fas fa-lock"></i> 
                 <input type="text" placeholder="Fees" name="fees" required><br>
            </div>

            <div class="input-box">
            <label for="citygrp">City:</label>
               <select id="citygrp" name="city" >
                    <option value="" selected disabled>Available in these cities only: </option>
                    <option value="pune" > PUNE </option>
                    <option value="jalna" >  JALNA</option>
               </select>
             </div>
            </label>


            <button type="submit" class="btn" name="submit" value="submit" onclick="login.php">Submit</button><br>
        
                <div class="register-link">
                <p>Already had account? <a href="login.php">Login-in</a></p>
                </div>
            
       

    </form>
</div>
</body>
</html>


