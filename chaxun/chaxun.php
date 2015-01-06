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
$area = $_GET['area'];
$province = $_GET['province'];
$city = $_GET['city'];
$xian = $_GET['xian'];
$status = $_GET['status'];

unset($idList);
unset($colorList);
unset($leixingList);
unset($styleList);
unset($nameList);
unset($caizhiList);

$name = '无';
$caizhi;
$id;
$sum;
$price;
$num;
$time;
$kehuid;
$kehuname;
$addr_sheng;
$addr_shi;
$addr_xian;
$danhao;
$tuoyunbu;
$tuoyunhao;
$shoukuanfs;
$shoukuanqk;
$fuzeren;
$color;
$leixing;
$style;

$Finish = 0;
$Unfinish = 0;
$Final_num = 0;

$Output = '<table class="table table-bordered table-condensed table-striped table-hover" id = "webpage" style="font-size:5px">
		<thead>
		<tr>
			<th  style="text-align:center">单号</th>
			<th  style="text-align:center">下单时间</th>
			<th  style="text-align:center">大类</th>
			<th  style="text-align:center">产品名称</th>
			<th  style="text-align:center">产品型号</th>
			<th  style="text-align:center">材质</th>
			<th  style="text-align:center">颜色</th>
			<th  style="text-align:center">数量</th>
			<th  style="text-align:center">单价</th>
			<th  style="text-align:center">小计</th>
			<th  style="text-align:center">订单状态</th>
			<th  style="text-align:center">收款方式</th>
			<th  style="text-align:center">托运号</th>
			<th  style="text-align:center">托运部</th>
			<th  style="text-align:center">省</th>
			<th  style="text-align:center">市</th>
			<th  style="text-align:center">县/区</th>
			<th  style="text-align:center">客户名称</th>
			<th  style="text-align:center">负责人</th>
		</tr>
	</thead>
	<tbody style="text-align:center">';

$empty = true;

function table_productclass(){
	try {
		$sql = 'SELECT classname FROM productclass WHERE ID="'.$GLOBALS['leixing'].'"';
		$result = $GLOBALS['pdo']->query($sql);
		if($row = $result->fetch()){
			$GLOBALS['leixing'] = $row['classname'];
		}
	} catch (PDOException $e) {
		$output = 'Error query productclass: ' . $e->getMessage();
		include 'ConnectError.php';
		exit();
	}
}

function table_yanse(){
	try {
		$sql = 'SELECT name FROM yanse WHERE ID="'.$GLOBALS['color'].'"';
		$result = $GLOBALS['pdo']->query($sql);
		if($row = $result->fetch()){
			$GLOBALS['color'] = $row['name'];
		}
	} catch (PDOException $e) {
		$output = 'Error query yanse: ' . $e->getMessage();
		include 'ConnectError.php';
		exit();
	}
}

function table_caizhi(){
	try {
		$sql = 'SELECT name FROM caizhi WHERE ID="'.$GLOBALS['caizhi'].'"';
		$result = $GLOBALS['pdo']->query($sql);
		if($row = $result->fetch()){
			$GLOBALS['caizhi'] = $row['name'];
		}
	} catch (PDOException $e) {
		$output = 'Error query caizhi: ' . $e->getMessage();
		include 'ConnectError.php';
		exit();
	}
}

function table_kehuadd($ID){
	try {
		$sql = 'SELECT sheng FROM kehuadd WHERE ID="'.$ID.'"';
		$res = $GLOBALS['pdo']->query($sql);
		if($row = $res->fetch()){
			return $row['sheng'];
		}
		return '';
	} catch (PDOException $e) {
		$output = 'Error query province: ' . $e->getMessage();
		include 'ConnectError.php';
		exit();
	}
}

function table_kehulist(){
	try {
		$sql = 'SELECT name,dqid,sheng,city,xian,tybid FROM kehulist WHERE ID="'.$GLOBALS['kehuid'].'"';
		$res = $GLOBALS['pdo']->query($sql);
		if($row = $res->fetch()){
			if($GLOBALS['area'] != 'all' && $GLOBALS['area'] != $row['dqid']) return false;
			if($GLOBALS['province'] != 'all' && $GLOBALS['province'] != $row['sheng']) return false;
			if($GLOBALS['city'] != 'all' && $GLOBALS['city'] != $row['city']) return false;
			if($GLOBALS['xian'] != 'all' && $GLOBALS['xian'] != $row['xian']) return false;
			$GLOBALS['kehuname'] = $row['name'];
			$GLOBALS['addr_sheng'] = table_kehuadd($row['sheng']);
			$GLOBALS['addr_shi'] = table_kehuadd($row['city']);
			$GLOBALS['addr_xian'] = table_kehuadd($row['xian']);
			$GLOBALS['tuoyunbu'] = $row['tybid'];
			return true;
		}
		return false;
		//echo $kehuname.$address.'#';
	} catch (PDOException $e) {
		$output = 'Error query kehulist: ' . $e->getMessage();
		include 'ConnectError.php';
		exit();
	}
}

function table_jiaoyistats(){
	try {
		$sql = 'SELECT name FROM jiaoyistats WHERE ID="'.$GLOBALS['shoukuanqk'].'"';
		$res = $GLOBALS['pdo']->query($sql);
		if($row = $res->fetch()){
			$GLOBALS['shoukuanqk'] = $row['name'];
		}
	} catch (PDOException $e) {
		$output = 'Error query jiaoyistats: ' . $e->getMessage();
		include 'ConnectError.php';
		exit();
	}
}

function table_tuoyunbu(){
	try {
		$sql = 'SELECT name FROM tuoyunbu WHERE ID="'.$GLOBALS['tuoyunbu'].'"';
		$res = $GLOBALS['pdo']->query($sql);
		if($row = $res->fetch()){
			$GLOBALS['tuoyunbu'] = $row['name'];
			$i = 0;
			while($i < strlen($GLOBALS['tuoyunbu'])){
				if($GLOBALS['tuoyunbu'][$i] == '-') break;
				$i++;
			}
			$GLOBALS['tuoyunbu'] = substr($GLOBALS['tuoyunbu'], 0 , $i);
		}
	} catch (PDOException $e) {
		$output = 'Error query tuoyunbu: ' . $e->getMessage();
		include 'ConnectError.php';
		exit();
	}
}

function show(){
	$GLOBALS['empty'] = false;
	if($GLOBALS['shoukuanqk']=='0') $GLOBALS['shoukuanqk'] = '下单未发货';
	if($GLOBALS['shoukuanqk']=='已结算') $GLOBALS['Output'] .= '<tr class="success">';
	else if($GLOBALS['shoukuanqk']=='下单未发货') $GLOBALS['Output'] .= '<tr class="info">';
	else $GLOBALS['Output'] .= '<tr class="danger">';
	$GLOBALS['Output'] .= '<td>'.$GLOBALS['danhao'].'</td>'.
			'<td>'.$GLOBALS['time'].'</td>'.
			'<td>'.$GLOBALS['leixing'].'</td>'.
			'<td>'.$GLOBALS['name'].'</td>'.
			'<td>'.$GLOBALS['style'].'</td>'.
			'<td>'.$GLOBALS['caizhi'].'</td>'.
			'<td>'.$GLOBALS['color'].'</td>'.
			'<td>'.$GLOBALS['num'].'</td>'.
			'<td>'.$GLOBALS['price'].'</td>'.
			'<td>'.$GLOBALS['sum'].'</td>'.
			'<td>'.$GLOBALS['shoukuanqk'].'</td>'.
			'<td>'.$GLOBALS['shoukuanfs'].'</td>'.
			'<td>'.$GLOBALS['tuoyunhao'].'</td>'.
			'<td>'.$GLOBALS['tuoyunbu'].'</td>'.
			'<td>'.$GLOBALS['addr_sheng'].'</td>'.
			'<td>'.$GLOBALS['addr_shi'].'</td>'.
			'<td>'.$GLOBALS['addr_xian'].'</td>'.
			'<td>'.$GLOBALS['kehuname'].'</td>'.
			'<td>'.$GLOBALS['fuzeren'].'</td>'.
			'</tr>';
	if($GLOBALS['shoukuanqk'] == '已结算') $GLOBALS['Finish'] += $GLOBALS['sum'];
	else $GLOBALS['Unfinish'] += $GLOBALS['sum'];
	$GLOBALS['Final_num'] += $GLOBALS['num'];
}

function table_ddmessage(){
	try {
		$sql = 'SELECT piaohao,tuoyunhao,kehuid,xiadangtime,shoukuanfs,stats,chaozuoren,productsid FROM ddmessage WHERE stats <> 6 and xiadangtime BETWEEN "'.$GLOBALS['start'].'" and "'.$GLOBALS['end'].'" ORDER BY xiadangtime';
		$result = $GLOBALS['pdo']->query($sql);
		//echo $sql;
		$ary=array('1','2','3','4','5','6','7','8','9','0');
		while($row = $result->fetch()){
			if($GLOBALS['status'] != 'all' && $GLOBALS['status'] != $row['stats']) continue;
			$GLOBALS['shoukuanqk'] = $row['stats'];
			$products = $row['productsid'];
			//echo $products.'##';
			$temp = '';
			unset($nums);
			for($i=0; $i<strlen($products); $i++){
				if(in_array($products[$i], $ary)){
					$temp .= $products[$i];
				}else{
					if($temp != '')$nums[] = $temp;
					//echo $temp.'#';
					$temp = '';
				}
			}
			if($temp != '') $nums[] = $temp;
			$i = 0;
			while($i < count($nums)){
				$index=0;
				$flag=false;
				while($index < count($GLOBALS['idList'])){
					if($nums[$i]==$GLOBALS['idList'][$index]){
						$flag = true;
						break;
					}
					$index++;
				}
				if($flag){
					//echo $nums[2].$row['piaohao'];
					if($i+1 < count($nums))$GLOBALS['num'] = $nums[++$i];
					if($i+1 < count($nums))$GLOBALS['price'] = $nums[++$i];
					if($i+1 < count($nums))$GLOBALS['sum'] = $nums[++$i];
					$GLOBALS['kehuid'] = $row['kehuid'];
					
					$GLOBALS['style'] = $GLOBALS['styleList'][$index];
					$GLOBALS['leixing'] = $GLOBALS['leixingList'][$index];
					$GLOBALS['color'] = $GLOBALS['colorList'][$index];
					$GLOBALS['id'] = $GLOBALS['idList'][$index];
					$GLOBALS['name'] = $GLOBALS['nameList'][$index];
					$GLOBALS['caizhi'] = $GLOBALS['caizhiList'][$index];
					if(table_kehulist()){
						$GLOBALS['danhao'] = $row['piaohao'];
						$GLOBALS['time'] = $row['xiadangtime'];
						$GLOBALS['shoukuanfs'] = $row['shoukuanfs'];
						$GLOBALS['shoukuanqk'] = $row['stats'];
						$GLOBALS['fuzeren'] = $row['chaozuoren'];
						$GLOBALS['tuoyunhao'] = $row['tuoyunhao'];
						table_caizhi();
						table_productclass();
						table_yanse();
						table_jiaoyistats();
						table_tuoyunbu();
						show();
					}
					//break;
				}else $i += 3;
				$i++;
			}
		}
	} catch (PDOException $e) {
		$output = 'Error query ddmessage: ' . $e->getMessage();
		include 'ConnectError.php';
		exit();
	}
}

function table_products(){
	try {
		$sql = 'SELECT ID,name,caizhi,idname,classid,yanshe FROM products WHERE idname LIKE "%'.$GLOBALS['xinghao'].'%"';
		$result = $GLOBALS['pdo']->query($sql);
		$flag = false;
		while($row = $result->fetch()){
			//if($GLOBALS['xinghao'] != 'all' && $row['idname'] != $GLOBALS['xinghao']) continue;
			if($GLOBALS['class'] != 'all' && $row['classid'] != $GLOBALS['class']) continue;
			if($GLOBALS['yanse'] != 'all' && $row['yanshe'] != $GLOBALS['yanse']) continue;
			$GLOBALS['styleList'][] = $row['idname'];
			$GLOBALS['leixingList'][] = $row['classid'];
			$GLOBALS['colorList'][] = $row['yanshe'];
			$GLOBALS['idList'][] = $row['ID'];
			$GLOBALS['nameList'][] = $row['name'];
			$GLOBALS['caizhiList'][] = $row['caizhi'];
			$flag = true;
		}
		if(!$flag){
			//echo '<script type="text/javascript">alert("没有此类产品");</script>';
			$output = '没有此类产品';
			include 'ConnectError.php';
			exit();
		}
		table_ddmessage();
	} catch (PDOException $e) {
		$output = 'Error query products: ' . $e->getMessage();
		include 'ConnectError.php';
		exit();
	}
}

table_products();
echo '<h4 align="center">【已结算：' . $Finish . '元】【 未结算：' . $Unfinish . '元】【总交易额：' . ($Finish+$Unfinish) . '元】【总交易量：' . $Final_num .'个】</h4>';
echo $Output . '</tbody></table>';
if($empty){
	echo '没有任何关于此类产品信息';
}

?>
</body>
</html>