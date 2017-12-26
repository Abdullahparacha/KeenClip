<?php
session_start();
include('connect.php');
var_dump($_SESSION);
if(!isset($_SESSION['logged']) || $_SESSION['logged'] != true)
{
  header('location:../views/login.php');
}
// die;

$userid = $_SESSION['id'];
$videoUrl;
if (isset($_GET['video'])) {
  $videoUrl = $_GET['video'];
}

else if (isset($_GET['url'])) {
  $videoUrl = $_GET['video'];
}
else {
  die ("Not video selected");
}

// echo "<br><br><br><pre>"; var_dump($_GET['video']); echo "</pre>";


$videoid = NULL;
$id = NULL;
if (isset($_GET['video'])) {
  $xplode  = explode('?v=',$videoUrl);
  $videoid = mysqli_real_escape_string($Connection,$xplode[1]);
  $userID  = $_SESSION['id'];
  $checkstatus = mysqli_query($Connection,"SELECT * FROM `video` WHERE `video_id` = '$videoid'");
  $check = mysqli_num_rows($checkstatus);
  if($check > 0)
  {
  	$fetch = mysqli_fetch_object($checkstatus);
      $id = $fetch->id;
  }
  else
  {
  	$insertQuery = "INSERT INTO `video` (`videoid`,`userid`, `video_id` ) VALUES ('1','$userID', '$videoid')";
  	$Insert = mysqli_query($Connection,$insertQuery);
  	$lastinsertid = "SELECT MAX(id) as lastid FROM video";
  	$fetchlastid = mysqli_query($lastinsertid);
    var_dump($fetchlastid);
  	$fetchid = mysqli_fetch_object($fetchlastid);
  	$id = $fetchid->lastid;	
  }
}

?>


<head>
  <link href="http://vjs.zencdn.net/5.10.7/video-js.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../KeenClip/bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="../../KeenClip/bootstrap/css/bootstrap-theme.min.css"/>
  <link rel="stylesheet" type="text/css" href="../../KeenClip/bootstrap/css/style.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
  <script type="text/javascript" src="../../KeenClip/jQuery/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://vjs.zencdn.net/5.10.7/video.js"></script>
  <script src="../videojs/Youtube.min.js"></script>
  <script type="text/javascript" src="media.youtube.js"></script>>
  <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>

</head>


<!-- Facebook sharing code start -->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Facebook sharing code end -->


<!-- navigation bar -->

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
          <a href="../../KeenClip/index.html"><span class="glyphicon glyphicon-home"></span></a>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon glyphicon-user"></span><span class="caret"></span></a>
          <ul class="dropdown-menu">&nbsp&nbsp&nbsp&nbsp
            <?php
            echo  $_SESSION['name'];
            ?> 
            <li><a href="../../KeenClip/views/logout.php">logout</a></li>
          </ul>
        </li>
      </ul>

      <div class="nav navbar-nav navbar-right">
        <li>
          <a href="../../KeenClip/views/logout.php">Logout</a>
        </li>
      </div>
    </div>
	</div>
</nav> <br><br><br><br>



<!-- Video contents -->

<div class="container">
  <div class="row">
    <div class="col-md-3">

      <div class="panel panel-primary" style="height: 500px; width:255px; overflow-y: auto;">
        <div class="panel-heading">Contents</div>
        <div class="list-group" id="tags-list-group" >
		<?php
		
		$result = mysqli_query($Connection, "SELECT * FROM tags WHERE videos = '$id' ;");


		while($row = mysqli_fetch_array($result)) {
			$tag_title = $row['tag_title'];
			$description = $row['description'];
			$seconds = $row['seconds'];
			$videos = $row['videos'];
		?>
			 <a href="#" data-videoSeconds="<?php echo $seconds; ?>" class="list-group-item list-group-item-action flex-column align-items-start videoSeekerTime" >
        <div class="d-flex w-100 justify-content-between" >
          <h5 class="mb-1"><?php echo $tag_title ?> <small class="pull-right">Time: <?php echo $seconds; ?></small></h5>
        </div>
        <p class="mb-1" <?php echo $description ?></p>
      </a>
		<?php }?>
		</div>
      </div>
    </div>



<!-- videoJS player -->
    <div class="col-md-6">
      <?php if (isset($_GET['video'])):?>
        <div id="myImg">
      <video id="my-video" class="video-js vjs-big-play-centered" controls preload="auto" width="555" height="470"
            data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "<?php echo $_GET['video'] ?>"}] }'>      
      </video>
      </div>

    <?php else: ?>
      <div id="myImg">
      <video id="my-video" class="video-js vjs-big-play-centered" controls preload="auto" width="555" height="464" poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
          <source src="http://localhost/KeenClip/videojs/<?php echo $_GET['url'] ?>" type='<?php echo $_GET['type'] ?>'>
      </video>
      </div>
    <?php endif ?>


    <!-- Buttons -->
		<center>
       <div class="btn-group">
          <a href="../views/main.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
          <button class="btn btn-primary btn-md">Resize </button>
          <button onclick="myFunction()" class="btn btn-primary btn-md">Brightness</button>
          <button type="button" class="btn btn-primary btn-md" data-toggle="popover">
            Tag <span class="glyphicon glyphicon-menu-down"></span>
          </button>
           <a href="#" id="markFavorite" data-video-id="<?php echo $videoid;?>" data-user-id="<?php echo $userid; ?>" class="btn btn-primary btn-md">Save <span class="glyphicon glyphicon-bookmark"></span></a>
       
          <a href="upload.php" class="btn btn-primary btn-md">Upload Video <span class="glyphicon glyphicon-upload"></span></a>
      </div>
      </center><br>



      <!-- for video cropping -->

      <div col-md-6>
      <center>
        <input type="text" id='width' row="2" placeholder="Width">
        <input type="text" id='height' row="2" placeholder="Height">
        <button class="btn btn-primary btn-sm" id="crop"> Resize</button>       
        <button class="btn btn-primary btn-sm" id="cancel"> cancel</button>
      </center>
      </div>
    </div>

    
    <!-- For video saving -->
      <div class="col-md-3">
      <ul style="list-style-type:none">
      <div class="panel panel-primary" style="height: 500px; width:255px; overflow-y: auto;">
        <div class="panel-heading">Save</div>
        <div class="list-group" id="tags-list-group" >
        <div id="favlist">
          
        </div>
       </div>
      </div>
    </div>
  </div>
</div><br><br>




<!--Sharing on social media-->

<div class=" jumbotron col-md-4 col-sm-offset-8">
  <label>Share </label>&nbsp&nbsp
  <div class="fb-share-button" data-href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>&amp;src=sdkpreparse">Share</a></div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  
  <a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

  <a href="https://plus.google.com/share?url=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img
  src="https://www.gstatic.com/images/icons/gplus-16.png" alt="Share on Google+"/></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

  <script type="IN/Share" data-url="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"></script>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

  <label>Get link above video</label>&nbsp&nbsp
  <input type="text" class="form-control" placeholder="Video Link" value="<?php echo $_GET['video'] ?>">
</div>




      <script src="http://vjs.zencdn.net/5.10.7/video.js"></script>
      <script src="//cdn.sc.gl/videojs-hotkeys/0.2/videojs.hotkeys.min.js"></script>
      <script src="../videojs/main.js"></script>


<!--POP script-->

<script type="text/javascript">
  $(document).ready(function(){
    $('[data-toggle="popover"]').popover({
      placement : 'bottom',
      html : true,
      title : 'Tagging <a href="#" class="close" data-dismiss="alert">&times;</a>',
      content : '<form method="post" id="taging_form" action="keenclip.php"><input class="form-control input-sm" id="tag_title" name="tag_title" type="text" placeholder="Title"><br><textarea class="form-control" name="description" rows="3" id="comment" placeholder="Description"></textarea><br>' +
      '<div class="btn btn-group-justified"> <button type="button" class="btn-primary">Share</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' +
      '<button type="submit" name="submit" id="jSubmit" class="btn-primary">Save</button></div></form>'
    });
    $(document).on("click", ".popover .close" , function(){
      $(this).parents(".popover").popover('hide');
    });
  });



  $(document).on('click', '#jSubmit', function (event) {
      event.preventDefault();
      var tag_title = $("#tag_title").val();
      var description = $("#comment").val();
      var video = videojs('my-video');
      var seconds  = video.currentTime();
      var video_id = '<?php echo $id;?>' ;
      var data = {
        tag_title: tag_title,
        description: description,
        seconds: seconds,
        video: video_id
      };

      $.post("keenclip.php", data, function(response){
        $("#tag_title").val('');
        $("#comment").val('');
        var data = $.parseJSON(response);
        var items = "";
        $.each(data, function(index, data) {
        	items += "<a href='#' data-videoSeconds='" + data.seconds + "' class='list-group-item list-group-item-action flex-column align-items-start videoSeekerTime' >" + 
				"<div class='d-flex w-100 justify-content-between'>" +
					"<h5 class='mb-1'>" + data.tag_title + " <small class='pull-right'>Time: " + data.seconds + "</small></h5>" +
				"</div>" +
				"<p class='mb-1'>" + data.description + "</p>" +
			"</a>";
        });
        $("#tags-list-group").html(items);
      });

  })

  $(document).ready(function () {
  	$(".videoSeekerTime").on('click', function () {
  		var seconds = $(this).attr('data-videoSeconds');
  		var video = videojs('my-video');
  		video.currentTime(seconds);
  	})
  });




  $(document).on('click', '#markFavorite', function (event) {
      event.preventDefault();
      var video_id = $(this).attr('data-video-id');
      var user_id = <?php echo $userid;?>;
      var data = {
        user_id: video_id,
        video_id: user_id
      };

      $.post("markFav.php", data, function(response){
        alert(response);
        Fave();
      });

  })




  // for brighness
  function myFunction() {
  
    var bright = document.getElementById("myImg").style.filter;
    if(bright === '')
      document.getElementById("myImg").style.filter = "Brightness(20%)";

    if(bright === "brightness(100%)")
      document.getElementById("myImg").style.filter = "Brightness(20%)";
    else if (bright === "brightness(80%)")
      document.getElementById("myImg").style.filter = "Brightness(100%)";
    else if (bright === "brightness(60%)")
      document.getElementById("myImg").style.filter = "Brightness(80%)";
    else if (bright === "brightness(40%)")
      document.getElementById("myImg").style.filter = "Brightness(60%)";
    else if (bright === "brightness(20%)")
      document.getElementById("myImg").style.filter = "Brightness(40%)";

} 




$(document).on('click', '#crop', function (event) {
      event.preventDefault();
      var width = $('#width').val();
      var height = $('#height').val();
      // check if user has input abnormal values
      if(!(width > 500 || height > 500))
        $('#myImg').css({'height':height, 'width' : width , 'overflow' : 'scroll', 'margin-left' : 'auto', 'margin-right' : 'auto' });

  })

$(document).on('click', '#cancel', function (event) {
      event.preventDefault();
      console.log('messi');
        $('#myImg').css({'height' : 470, 'width' : 555});

  })

Fave();
function Fave(){
  $.post('getfav.php', {sess:<?php echo $_SESSION["id"]; ?>}, function(data, textStatus, xhr) {
      $('#favlist').html(data);
  });

}

</script>





    </body>

