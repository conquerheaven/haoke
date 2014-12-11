<?php
include 'ConnectDatabase.php';
//��ȡʡ��
try {
	$sql= 'SELECT * FROM province';
	$result = $pdo->query($sql);
	while($row = $result->fetch()){
		$provinces[] = '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
	}
} catch (PDOException $e){
	$output = 'Error fetching province: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}
//��ȡ��ɫ
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
//��ȡ��Ʒ����
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
//��ò�Ʒ�ͺ�
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
//��ö���״̬
try {
	$sql= 'SELECT * FROM jiaoyistats';
	$result = $pdo->query($sql);
	while($row = $result->fetch()){
		$status[] = '<option value="' . $row['ID'] . '">' . $row['name'] . '</option>';
	}
} catch (PDOException $e){
	$output = 'Error fetching jiaoyistats: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}

include 'home.php';