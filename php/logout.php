<?php
/**
 * logout.php
 *
 * Author: simon
 * Date: 2018-12-14
 */

session_start();
if(session_destroy()) // Destroying All Sessions
{
    header("Location: index.php"); // Redirecting To Home Page
}