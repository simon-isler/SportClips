<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-25
 * Time: 21:40
 */

// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("localhost", "root", "", "SportClips");

session_start();// Starting Session

// Storing Session
$user = $_SESSION['benutzername'];

// SQL Query To Fetch Complete Information Of User
$query = "SELECT BenName, BenRole, BenID from TBenutzer where BenName = '$user'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);

// user data
$benutzername = $row['BenName'];
$_SESSION['benutzerId'] = $row['BenID'];
$_SESSION['role'] = $row['BenRole'];

// assign role to guest
if ($_SESSION['benutzername'] == "Gast") {
    $_SESSION['role'] = "Gast";
    $benutzername = "Gast";
}

