<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
</head>
<body>
<?php
include 'ConnectDatabase.php';

$province = $_GET['province'];

function Getprovincecode($provinceid){
	try {
		$sql = 'SELECT code FROM province WHERE id="'.$provinceid.'"';
		$result = $GLOBALS['pdo']->query($sql);
		if($row = $result->fetch()){
			return $row['code'];
		}
		return 0;
	} catch (PDOException $e) {
		$output = 'Error query province: ' . $e->getMessage();
		include 'ConnectError.php';
		exit();
	}
}


try {
	echo '<option value="all">全部</option>';
	if($province=='all'){
		exit();
	}
	$sql = 'SELECT id,name FROM city WHERE provincecode="'.Getprovincecode($province).'"';
	$result = $pdo->query($sql);
	while($row = $result->fetch()){
		echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
	}
} catch (PDOException $e) {
	$output = 'Error query city: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}
?>
</body>
</html>