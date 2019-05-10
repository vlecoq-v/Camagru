<?php
$_SESSION['logged'] = 0;
unset($_SESSION['user']);
echo "<script type='text/javascript'> document.location = '/index.php'; </script>";
// header('Location: index.php');