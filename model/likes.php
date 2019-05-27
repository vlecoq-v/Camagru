<?php
session_start();

class likes {
	public $count;

	public function is_liked($pic_id) {
		$db = $this->db_connect();
		$sql = "SELECT * FROM likes
			WHERE usr_id = :usr_id
			AND pic_id = :pic_id";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(":usr_id", $_SESSION['user']['usr_id']);
		$stmt->bindValue(":pic_id", $pic_id);
		$stmt->execute();
		if ($stmt->rowcount() > 0)
			return (True);
		else
			return False;
	}

	public function like($pic_id) {
		$db = $this->db_connect();
		$sql = "INSERT INTO likes(usr_id, pic_id)
			VALUES(:usr_id, :pic_id)";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':usr_id', $_SESSION['user']['usr_id']);
		$stmt->bindValue(':pic_id', $pic_id);
		return $stmt->execute();
	}

	public function unlike($pic_id) {
		$db = $this->db_connect();
		$sql = "DELETE FROM likes
			WHERE usr_id = :usr_id
			AND pic_id = :pic_id";
		$stmt = $db->prepare($sql);
		// echo $_SESSION['user']['usr_id'];
		// echo $pic_id;
		$stmt->bindValue(':usr_id', $_SESSION['user']['usr_id']);
		$stmt->bindValue(':pic_id', $pic_id);
		// echo $stmt->rowcount();
		return $stmt->execute();
	}

	public function get_likes($pic_id) {
		$db = $this->db_connect();
		$sql = "SELECT COUNT(*) FROM likes WHERE pic_id = :pic_id";
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