<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-27
 * Time: 15:28
 */



function showVid($category) {
    // connect to DB
    $conn = mysqli_connect("localhost", "root", "", "SportClips");

    // select query
    $result = $conn->query("SELECT VidPath, VidName FROM TVideos where VidTag='$category'");

// display videos
    if ($result !== false) {
        if ($result->num_rows > 0) {
            while ($video = $result->fetch_assoc()) {
                $path = $video['VidPath'];

                echo "<div class=\"col-md-4\">
    <div class=\"card mb-4 box-shadow\">
        <video class=\"card-img-top\">
            <source src=\"$path#t=0.1\" type=\"video/mp4\">
        </video>
        <div class=\"card-body\">
            <p class=\"card-text\">Text</p>
            <div class=\"d-flex justify-content-between align-items-center\">
                <div class=\"btn-group\">
                    <button type=\"submit\" name=\"ansehen\" class=\"btn btn-sm btn-outline-secondary\">Ansehen</button>
                    <button type=\"submit\" name=\"loeschen\" class=\"btn btn-sm btn-outline-danger\">Löschen</button>
                </div>
            </div>
        </div>
    </div>
</div>
            
            ";
            }
        } else {
            // error
            echo "
        <div class=\"alert alert-primary\" role=\"alert\">
            Es gibt keine Videos in dieser Kategorie.
        </div>";
        }
    }
}
