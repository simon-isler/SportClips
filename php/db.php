<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-20
 * Time: 09:52
 */

// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("localhost", "root", "");

$database = "CREATE DATABASE IF NOT EXISTS SportClips";
$table = "CREATE TABLE IF NOT EXISTS TBenutzer(
    BenID int NOT NULL AUTO_INCREMENT,
    BenName varchar(255) NOT NULL,
    BenPasswort varchar(255) NOT NULL,
    BenRole enum('Gast', 'SchülerIn', 'Lehrer') NOT NULL
    PRIMARY KEY (BenID))";

$conn->query($database);
$conn->query($table);
