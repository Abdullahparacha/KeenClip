<?php
    include('connect.php');
    session_start();
    $user = $_POST['sess'];
    $result = mysqli_query($Connection, "SELECT * FROM favourite WHERE user='$user'");

    while($row = mysqli_fetch_assoc($result)) {
      $video_id = $row['video_id'];
      
    ?>
    

        <p class="mb-1">
          
        </p>
        <form action="index.php" method="GET" enctype="multipart/form-data">
         
            <div class="input-group">
                <input type="hidden" name="video" class="form-control" value="https://www.youtube.com/watch?v=<?php echo $video_id ?>" placeholder="search youtube video"required="true" >
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            https://www.youtube.com/watch?v=<?php echo $video_id ?>
                        </button>
                </span>
            </div>
        </form>
   </a>
<?php }?>