<?php
// function user_connect($mail) {
// 	$db = db_connect();
// 	$sql = "SELECT * FROM users WHERE mail = :mail";
// 	$stmt = $db->prepare($sql);
// 	$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);

// 	$result = $stmt->execute();
// 	$user = $stmt->fetch();
// 	return ($user);
// }

// function db_connect() {
// 	include_once('config/database.php');
// 	try {
// 		$db = new PDO ($DB_DSN, $DB_USER, $DB_PASSWORD);
// 		return($db);
// 	}
// 	catch (PDOException $e) {
// 		die ("erreur ! " . $e->getMessage());
// 	}
// }
