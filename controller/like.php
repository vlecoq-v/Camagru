<?php
if ($_POST['id']) {
	$id = $_POST['id'];
	$like = new likes();
	echo $id;
	if ($like->is_liked($id)) {
		$like->unlike($id);
		echo "?like=false&nb+like=" . $like->get_likes($id);
	}
}
else 
	echo "no event to triger";