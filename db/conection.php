<?php
$servername="localhost";
$user="root";
$password="singh!@#4345";
try{
	$ser = new PDO("mysql:host=$servername;dbname=smart_gen",$user, $password);
	$ser->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}
?>
