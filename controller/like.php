<?php
if ($_POST['id']) {
	$id = preg_replace("/[^0-9]/", "", $_POST['id'] );
	$like = new likes();
	if ($like->is_liked($id)) {
		$like->unlike($id);
		$like->get_likes($id);
		echo "false;";
	}
	else {
		$like->like($id);
		$like->get_likes($id);
		echo "true;";
	}
	echo $like->count . ";";
}
else 
	echo "no event to triger";