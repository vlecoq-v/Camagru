<?php
session_start();

class photo {
	public $info;

// ------------- PHOTO REGISTRATION ---------------

	public function decode($image_encoded, $filter, $dst_x, $dst_y) {
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

	public function merge($img, $filter, $dst_x, $dst_y) {
		$filter_size = getimagesize($filter);
		$src_w = $filter_size[0];
		$src_h = $filter_size[1];

		$img_size = getimagesize($img);
		$img_w = $img_size[0];
		$img_h = $img_size[1];

		$dest_image = imagecreatetruecolor($img_w, $img_h);
		imagesavealpha($dest_image, true);
		// $img = imagecreatetruecolor($img_w, $img_h);
		$trans_background = imagecolorallocatealpha($dest_image, 0, 0, 0, 127);
            //fill the image with a transparent background
		imagefill($dest_image, 0, 0, $trans_background);


		// $img = imagecreatetruecolor ($w, $h);
		
		$filter = imagecreatefrompng($filter);
		$img = imagecreatefrompng($img);

		imagecopy($dest_image, $img, 0, 0, 0, 0, $img_w, $img_h);
		imagecopy($dest_image, $filter, 0, 0, 0, 0, $src_w, $src_h);

		imagedestroy($filter);
		imagedestroy($img);
		// imagecopymerge($img, $filter, $dst_x, $dst_y, 0, 0, $src_w, $src_h, 30);
		return $dest_image;
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