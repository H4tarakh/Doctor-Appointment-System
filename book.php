<?php
 $insert = false;
 if(isset($_POST['name'])  && isset($_POST['age']) && isset($_POST['contact']) && isset($_POST['sugg']) && isset($_POST['slot']) && isset($_POST['date']))
{
   $server = "localhost";
   $username = "root";
   $password = "";
   
   $con = mysqli_connect($server, $username, $password);
      
   if(!$con)
   {
      die("Connection has failed ".$mysqli_connect_error());
   }

   $name = $_POST['name'];
   $age = $_POST['age'];
   $contact = $_POST['contact'];
   $sugg = $_POST['sugg'];
   $slot = $_POST['slot'];
   $date = $_POST['date'];

   $sql = $con->prepare("INSERT INTO `sydb`.`registration` (`name`, `age`, `contact`, `sugg`, `slot`, `date`) VALUES (?,?,?,?,?,? )");

   $sql->bind_param("siisss", $name, $age, $contact, $sugg, $slot,$date);

if( $sql->execute() )
{
   $insert = true ; 
   header("Location: index.php");
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
    <title>Registration Form</title>
     <link rel="stylesheet" href="book.css">


 <script  language="javascript" >
    
    function alertfun(event)
    {
     var cont = myForm.contact.value ;

    if(cont.length <= 4)
    {
     alert("contact must contain at least 10 letters ");
     myForm.contact.value="";
     myForm.contact.focus();

     event.preventDefault();
    
     return false;
    }
    else
    {
        alert("Registration Successfull..:) ");
        return true;
    }
  
    }

   </script>

</head>

<body>

    <form name ="myForm" action = "<?php echo($_SERVER["PHP_SELF"]); ?>" method="post" >   
        <h2 > Doctor Booking Form</h2>  

        <label>Enter your name : </label>
        <input type="text" name="name" id="name" required>

        <label>Enter your age :</label>
        <input type="number" name="age" id="age" required>

        <label>Enter your contact no :</label>
        <input type="phone" name="contact" id="contact">

        <label>Any Queries or suggestion :</label>
        <input type="text" name="sugg" id="sugg" required>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>


    <label for="slotsgrp">Select Available Slot :</label>
<select id="slotsgrp" name="slot" >
  <option value="" selected disabled>Choose Available Slot </option>
  <option value="8:00 AM - 10:00AM" >    8:00 AM - 10:00AM</option>
  <option value=" 11:00 PM - 02:00PM" >  11:00 PM - 02:00PM</option>
  <option value="03:00 PM - 05:00PM">  03:00 PM - 05:00PM</option>
  <option value="06:00 PM - 08:00PM" >  06:00 PM - 08:00PM</option>
</select>

    <br><br>
    <button onclick=" return alertfun(event)"> Confirm </button>
    </form>


</body>

</html>




