<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <title>Login form </title>

    <style>
        body {
            background-image: url("hosp.png");
            background-size: cover;
            font-family: 'Protest Revolution', sans-serif;
            display: grid;
            place-items: center;
            height: 100vh; 
            margin: 0;
        }

        p {
            font-size: 24px;
        }
        .input-container{
            fill-opacity: 0%;
            padding: 10px;
            background-color: #b0e3e6;
            width: 30%;
            border: 3px solid #f1f1f1;
            margin: 10px 0;
            border: 2px solid rgb(37, 183, 144);
            border-top-left-radius: 40px;
            border-bottom-right-radius: 40px;
        }

        /* form {
            fill-opacity: 0%;
            padding: 10px;
            background-color: #b0e3e6;
            width: 30%;
            border: 3px solid #f1f1f1;
            margin: 10px 0;
            border: 2px solid rgb(37, 183, 144);
            border-top-left-radius: 40px;
            border-bottom-right-radius: 40px;
        } */

        /* input[type=text],
        input[type=password] {
            width: 60%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 2px solid skyblue;
            border-radius: 5px;
            box-sizing: border-box;
        } */

        button {
            background-color: #618264;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: 2px;
            border-radius: 5px;
            cursor: pointer;
            width: 15%;
        }
        .wrapper{
            

        }

        /* .wrapper .inputbox{
            fill-opacity: 0%;
            padding: 10px;
            background-color: #b0e3e6;
            width: 30%;
            border: 3px solid #f1f1f1;
            margin: 10px 0;
            border: 2px solid rgb(37, 183, 144);
            border-top-left-radius: 40px;
            border-bottom-right-radius: 40px;
        } */

        .inputbox input [type=text],
        .inputbox input[type=password]{
            width: 60%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 2px solid skyblue;
            border-radius: 5px;
            box-sizing: border-box;

        }
        .wrapper .remember-forgot{

        }

        .wrapper .register-link{

        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="image"> 
            <img src="plogo.png" alt="LOGO" style="width:20%">
        </div>
   <div class="welcome">
    <p><b> Welcome back </b>, Sign-in to continue</p>
    </div>

        <div class="input-container">
    <form action="index.html" method="post">

        <div class="input-box">
            <i class="fa-solid fa-user"></i>
            <label for="uname"><b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspUsername :: </b></label>
            <input type="text" placeholder="Enter Username" name="uname" required><br>
            </div>
        <div class="inputbox">
            <i class="fa-solid fa-lock"></i>
            <label for="psw"><b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPassword :: </b></label>
            <input type="password" placeholder="Enter Password" name="psw" required><br>
        </div>
           
        
            <button type="submit" onlick="index.html">Login</button><br>
            <div class="remember-forgot">
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me for centuries..!
            </label>
            </div>
            <div class="register-link">
                <label>
                <p ><a href="login.html">Don't have account ?? </href> </p>
                </label>
            </div>
                


        
    </form>
</div>
</div>
</body> 

</html> 
-->
<?php

// $username = $_POST['username'];        
// $password = $_POST['password'];        

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

        // Check if the entered password matches the stored password
        if ($enteredPassword == $row['password']) {
            // Valid credentials, redirect to a new page (e.g., dashboard.php)
            header("Location: index.html");
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "Invalid username!";
    }
}

mysqli_close($con);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <title>Login Form</title>

    <style>
        body {
            background-image: url("hosp.png");
            background-size: cover;
            font-family: 'Protest Revolution', sans-serif;
            display: grid;
            place-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-link{
            font-size: 19px;
            color: #0f0f0f; 
        }

        form {
            padding: 20px; 
            background-color: rgba(176, 227, 230, 0.8); 
            width: 80%; 
            border: 3px solid #f1f1f1;
            border-radius: 20px; 
        }

        input[type=text],
        input[type=password] {
            width: 100%; 
            padding: 12px 10px; 
            margin: 8px 0;
            display: inline-block;
            border: 2px solid #87CEEB; 
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #618264;
            color: white;
            padding: 14px 20px;
            margin: 10px 120px; 
            border: 2px;
            border-radius: 5px;
            cursor: pointer;
            width: 50%; /* Made the button full width */
        }

        .image{
            margin-left: 200px;
            size: 700px;
        }
        .welcome{
            text-align: center;
            font-size: 24px;
            color: #0f0f0f;
        }
        
    </style>
</head>

<body>
    <div class="wrapper">
        <img src="plogo.png" class="image" alt="LOGO" style="width:30%">
        <div class="welcome">
            <p><b>Welcome back</b>, Sign-in to continue</p>
        </div>
  
        <form action="index.html" method="post">

            <div class="input-box">
            <i class="fas fa-user"></i> 
            <label for="username"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username:</b></label>
            <input type="text" placeholder="Enter Username" name="username" required><br>
            </div>
            <div class="input-box">
            <i class="fas fa-lock"></i> 
            <label for="password"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password:</b></label>
            <input type="password" placeholder="Enter Password" name="password" required><br>
            </div>
            <button type="submit" onclick="index.html">Login</button><br>
            <div class="remember">
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me for centuries..!
                </label>
            </div>
            <div class="register-link"><p>Don't have an account?<a href="login.html" > Sign up here.</a></p> 
            </label>
        </div>

        </div>
    </form>
    </div>
</body>

</html> 
