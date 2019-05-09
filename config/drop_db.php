<?php
include_once('database.php');

try {
	$db = new PDO ($DB_DSN, $DB_USER, $DB_PASSWORD);

	$sql = "DROP DATABASE camagru1";
	echo ($db->exec($sql));
}
catch (PDOException $e) {
	die("erreur ! " . $e->getMessage());
}