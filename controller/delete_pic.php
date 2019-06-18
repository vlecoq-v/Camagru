<?php
if (isset($_POST['id'])) {
	$pic = new pics();
	$pic->get_1($id);
	if (!$pic->delete($id, $_SESSION['user']['usr_id']))
		echo "Alert('You cannot delete this picture, because you are not its owner')";
	else {
		echo "<script type='text/javascript'> document.location = '/index.php'; </script>";
		unlink($pic->new['pic_path']);
	}
}
else
	echo "We could not access this posts's id";