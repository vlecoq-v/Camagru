<?php
session_start();

class photo {
	public $info;

// ------------- PHOTO REGISTRATION ---------------

	public function decode($image_encoded, $filter) {
		$image_encoded = str_replace(' ', '+', $image_encoded);
		$folderPath = "public/img/upload/";
		$image_parts = explode(";base64,", $image_encoded);
		$image_decoded = base64_decode($image_parts[1]);
		$fileName = uniqid() . '.png';
		$filter = explode("4200/", $filter)[1];
		

		$file = $folderPath . $fileName;
		file_put_contents($file, $image_decoded);

		 $img = $this->merge($file, $filter);
		// header('content/type: image/png');
		unlink($file);
		// echo $file;
		imagepng($img, $file);
		imagedestroy($img);
		//  file_put_contents($file, $img);		
		echo $file;
		echo "<img src='" . $file . "'>";
		return ($file);
	}

	public function merge($img, $filter) {
		$dst_x = 0;
		$dst_y = 0;
		$image_size = getimagesize($filter);
		$src_w = $image_size[0];
		$src_h = $image_size[1];

		// $img = imagecreatetruecolor ($w, $h);
		// echo $src_w;
		// echo $src_h;
		// var_dump(getimagesize($img));
		
		$filter = imagecreatefrompng($filter);
		$img = imagecreatefrompng($img);

		// var_dump($img);
		// echo $img;
		// echo "<img src='" . $img . "'>";
		// echo "<img src='" . $filter . "'>";
		// echo "<img src='" . "public/img/filters/ramen-logo.png" . "'";
		// echo getcwd();
		// echo $filter;
		imagecopymerge($img, $filter, $dst_x, $dst_y, 0, 0, $src_w, $src_h, 30);
		// echo "<img src='" . $img . "'>";
		return $img;
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