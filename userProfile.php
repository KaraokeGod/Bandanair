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
	<link rel="stylesheet" href="assets/css/profile.css" />
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

		<?php
			$name = '';
			$address = '';
			$city = '';
			$state = '';
			$zip = '';
			$phone = '';
			$email = '';
			require_once("./library.php");
			$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

			if(mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			if (isset($_SESSION['username'])) {
				$username = $_SESSION['username'];
				$query = "SELECT * FROM users WHERE Username='$username'";
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					$row = mysqli_fetch_array($result);
					$name = $row['Name'];
					$address = $row['Address'];
					$city = $row['City'];
					$state = $row['State'];
					$zip = $row['ZipCode'];
					$phone = $row['PhoneNumber'];
					$email = $row['Email'];
				}
			}

			mysqli_close($con);
		?>

		<!-- Main -->
		<div id="main-wrapper">
			<div class="container">
				<form method="post" id="profileForm" action="updateProfile.php" onSubmit="window.location.reload()">
					<div class="form_table">
						<div class="q full_width">
							<div class="segment_header" style="width:auto;text-align:Left;">
								<h1 style="color:white;font-size:30px;padding:20px 1em;">Edit Your Personal Information</h1>
							</div>
						</div>
						<div class="q full_width">
							<div class="full_width_space">
								<div> 
									This form allows you to edit your personal information. Currently if you want to change your username or password you will need to contact us. 
								</div>
							</div>
						</div>
						<div class="q required">
							<label class="question top_question" for="nameField">Name&nbsp;
							<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="text" name="nameField" class="text_field" id="nameField" size="40" maxlength="40" value="<?php echo $name; ?>" />
						</div>
						<div class="clear"></div>
						<div class="q required">
							<label class="question top_question" for="addressField">Address &nbsp;
							<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="text" name="addressField" class="text_field" id="addressField" size="60" maxlength="60" value="<?php echo $address; ?>" />
						</div>
						<div class="clear"></div>
						<div class="q required">
							<label class="question top_question" for="cityField">City&nbsp;
							<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="text" name="cityField" class="text_field" id="cityField"  size="50" maxlength="50" value="<?php echo $city ?>" />
						</div>
						<div class="q required">
						<!-- TODO: Add State dropdown for this field -->
							<label class="question top_question" for="stateField">State&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="text" name="stateField" class="text_field" id="stateField"  size="30" maxlength="30" value="<?php echo $state; ?>" />
						</div>
						<div id="q8" class="q required">
							<label class="question top_question" for="zipField">Zip&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="text" name="zipField" class="text_field" id="zipField"  size="10" maxlength="15" value="<?php echo $zip; ?>" />
						</div>
						<div class="clear"></div>
						<div id="q9" class="q required">
							<label class="question top_question" for="phoneField">Phone Number&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="text" name="phoneField" class="text_field" id="phoneField"  size="25" maxlength="255" value="<?php echo $phone; ?>" />
						</div>
						<div id="q10" class="q required">
							<label class="question top_question" for="emailField">Email Address&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="email" name="emailField" class="text_field" id="emailField"  size="50" maxlength="255" value="<?php echo $email; ?>" />
						</div>
						<div class="clear"></div>
						<div class="outside_container">
							<div class="buttons_reverse">
								<input type="submit" name="Submit" value="Submit" class="submit_button" id="formSubmit"/>
							</div>
						</div>
					</div>
				</form>
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

</body>
</html>
