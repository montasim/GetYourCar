<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    ////header("location: /NEW-GETYOURCAR/cars.php");
    ////exit;
}
else
{
	header("location: /NEW-GETYOURCAR/login.php");
	exit;
}

?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/NEW-GETYOURCAR/css/main.css">
</head>

<body>
<div class="header">
  <a href="/NEW-GETYOURCAR/index.php" class="logo">GetYourCar</a>

  <div class="header-right">
    <a href="/NEW-GETYOURCAR/index.php">Home</a>
    <a class="active" href="/NEW-GETYOURCAR/cars.php">Cars</a>
    <a href="/NEW-GETYOURCAR/contact.php">Contact</a>
    <a href="/NEW-GETYOURCAR/login.php">Log In</a>
    <a href="/NEW-GETYOURCAR/signup.php">Sign Up</a> 
    <a href="/NEW-GETYOURCAR/about.php">About Us</a>   
    <a href="/NEW-GETYOURCAR/logout.php">Logout</a>                      
  </div>
</div>

<div class="cars-row">
  <div class="cars-column">
    <img src="/NEW-GETYOURCAR/img/car1.jpg" style="width:100%">
    <div class="banner-subheading">
      <h5>Book This Car</h5>
      <p>৳ 1500++<br>
      Sedan Car/Microbus<br>
      Travel from and to<br>
      Any Airport in Bangladesh.</p>
    </div>
    <div class="form-group">
      <a href="/NEW-GETYOURCAR/booking.php"><button class="form-button" type="submit">Book This Car</button></a>
    </div>
  </div>

  <div class="cars-column">
    <img src="/NEW-GETYOURCAR/img/car2.jpg" style="width:100%">
    <div class="banner-subheading">
    <h5>Book This Car</h5>
    <p>৳ 1750++<br>
    Sedan Car/Microbus<br>
    Flexible 4 to 10 Hours Service<br>
    Including Fuel Cost</p>
    </div>
    <div class="form-group">
      <a href="/NEW-GETYOURCAR/booking.php"><button class="form-button" type="submit">Book This Car</button></a>
    </div>
  </div>

  <div class="cars-column">
    <img src="/NEW-GETYOURCAR/img/car3.jpg" style="width:100%">
    <div class="banner-subheading">
    <h5>Book This Car</h5>
    <p>৳ 1500++<br>
    Sedan Car/Microbus<br>
    Travel from and to<br>
    Any Airport in Bangladesh.</p>
    </div>
    <div class="form-group">
      <a href="/NEW-GETYOURCAR/booking.php"><button class="form-button" type="submit">Book This Car</button></a>
    </div>
  </div>
</div>

<br>
<br>

<div class="cars-row">
  <div class="cars-column">
    <img src="/NEW-GETYOURCAR/img/car4.jpg" style="width:100%">
    <div class="banner-subheading">
      <h5>Book This Car</h5>
      <p>৳ 1500++<br>
      Sedan Car/Microbus<br>
      Travel from and to<br>
      Any Airport in Bangladesh.</p>
    </div>
    <div class="form-group">
      <a href="/NEW-GETYOURCAR/booking.php"><button class="form-button" type="submit">Book This Car</button></a>
    </div>
  </div>

  <div class="cars-column">
    <img src="/NEW-GETYOURCAR/img/car5.jpg" style="width:100%">
    <div class="banner-subheading">
    <h5>Book This Car</h5>
    <p>৳ 1750++<br>
    Sedan Car/Microbus<br>
    Flexible 4 to 10 Hours Service<br>
    Including Fuel Cost</p>
    </div>
    <div class="form-group">
      <a href="/NEW-GETYOURCAR/booking.php"><button class="form-button" type="submit">Book This Car</button></a>
    </div>
  </div>
  
  <div class="cars-column">
    <img src="/NEW-GETYOURCAR/img/car6.jpg" style="width:100%">
    <div class="banner-subheading">
    <h5>Book This Car</h5>
    <p>৳ 1500++<br>
    Sedan Car/Microbus<br>
    Travel from and to<br>
    Any Airport in Bangladesh.</p>
    </div>
    <div class="form-group">
      <a href="/NEW-GETYOURCAR/booking.php"><button class="form-button" type="submit">Book This Car</button></a>
    </div>
  </div>
</div>

<br>
<br>

<div class="cars-row">
  <div class="cars-column">
    <img src="/NEW-GETYOURCAR/img/car7.jpg" style="width:100%">
    <div class="banner-subheading">
      <h5>Book This Car</h5>
      <p>৳ 1500++<br>
      Sedan Car/Microbus<br>
      Travel from and to<br>
      Any Airport in Bangladesh.</p>
    </div>
    <div class="form-group">
      <a href="/NEW-GETYOURCAR/booking.php"><button class="form-button" type="submit">Book This Car</button></a>
    </div>
  </div>

  <div class="cars-column">
    <img src="/NEW-GETYOURCAR/img/car8.jpg" style="width:100%">
    <div class="banner-subheading">
    <h5>Book This Car</h5>
    <p>৳ 1750++<br>
    Sedan Car/Microbus<br>
    Flexible 4 to 10 Hours Service<br>
    Including Fuel Cost</p>
    </div>
    <div class="form-group">
      <a href="/NEW-GETYOURCAR/booking.php"><button class="form-button" type="submit">Book This Car</button></a>
    </div>
  </div>
  
  <div class="cars-column">
    <img src="/NEW-GETYOURCAR/img/car9.jpg" style="width:100%">
    <div class="banner-subheading">
    <h5>Book This Car</h5>
    <p>৳ 1500++<br>
    Sedan Car/Microbus<br>
    Travel from and to<br>
    Any Airport in Bangladesh.</p>
    </div>
    <div class="form-group">
      <a href="/NEW-GETYOURCAR/booking.php"><button class="form-button" type="submit">Book This Car</button></a>
    </div>
  </div>
</div>

<br>
<br>

<footer>
  <div class="footer">
    &copy; Copyright 2019 GetYourcar
  </div>
</footer>

</body>
</html>
