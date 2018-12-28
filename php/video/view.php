<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-27
 * Time: 21:12
 */

function videoViewer($id) {
    // connect to DB
    $conn = mysqli_connect("localhost", "root", "", "SportClips");

    // get values from db
    $query = "SELECT VidName, VidDatum, VidPath from TVideos where VidID ='$id'";
    $result = $conn->query($query);

    // save values
    while ($video = $result->fetch_assoc()) {
        $name = $video['VidName'];
        $datum = $video['VidDatum'];
        $path = $video['VidPath'];
    }


    // display video & information
    echo "<video class=\"mainVideo\" id='video' controls>
            <source src=\"$path\" type=\"video/mp4\">
        </video>";

    echo "<div class=\"info\">
            <h4>$name<?php ?></h4>
            <p>$datum</p>
        </div>";
}