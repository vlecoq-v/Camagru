<?php

include('../view/identification.php');
include_once('../db_crdtls.php');

if ($_POST['mail']) {
	try {
		$db = new PDO ("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PWD);

		$sql = "SELECT * FROM users WHERE mail = :mail";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':mail', $_POST['mail'], PDO::PARAM_STR);

		echo $sql . '</br></br>';
		echo $_POST['mail'] . '</br></br>';

		$result = $stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		echo $result;
		
		if ($result) {
			$user = $stmt->fetch();
			if ($user) {
				echo $user['pseudo'] . ' has mail: ' . $user['mail'] ;
			}
		}
		else 
			echo "Incorrect credentials";
	}
	catch (PDOException $e) {
		die ("erreur ! " . $e->getMessage());
	}
}
?>