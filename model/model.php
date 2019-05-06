<?php
function user_connect($mail) {
	$db = db_connect();
	$sql = "SELECT * FROM users WHERE mail = :mail";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);

	// echo $sql . '</br></br>';
	// echo $stmt;
	// echo $_POST['mail'] . '</br></br>';
	// $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$result = $stmt->execute();
	$user = $stmt->fetch();

	return ($user);
}

function db_connect() {
	include_once('db_crdtls.php');
	try {
		// $db = new PDO ("mysql:host=127.0.0.1;dbname=camagru", "root", "Jano78");
		$db = new PDO ("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PWD);
		return($db);
	}
	catch (PDOException $e) {
		die ("erreur ! " . $e->getMessage());
	}
}
