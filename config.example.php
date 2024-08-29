<?php
$username = "username"; // username
$password = "password"; // password of the database
$hostname = "localhost"; // host of the database
$namebase = "namebase"; // name of the database

// Attempt to connect to the database
try
{
    $db = new PDO('mysql:host='.$hostname.';dbname='.$namebase, $username, $password);
}
catch (Exception $e)
{
    // If an error is thrown, display the message
    die('Erreur : ' . $e->getMessage());
}