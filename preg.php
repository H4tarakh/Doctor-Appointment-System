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
   $who = 'patient';
   
   $sql = "INSERT INTO `sydb`.`login` (`who`,`username`, `email`, `password`) VALUES ('$who' ,'$username', '$email', '$password');";

   if( $con->query($sql) == true )
   {
      // echo "Successfully data entered in database";
      // Flag for Successful insertion
      $insert = true ;
      header("Location: login.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <title>Sign-in</title>
    <link rel="stylesheet" href="preg.css">
 
    
    <script  language="javascript" >
    
     function ispsw(event)
     {
      var pass = myForm.password.value ;

     if(pass.length <= 8)
     {
      alert("Password must contain at least 8 letters ");
      myForm.password.value="";
      myForm.password.focus();

      event.preventDefault();
     
      return false;
     }
     else
     return true;
     }

    </script>

</head>

<body>
    <div class="wrapper">
      <form name = "myForm" action = "<?php echo($_SERVER["PHP_SELF"]); ?>" method="post">
        
        <h2>Patient Registration </h2>
        <div class="input-box">
            <i class="fa-solid fa-user"></i>
          <input type="text" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="input-box">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" id="email" name="email" placeholder="E-mail" required>
        </div>
        <div class="input-box">
            <i class="fa-solid fa-lock"></i>
          <input type="password" id="password" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn" name="submit" id="submit" value="submit" onclick="ispsw(event)"  >Create account</button>
        <div class="register-link">
          <p>Already had account? <a href="login.php">Login-in</a></p>
        </div>
      </form>
    </div>

   

  </body>

</html>