<?php
$data=$_POST['info'];
$limit = 20-strlen($data);

$username = "";
$password = "";
$hostname = ""; 
$database = "";

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password)
  or die("Unable to connect to MySQL");

$selected = mysql_select_db($database,$dbhandle)
  or die("Could not select examples");
?>