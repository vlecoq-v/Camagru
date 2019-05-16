<?php
session_start();

class comm {
	public $count;
	public $all;
	public $author;

// ------------- GETTERS ---------------

	public function get_comm($pic_id) {
		$db = $this->db_connect();
		$sql = "SELECT COUNT(*) FROM comm WHERE pic_id = :pic_id";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(":pic_id", $pic_id);
		$stmt->execute();
		$this->count = $stmt->fetch()[0];
		// $this->count = $stmt->rowcount();
	}

	public function get_all($pic_id) {
		$this->all = [];
		$db = $this->db_connect();
		$sql = "SELECT * FROM comm WHERE pic_id = :pic_id ORDER BY comm_id ASC";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(":pic_id", $pic_id);
		$stmt->execute();
		while ($this->new = $stmt->fetch()) {
			$this->clean_array();
			array_push($this->all, $this->new);
		}
	}

	public function get_author($usr_id) {
		$db = $this->db_connect();
		$sql = "SELECT * FROM users WHERE usr_id = :usr_id";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(":usr_id", $usr_id);
		$stmt->execute();
		return ($stmt->fetch()['username']);
	}

// ------------- SETTERS ---------------

	public function new_comm($pic_id, $user_id, $comm) {
		// echo $pic_id;
		// echo $user_id;
		// echo $comm;

		$db = $this->db_connect();
		$sql = "INSERT INTO comm(user_id, comm, pic_id)
			VALUES (:user_id, :comm, :pic_id)";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(":pic_id", $pic_id);
		$stmt->bindValue(":user_id", $user_id);
		$stmt->bindValue(":comm", $comm);
		if ($stmt->execute())
			return True;
		return False;
	}

// ------------- DATABASE AND MISC ---------------
	
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

	public function clean_array() {
		$i = 0;
		while ($i < 10) {
			unset($this->new[$i]);
			$i += 1;
		}
	}
}