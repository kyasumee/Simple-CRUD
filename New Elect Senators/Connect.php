<?php

$servername = "localhost";
$username = "root";
$password = "12345";
$dbname="senators";

try{
    $conn = new PDO("mysql:host=$servername; dbname=senators", $username, $password);
	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch(PDOExpection $e){
    echo "Connection Failed: " . $e->getMessaage();
}
?>