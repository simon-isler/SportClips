<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-20
 * Time: 09:40
 */

session_start();

$msg = "";
$role = "";

if (isset($_POST['registrieren'])) {
    // connect to DB
    $conn = mysqli_connect("localhost", "root", "", "SportClips");

    // Escape user inputs for security
    $benutzername = mysqli_real_escape_string($conn, $_POST['benutzername']);
    $passwort1 = mysqli_real_escape_string($conn, $_POST['passwort1']);
    $passwort2 = mysqli_real_escape_string($conn, $_POST['passwort2']);

    // validation of user input
    if (empty($benutzername) || empty($passwort1) || empty($passwort2)) {
        $msg = "Bitte alle Felder ausfüllen";
    } else {
        // matching passwords
        if ($passwort1 == $passwort2) {
            // get role
            if (isset($_POST['lehrer'])) {
                $role = "Lehrer";
            } else {
                $role = "Schueler";
            }

            // check if user already exists


        } else {
            $msg = "Passwörter stimmen nicht überein!";
        }
    }
}


