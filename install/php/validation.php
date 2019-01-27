<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2019-01-27
 * Time: 20:23
 */

// globals
$php_msg = "";
$php_safemode = "";
$php_sessions = "";
$sql_msg = "";

// check php version
$php_version = phpversion();
if($php_version<5)
{
    $error=true;
    $php_msg="PHP version ist $php_version - zu alt!";
} else {
    $php_msg = "Erfolgreich";
}

// check mysql version
// declare function
function find_SQL_Version() {
    $output = shell_exec('mysql -V');
    preg_match('@[0-9]+\.[0-9]+\.[0-9]+@', $output, $version);
    return @$version[0]?$version[0]:-1;
}

$mysql_version=find_SQL_Version();
if($mysql_version<5)
{
    if($mysql_version==-1) $sql_msg="Erfolgreich";
    else $sql_msg="MySQL Version 5 ist erforderlich!";
}

// check safe mode
if( ini_get("safe_mode") )
{
    $php_safemode="Bitte schalten Sie den PHP Safemode aus!";
} else {
    $php_safemode="Erfolgreich";
}

// check sessions
$_SESSION['myscriptname_sessions_work']=1;
if(empty($_SESSION['myscriptname_sessions_work']))
{
    $php_sessions="Sessions must be enabled!";
} else {
    $php_sessions="Erfolgreich";
}

// display button
if ($php_msg == "Erfolgreich" && $php_safemode == && $php_sessions && $sql_msg)