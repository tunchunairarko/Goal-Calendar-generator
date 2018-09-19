<?php
//db details
$dbHost = 'localhost';
$dbUsername = 'goalsnoh_hassle';
$dbPassword = 'vIo2PMIR4LM-[G6E+.';
$dbName = 'goalsnoh_hassledb';

//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>