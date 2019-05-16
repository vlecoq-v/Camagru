<?php
session_start();

class comm {
	public $count;

	public function get_comm($pic_id) {
		$db = $this->db_connect();
		$sql = "SELECT COUNT(*) FROM comm WHERE pic_id = :pic_id";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(":pic_id", $pic_id);
		$stmt->execute();
		$this->count = $stmt->fetch()[0];
		// $this->count = $stmt->rowcount();
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