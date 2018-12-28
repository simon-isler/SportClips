<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-27
 * Time: 11:56
 */

// store error msg
$msg = "";

// function to insert tags
function insertTags($conn, $check, $titel, $null, $tags, $id, $tagID) {
    $rs = mysqli_query($conn,$check);
    $data = mysqli_fetch_array($rs, MYSQLI_NUM);

    // save tag id
    $output = $conn->query($check);

    while ($tag = $output->fetch_assoc()) {
        $tagID = $tag['TagID'];
    }

    // save video id
    $select = "SELECT VidID from TVideos where VidName ='$titel'";
    $result = $conn->query($select);

    while ($video = $result->fetch_assoc()) {
        $id = $video['VidID'];
    }

    // check if tag exists already
    if ($data[0] > 0) { // tag exists already
        // tag insert for video
        $query = $conn->prepare("INSERT INTO TVideoTags (VideoTagID, VidID, TagID) values (?, ?, ?)");
        $query->bind_param("sss", $null, $id, $tagID);
        $query->execute();
    } else { // tag doesn't exist
        // insert tag into DB
        $insert = $conn->prepare("INSERT INTO TTags (TagID, TagName) values (?, ?)");
        $insert->bind_param("ss", $null, $tags[0]);
        $insert->execute();

        // overwrite tag id
        $output = $conn->query($check);
        while ($tag = $output->fetch_assoc()) {
            $tagID = $tag['TagID'];
        }

        // tag insert for video
        $query = $conn->prepare("INSERT INTO TVideoTags (VideoTagID, VidID, TagID) values (?, ?, ?)");
        $query->bind_param("sss", $null, $id, $tagID);
        $query->execute();
    }
}

if (isset($_POST['hochladen'])) {
    // globals
    $filename = $_FILES["file"]["name"];
    $titel = $_POST['titel'];
    $tags = $_POST['tags'];
    $path = "clips/" . $filename;
    $id = "NULL";
    $tagID = "";
    $date = date('Y-m-d');
    $null = "";

    // connect to DB
    $conn = mysqli_connect("localhost", "root", "", "SportClips");

    // check if title already exists
    $check="SELECT * FROM TVideos WHERE VidName = '$titel'";
    $rs = mysqli_query($conn,$check);
    $data = mysqli_fetch_array($rs, MYSQLI_NUM);

    // validation (allowing all video types)
    if ((preg_match('#^video/.*$#',$_FILES["file"]["type"])) && ($_FILES["file"]["size"] < 10000000000)) {
      if ($_FILES["file"]["error"] > 0) {
            $msg = "Es gab einen Fehler bei dem Hochladen.";
        } else {
            // file already exists
            if (file_exists("clips/" . $filename) ) {
                $msg = $filename . " existiert bereits.";
            // title already in use
            } elseif ($data[0] > 0 ) {
                $msg = "Dieser Titel wurde bereits verwendet!";
            } else {
                // moving file to clips folder
                move_uploaded_file($_FILES["file"]["tmp_name"],
                    "clips/" . $filename);
                $msg = "Die Datei wurde erfolgreich hochgeladen!";

                // video database entry
                $insert = $conn->prepare("INSERT INTO TVideos (VidID, VidName, VidPath, VidDatum, BenID) values (?, ?, ?, ?, ?)");
                $insert->bind_param("sssss", $id, $titel, $path, $date, $benutzerId);
                $insert->execute();

                // save tags
                $tags = explode(",", $tags); // divide
                $length = count($tags); // count tags

                // insert tags
                if ($length < 1) { // one tag
                    $check = "SELECT TagID FROM TTags where TagName='$tags[0]'";
                    insertTags($conn, $check, $titel, $null, $tags, $id, $tagID);
                } else { // several tags
                    for ($i = 0; $i < $length; $i++) {
                        $check = "SELECT TagID FROM TTags where TagName='$tags[$i]'";
                        insertTags($conn, $check, $titel, $null, $tags, $id, $tagID);
                    }
                }
            }
        }
    } else {
        // error
        $msg = "Die Datei ist fehlerhaft.";
    }
}
