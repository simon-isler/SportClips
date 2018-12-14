<?php
/**
 * login.php
 *
 * Author: simon
 * Date: 2018-12-14
 */

session_start(); // Starting Session
$error = ''; // Variable To Store Error Message

// create database dynamically
function createDatabase($db) {
    // database & table
    $createDB = "CREATE DATABASE IF NOT EXISTS SportClips";
    $table = "CREATE TABLE IF NOT EXISTS login(
    kuerzel varchar(10) not null,
    typ enum('Gast', 'Lehrer', 'Schüler') not null,
    passwort varchar(255) not null,
    PRIMARY KEY (kuerzel))
    ";

    // execute query
    $db->query($createDB);
    $db->query($table);
}

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    } else {
        // Define $username and $password
        $username = $_POST['username'];
        $password = $_POST['password'];

        // mysqli_connect() function opens a new connection to the MySQL server.
        $conn = mysqli_connect("localhost", "root", "", "company");

        // SQL query to fetch information of registerd users and finds user match.
        $query = "SELECT username, password from login where username=? AND password=? LIMIT 1";

        // To protect MySQL injection for Security purpose
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->bind_result($username, $password);
        $stmt->store_result();

        if ($stmt->fetch()) //fetching the contents of the row
        {
            $_SESSION['login_user'] = $username; // Initializing Session
            header("location: profile.php"); // Redirecting To Profile Page
        } else {
            $error = "Username or Password is invalid";
        }
        mysqli_close($conn); // Closing Connection
    }
}
