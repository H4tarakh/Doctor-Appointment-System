
<?php

$server = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "sydb"; 

// Create connection
$conn = new mysqli($server, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM docform";
$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <title>Index</title>
  <link rel="stylesheet" href="indexstyle.css">
</head>

<body>
  <header>
    <div class="info">
      <img src="llogo.png" width="10%" class="rounded-image">
      <h1>D- Slot booking</h1>
      <a href="medsdel.html" class="btn3">MEDS Delivery</a>
      <a href="about.html" class="btn3">About us</a>
    </div>
  </header>

  <div class="marquee-container">
    <marquee>
      <p>Dr. Akanksha Sharma will visit Ruby Hospital on 5th June.</p>
    </marquee>

  <section>
    <nav class="navbar">
      <h3>Specialists : </h3><br>
      <div class="dlist">
        <ul>
          <li><a href="car.html"><i class="fa-solid fa-heart-pulse"></i> Cardiologists</a></li>
          <li><a href="car.html"><i class="fa-solid fa-brain"></i> Neurologists</a></li>
          <li><a href="car.html"><i class="fa-solid fa-bone"></i> Orthopedic</a></li>
          <li><a href="car.html"><i class="fa-solid fa-user-doctor"></i> G Surgeons</a></li>
        </ul>
      </div>
      <div class="social_media">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </nav>

    <section id="section">
      <div class="city">
        <h1>Cardiologists in City </h1>
      </div>

      <div class="dcontainer">

        <?php
        // Loop through fetched data and display it within the boxes
        while ($row = $result->fetch_assoc()) {
          ?>
          <div class="dbox">
            <img src="doc1.jpg">
            <div class="dcontent">
              <div class="dcontent1">
                <i class="fa-solid fa-user-doctor"></i>
                <h2> &nbsp<?php echo $row["name"]; ?> </h2>
              </div>

              <div class="dcontent2">
                <!-- <i class="fa-regular fa-clock"></i> -->
                <!-- <i class="fa-solid fa-school"></i> -->
                <i class="fa-solid fa-user-doctor"></i>
                <p>&nbsp&nbsp&nbspDegree <?php echo $row["degree"]; ?> </p>
              </div>
              <div class="dcontent3">
                
                <i class="fa-solid fa-hospital"></i>
                <p>&nbsp&nbspHospital Rs.<?php echo $row["hosp"]; ?></p>
              </div>
              <div class="dcontent4">
                <!-- <i class="fa-solid fa-location-dot"></i> -->
                <i class="fa-solid fa-money-check"></i>
                <p> &nbsp&nbsp&nbsp Fees <?php echo $row["fees"]; ?>/-</p>
              </div>

              <a href="book.php" class="btn2"> &nbsp Book Appointment &nbsp </a>
            </div>
          </div>
        <?php
        }
        ?>

      </div>
    </section>
  </section>

  <footer>
    <p>Copyright © D-Slot Booking - All Rights Reserved | Privacy Policy </p>
  </footer>

</body>

</html>
