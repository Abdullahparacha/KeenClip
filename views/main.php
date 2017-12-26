<?php
session_start();
if($_SESSION['logged'] != true){
header('location:login.php');
exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KeenClip</title>
    
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
    <script type="text/javascript" src="../jQuery/jquery.min.js"></script>
    <script src="http://vjs.zencdn.net/5.10.7/video.js"></script>
    <script src="../videojs/Youtube.min.js"></script>
</head>


<body id="page-top">
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">KeenClip</a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse"  id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="../index.html"><span class="glyphicon glyphicon-home"></span></a>
                </li>
            </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon glyphicon-user"></span><span class="caret"></span></a>
            
        </li>
      </ul>

            <div class="nav navbar-nav navbar-right">
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </div>
        </div>
    </div>
</nav> <br><br><br><br><br><br>


<!--Search for youtube field, jumbotron-->

<div class="jumbotron col-md-10 col-md-offset-1">
    <div class="container-fluid">

        <form action="../videojs/index.php" method="GET" enctype="multipart/form-data"><br>
            <p class="lead">Paste a YouTube video URL in the input box below to start tagging.</p>
            
            <div class="input-group">
                <input type="text" name="video" class="form-control" placeholder="Paste a youtube video URL"required="true" >
                <span class="input-group-btn">
                        <button type="submit" class="btn btn-default" data-target="#myModal" >
                            <span class="glyphicon glyphicon-search">
                            </span>

                            <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        </button>
                </span>
            </div>
        </form>
    </div> <br>
</div>


  

</body>
<!-- <script src="../angular.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.1.4/ui-bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.1.4/ui-bootstrap-tpls.min.js"></script>

</html>

