<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <title>Login Form</title>
    <link rel="stylesheet" href="signstyle.css">
    <script>
        function alertfun(){
            alert("Invalid Pass");
        }
    </script>
</head>

<body>
    <div class="wrapper">
        <!-- <div class="img">
            <img src="plogo.png" class="image" alt="LOGO" style="width:40%">
        </div> -->
       
        <form method="post">

    <?php
     
    $con = new mysqli("localhost","root","","sydb");

    if (!$con) {
        die("Connection has failed " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $enteredUsername = $_POST['username'];
        $enteredPassword = $_POST['password'];
       

        // Fetch data from the database based on the entered username
        $sql = "SELECT * FROM `login` WHERE `username` = '$enteredUsername'";
        $result = mysqli_query($con, $sql);

        // Check if a matching record is found
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

             // Retrieve 'who' value from the fetched row
              $who = $row['who'];

        // Check if the entered password matches the stored password
        if ($enteredPassword == $row['password']) {
            // Valid credentials, redirect to a new page (e.g., dashboard.php)

            if($who == 'doctor')
            {
                header("Location: app.php");
            }
            else{
                header("Location: home.php");
            }
            exit();
        } else {
            echo "<script> alertfun(); </script>";
        } 
    } else {
        echo "<script> alertfun(); </script>";
    }
}

        mysqli_close($con);

?>

            <h2>Welcome back , Login to continue</h2>
            <div class="input-box">
                 <i class="fas fa-user"></i> 
                 <input type="text" id="username" placeholder="Username" name="username" required><br>
            </div>
            <div class="input-box">
                <i class="fas fa-lock"></i> 
                 <input type="password" placeholder="Password" name="password" required><br>
            </div>
            <button type="submit" class="btn" name="submit" value="submit" onclick="selection.php">Login</button><br>
            
            <div class="register-link"><p>Don't have an account?<a href="selection.php" > Sign up here.</a></p> 
            </label>
             </div>

        </div>
    </form>
    </div>
    
</body>

</html> 
