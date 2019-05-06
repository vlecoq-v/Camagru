<?php

class user {

	private $info;

	public function connect($mail, $pwd) {
		$db = $this->db_connect();
		$pwd = $pwd;
		$sql = "SELECT * FROM users WHERE mail = :mail AND pwd = :pwd";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
		$stmt->bindValue(':pwd', $pwd, PDO::PARAM_STR);
		// echo $mail + $pwd;
		// echo $sql . '</br></br>';
		// echo $stmt;
		// echo $_POST['mail'] . '</br></br>';
		// $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();
		if ($this->info = $stmt->fetch()) {
			return (True);
		}
		else {
			echo "wrong credentials";
			return False;
		}
	}

	public function create_new($mail, $pwd, $pseudo) {
		$db = $this->db_connect();
		$sql = "INSERT INTO users(pseudo, mail, pwd)
			VALUES(:pseudo, :mail, :pwd)";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
		$stmt->bindValue(':pwd', $pwd, PDO::PARAM_STR);
		$stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

		// echo $sql;
		return $stmt->execute();
		// if ( $stmt->execute() ) {
		// 	return True;
		// }
		// else {
		// 	return False;
		// }
	}

	public function get_info() {
		echo $this->info['pseudo'] . ' has mail: ' . $this->info['mail'] ;
	}

	private function db_connect() {
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

}



