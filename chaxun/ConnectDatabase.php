<?php
try{
	$pdo = new PDO('mysql:host=localhost;dbname=jiajusystem', 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "gbk"');
}
catch (PDOException $e){
	$output = 'Uable to connect to the database server: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}