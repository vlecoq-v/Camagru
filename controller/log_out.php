<?php
$_SESSION['logged'] = 0;
unset($_SESSION['user']);
header('Location: index.php');