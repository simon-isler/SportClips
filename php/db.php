<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-20
 * Time: 09:52
 */

// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("localhost", "root", "");

// database connection failed
if ($conn == false) {
    header("location: 404.html"); // redirect to 404 page
}

// create db with collation
$database = "CREATE DATABASE IF NOT EXISTS SportClips CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
$conn->query($database);
$conn->select_db("SportClips");

// tables
$benutzer = "CREATE TABLE IF NOT EXISTS TBenutzer(
    BenID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    BenName varchar(45) NOT NULL,
    BenPasswort varchar(45) NOT NULL,
    BenRole enum('Schueler', 'Lehrer', 'Gast') NOT NULL) COLLATE='utf8mb4_unicode_ci'";

$videos = "CREATE TABLE IF NOT EXISTS TVideos(
    VidID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    VidName varchar(100) NOT NULL,
    VidPath varchar(200) NOT NULL,
    VidDatum date NOT NULL,
    BenID int NOT NULL) COLLATE='utf8mb4_unicode_ci'";

$videotags = "CREATE TABLE IF NOT EXISTS TVideoTags(
      VideoTagID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
      VidID int NOT NULL,
      TagID int NOT NULL) COLLATE='utf8mb4_unicode_ci'";

$tags = "CREATE TABLE IF NOT EXISTS TTags(
    TagID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    TagName varchar(100) NOT NULL) COLLATE='utf8mb4_unicode_ci'";

// create tables
$conn->query($benutzer);
$conn->query($videos);
$conn->query($videotags);
$conn->query($tags);


