<?php
session_start();

class user {
	public $info;

// ------------- USER IDENTIFICATION ---------------
	public function connect($username, $pwd = NULL, $hash = 0) {
		$db = $this->db_connect();
		if (!is_null($pwd)) {
			$sql = "SELECT * FROM users WHERE username = :username AND pwd = :pwd";
			$stmt = $db->prepare($sql);
			if (!$hash)
				$stmt->bindValue(':pwd', hash('whirlpool', $pwd), PDO::PARAM_STR);
			else
				$stmt->bindValue(':pwd', $pwd, PDO::PARAM_STR);
		}
		else {
			$sql = "SELECT * FROM users WHERE username = :username";
			$stmt = $db->prepare($sql);
		}
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);
		$stmt->execute();
		if ($this->info = $stmt->fetch()) {
			$_SESSION['logged'] = 1;
			$this->update_cookie();
			return True;
		}
		else {
			return False;
		}
	}

	public function create_new($mail, $pwd, $username) {
		$db = $this->db_connect();
		$sql = "INSERT INTO users(username, mail, pwd)
			VALUES(:username, :mail, :pwd)";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':mail', htmlentities($mail), PDO::PARAM_STR);
		$stmt->bindValue(':pwd', hash('whirlpool', $pwd), PDO::PARAM_STR);
		$stmt->bindValue(':username', htmlentities($username), PDO::PARAM_STR);
		$result = $stmt->execute();
		return $result;
	}

	public function set_active() {
		$db = $this->db_connect();
		$sql = "UPDATE users
		SET validated = 1
		WHERE username = :username";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':username', $this->info['username'], PDO::PARAM_STR);
		$stmt->execute();
	}

// ------------- CHG USER INFO ---------------

	public function change_mail($mail) {
		$db = $this->db_connect();
		$sql = "UPDATE users SET mail = (:mail) WHERE `usr_id` = (:usr_id)";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':mail', htmlentities($mail), PDO::PARAM_STR);
		$stmt->bindValue(':usr_id', $this->info['usr_id'], PDO::PARAM_STR);
		$result = $stmt->execute();
		$this->connect($this->info['username']);
		return $result;
	}

	public function change_username($username) {
		$db = $this->db_connect();
		$sql = "UPDATE users SET username = (:username) WHERE `usr_id` = (:usr_id)";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':username', htmlentities($username), PDO::PARAM_STR);
		$stmt->bindValue(':usr_id', $this->info['usr_id'], PDO::PARAM_STR);
		$result = $stmt->execute();
		$this->connect($username);
		return $result;
	}

	public function change_pwd($pwd) {
		$db = $this->db_connect();
		$sql = "UPDATE users SET pwd = (:pwd) WHERE `usr_id` = (:usr_id)";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':pwd', hash('whirlpool', $pwd), PDO::PARAM_STR);
		$stmt->bindValue(':usr_id', $this->info['usr_id'], PDO::PARAM_STR);
		$result = $stmt->execute();
		$this->connect($this->info['username']);
		return $result;
	}

	public function change_notif() {
		if ($this->info['email_notif'] == 1)
			$notif = 0;
		else
			$notif = 1;
		$db = $this->db_connect();
		$sql = "UPDATE users SET email_notif = (:email_notif) WHERE `usr_id` = (:usr_id)";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':email_notif', $notif, PDO::PARAM_STR);
		$stmt->bindValue(':usr_id', $this->info['usr_id']);
		$result = $stmt->execute();
		$this->connect($this->info['username']);
		return $result;
	}

// ------------- INFORMATION VERIFICATIONS ---------------

	public function mail_exists($mail) {
		$db = $this->db_connect();
		$sql = "SELECT * FROM users WHERE mail = :mail";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
		$stmt->execute();
		$stmt->fetch();
		if ($stmt->rowcount() > 0)
			return True;
		else
			return False;
	}

	public function username_exists($username) {
		$db = $this->db_connect();
		$sql = "SELECT * FROM users WHERE username = :username";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);
		$stmt->execute();
		if ($stmt->rowcount() > 0)
			return True;
		else
			return False;
	}

	public function check_active($username) {
		$db = $this->db_connect();
		$sql = "SELECT * FROM users
		WHERE username = :username
		AND validated = 1";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);
		$stmt->execute();
		if ($stmt->rowCount() > 0)
			return True;
		else
			return False;
	}

	public function check_notif($username) {
		$db = $this->db_connect();
		$sql = "SELECT * FROM users
		WHERE username = :username
		AND email_notif = 1";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);
		$stmt->execute();
		if ($stmt->rowCount() > 0)
			return True;
		else
			return False;
	}

// --------------- OTHERS ---------------

	public function set_info($mail) {
		$db = $this->db_connect();
		$sql = "SELECT * FROM users WHERE mail = :mail";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(":mail", $mail);
		$stmt->execute();
		;
		// print_r($this->info);
		if ($this->info = $stmt->fetch())
			return True;
		else
			return False;
	}

	public function get_info() {
		return($this->info);
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

	public function update_cookie() {
		$i = 0;
		while ($i < 10) {
			unset($this->info[$i]);
			$i += 1;
		}
		$_SESSION['user'] = $this->info;
		unset($_SESSION['user']['pwd']);
	}
}