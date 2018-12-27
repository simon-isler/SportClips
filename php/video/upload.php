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

    // validation
    if ((($_FILES["file"]["type"] == "video/mp4") || ($_FILES["file"]["type"] == "video/wma") || ($_FILES["file"]["type"] == "video/quicktime")) && ($_FILES["file"]["size"] < 1000000000) && in_array($extension, $allowedExts)) {
      if ($_FILES["file"]["error"] > 0) {
            $msg = "Es gab einen Fehler bei dem Hochladen.";
        } else {
            // file already exists
            if (file_exists("clips/" . $_FILES["file"]["name"])) {
                $msg = $_FILES["file"]["name"] . " existiert bereits.";
            } else {
                // moving file to clips folder
                move_uploaded_file($_FILES["file"]["tmp_name"],
                    "clips/" . $_FILES["file"]["name"]);
                $msg = "Die Datei wurde erfolgreich hochgeladen!";

                // database entry

            }
        }
    } else {
        // error
        $msg = "Die Datei ist fehlerhaft.";
    }
}