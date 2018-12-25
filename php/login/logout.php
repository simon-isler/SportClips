<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-25
 * Time: 21:44
 */

session_start();

if(session_destroy()) // Destroying All Sessions
{
    header("Location: ./../../login.php"); // redirecting to login
}