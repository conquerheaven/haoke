<?php
session_start();
if(!isset($_SESSION['table'])){
	?>
	<script>
	alert("请先查询");
	window.location.href='http://localhost/haoke/chaxun/';
	</script>
	<?php 
	exit();
}
header ( "Content-type:application/vnd.ms-excel" );
header ( "Content-Disposition:filename=haoke.xls" );
    echo $_SESSION['table'];
?>