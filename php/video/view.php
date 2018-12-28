<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-27
 * Time: 21:12
 */

// redirect to video page
if (isset($_POST['ansehen'])) {
    header("location: video.php");

    echo $name;
}
