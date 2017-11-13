<?php

// Starting session
session_start();
if(!isset($_SESSION['username'])) {
	echo "Forbidden 403. Not Logged In. Redirecting to Home Page.";
	header('Refresh: 2; URL = index.html');
	exit;
}

?>

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

		// Submitted form
		if (isset($_POST['submitButton'])) {
			if ($_POST['nameField']) {
				$name = $_POST['nameField'];
			}

			if ($_POST['addressField']) {
				$address = $_POST['addressField'];
			}

			if ($_POST['cityField']) {
				$city = $_POST['cityField'];
			}

			if ($_POST['stateField']) {
				$state = $_POST['stateField'];
			}

			if ($_POST['zipField']) {
				$zip = $_POST['zipField'];
			}

			if ($_POST['phoneField']) {
				$phone = $_POST['phoneField'];
			}

			if ($_POST['emailField']) {
				$email = $_POST['emailField'];
			}

			$query = "UPDATE users SET Name='$name', Address='$address', City='$city', State='$state', ZipCode='$zip', PhoneNumber='$phone', Email='$email' WHERE Username='$username'";
			$result = $con->query($query);
		}
		else {
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
		
		if (isset($_POST['passwordSubmit'])) {
			$curr_pass = '';
			$new_pass = '';
			if ($_POST['currPassField']) {
				$curr_pass = $_POST['currPassField'];
			}

			if ($_POST['newPassField']) {
				$new_pass = $_POST['newPassField'];
			}

			$passHash = password_hash($curr_pass, PASSWORD_DEFAULT);
			$query = "SELECT * FROM users WHERE Username='$username'";
			$result = $con->query($query);
			if ($result->num_rows == 1) {
				$row = mysqli_fetch_array($result);
				if (password_verify($curr_pass, $row['Password'])) {
					$newPassHash = password_hash($new_pass, PASSWORD_DEFAULT);
					$query = "UPDATE users SET Password='$newPassHash' WHERE Username='$username'";
					$result = $con->query($query);
					$message = "Your password has been changed!";
					echo "<script type='text/javascript'>alert('$message');</script>";
				}
				else {
					$message = "Current Password Incorrect. \\nTry Again.";
					echo "<script type='text/javascript'>alert('$message');</script>";
				}
			}
		}
		
	}

	mysqli_close($con);
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
	<script>
	  	function validateForm() {
		    var email    = document.forms["profileForm"]["emailField"].value;
		    var name    = document.forms["profileForm"]["nameField"].value;
		    var phone   = document.forms["profileForm"]["phoneField"].value;
		    var address = document.forms["profileForm"]["addressField"].value;
		    var city    = document.forms["profileForm"]["cityField"].value;
		    var state   = document.forms["profileForm"]["stateField"].value;
		    var zip     = document.forms["profileForm"]["zipField"].value;

		    var emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		    var textRegex = /^[a-zA-Z\s]*$/;
		    var phoneRegex = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
		    var addressRegex = /^[A-Za-z0-9#\.\s]*$/;
		    var zipRegex = /^\d{5}$/;

		    if (!emailRegex.test(email)) {
		      alert("Please enter a valid email.");
		    }
		    else if (name == "") {
		    	alert("Please enter a name");
		    }
		    else if (!textRegex.test(name)) {
		      alert("Name must be text-only.");
		    }
		    else if (!phoneRegex.test(phone)) {
		      alert("Phone number must contain only digits and match one of these formats: 'XXXXXXXXXX' 'XXX-XXX-XXXX' 'XXX.XXX.XXXX' 'XXX XXX XXXX'");
		    }
		    else if (address == "") {
		    	alert("Please enter an address.");
		    }
		    else if (city == "") {
		    	alert("Please enter a city.");
		    }
		    else if (state == "") {
		    	alert("Please select a state.");
		    }
		    else if (zip == "") {
		    	alert("Please enter a zip code.");
		    }
		    else if (phone == "") {
		    	alert("Please enter a phone number.");
		    }
		    else if (email == "") {
		    	alert("Please enter an email address.");
		    }
		    else if(!addressRegex.test(address)) {
		      alert("Address must only contain text, numbers, or periods.")
		    }
		    else if (!textRegex.test(city)) {
		      alert("City be text-only.");
		    }
		    else if (!zipRegex.test(zip)) {
		      alert("Zip code must be 5 digits.");
		    }
		    else {
		      return true;
		    }
		    return false;
		}

		function validatePasswordForm() {
			var current_password  = document.forms["passwordForm"]["currPassField"].value;
		    var new_password	  = document.forms["passwordForm"]["newPassField"].value;
		    var conf_new_password = document.forms["passwordForm"]["confNewPassField"].value;

		    var passwordRegex = /^[A-Za-z0-9!@#$%^&*()_]{6,}/;

 			if (current_password == "") {
		    	alert("Please enter your current password.");
		    }
		    else if (new_password == "") {
		    	alert("Please enter a new password.");
		    }
		    else if (conf_new_password == "") {
		    	alert("Please confirm your new password.");
		    }
		    else if (new_password != conf_new_password) {
		    	alert("Your new password doesn't match with the confirmation.");
		    }
		    else if (!passwordRegex.test(new_password)) {
		    	alert("New passworrd must be at least 6 alphanumeric and/or special characters.");
		    }
		    else {
		      return true;
		    }
		    return false;
		}

	  	function setSelect() {
	  		document.getElementById('stateField').value = '<?php echo $state ?>';
	  	}
	</script>
</head>

<body class="left-sidebar" onload="setSelect()">
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
			<div class="container" style="border-radius:6;">
				<form method="post" id="profileForm" action="userProfile.php" onSubmit="return validateForm()">
					<div class="form_table">
						<div class="q full_width" >
							<div class="segment_header" style="width:auto;text-align:Left; border-radius:6px;">
								<h1 style="color:white;font-size:30px;padding:20px 1em;">Edit Personal Information</h1>
							</div>
						</div>
						<div class="q full_width">
							<div class="full_width_space">
								<h4 style="margin-left:10px;"><i>
									This form allows you to update your personal information.
								</i></h4>
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
							<select name="stateField" class="text_field" id="stateField" >
								<option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="Delaware">Delaware</option><option value="District of Columbia">District of Columbia</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Guam">Guam</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Maine">Maine</option><option value="Maryland">Maryland</option><option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Mississippi">Mississippi</option><option value="Missouri">Missouri</option><option value="Montana">Montana</option><option value="Nebraska">Nebraska</option><option value="Nevada">Nevada</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="New York">New York</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Northern Marianas Islands">Northern Marianas Islands</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Puerto Rico">Puerto Rico</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Vermont">Vermont</option><option value="Virginia">Virginia</option><option value="Virgin Islands">Virgin Islands</option><option value="Washington">Washington</option><option value="West Virginia">West Virginia</option><option value="Wisconsin">Wisconsin</option><option value="Wyoming">Wyoming</option>
							</select>
						</div>
						<div class="q required">
							<label class="question top_question" for="zipField">Zip&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="text" name="zipField" class="text_field" id="zipField"  size="10" maxlength="15" value="<?php echo $zip; ?>" />
						</div>
						<div class="clear"></div>
						<div class="q required">
							<label class="question top_question" for="phoneField">Phone Number&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="text" name="phoneField" class="text_field" id="phoneField"  size="25" maxlength="255" value="<?php echo $phone; ?>" />
						</div>
						<div class="q required">
							<label class="question top_question" for="emailField">Email Address&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="email" name="emailField" class="text_field" id="emailField"  size="50" maxlength="255" value="<?php echo $email; ?>" />
						</div>
						<div class="clear"></div>
						<div class="outside_container">
							<div class="buttons_reverse">
								<input type="submit" name="submitButton" value="Update Information" class="submit_button" id="formSubmit"/>
							</div>
						</div>
					</div>
				</form>
				</br>
				<form method="post" id="passwordForm" action="userProfile.php" onSubmit="return validatePasswordForm()">
					<div class="form_table">
						<div class="q full_width">
							<div class="segment_header" style="width:auto;text-align:Left; border-radius:6px;">
								<h1 style="color:white;font-size:30px;padding:20px 1em;">Change Your Password</h1>
							</div>
						</div>
						<div class="q full_width">
							<div class="full_width_space">
								<h4 style="margin-left:10px;"><i>
									Change your password by confirming your old password and specifying your new password.
								</i></h4>
							</div>
						</div>
						<div class="q required">
							<label class="question top_question" for="currPassField">Current Password&nbsp;
							<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="password" name="currPassField" class="text_field" id="currPassField" size="40" maxlength="40"/>
						</div>
						<div class="clear"></div>
						<div class="q required">
							<label class="question top_question" for="newPassField">New Password&nbsp;
							<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="password" name="newPassField" class="text_field" id="newPassField"  size="50" maxlength="255"/>
						</div>
						<div class="q required">
							<label class="question top_question" for="confNewPassField">Confirm New Password&nbsp;
							<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="password" name="confNewPassField" class="text_field" id="confNewPassField"  size="50" maxlength="255"/>
						</div>
						<div class="clear"></div>
						<div class="outside_container">
							<div class="buttons_reverse">
								<input type="submit" name="passwordSubmit" value="Change Password" class="submit_button" id="passwordSubmit"/>
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
