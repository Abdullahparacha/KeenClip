<?php
include 'connect.php';

if(
  isset($_POST['user_id']) &&
  isset($_POST['video_id'])
){
    $user_id = $_POST['user_id'];
    $video_id = $_POST['video_id'];

    $query = "INSERT INTO favourite
                (video_id, user)
               VALUES
                ('{$user_id}', '{$video_id}')";
    // echo $query;
    $result = mysqli_query($Connection,$query);
    if($result){
      echo "Marked Save!";
    } else {
      echo "Sorry there was a problem.";
    }
}


