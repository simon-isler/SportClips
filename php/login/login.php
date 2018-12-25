<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-19
 * Time: 21:51
 */

session_start(); // Starting Session
$error = ""; // Variable To Store Error Message

if (isset($_POST['anmelden'])) {
    if (empty($_POST['benutzername']) || empty($_POST['passwort'])) {
        $error = "Bitte füllen Sie die Felder aus.";
    } else {
        // Define $username and $password
        $benutzername = mysqli_escape_string($conn,  $_POST['benutzername']);
        $passwort = mysqli_escape_string($conn,  $_POST['passwort']);

        // connect to DB
        $conn = mysqli_connect("localhost", "root", "", "SportClips");

        // SQL query to fetch information of registerd users and finds user match.
        $query = "SELECT BenName, BenPasswort from TBenutzer where BenName=? AND BenPasswort=? LIMIT 1";

        // To protect MySQL injection for Security purpose
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $benutzername, $passwort);
        $stmt->execute();
        $stmt->bind_result($benutzername, $passwort);
        $stmt->store_result();

        //fetching the contents of the row
        if ($stmt->fetch())
        {
            $_SESSION['benutzername'] = $benutzername; // Initializing Session
            header("location: index.php"); // Redirecting To Profile Page
        } else {
            $error = "Der Benutzername oder das Passwort ist falsch.";
        }
        mysqli_close($conn); // Closing Connection
    }
}