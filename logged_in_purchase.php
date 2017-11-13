<?php
// Starting session
session_start();
if(!isset($_SESSION['username'])){
  echo "Forbidden 403. Not Logged In. Redirecting to Home Page.";
  header('Refresh: 2; URL = index.html');
  exit;
}
// Accessing session data
//echo 'Hi, ' . $_SESSION["username"];
?>
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
					<!--<h1><a href="index.html">BandanAir</a></h1>-->
					<a href="profile.php"><img src="images/BandanAir1.png" width="252" height="156.6" alt="" /></a>
				</div>

				<!-- Nav -->
				<nav id="nav">
					<ul>
            <li><a href="profile.php">Home</a></li>
            <li><a href="userProfile.php">Profile</a></li>
            <li class="current"><a href="logged_in_purchase.php">Purchase</a></li>
            <li><a href="logged_in_about.html">About Us</a></li>
            <!--<li><a href="sign-up.html">Sign Up</a></li>-->
            <!--<li class="login"><a href="login.html">Login</a></li>-->
            <li class="login"><a href="logout.php">Logout</a></li>
					</ul>
				</nav>

			</header>
		</div>

		<!-- Main -->
		<div id="main-wrapper">
			<div class="container">
				<div class="row 200%">
					<div class="4u 12u$(medium)">
						<div id="sidebar">
							<!-- Sidebar -->
							<section>
								<div class="slideshow-container">
									<div class="slide fade">
										<div class="numbertext">1/3</div>
										<img src="images/bandana_red.jpeg" width="100%" height="400" alt="" />
										<div class="text">Red</div>
									</div>
									<div class="slide fade">
										<div class="numbertext">2/3</div>
										<img src="images/bandana_blue.jpeg" width="400" height="400" alt="" />
										<div class="text">Blue</div>
									</div>
									<div class="slide fade">
										<div class="numbertext">3/3</div>
										<img src="images/bandana_black.jpg" width="400" height="400" alt="" />
										<div class="text">Black</div>
									</div>

									<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
									<a class="next" onclick="plusSlides(1)">&#10095;</a>
								</div>
								<br>
								<div style="text-align:center">
									<span class="dot" onclick="currentSlide(1)"></span>
									<span class="dot" onclick="currentSlide(2)"></span>
									<span class="dot" onclick="currentSlide(3)"></span>
								</div>
							</section>
						</div>
					</div>
					<div class="8u 12u$(medium) important(medium)">
						<div id="content">
							<!-- Content -->
							<article>
								<span class="product-name">
									Classic Bandana
								</span> &nbsp;
								<span class="a-size-medium a-color-success">
									In Stock
								</span>
							</br>
							<span class="price">
								Price:
							</span>
							<span class="a-size-medium a-color-price">
								0.000909 BTC (5 USD)
							</span>
						</br>
						<li> Sewn in interior filter that blocks 99.95% of all dust particles.</li>
						<li> Made from breathable, moisture wicking material to keep you cool and comfortable in all scenarios.</li>
						<li> Great for both raves and casual wear.</li>
						<li> Universal size accomodates neck sizes up to 20"</li>
						<li> Free Shipping*</li>
						<span class="details">
							Product Details
						</span>
						<table class="a-keyvalue prodDetTable">
							<tbody>
								<tr>
									<th class="a-color-secondary a-size-base prodDetSectionEntry">
										Brand
									</th>
									<td class="a-size-base">
										Bandanair
									</td>
								</tr>
								<tr>
									<th class="a-color-secondary a-size-base prodDetSectionEntry">
										Model
									</th>
									<td class="a-size-base">
										Classic
									</td>
								</tr>
								<tr>
									<th class="a-color-secondary a-size-base prodDetSectionEntry">
										Item Weight
									</th>
									<td class="a-size-base">
										4.8 ounces
									</td>
								</tr>
								<tr>
									<th class="a-color-secondary a-size-base prodDetSectionEntry">
										Product Dimensions
									</th>
									<td class="a-size-base">
										12 x 9 x 3 inches
									</td>
								</tr>
								<tr>
									<th class="a-color-secondary a-size-base prodDetSectionEntry">
										*Shipping
									</th>
									<td class="a-size-base">
										Free for domestic only. Contact us for international rates.
									</td>
								</tr>
							</tbody>
						</table>
						<div align="center">
							<form action="https://test.bitpay.com/checkout" method="post" >
								<input type="hidden" name="action" value="checkout" />
								<input type="hidden" name="posData" value="" />
								<input type="hidden" name="data" value="n3dcSxI5aYk3tKL5uXcYbCFOqC8avl0IfjgLFviNGt4hFCY25ppUs5kmNLHuWvoylcpKEUpOlEpi5LrVUX8C9CPX9e55H6SIY4ebEB9E8B2rwoW6b0THgFFaLoWumVvzIuo8NTPNy/mM+mn9rs6If1v9n8Sk9RE/8e3mkwMFo4o81MUk5bOHZq3B5BZ/lyvAdxuc6nE+8n/FV4KAJsUJaIGyos5pNOU4FjmXgwSrXMk=" />
								<input type="image" src="https://test.bitpay.com/img/button-large.png" border="1" name="submit" alt="BitPay, the easy way to pay with bitcoins." >
							</form>
						</div>

						<br/>
						<hr>
						<br/>

						<div class="btc-calculator">

							<span class="product-name">Bitcoin Converter</span>
							<p>Stay up to date with the current price of Bitcoin. Updated by the minute.</p>
							<form class="form-holder">
								<input type="hidden" value="EUR" name="right_curr">
								<input type="hidden" value="BTC" name="left_curr">
								<div class="calc-col">
									<input id="left_val" type="text" value="1" name="left_val" old="1" reg="^[0-9]{0,7}(.([0-9]{0,8}))?$">
									<span class="name">
										<a id="left_curr" href="#">
											<span id="left_curr_text">BTC</span>
											<i class="calc-arrow">
											</i>
										</a>
									</span>
									<ul id="fiat-list-left" class="fiat-list" style="display: none;">
										<li>
											<a class="btc" href="#">BTC</a>
										</li>
									</ul>
								</div>

								<div class="calc-col">
									<input id="right_val" type="text" value="0" name="right_val" old="0" reg="^[0-9]{0,7}(.([0-9]{0,2}))?$">
									<div class="fiat-choose">
										<span class="name">
											<a id="right_curr" href="#">
												<span id="right_curr_text">EUR</span>
												<i class="calc-arrow">
												</i>
											</a>
										</span>
										<ul id="fiat-list-right" class="fiat-list" style="display: none;">
											<li>
												<a class="eur" href="#">EUR</a>
											</li>
											<li>
												<a class="usd" href="#">USD</a>
											</li>
										</ul>
									</div>
								</div>
							</form>
							<div class="calc-col">
								<a id="buy-link" class="buy-link button icon fa-info-circle"href="https://www.coinbase.com/">Buy Bitcoins Now</a>
							</div>
						</div>
					</article>
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
