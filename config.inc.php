<?php

$servername = "localhost";
$username = "id6144953_94121";
$password = "123success";
$dbname = "id6144953_z_gym";

try {
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //	echo "connected";
    }
catch(PDOException $e)
    {
    	die("OOPs something went wrong");
    }
 
?>
