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

                <li><a href="about.html">About Us</a></li>
                <li><a href="founders.html">The Founders</a></li>
                <!--<li><a href="sign-up.html">Sign Up</a></li>-->
                <!--<li class="login"><a href="login.html">Login</a></li>-->
                <li class="login"><a href="#">Logout</a></li>
              </ul>
            </nav>

        </header>
      </div>

       <center><h2>Success!</h2></center>
         <div id="banner-wrapper">
           <div id="banner" class="box container">
             <div class="row">
               <div class="7u 12u(medium)">

          				<p style="font-size: 35px"> <?php

                  include_once("./library.php"); // To connect to the database
                  $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
                  // Check connection
                  if (mysqli_connect_errno())
                  {
                   echo "Failed to connect to MySQL: " . mysqli_connect_error();
                   }

                   //---------START OF VALIDATION------------

                      $hashed_password = null;
                      // Form the SQL query (an INSERT query)
                      $email = $_POST['email'];
                      $username = $_POST['username'];
                      $password = $_POST['pass'];
                      $twitter = $_POST['twitter'];
                      $facebook = $_POST['facebook'];
                      $gplus = $_POST['gplus'];
                      $name = $_POST['name'];
                      $phone= $_POST['phone'];
                      $address = $_POST['address'];
                      $city = $_POST['city'];
                      $state = $_POST['state'];
                      $zipcode = $_POST['zip'];
                      $country = $_POST['country'];
                      $hashed_password= hash('sha256',$password);
                      
                      // session_start();
                      // $_SESSION["Email"] = $email;
                      $sql="INSERT INTO users (Name, Email, Address, City, State, ZipCode, Username, Password, Twitter, Facebook, GooglePlus, PhoneNumber, Country)
                      VALUES  ('$name', '$email', '$address', '$city','$state','$zipcode', '$username', '$hashed_password', '$twitter', '$facebook', '$gplus', '$phone', '$country')";
                      if (!mysqli_query($con,$sql))
                      {
                        die('Error: ' . mysqli_error($con));
                      }
                      else
                      {
                      //echo "Welcome $name. You are registered as $username.";
                      //echo "You have successfully registered as $username.";
                      //echo "<h1>hello $username</h1>";


                      echo "<h2><strong>Congratulations</strong> $username</h2>";
                      echo "<p>You are now a member of <strong>BandanAir!</strong></p>";
                    }
                    mysqli_close($con);
                    ?>
                  </p>

                </div>
                <div class="5u 12u(medium)">
                  <ul>
                    <li><a href="#" class="button big icon fa-arrow-circle-right">Browse Products</a></li>
                    <li><a href="#" class="button alt big icon fa-question-circle">Your Profile</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

        <!-- Footer -->
        <div id="footer-wrapper">
          <footer id="footer" class="container">

            <div class="row">
              <div class="12u">
                <div id="copyright">
                  <ul class="menu">
                    <li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </footer>
        </div>
        <!-- Scripts -->

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.dropotron.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>

        </body>
        </html>
