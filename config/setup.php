<?php
include_once('database.php');

try {
	$db = new PDO ($DB_DSN, $DB_USER, $DB_PASSWORD);

	$sql = "CREATE DATABASE `camagru`;";
	$stmt = $db->prepare($sql);
	$stmt->execute();

	$DB_DSN = "mysql:host=127.0.0.1;dbname=camagru";
	$db = new PDO ($DB_DSN, $DB_USER, $DB_PASSWORD);
	$sql = file_get_contents('camagru.sql');
	$stmt = $db->prepare($sql);
	$stmt->execute();
	// echo $sql;
	// $qr = $db->exec($sql);
}
catch (PDOException $e) {
	die("erreur ! " . $e->getMessage());
}

echo "lourd";


// $db = mysqli_connect("127.0.0.1:3306", "root", "Jano78");
// mysqli_query($db, "CREATE DATABASE `camagru1`;");
// $db = mysqli_connect("127.0.0.1:3306", "root", "Jano78", "camagru1");
// $commands = file_get_contents("camagru.sql"); 
// mysqli_multi_query($db, $commands);