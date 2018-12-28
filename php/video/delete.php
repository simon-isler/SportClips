<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-27
 * Time: 21:16
 */

if (isset($_POST['loeschen'])) {
    // connect to DB
    $conn = mysqli_connect("localhost", "root", "", "SportClips");

    // save vid id
    $id = $_POST['loeschen'];

    // video path
    $select = "SELECT VidPath from TVideos where VidID ='$id'";
    $result = $conn->query($select);

    while ($video = $result->fetch_assoc()) {
        $path = $video['VidPath'];
    }

    // delete video in folder
    unlink($path);

    // delete video in db
    $query = "DELETE FROM TVideos WHERE VidID = '$id'";
    $conn->query($query);
}