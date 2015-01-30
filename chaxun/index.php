<?php
include 'ConnectDatabase.php';
//��ȡ����
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
//��ȡ������
try {
	$sql = 'SELECT distinct chaozuoren FROM ddmessage';
	$result = $pdo->query($sql);
	while($row = $result->fetch()){
		$kaidanren[] = '<option value="' . $row['chaozuoren'] . '">' . $row['chaozuoren'] . '</option>';
	}
} catch (PDOException $e) {
	$output = 'Error fetching kaidanren: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}

//��ȡ�ͻ�������
try {
	$sql = 'SELECT distinct fuzheren FROM kehulist';
	$result = $pdo->query($sql);
	while($row = $result->fetch()){
		$kehufuzeren[] = '<option value="' . $row['fuzheren'] . '">' . $row['fuzheren'] . '</option>';
	}
} catch (PDOException $e) {
	$output = 'Error fetching kehufuzeren: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}

//��ȡ�ͻ���
try {
	$sql = 'SELECT distinct fhr FROM ddmessage';
	$result = $pdo->query($sql);
	while($row = $result->fetch()){
		$fahuoren[] = '<option value="' . $row['fhr'] . '">' . $row['fhr'] . '</option>';
	}
} catch (PDOException $e) {
	$output = 'Error fetching fahuoren: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}

//��ȡƷ��
try {
	$sql = 'SELECT pingpai FROM  kehulist WHERE pingpai <>  ""';
	$result = $pdo->query($sql);
	while($row = $result->fetch()){
		$pinpai[] = '<option value="' . $row['pingpai'] . '">' . $row['pingpai'] . '</option>';
	}
} catch (PDOException $e) {
	$output = 'Error fetching pinpai: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}


include 'home.php';