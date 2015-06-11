<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
include 'ConnectDatabase.php';

$area = $_GET['area'];

try {
	echo '<option value="all">全部</option>';
	if($province=='all'){
		exit();
	}
	$sql = 'SELECT ID,sheng FROM kehuadd WHERE preid="'.$area.'"';
	$result = $pdo->query($sql);
	while($row = $result->fetch()){
		echo '<option value="' . $row['ID'] . '">' . $row['sheng'] . '</option>';
	}
} catch (PDOException $e) {
	$output = 'Error query city: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}
?>
</body>
</html>