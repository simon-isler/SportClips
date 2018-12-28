<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-27
 * Time: 15:28
 */

// globals
$path = "";
$name = "";

// change video options according to browser
function videoSettings() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    if (stripos( $user_agent, 'Chrome') !== false) {
        echo "<video class=\"card-img-top\">";
    } elseif (stripos( $user_agent, 'Safari') !== false) {
        echo "<video class=\"card-img-top\" autoplay>";
        echo "hoi";
    } else {
        echo "<video class=\"card-img-top\">";
    }
}

function showVideo($select) {
    global $path;
    global $name;

    // connect to DB
    $conn = mysqli_connect("localhost", "root", "", "SportClips");

    // select query
    $result = $conn->query($select);

    // video(s) found
    if ($result !== false) {
        if ($result->num_rows > 0) {
            while ($video = $result->fetch_assoc()) {
                // save path of video
                $path = $video['VidPath'];
                $name = $video['VidName'];
                $id = $video['BenID'];

                // author
                $query = "SELECT BenName from TBenutzer where BenID = '$id'";
                $output = $conn->query($query);

                while ($author = $output->fetch_assoc()) {
                    $owner = $author['BenName'];
                }

                // display videos
                echo " 
               <div class=\"col-md-4\">
                                <form method=\"post\">
                                <div class=\"card mb-4 shadow-sm\">";
                                    videoSettings();
                                        echo "<source src=\"$path#t1.0\" type=\"video/mp4\">
                                    </video>
                                    <div class=\"card-body\">
                                        <p class=\"card-text\"></p>
                                        <div class=\"d-flex justify-content-between align-items-center\">
                                            <div class=\"btn-group\">
                                                <button type=\"submit\" name=\"ansehen\" class=\"btn btn-sm btn-outline-secondary\">View</button>
                                                <button type=\"submit\" name=\"loeschen\" class=\"btn btn-sm btn-outline-danger\">Löschen</button>
                                            </div>
                                            <small class=\"text-muted\">$owner</small>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
               ";
            }
        } else {
            // error
            echo "
        <div class=\"alert alert-danger\" role=\"alert\">
            Es gibt keine Videos in dieser Kategorie.
        </div>";
        }
    }
}
