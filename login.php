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

                   if (mysqli_connect_errno()){
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                if (isset($_POST['login']) && !empty($_POST['username'])
                 && !empty($_POST['password'])) {

                    $username = $_POST['username'];
                $_SESSION['username'] = $username;
                $password = $_POST['password'];
                $passHash = password_hash($password, PASSWORD_DEFAULT);
                $query1 = "SELECT * FROM users WHERE Username='$username'";
                $result = $con->query($query1);
                if($result->num_rows == 1) {
                   $row = mysqli_fetch_array($result);
                   if(password_verify($password,$row['Password'])){

                    echo "<script> window.location.assign('profile.php'); </script>";
                }
                else{
                                //$msg = 'Wrong username or password';
                    $message = "Password incorrect.\\nPlease try again.";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }
                        		//Username does not exists
            else{
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
                    <!--<h4 class = "form-signin-heading loginMessage"><?php echo $msg; ?></h4>-->
                    <form class = "form-signin login-form" role = "form"
                    action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                    ?>" method = "post">
                    <h2 style="color:white;">Login</h2>
                    <input type = "text" class = "form-control"
                    name = "username" placeholder = "Username"
                    required autofocus></br>
                    <input type = "password" class = "form-control"
                    name = "password" placeholder = "Password" required>
                    <br/>
                    <center><button class = "btn btn-lg btn-primary btn-block" type = "submit"
                    name = "login" style="width:100%;">Log In</button></center>
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
        <p class="message" style="font-size:20px;">
            Forgot password? <a href="sign-up.html">Get temporary password</a>
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
