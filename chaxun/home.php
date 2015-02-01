<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>产品销售查询</title>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	<link href="../bootstrap/css/font-awesome.min.css" rel="stylesheet">
	<link href="../bootstrap/css/daterangepicker-bs3.css" rel="stylesheet">
	<script type="text/javascript" src="../bootstrap/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/moment.js"></script>
	<script type="text/javascript" src="../bootstrap/js/daterangepicker.js"></script>
	<script type="text/javascript" src="../bootstrap/js/ajax.js"></script>
	<script type="text/javascript" src="../bootstrap/js/select.js"></script>
	<script type="text/javascript">
    $(document).ready(function() {
    var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange span').html(start.format('YYYY-MM-DD') + '-' + end.format('YYYY-MM-DD'));
                    //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
     }
     var optionSet1 = {
         startDate: moment().subtract('days', 29),
         endDate: moment(),
         minDate: '2001-01-01',
         maxDate: '2055-12-31',
         dateLimit: { days: 1000000 },
         showDropdowns: true,
         showWeekNumbers: true,
         timePicker: false,
         timePickerIncrement: 1,
         timePicker12Hour: true,
         ranges: {
             '今天': [moment(), moment()],
             '昨天': [moment().subtract('days', 1), moment().subtract('days', 1)],
             '过去一周': [moment().subtract('days', 6), moment()],
             '过去一个月': [moment().subtract('days', 29), moment()],
             '这个月': [moment().startOf('month'), moment().endOf('month')],
             '上个月': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
          },
         opens: 'right',
         buttonClasses: ['btn btn-default'],
         applyClass: 'btn-small btn-primary',
         cancelClass: 'btn-small',
         format: 'YYYY-MM-DD',
         separator: ' - ',
         locale: {
	         applyLabel: 'Submit',
	         cancelLabel: 'Clear',
	         fromLabel: 'From',
	         toLabel: 'To',
	         customRangeLabel: '自选日期',
	         daysOfWeek: ['日', '一', '二', '三', '四', '五','六'],
	         monthNames: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
	         firstDay: 1
         }
      };
      $('#reportrange span').html(moment().subtract('days', 29).format('YYYY-MM-DD') + '-' + moment().format('YYYY-MM-DD'));
      $('#reportrange').daterangepicker(optionSet1, cb);
      $('#reportrange').on('show.daterangepicker', function() { console.log("show event fired"); });
      $('#reportrange').on('hide.daterangepicker', function() { console.log("hide event fired"); });
      $('#reportrange').on('apply.daterangepicker', function(ev, picker) { 
           console.log("apply event fired, start/end dates are "+ picker.startDate.format('YYYY-MM-DD') + "-"  + picker.endDate.format('YYYY-MM-DD')); 
        });
      $('#reportrange').on('cancel.daterangepicker', function(ev, picker) { console.log("cancel event fired"); });});
    </script>
    <script type="text/javascript">
    </script>
</head>
<body>
	<h4 align="center">产品销售查询</h4>
        <div class="container well" style="width: 95%">
            <form action="" method="get" style="font-size: 12px;">
          
            【日期/地区】选择日期：  <input id="reportrange" name="riqi" style="width:200px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc" value="2014-01-01 - 2014-01-01">
			&nbsp;&nbsp;&nbsp;&nbsp;地区：<select id="area" name="area" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc" onchange="GetProvince()"> 
			<option value="all">全部</option>
			<?php foreach ($areas as $area ):
			echo  $area;
			endforeach;?>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;省份：<select id="province" name="province" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc" onchange="GetCity()"> 
			<option value="all">全部</option>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;城市：<select id="city" name="city" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc" onchange="GetXian()"> 
			<option value="all">全部</option>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;区/县：<select id="xian" name="xian" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">全部</option>
			</select>
			<br>
		【客户信息】品牌：
			<select id="pinpai" name="pinpai" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">全部</option>
			<?php foreach ($pinpai as $p ):
			echo $p;
			endforeach;?>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;客户负责人：
			<select id="fuzeren" name="fuzeren" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">全部</option>
			<?php foreach ($kehufuzeren as $u ):
			echo $u;
			endforeach;?>
			</select>
			
			&nbsp;&nbsp;&nbsp;&nbsp;家具城：
			<select id="jiajucheng" name="jiajucheng" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="">全部</option>
			<?php foreach ($jiajucheng as $u ):
			echo $u;
			endforeach;?>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;托运部：
			<select id="tuoyunbu" name="tuoyunbu" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="">全部</option>
			<?php foreach ($tuoyunbu as $u ):
			echo $u;
			endforeach;?>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="kehu" name="kehu" type="text" style="width: 100px" placeholder="客户名称（全部）">
              <br>
              【产品信息】产品分类选择：
			<select id="class" name="class" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">全部</option>
			<?php foreach ($class as $cla ):
			echo  $cla;
			endforeach;?>
			</select> 

				&nbsp;&nbsp;&nbsp;&nbsp;颜色：
			<select id="yanse" name="yanse" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">全部</option>
			<?php foreach ($yanse as $yan ):
			echo $yan;
			endforeach;?>
			</select> 
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="xinghao" name="xinghao" type="text" style="width: 80px" placeholder="型号（全部）">
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="proname" name="proname" type="text" style="width: 100px" placeholder="产品名称（全部）">
			
				<br>
		【订单信息】订单状态：
			<select id="status" name="status" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">全部</option>
			<option value="0">下单未发货</option>
			<option value="3">已结算</option>
			<option value="5">回单</option>
			</select> 
			
			&nbsp;&nbsp;&nbsp;&nbsp;开单人：
			<select id="kaidanren" name="kaidanren" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">全部</option>
			<?php foreach ($kaidanren as $u ):
			echo $u;
			endforeach;?>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;发货人：
			<select id="fahuoren" name="fahuoren" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">全部</option>
			<?php foreach ($fahuoren as $f ):
			echo $f;
			endforeach;?>
			</select>
			
			&nbsp;&nbsp;&nbsp;&nbsp;收款方式：
			<select id="shoukuanfs" name="shoukuanfs" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="">全部</option>
			<option value="补">补</option>
			<option value="店">店</option>
			<option value="托单">托单</option>
			<option value="打款">打款</option>
			<option value="签单">签单</option>
			<option value="代收">代收</option>
			<option value="现金">现金</option>
			<option value="客户打款">客户打款</option>
			</select>
			
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="tuoyunhao" name="tuoyunhao" type="text" style="width: 100px" placeholder="托运单号（全部）">
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="danhao" name="danhao" type="text" style="width: 100px" placeholder="单号（全部）">
			&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn btn-primary" type="button" onClick="beifen();" value="查询" />
			&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn btn-success" type="button" onClick="download();" value="下载" />
			<!-- &nbsp;&nbsp;&nbsp;&nbsp;<input class="btn btn-primary" type="button" onClick="beifen();" value="beicha" /> -->
				</form>
				</div>
				<div class="container-fluid well" id = "webpage" data-spy="scroll" data-target="#navbar-example" data-offset="0" style="width:110%;height:75%;overflow:auto; position: relative;" class="table-bordered table-condensed">
				
        </div>

</body>
</html>