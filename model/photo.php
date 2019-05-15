<?php
session_start();

class photo {
	private $info;

// ------------- PHOTO REGISTRATION ---------------

	public function decode($image_encoded) {
		$folderPath = "public/img/upload/";
		$image_parts = explode(";base64,", $image_encoded);
		$image_decoded = base64_decode($image_parts[1]);
		$fileName = uniqid() . '.png';
		$file = $folderPath . $fileName;
		// echo $image_decoded;
		// echo getcwd();
		// echo $image_decoded . "</br>";
		file_put_contents($file, $image_decoded);
		// echo "<img src='" . $image_decoded . "'>";
		// echo "<img src='" . $image_encoded . "'>";
		return ($file);
	}

	public function register($usr_id, $pic_path) {
		$db = $this->db_connect();
		$sql = "INSERT INTO pics(usr_id, pic_path)
			VALUES(:usr_id, :pic_path)";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':usr_id', $usr_id, PDO::PARAM_STR);
		$stmt->bindValue(':pic_path', $pic_path, PDO::PARAM_STR);
		$result = $stmt->execute();
		return $result;
	}

// --------------- OTHERS ---------------

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
}