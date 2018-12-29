<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-28
 * Time: 14:19
 */

function search() {
    if (isset($_POST['suchen'])) {
        // connect to DB
        $conn = mysqli_connect("localhost", "root", "", "SportClips");

        // define text
        $suchtext = mysqli_escape_string($conn, $_POST['suchtext']);

        // find name
        $name = "SELECT * from TVideos where VidName = '$suchtext'";
        $names = $conn->query($name);
        $nameArray = mysqli_fetch_array($names, MYSQLI_NUM);

        // find matches
        if ($nameArray[0] > 0) { // name found
            showVideo("SELECT * from TVideos where VidName = '$suchtext'");
        } else { // name not found -> search for tag
            // get TagID
            $query = "SELECT TagID from TTags where TagName = '$suchtext'";
            $result = $conn->query($query);
            $rs = $conn->query($query);
            $data = mysqli_fetch_array($rs, MYSQLI_NUM);

            // check if there are tags
            if ($data[0] > 0) {
                // save tagID
                while ($tag = $result->fetch_assoc()) {
                    $tagID = $tag['TagID'];
                }

                // get VidID
                $select = "SELECT VidID from TVideoTags where TagID ='$tagID'";
                $output = $conn->query($select);
                $ot = $conn->query($select);
                $dataTags = mysqli_fetch_array($ot, MYSQLI_NUM);

                // check if there are videos with the specific tag
                if ($dataTags > 0) {
                    for ($i = 0; $i < count($dataTags); $i++) {
                        $video = $output->fetch_assoc();
                        $vidid = $video['VidID'];

                        showVideo("SELECT * FROM TVideos where VidID = '$vidid'");
                    }
                } else {
                    // generate error msg if tag exists but no videos
                    showVideo("SELECT * from TVideos where VidName = '$suchtext'");
                }
            } else {
                // generate error msg
                showVideo("SELECT * from TVideos where VidName = '$suchtext'");
            }
            $conn->close();
        }
    } else {
            // display all videos
            showVideo("SELECT VidID, VidPath, VidName, BenID FROM TVideos");
    }
}