<?php
  $insert = false;
  if(isset($_POST['username']))
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

$sql = "INSERT INTO `form`.`data` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password');";

//   Execute the Query
if( $con->query($sql) == true )
{
   // echo "Successfully data entered in database";
   // Flag for Successful insertion
   $insert = true ;
}
else
{
   echo "ERROR $sql <br> $con->error";
}

//  Closing the database connection
$con->close() ;
}
?>