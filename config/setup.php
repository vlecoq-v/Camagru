<?php
include_once('database.php');

try {
	$db = new PDO ($DB_SET, $DB_USER, $DB_PASSWORD);

	$sql = "CREATE DATABASE `camagru`;";
	$stmt = $db->prepare($sql);
	$stmt->execute();

	$DB_DSN = "mysql:host=127.0.0.1;dbname=camagru";
	$db = new PDO ($DB_DSN, $DB_USER, $DB_PASSWORD);
	$sql = file_get_contents('camagru.sql');
	$stmt = $db->prepare($sql);
	$stmt->execute();
	echo "set up finished";
}
catch (PDOException $e) {
	die("erreur ! " . $e->getMessage());
}