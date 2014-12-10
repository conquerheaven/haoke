<?php
include 'ConnectDatabase.php';
try {
	$sql= 'SELECT * FROM yanse';
	$result = $pdo->query($sql);
	while($row = $result->fetch()){
		$yanse[] = '<option value="' . $row['ID'] . '">' . $row['name'] . '</option>';
	}
} catch (PDOException $e){
	$output = 'Error fetching yanse: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}

try {
	$sql= 'SELECT * FROM productclass where classname is not null and classname <> ""';
	$result = $pdo->query($sql);
	while($row = $result->fetch()){
		$class[] = '<option value="' . $row['ID'] . '">' . $row['classname'] . '</option>';
	}
} catch (PDOException $e){
	$output = 'Error fetching class: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}

try {
	$sql= 'SELECT distinct idname FROM products where idname is not null and idname <> "" ORDER BY idname';
	$result = $pdo->query($sql);
	while($row = $result->fetch()){
		$xinghao[] = '<option value="' . $row['idname'] . '">' . $row['idname'] . '</option>';
	}
} catch (PDOException $e){
	$output = 'Error fetching xinghao: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}

include 'home.php';