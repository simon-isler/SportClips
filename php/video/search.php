<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-28
 * Time: 14:19
 */

function search() {
    if (isset($_POST['suchen'])) {
        // define text
        $suchtext = $_POST['suchtext'];

        showVideo("SELECT * from TVideos where VidName = '$suchtext'");
    } else {
        showVideo("SELECT VidID, VidPath, VidName, BenID FROM TVideos");
    }
}