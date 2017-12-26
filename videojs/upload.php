<?php
if(isset($_POST["submit"])) {
    // echo '<pre>'; var_dump($_FILES); echo "</pre>"; die;
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    $check = $_FILES["fileToUpload"]["size"];
    // echo '<pre>'; var_dump($check); echo "</pre>"; die;

    if($check !== false) {
        echo "File is a video - " . $_FILES["fileToUpload"]["type"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not a video.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            header("Location: index.php?url=" . $target_file . "&type=" . $_FILES["fileToUpload"]["type"]);
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style>
    body {
        background-image: url(../images/header.jpg);
         background-color: #cccccc;
            background-repeat: no-repeat;
            background-position: right top;
            background-size: auto;
            background-attachment: fixed;
    }
</style>

</head>
<body>

<div class="container" id="UploadVideo">
<div class="row">
<div class="col-sm-12">
<div><br><br><br><br><br><br>
<form action="" method="POST" enctype="multipart/form-data"><br><br><br>
    <center><button class="btn-primary"><input type="file" class="btn-primary btn-lg" name="fileToUpload" id="fileToUpload"></button></center><br><br>
    <center><input type="submit" class="btn-primary btn-lg" name="submit" value="Uplaod Video"></center>
  
</form>
</div>
</div>  
</div>
  </div>


</body>
</html>




<!-- 
  <form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
    <input type="submit" name="submit" value="Uplaod Video">
  
</form> -->

