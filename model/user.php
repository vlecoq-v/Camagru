<?php

class user {

	private $info;

	public function connect($mail, $pwd) {
		echo $pwd;
		$db = $this->db_connect();
		$sql = "SELECT * FROM users WHERE mail = :mail AND pwd = :pwd";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
		$stmt->bindValue(':pwd', hash('whirlpool', $pwd), PDO::PARAM_STR);
		$stmt->execute();
		// print($stmt);
		// echo $mail;
		// echo hash('whirlpool', $pwd);
		// echo $stmt->fetch(PDO::FETCH_ASSOC);
		// $this->info = $stmt->fetch(PDO::FETCH_ASSOC);
		// $this->get_info();
		if ($this->info = $stmt->fetch()) {
			$this->get_info();

			return (True);
		}
		else {
			return False;
		}
	}

	public function mail_exists($mail) {
		$db = $this->db_connect();
		$sql = "SELECT * FROM users WHERE mail = :mail";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
		$result = $stmt->execute();
		$stmt->fetch();
		// echo $stmt->rowCount(); 
		if ($stmt->rowcount() > 0)
			return (True);
		else
			return False;
	}

	public function get_info() {
		echo $this->info['pseudo'] . ' has mail: ' . $this->info['mail'];
	}

	public function pseudo_exists($pseudo) {
		$db = $this->db_connect();
		$sql = "SELECT * FROM users WHERE pseudo = :pseudo";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		$stmt->execute();
		if ($stmt->rowcount() > 0)
			return (True);
		else
			return False;
	}

	public function create_new($mail, $pwd, $pseudo) {
		$db = $this->db_connect();
		$sql = "INSERT INTO users(pseudo, mail, pwd)
			VALUES(:pseudo, :mail, :pwd)";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
		$stmt->bindValue(':pwd', hash('whirlpool', $pwd), PDO::PARAM_STR);
		$stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		$result = $stmt->execute();
		return $result;
	}

	private function db_connect() {
		include('config/database.php');
		try {
			$db = new PDO ($DB_DSN, $DB_USER, $DB_PASSWORD);
			return($db);
		}
		catch (PDOException $e) {
			die ("</br>error connecting to DATABASE!</br>" . $e->getMessage());
		}
	}
}



