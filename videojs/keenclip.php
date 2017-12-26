<?php
include 'connect.php';

if(
  isset($_POST['tag_title']) &&
  isset($_POST['description']) &&
  isset($_POST['seconds']) &&
  isset($_POST['video'])
){
    $tag_title = $_POST['tag_title'];
    $description = $_POST['description'];
    $seconds = $_POST['seconds'];
    $video = $_POST['video'];

    $query = "INSERT INTO tags
                (tag_title, description, seconds, videos)
               VALUES
                ('{$tag_title}', '{$description}', '{$seconds}', '{$video}')";

    $result = mysqli_query($Connection, $query) or die (mysqli_error());
    if($result){
      // Get and echo json of all data
      $dataArray = [];
      $query = mysqli_query($Connection, "SELECT * FROM tags WHERE videos='{$video}'");
      while ($row = mysqli_fetch_assoc($query)) {
        $dataArray[] = $row;
      }

      echo json_encode($dataArray);
    }
}


