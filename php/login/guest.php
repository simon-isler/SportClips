<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-26
 * Time: 13:17
 */

session_start();
$_SESSION['benutzername'] = "Gast";

header("location: ./../../index.php"); // redirecting to index
