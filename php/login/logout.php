<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-12-25
 * Time: 21:44
 */

if (isset($_POST['abmelden'])) {
    session_start();

    if(session_destroy()) // Destroying All Sessions
    {
        header("Location: login.php"); // redirecting to login
    }
}
