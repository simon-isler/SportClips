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

    // save video values
    while ($video = $result->fetch_assoc()) {
        $name = $video['VidName'];
        $datum = $video['VidDatum'];
        $path = $video['VidPath'];
    }

    // datum
    $newDate = date("d-m-Y", strtotime($datum));

    // get tag id
    $tagID = "SELECT TagID from TVideoTags where VidID = '$id'";
    $output = $conn->query($tagID);
    $num_rows = mysqli_num_rows($output); // number of tags
    $tags = "";

    // save all tags
    for ($i = 0; $i < $num_rows; $i++) {
        // specific tag id
        $tagID = mysqli_fetch_assoc($output);
        $tagID = $tagID['TagID'];

        $tagname = "SELECT TagName from TTags where TagID ='$tagID'";
        $output2 = $conn->query($tagname);

        // store tag into string
        while ($tag = $output2->fetch_assoc()) {
            $tags .=  "  ". $tag['TagName'] ;
        }
    }

    // display video & information
    echo "<video class=\"mainVideo\" id='video' autoplay controls>
            <source src=\"$path\" type=\"video/mp4\">
        </video>";

    echo "<div class=\"info\">
            <h4>$name<?php ?></h4>
            <p>Erstellt am $newDate</p>
            
            <div class=\"alert alert-info\" role=\"alert\">
                <strong>Tag(s)</strong> $tags
            </div>
            
            <br>
             <div class=\"form-check\">
            <input class=\"form-check-input\" type=\"checkbox\" id=\"checkbox\" onclick=\"slowMo();\">
            <label class=\"form-check-label\" for=\"checkbox\">
                Slow Motion
            </label>
            </div>
    </div>";

    $conn->close();
}

