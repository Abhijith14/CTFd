<?php


$host = "ec2-52-4-111-46.compute-1.amazonaws.com";
$user = "zkhhstixqwqjux";
$pass = "c6e8a0206b25dd727fc7bcc564be9c221c4537e02caf6d7ebb7478cd385fd3c5";
$database = "d1nsnpbdjf51k4";
$port = "5432";

try{

	$dsn = "pgsql:host = " . $host . ";port=" . $port . ";dbname=" . $database . ";user =" . $user . ";password=" . $pass;

	$pdo = new PDO($dsn, $user, $pass);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
	echo 'Connection Failed!! : ' . $e->getMessage(); 
}

?>