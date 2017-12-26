<?php

$result = mysqli_query("SELECT * FROM tags WHERE videos = '$id';");

while($row = mysqli_fetch_array($result)) {
    $tag_title = $row['tag_title'];
    $description = $row['description'];
    $seconds = $row['seconds'];
    $videos = $row['videos'];

    echo "
        <tr id=''>
            <td>$tag_title</td>
            <td>$description</td>
        </tr>
";

?>
