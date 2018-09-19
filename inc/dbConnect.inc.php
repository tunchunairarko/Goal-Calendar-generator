<?php
/*$mysql_db_hostname = "Host name";
$mysql_db_user = "UserName";
$mysql_db_password = "Password";
$mysql_db_database = "Database Name";*/

$mysql_db_hostname = "localhost";
// $mysql_db_user = "goalsnoh_hassle";
// $mysql_db_password = "vIo2PMIR4LM-[G6E+.";
$mysql_db_user = "root";
$mysql_db_password = "";
$mysql_db_database = "goalsnoh_hassledb";

$con = mysqli_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password) or die("Could not connect database");
mysqli_select_db($con,$mysql_db_database) or die("Could not select database");
?>