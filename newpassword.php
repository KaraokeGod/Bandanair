<?php
ob_start();
session_start();
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>

<html>
<head>
    <title>Log In</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <?php
      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;

        //Load composer's autoloader
      require 'vendor/autoload.php';?>

    <style>
    .loginMessage{
        color: red;
    }
</style>
</head>
<body class="no-sidebar">
    <div id="page-wrapper">

        <!-- Header -->
        <div id="header-wrapper">
            <header id="header" class="container">

                <!-- Logo -->
                <div id="logo">
                    <!--<h1><a href="index.html">BandanAir</a></h1>-->
                    <a href="index.html"><img src="images/BandanAir1.png" width="252" height="156.6" alt="" /></a>
                </div>

                <!-- Nav -->
                <nav id="nav">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="sign-up.html">Sign Up</a></li>
                        <li class="login"><a href="login.php">Login</a></li>
                    </ul>
                </nav>
            </header>
        </div>
        <div id="background-wrapper">
            <div class="login-page" style="padding-top:0px;">
                <div class = "container form-signin">
                   <?php
                        $msg = '';
                        require_once("./library.php");
                        $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

                        if (mysqli_connect_errno()) {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        if (isset($_POST['login']) && !empty($_POST['username'])
                            && !empty($_POST['email'])) {

                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $query = "SELECT * FROM users WHERE Username='$username'";
                            $result = $con->query($query);
                            if($result->num_rows == 1) {
                                $row = mysqli_fetch_array($result);

                                if($row["Email"] == $email) {
                                    $message = "Password changed.\\nYour new password has been sent to " . $email;
                                    $message = $message . "\\nYou can change your password in your profile.";
                                    echo "<script type='text/javascript'>alert('$message');</script>";

                                    $bytes = openssl_random_pseudo_bytes(10);
                                    $new_pass = substr(preg_replace("/[^a-zA-Z0-9]/", "", base64_encode($bytes)), 0, 9);

                                    $newPassHash = password_hash($new_pass, PASSWORD_DEFAULT);
                                    $query = "UPDATE users SET Password='$newPassHash' WHERE Username='$username'";
                                    $result = $con->query($query);

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
                                    $mail->addAddress($email, "Bandanair User");
                                    $mail->addEmbeddedImage('images/BandanAirThumbnail.png', 'Logo');
                                    $mail->Subject = 'BandanAir Password Changed';
                                    $mail->Body    = '
                                    <h3>Your BandanAir password has been changed.</h3>
                                    <h3>Please log in using your username:</h3><h2>' . $username . '</h2>
                                    <h3>and your new password:</h3><h2>' . $new_pass . '</h2><br/>
                                    <h1>Thanks for shopping at BandanAir!</h1>
                                    <img src="cid:Logo"/>';
                                    $mail->send();

                                    $pwd = bin2hex($bytes);
                                }
                                else{
                                                //$msg = 'Wrong username or password';
                                    $message = "Email incorrect.\\nPlease try again.";
                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                }
                            }
                        		//Username does not exists
                            else {
                                $message = "Username does not exist.\\nPlease try again.";
                                echo "<script type='text/javascript'>alert('$message');</script>";
                            }
                        }
                        mysqli_close($con);


                         // if ($_POST['username'] == 'tutorialspoint' &&
                         //    $_POST['password'] == '1234') {
                         //    $_SESSION['valid'] = true;
                         //    $_SESSION['timeout'] = time();
                         //    $_SESSION['username'] = 'tutorialspoint';

                            //echo 'You have entered valid username and password';
                            //header('Refresh: 0; URL = profile.php');

                         // }else {
                         //    $msg = 'Wrong username or password';
                         // }
                              //}
                    ?>



                </div>
                <!--<h4 class = "form-signin-heading loginMessage"></h4>-->
                <form class = "form-signin login-form" role="form" method="post" id="passwordForm" action="newpassword.php">
                    <center>
                    <h2 style="margin-bottom:0px; color:white;">Get New Password</h2>
                    <h4 style="margin-bottom:10px;color:white;">Your new password will be emailed.</h4>
                    <input type = "text" class = "form-control"
                    name = "username" placeholder = "Username" required autofocus></br>
                    <input type = "text" class = "form-control"
                    name = "email" placeholder = "Email" required>
                    <br/>
                    <button class = "btn btn-lg btn-primary btn-block" type = "submit"
                    name = "login" style="width:100%;">Send New Password</button></center>
                </form>


                <!--<div class="msform" method="post">
                    <form class="login-form">
                        <input type="text" placeholder="Username"/>
                        <input type="password" placeholder="Password"/>
                        <button type = "submit" name = "login">Login</button>
                        <p class="message">Not registered? <a href="sign-up.html">Create an account</a></p>
                    </form>
                </div>-->
            </div>

        </div>
        <center>
        <br/>
        <p class="message" style="font-size:20px; margin-bottom:0px;">
            Not registered? <a href="sign-up.html">Create an account</a>
        </p>
        </center>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="assets/js/login.js"></script>
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
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="sign-up.html">Sign Up</a></li>
                            <li><a href="login.php">Login</a></li>
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

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="assets/js/main.js"></script>
</body>
</html>
