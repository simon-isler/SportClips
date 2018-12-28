<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-28
 * Time: 14:19
 */

if (isset($_POST['suchen'])) {
    // connect to DB
    $conn = mysqli_connect("localhost", "root", "", "SportClips");

    // define text
    $suchtext = $_POST['suchtext'];

    // find matches


}