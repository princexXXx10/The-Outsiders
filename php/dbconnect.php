<?php  $databaseFile = 'credentials.sqlite';
$dir = 'sqlite:$databaseFile';
$pdo  = new PDO($dir) or die("cannot open the database");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>