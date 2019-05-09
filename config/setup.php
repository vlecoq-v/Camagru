<?php
include_once('database.php');
$db = new PDO ($DB_DSN, $DB_USER, $DB_PASSWORD);

$sql = "CREATE DATABASE `camagru1`;";
$stmt = $db->prepare($sql);
$stmt->execute();

$sql = file_get_contents("db.sql"); 
mysqli_multi_query($db, $commands);
$db->prepare($sql);
$stmt->execute();