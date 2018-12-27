<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-27
 * Time: 11:56
 */

// store error msg
$msg = "";

// redirecting to upload
if (isset($_POST['hinzufuegen'])) {
    header("location: upload.php");
}

if (isset($_POST['hochladen'])) {
    // allowed file extensions
    $allowedExts = array("mp4", "wma", "mov");
    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    // globals
    $filename = $_FILES["file"]["name"];
    $kategorie = $_POST['kategorie'];
    $path = "clips/" . $filename;
    $id = "NULL";
    $date = date('Y-m-d');

    // validation
    if ((($_FILES["file"]["type"] == "video/mp4") || ($_FILES["file"]["type"] == "video/wma") || ($_FILES["file"]["type"] == "video/quicktime")) && ($_FILES["file"]["size"] < 1000000000) && in_array($extension, $allowedExts)) {
      if ($_FILES["file"]["error"] > 0) {
            $msg = "Es gab einen Fehler bei dem Hochladen.";
        } else {
            // file already exists
            if (file_exists("clips/" . $filename)) {
                $msg = $filename . " existiert bereits.";
            } else {
                // moving file to clips folder
                move_uploaded_file($_FILES["file"]["tmp_name"],
                    "clips/" . $filename);
                $msg = "Die Datei wurde erfolgreich hochgeladen!";

                // connect to DB
                $conn = mysqli_connect("localhost", "root", "", "SportClips");

                // database entry
                $insert = $conn->prepare("INSERT INTO TVideos (VidID, VidName, VidTag, VidPath, VidDatum, BenID) values (?, ?, ?, ?, ?, ?)");
                $insert->bind_param("ssssss", $id, $filename, $kategorie, $path, $date, $benutzerId);
                $insert->execute();
            }
        }
    } else {
        // error
        $msg = "Die Datei ist fehlerhaft.";
    }
}