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
    $id = "NULL";

    // validation of user input
    if (empty($benutzername) || empty($passwort1) || empty($passwort2)) {
        $msg = "Bitte alle Felder ausfüllen";
    } else {
        // matching passwords
        if ($passwort1 == $passwort2) {
            // save role
            $role = $_POST['radio'];

            // check if user already exists
            $check="SELECT * FROM TBenutzer WHERE BenName = '$benutzername'";
            $rs = mysqli_query($conn,$check);
            $data = mysqli_fetch_array($rs, MYSQLI_NUM);

            if ($data[0] > 0) {
                $msg = "Dieser Benutzer existiert bereits!";
            } else {
                // insert into DB
                $insert = $conn->prepare("INSERT INTO TBenutzer (BenID, BenName, BenPasswort, BenRole) values (?, ?, ?, ?)");
                $insert->bind_param("ssss", $id, $benutzername, $passwort1, $role);
                $insert->execute();

                $msg = "Ihr Konto wurde registriert. Sie können sich nun einloggen.";
            }

        } else {
            $msg = "Passwörter stimmen nicht überein!";
        }
    }
}


