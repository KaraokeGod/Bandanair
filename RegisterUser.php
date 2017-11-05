<!DOCTYPE HTML>
<!--
Verti by HTML5 UP
html5up.net | @ajlkn
Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
  <title>BandanAir</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
  <link rel="stylesheet" href="assets/css/main.css" />
  <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
  <?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

    //Load composer's autoloader
  require 'vendor/autoload.php';?>
</head>
<body class="homepage">
  <div id="page-wrapper">

    <!-- Header -->
    <div id="header-wrapper">
      <header id="header" class="container">

        <!-- Logo -->
        <div id="logo">
          <a href="index.html"><img src="images/BandanAir1.png" width="252" height="156.6" alt="" /></a>
          <!--<h1><a href="index.html">BandanAir</a></h1>-->
        </div>

        <!-- Nav -->
        <nav id="nav">
          <ul>
            <li class="current"><a href="index.html">Home</a></li>
            <li><a href="purchase.html">Purchase</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="founders.html">The Founders</a></li>
            <!--<li><a href="sign-up.html">Sign Up</a></li>-->
            <!--<li class="login"><a href="login.html">Login</a></li>-->
            <li class="login"><a href="#">Logout</a></li>
          </ul>
        </nav>

      </header>
    </div>

    <div id="banner-wrapper">
     <div id="banner" class="box container">
       <div class="row">
         <!--<div class="5u 12u(medium)">-->

          <p style="font-size: 35px"><?php

                include_once("./library.php"); // To connect to the database
                $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
                // Check connection
                if (mysqli_connect_errno()) {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                   //---------START OF VALIDATION------------

                $hashed_password = null;
                // Form the SQL query (an INSERT query)
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['pass'];
                $name = $_POST['name'];
                $phone= $_POST['phone'];
                $address = $_POST['address'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $zipcode = $_POST['zip'];
                $hashed_password= hash('sha256',$password);

                $usernameExists = mysqli_query($con, "SELECT * FROM users WHERE Username='$username'");
                $emailExists = mysqli_query($con, "SELECT * FROM users WHERE Email='$email'");
                if(mysqli_num_rows($usernameExists)>=1){
                  echo "<center><h2 style='color: red'>Registration Failure</h2></center>";
                  echo "<h2>Username <em><strong>$username</strong></em> has already been taken.</h2>";
                  echo "<a href='#' class='button big icon fa-arrow-circle-left' onclick='window.history.back();'><i>Back</i></a>";
                }

                else if(mysqli_num_rows($emailExists)>=1) {
                  echo "<center><h2 style='color: red'>Registration Failure</h2></center>";
                  echo "<h2>Email <em><strong>$email</strong></em> has already been registered.</h2>";
                  echo "<a href='#' class='button big icon fa-arrow-circle-left' onclick='window.history.back();'><i>Back</i></a>";
                }

                else {
                          // session_start();
                          // $_SESSION["Email"] = $email;
                  $sql="INSERT INTO users (Name, Email, Address, City, State, ZipCode, Username, Password, PhoneNumber)
                  VALUES  ('$name', '$email', '$address', '$city','$state','$zipcode', '$username', '$hashed_password', '$phone')";
                  if (!mysqli_query($con,$sql)) {
                    die('Error: ' . mysqli_error($con));
                  }
                  else
                  {
                    echo "<center><h2 style='color: green'>Success!</h2></center>";
                    echo "<p> </p>";
                    echo "<h2><strong>Congratulations</strong> $username</h2>";
                    echo "<p>You are now a member of <strong>BandanAir!</strong></p>";
                    echo "<p> </p>";
                    echo "<a href='#' class='button big icon fa-arrow-circle-right'>Browse Products</a>";
                    echo "<a href='#' class='button alt big icon fa-question-circle'>Your Profile</a>";

                    $mail = new PHPMailer;
                    $mail->isSMTP();
                    $mail->SMTPDebug = 0;
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 587;
                    $mail->SMTPSecure = 'tls';
                    $mail->SMTPAuth = true;
                    $mail->IsHTML(true);
                    $mail->Username = "bandanair2017@gmail.com";
                    $mail->Password = "ecommerce";
                    $mail->setFrom('bandanair2017@gmail.com', 'Bandanair');
                    $mail->addAddress($email, $name);
                    $mail->addEmbeddedImage('images/BandanAirThumbnail.png', 'Logo');
                    $mail->Subject = 'Bandanair Registration Success';
                    $mail->Body    = '<h2>Congratulations ' . $name . '!</h2>
                    <h3>You have registered an account with Bandanair.</h3>
                    <h3>Please log in using your username:</h3><h1>' . $username . '</h1><br/><br/>
                    <img src="cid:Logo"/>';
                    $mail->send();
                  }
                }
                mysqli_close($con);
                ?>
              </p>

            </div>
          </div>
        </div>

        <!-- Footer -->
        <div id="footer-wrapper">
          <footer id="footer" class="container">
            <div class="row">
              <div class="3u 6u(medium) 12u$(small)">
                <a href="index.html"><img src="images/BandanAir1.png" width="252" height="156.6" alt="" /></a>
              </div>
              <div class="3u 6u$(medium) 12u$(small)">

                <!-- Links -->
                <section class="widget links">
                  <h3>Affiliated Events</h3>
                  <ul class="style2">
                    <li><a href="https://ultramusicfestival.com/">Ultra Music Festival</a></li>
                    <li><a href="https://lasvegas.electricdaisycarnival.com/">EDC Music Festival</a></li>
                    <li><a href="http://movement.us/">Movement Music Festival</a></li>
                  </ul>
                </section>

              </div>
              <div class="3u 6u(medium) 12u$(small)">

                <!-- Links -->
                <section class="widget links">
                  <h3>Sitemap</h3>
                  <ul class="style2">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="purchase.html">Purchase</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="founders.html">Founders</a></li>
                    <li><a href="sign-up.html">Sign Up</a></li>
                    <li><a href="login.html">Login</a></li>
                  </ul>
                </section>

              </div>
              <div class="3u 6u$(medium) 12u$(small)">

                <!-- Contact -->
                <section class="widget contact last">
                  <h3>Contact Us</h3>
                  <ul>
                    <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
                  </ul>
                  <p>1900 Jefferson Park Avenue Apt 6<br />
                    Charlottesville, VA 22903<br />
                  (571) 201-9700</p>
                </section>

              </div>
            </div>
          </footer>
          <!-- Scripts -->

          <script src="assets/js/jquery.min.js"></script>
          <script src="assets/js/jquery.dropotron.min.js"></script>
          <script src="assets/js/skel.min.js"></script>
          <script src="assets/js/util.js"></script>
          <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
          <script src="assets/js/main.js"></script>

        </body>
        </html>
