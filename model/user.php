<?php

class user {

	private $info;

	public function connect($username, $pwd) {
		// echo $pwd;
		$db = $this->db_connect();
		print($username);
		// $sql = "SELECT * FROM users WHERE username = :username";
		$sql = "SELECT * FROM users WHERE username = :username AND pwd = :pwd";

		$stmt = $db->prepare($sql);
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);
		$stmt->bindValue(':pwd', hash('whirlpool', $pwd), PDO::PARAM_STR);
		$stmt->execute();
		if ($this->info = $stmt->fetch()) {
			// $this->get_info();
			// echo "</br>", hash('whirlpool', $pwd);
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
		// echo $this->info['username'] . ' has mail: ' . $this->info['mail'] . '</br>' . $this->info['pwd'];
		return($this->info);
	}

	public function username_exists($username) {
		$db = $this->db_connect();
		$sql = "SELECT * FROM users WHERE username = :username";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':username', $pseudo, PDO::PARAM_STR);
		$stmt->execute();
		if ($stmt->rowcount() > 0)
			return (True);
		else
			return False;
	}

	public function create_new($mail, $pwd, $username) {
		$db = $this->db_connect();
		$sql = "INSERT INTO users(username, mail, pwd)
			VALUES(:username, :mail, :pwd)";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
		// echo $pwd . "and encrypted : " . hash('whirlpool', $pwd);
		$stmt->bindValue(':pwd', hash('whirlpool', $pwd), PDO::PARAM_STR);
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);
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



