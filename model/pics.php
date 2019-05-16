<?php
session_start();

class pics {
	public $count;
	public $all;
	public $new;

	public function get_count() {
		$db = $this->db_connect();
		$sql = "SELECT COUNT(*) FROM pics";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$this->count = $stmt->fetch()[0];
		// $this->count = $stmt->rowcount();
	}

	public function get_all() {
		$this->all = [];
		$db = $this->db_connect();
		$sql = "SELECT * FROM pics ORDER BY pic_id DESC";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		while ($this->new = $stmt->fetch()) {
			$this->clean_array();
			array_push($this->all, $this->new);
		}
	}

	public function get_1($pic_id) {
		$this->all = [];
		$db = $this->db_connect();
		$sql = "SELECT * FROM pics WHERE pic_id = :pic_id";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(":pic_id", $pic_id);
		$stmt->execute();
		$this->new = $stmt->fetch();
		if ($stmt->rowCount() === 0)
			return FALSE;
		else {
			return True;
		}
	}

	public function get_6($offset) {
		$this->all = [];
		$db = $this->db_connect();
		$offset = $offset * 6;
		if ($offset == 0) {
			$sql = "SELECT * FROM pics ORDER BY pic_id DESC LIMIT 6";
		}
		else 
			$sql = "SELECT * FROM pics ORDER BY pic_id DESC LIMIT 6 
				OFFSET $offset";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		while ($this->new = $stmt->fetch()) {
			$this->clean_array();
			// unset($new);
			array_push($this->all, $this->new);
		}
		// $this->all = $stmt->fetch();
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

	public function clean_array() {
		$i = 0;
		while ($i < 10) {
			unset($this->new[$i]);
			$i += 1;
		}
	}
}