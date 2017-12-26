<?php
session_start();
$con =mysqli_connect("localhost","root","",'keenclip') or die (mysqli_error());
if (isset($_POST['login'])){

    $email=$_POST['email'];
    $pass=$_POST['pass'];

    if($email=="") {
        echo "<script>window.open('login.php?user=Please Enter your email')</script>";
    }

    if($pass=="") {
        echo "<script>window.open('login.php?user=Please Enter your password')</script>";
    }
    else {
        $query="select * from user where email='$email' AND pass='$pass'";
        $run=mysqli_query($con,$query);
        if (mysqli_num_rows($run)>0){
            session_start();
            $login = mysqli_fetch_object($run);
            $id = $login->user_id;
            $name = $login->name;
            $_SESSION['logged'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
            echo "<script>window.open('main.php','_self')</script>";
        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css"/>
    <script type="text/javascript" src="../jQuery/jquery.min.js"></script>
</head>

<body id="page-top">
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">KeenClip</a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="../index.html"><span class="glyphicon glyphicon-home"></span></a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li>
                    <a href="#"><span class="glyphicon glyphicon-log-in">.Login</span></a>
                </li>
                <li>
                    <a href="signup.php"><span class="glyphicon glyphicon glyphicon-user" >.SignUp</span></span></a>
                </li>
                <!-- <li>
                    <a href="../views/contact.html">Contact</a>
   -->             
                </li>
            </ul>
        </div>
    </div>
</nav> <br>

<!-- Login Form -->

<center>
    <form action="#" method="post">
        <div id="login-form" kya bala hai
        ">
        <table align="center" width="30%" border="0">
            <tr>
                <td><input type="text" name="email" placeholder="Your Email" required /></td>
            </tr>
            <tr>
                <td><input type="password" name="pass" placeholder="Your Password" required /></td>
            </tr>
            <tr>
                <td><button type="submit" name="login">Sign In</button></td>
            </tr>
            <tr>
                <td><a href="signup.php">Sign Up Here</a></td>
            </tr>
        </table>
    </div>
</form>
</center>
</body>

<script src="../angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.1.4/ui-bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.1.4/ui-bootstrap-tpls.min.js"></script>
</html>

