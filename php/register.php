<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-20
 * Time: 09:40
 */


$msg = "";
$role = "";

if (isset($_POST['registrieren'])) {
    // connect to DB
    $conn = mysqli_connect("localhost", "root", "");

    // Escape user inputs for security
    $benutzername = mysqli_real_escape_string($conn, $_REQUEST['benutzername']);
    $passwort1 = mysqli_real_escape_string($conn, $_REQUEST['passwort1']);
    $passwort2 = mysqli_real_escape_string($conn, $_REQUEST['passwort2']);

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

            // user already exists

            // insert into DB
            $query = "insert into TBenutzer (BenName, BenPasswort, BenRole) values ('$benutzername', '$passwort1', '$role')";



        } else {
            $msg = "Passwörter stimmen nicht überein!";
        }
    }


}