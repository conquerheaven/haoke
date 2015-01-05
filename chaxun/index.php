<?php
include 'ConnectDatabase.php';
//获取地区
try {
	$sql= 'SELECT * FROM kehuadd where preid = 0';
	$result = $pdo->query($sql);
	while($row = $result->fetch()){
		$areas[] = '<option value="' . $row['ID'] . '">' . $row['sheng'] . '</option>';
	}
} catch (PDOException $e){
	$output = 'Error fetching areas: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}
//获取颜色
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
//获取产品大类
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
//获得产品型号
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