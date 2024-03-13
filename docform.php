<?php
 $insert = false;
 if(isset($_POST['name'])  && isset($_POST['age']) && isset($_POST['contact']) && isset($_POST['sugg']) && isset($_POST['blood']) )
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
   $blood = $_POST['blood'];

   $sql = $con->prepare("INSERT INTO `sydb`.`registration` (`name`, `age`, `contact`, `sugg`, `blood`) VALUES (?,?,?,?,? )");

   $sql->bind_param("siiss", $name, $age, $contact, $sugg, $blood);

if( $sql->execute() )
{
   $insert = true ; 
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
    <title>Docform</title>
     <link rel="stylesheet" href="docform.css">

 <script  language="javascript" >
    
     function submitform()
      {
          if( iscontact(event))
          {
            alert("Registration Successful..!"); 
          }
      }
 
      function iscontact(event)
      {
       var cont = myForm.contact.value ;
 
      if(cont.length <= 4)
      {
       alert("Contact must contain at least 10 letters ");
       myForm.cont.value="";
       myForm.cont.focus();
 
       event.preventDefault();
      
       return false;
      }
      else
      return true;
      }

 </script>

 <!-- <script language="javascript" > function submitform(event) { return true; } function iscontact(event) ///   iscontact(event) &&   ////{ var cont = myForm.contact.value ; if(cont.length <= 4) { alert("Contact must contain at least 10 letters "); myForm.contact.value=""; myForm.contact.focus(); event.preventDefault(); return false; } else return true; } </script> -->


</head>

<body>

    <form name ="myForm" action = "<?php echo($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return submitform()">   
        <h2 > D-Slot Registeration Form</h2>  

        <label>Enter your name : </label>
        <input type="text" name="name" id="name" required>

        <label>Enter your age :</label>
        <input type="number" name="age" id="age" required>

        <label>Enter your contact no :</label>
        <input type="phone" name="contact" id="contact">

        <label>Any Queries or suggestion :</label>
        <input type="text" name="sugg" id="sugg" required>


    <label for="bloodGroup">Select Blood Group:</label>
<select id="bloodGroup" name="blood" >
  <option value="" selected disabled>Choose Blood Group</option>
  <option value="A+" >    A+</option>
  <option value="B+" >  B+</option>
  <option value="AB+">  AB+</option>
  <option value="O+" >  O+</option>
  <option value="A-" >  A-</option>
  <option value="B-" >  B-</option>
  <option value="AB-">  AB-</option>
  <option value="O-" >    O-</option>
</select>

    <br><br>
    <button onclick="submitform()"> Confirm </button>
    </form>

</body>

</html>