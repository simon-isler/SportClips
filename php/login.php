<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-19
 * Time: 21:51
 */

session_start(); // Starting Session
$error = ''; // Variable To Store Error Message

// create database dynamically
function createDatabase($db)
{
    $database = "CREATE DATABASE IF NOT EXISTS SportClips";
    $table = "CREATE TABLE IF NOT EXISTS TBenutzer(
    BenID int NOT NULL AUTO_INCREMENT,
    BenName varchar(255) NOT NULL,
    BenPasswort varchar(255) NOT NULL,
    BenRole enum('Gast', 'SchülerIn', 'Lehrer') NOT NULL,
    PRIMARY KEY (BenID))";

    $db->query($database);
    $db->query($table);
}

if (isset($_POST['anmelden'])) {
    if (empty($_POST['benutzername']) || empty($_POST['passwort'])) {
        $error = "Username or Password is invalid";
    } else {
        // Define $username and $password
        $benutzername = $_POST['benutzername'];
        $passwort = $_POST['passwort'];

        // mysqli_connect() function opens a new connection to the MySQL server.
        $conn = mysqli_connect("localhost", "root", "", "SportClips");

        // create database
        createDatabase($conn);

        // SQL query to fetch information of registerd users and finds user match.
        $query = "SELECT BenName, BenPasswort from login where BenName=? AND BenPasswort=? LIMIT 1";

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
            $error = "Username or Password is invalid";
        }
        mysqli_close($conn); // Closing Connection
    }
}