<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "Pharma";

try {
    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
   
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     
    $sql = "DELETE FROM tblmedicine WHERE id='" . $_GET["id"] . "'";

    
    $conn->exec($sql);
	echo "<script> alert('Record has been deleted!'); window.location = 'list_medicine.php'; </script>";
    }catch(PDOException $e)
    {
    echo $sql . "
" . $e->getMessage();
    }

$conn = null;
?>