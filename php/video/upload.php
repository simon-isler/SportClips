<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-27
 * Time: 11:56
 */

// store error msg
$msg = "";

if (isset($_POST['hochladen'])) {
    // globals
    $filename = $_FILES["file"]["name"];
    $titel = $_POST['titel'];
    $kategorie = $_POST['tags'];
    $path = "clips/" . $filename;
    $id = "NULL";
    $date = date('Y-m-d');

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

                // database entry
                $insert = $conn->prepare("INSERT INTO TVideos (VidID, VidName, VidTag, VidPath, VidDatum, BenID) values (?, ?, ?, ?, ?, ?)");
                $insert->bind_param("ssssss", $id, $titel, $kategorie, $path, $date, $benutzerId);
                $insert->execute();
            }
        }
    } else {
        // error
        $msg = "Die Datei ist fehlerhaft.";
    }
}