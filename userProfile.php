<?php

// Starting session
session_start();
if(!isset($_SESSION['username'])) {
	echo "Forbidden 403. Not Logged In. Redirecting to Home Page.";
	header('Refresh: 2; URL = index.html');
	exit;
}

?>

<html>
<head>
	<title>BandanAir</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/product.css" />
	<link rel="stylesheet" href="assets/css/converter.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
<body class="left-sidebar">
	<div id="page-wrapper">

		<!-- Header -->
		<div id="header-wrapper">
			<header id="header" class="container">

				<!-- Logo -->
				<div id="logo">
					<a href="profile.php"><img src="images/BandanAir1.png" width="252" height="156.6" alt="" /></a>
				</div>

				<!-- Nav -->
				<nav id="nav">
					<ul>
            <li><a href="profile.php">Home</a></li>
            <li class="current"><a href="userProfile.php">Profile</a></li>
            <li><a href="logged_in_purchase.php">Purchase</a></li>
            <li><a href="logged_in_about.html">About Us</a></li>
            <li class="login"><a href="logout.php">Logout</a></li>
					</ul>
				</nav>

			</header>
		</div>

		<!-- Main -->
		<div id="main-wrapper">
			<div class="container">
				<div class="row 200%">
					<div class="8u 12u$(medium) important(medium)">
						<div id="content">
							<!-- Content -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Footer -->
<div id="footer-wrapper">
	<footer id="footer" class="container">
		<div class="row">
			<div class="3u 6u(medium) 12u$(small)">
				<a href="profile.php"><img src="images/BandanAir1.png" width="252" height="156.6" alt="" /></a>
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
            <li><a href="profile.php">Home</a></li>
            <li><a href="logged_in_purchase.php">Purchase</a></li>
            <li><a href="logged_in_about.html">About Us</a></li>
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
</div>

</div>

<!-- Scripts -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>
<script src="assets/js/product.js"></script>
<script src="assets/js/calculator.js"></script>
<script src="assets/js/currencyProfile.js"></script>

</body>
</html>
