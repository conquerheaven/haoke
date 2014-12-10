<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
</head>
<body>
<?php
include "ConnectDatabase.php";

$start = $_GET['start'];
$end = $_GET['end'];
$class = $_GET['class'];
$xinghao = $_GET['xinghao'];
$yanse = $_GET['yanse'];

$name = '无';
$caizhi;
$id;
$sum;
$price;
$num;
$time;
$kehuid;
$kehuname;
$address;
$danhao;
$tuoyunbu;
$shoukuanfs;
$shoukuanqk;
$fuzeren;


try {
	$sql = 'SELECT ID,name,caizhi FROM products WHERE idname="'.$xinghao.'" and classid="'.$class.'" and yanshe="'.$yanse.'"';
	$result = $pdo->query($sql);
	if($row = $result->fetch()){
		$id = $row['ID'];
		//echo $id;
		$name = $row['name'];
		$caizhi = $row['caizhi'];
	}else{
		$output = '没有此产品';
		include 'ConnectError.php';
		exit();
	}
} catch (PDOException $e) {
	$output = 'Error query products: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}

try {
	$sql = 'SELECT classname FROM productclass WHERE ID="'.$class.'"';
	$result = $pdo->query($sql);
	if($row = $result->fetch()){
		$class = $row['classname'];
	}
} catch (PDOException $e) {
	$output = 'Error query productclass: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}

try {
	$sql = 'SELECT name FROM yanse WHERE ID="'.$yanse.'"';
	$result = $pdo->query($sql);
	if($row = $result->fetch()){
		$yanse = $row['name'];
	}
} catch (PDOException $e) {
	$output = 'Error query yanse: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}

try {
	$sql = 'SELECT name FROM caizhi WHERE ID="'.$caizhi.'"';
	$result = $pdo->query($sql);
	if($row = $result->fetch()){
		$caizhi = $row['name'];
	}
} catch (PDOException $e) {
	$output = 'Error query caizhi: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}

try {
	$sql = 'SELECT danghao,kehuid,xiadangtime,tuoyunhao,shoukuanfs,stats,chaozuoren,productsid FROM ddmessage WHERE productsid like "%'.$id.',%" and xiadangtime BETWEEN "'.$start.'" and "'.$end.'" ORDER BY xiadangtime';
	$result = $pdo->query($sql);
	//echo $sql;
	$ary=array('1','2','3','4','5','6','7','8','9','0');
	while($row = $result->fetch()){
		$products = $row['productsid'];
		//echo $products.'##';
		$temp = '';
		for($i=0; $i<strlen($products); $i++){
			if(in_array($products[$i], $ary)){
				$temp .= $products[$i];
			}else{
				$nums[] = $temp;
				//echo $temp.'#';
				$temp = '';
			}
		}
		if($temp != '') $nums[] = $temp;
		$i = 0;
		while($i < count($nums)){
			if($nums[$i] == $id){
				$num = $nums[++$i];
				$price = $nums[++$i];
				$sum = $nums[++$i];
				$danhao = $row['danghao'];
				$kehuid = $row['kehuid'];
				$time = $row['xiadangtime'];
				$tuoyunbu = $row['tuoyunhao'];
				$shoukuanfs = $row['shoukuanfs'];
				$shoukuanqk = $row['stats'];
				$fuzeren = $row['chaozuoren'];
				try {
					$sql = 'SELECT name,address FROM kehulist WHERE ID="'.$kehuid.'"';
					$res = $pdo->query($sql);
					if($row = $res->fetch()){
						$kehuname = $row['name'];
						$address = $row['address'];
					}
					//echo $kehuname.$address.'#';
				} catch (PDOException $e) {
					$output = 'Error query kehulist: ' . $e->getMessage();
					include 'ConnectError.php';
					exit();
				}
				try {
					$sql = 'SELECT name FROM jiaoyistats WHERE ID="'.$shoukuanqk.'"';
					$res = $pdo->query($sql);
					if($row = $res->fetch()){
						$shoukuanqk = $row['name'];
					}
					//echo $shoukuanqk;
					if($shoukuanqk=='已结算' || $shoukuanqk=='已过账') echo '<tr class="success">';
					else if($shoukuanqk=='回单' || $shoukuanqk=='已打印') echo '<tr class="info">';
					else if($shoukuanqk=='未打印') echo '<tr class="primary">';
					else if($shoukuanqk=='申请作废' || $shoukuanqk=='已申请作废') echo '<tr class="warning">';
					else echo '<tr class="danger">';
					echo '<td>'.$time.'</td>'.
							'<td>'.$class.'</td>'.
							'<td>'.$name.'</td>'.
							'<td>'.$xinghao.'</td>'.
							'<td>'.$caizhi.'</td>'.
							'<td>'.$yanse.'</td>'.
							'<td>'.$num.'</td>'.
							'<td>'.$price.'</td>'.
							'<td>'.$sum.'</td>'.
							'<td>'.$shoukuanqk.'</td>'.
							'<td>'.$shoukuanfs.'</td>'.
							'<td>'.$address.'</td>'.
							'<td>'.$kehuname.'</td>'.
							'<td>'.$fuzeren.'</td>'.
							'</tr>';
				} catch (PDOException $e) {
					$output = 'Error query jiaoyistats: ' . $e->getMessage();
					include 'ConnectError.php';
					exit();
				}
				/*try {
					echo $tuoyunbu.'#';
					$sql = 'SELECT name FROM tuoyunbu WHERE ID="'.$tuoyunbu.'"';
					$res = $pdo->query($sql);
					if($row = $res->fetch()){
						$tuoyunbu = $row['name'];
						echo $tuoyunbu;
						$i = 0;
						while($i < strlen($tuoyunbu)){
							if($tuoyunbu[$i++] == '-') break;
						}
						$tuoyunbu = substr($tuoyunbu, 0 , i);
						echo '<tr class="info">'.
								'<td>'.$time.'</td>'.
								'<td>'.$class.'</td>'.
								'<td>'.$name.'</td>'.
								'<td>'.$xinghao.'</td>'.
								'<td>'.$caizhi.'</td>'.
								'<td>'.$yanse.'</td>'.
								'<td>'.$num.'</td>'.
								'<td>'.$price.'</td>'.
								'<td>'.$sum.'</td>'.
								'<td>'.$shoukuanqk.'</td>'.
								'<td>'.$shoukuanfs.'</td>'.
								'<td>'.$tuoyunbu.'</td>'.
								'<td>'.$address.'</td>'.
								'<td>'.$kehuname.'</td>'.
								'<td>'.$fuzeren.'</td>'.
								'</tr>';
					}
				} catch (PDOException $e) {
					$output = 'Error query tuoyunbu: ' . $e->getMessage();
					include 'ConnectError.php';
					exit();
				}*/
				break;
			}else $i += 3;
			$i++;
		}
	}
} catch (PDOException $e) {
	$output = 'Error query caizhi: ' . $e->getMessage();
	include 'ConnectError.php';
	exit();
}
?>
</body>
</html>