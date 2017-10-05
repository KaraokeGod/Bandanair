<!DOCTYPE HTML>
<!--
Verti by HTML5 UP
html5up.net | @ajlkn
Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
	<title>optiSave</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="assets/css/main.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<!-- Favicon-->
	<link rel="shortcut icon" href="images/pic08.jpg"/>
</head>
<body class="right-sidebar">
	<div id="page-wrapper">

		<!-- Header -->
		<div id="header-wrapper">
			<header id="header" class="container" style="margin-top: -50px;">

				<!-- Logo -->
				<div id="logo">
					<h1><a href="index.html">opti$ave</a></h1>
					<div>
						<span><i>Save money and study rich.</i></span>
						<div>
						</div>

						<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="index.html">Home</a></li>
				<li><a href="about-us.html">About Us</a></li>
				<li class="current"><a href="register.html">Register</a></li>
				<li><a href="login.html">Login</a></li>
			</ul>
		</nav>

	</header>
</div>

<!-- Banner -->
<div id="banner-wrapper" style="margin-top: -30px;">
	<div id="banner" class="box container">
		<div class="row">
			<div class="7u 12u(medium)">
        <h2> Successfully Registered! </h2>
				<p style="font-size: 35px"> <?php
           include_once("./library.php"); // To connect to the database
           $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
           // Check connection
           if (mysqli_connect_errno())
           {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $hashed_password = null;
            // Form the SQL query (an INSERT query)
            $name = $_POST['form_name'];
            $email = $_POST['form_email'];
            $address = $_POST['form_address'];
            $city = $_POST['form_city'];
            $state = $_POST['form_state'];
            $zipcode = $_POST['form_zipcode'];
            $phone= $_POST['form_phone'];
            $birthday = $_POST['form_birthday'];
            $username = $_POST['form_username'];
            $password = $_POST['form_password'];
            $hashed_password= hash('sha256',$password);
            // session_start();
            // $_SESSION["Email"] = $email;
            $sql="INSERT INTO registeredUsers (name, email, address, city, state, zipcode,phone,birthday,username, password)
            VALUES  ('$name', '$email', '$address', '$city', '$state', '$zipcode','$phone','$birthday','$username',
              '$hashed_password')";
          if (!mysqli_query($con,$sql))
          {
            die('Error: ' . mysqli_error($con));
          }
          else
          {
            echo "Welcome $name. You are registered as $username.";
          }
          mysqli_close($con);
          ?>
        </p>
			</div>
			<div class="5u 12u(medium)">
				<ul>
					<li><a href="#" class="button big icon fa-arrow-circle-right">View your Profile</a></li>
					<li><a href="#" class="button alt big icon">Search Coupons</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- Footer -->
<div id="footer-wrapper" style="margin-top: -45px; margin-bottom: -20px">
	<footer id="footer" class="container">
		<h2 class="ctr">Contact Us</h2>
		<div class="row" style="margin-right: -200px">
			<div class="3u 6u(medium) 12u$(small)" style="margin-left: 80px; margin-right: -80px">
				<!-- Links -->
				<section class="widget contact">
					<h3>Email</h3>
					<ul>
						<li><a href="mailto:apn2my@virginia.edu,ntg9vz@virginia.edu,jb3bt@virginia.edu" class="icon fa-envelope-o" ><span class="label"></span></a></li>
					</ul>
				</section>
			</div>

			<div class="3u 6u$(medium) 12u$(small)" style="margin-right: -80px">
				<!-- Links -->
				<section class="widget contact">
					<h3>GitHub</h3>
						<ul>
							<li><a href="http://github.com/apn2my" class="icon fa-github" ><span class="label"></span></a></li>
						</ul>
				</section>

			</div>

			<div class="3u 6u(medium) 12u$(small)" style="margin-right: -80px">
				<!-- Links -->
				<section class="widget contact">
					<h3>University</h3>
						<ul>
							<li><a href="http://virginia.edu" class="icon fa-graduation-cap" ><span class="label"></span></a></li>
						</ul>
				</section>
			</div>

			<div class="3u 6u$(medium) 12u$(small)">
				<!-- Contact -->
				<section class="widget contact last">
					<h3>Address</h3>
					<p>85 Engineer's Way, Rice Hall<br />
						University of Virginia<br/>
						Charlottesville, VA 22903</p>
					</section>
				</div>
			</div>
			<div class="row" style="margin-bottom: -200px;">
				<div class="12u" style="margin-top: -80px;">
					<div id="copyright">
						<ul class="menu">
							<li>&copy; CS4753 Fall 2017. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
	</div>

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
