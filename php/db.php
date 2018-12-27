<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-20
 * Time: 09:52
 */

// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("localhost", "root", "");

// create db
$database = "CREATE DATABASE IF NOT EXISTS SportClips";
$conn->query($database);
$conn->select_db("SportClips");

// tables
$benutzer = "CREATE TABLE IF NOT EXISTS TBenutzer(
    BenID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    BenName varchar(45) NOT NULL,
    BenPasswort varchar(45) NOT NULL,
    BenRole enum('Schueler', 'Lehrer', 'Gast') NOT NULL)";
$videos = "";

// create tables
$conn->query($benutzer);
