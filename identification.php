<?php

try {
$host = 'locahost';
$name = 'camagru';
$user = 'root';
$pwd = 'Jano78';

$db = new PDO ("mysql:host=$host;dbname=$name", $name, $user, $pwd, $user, $pass);
}
catch(PDOexception $e) {
	console.log()
}

?>