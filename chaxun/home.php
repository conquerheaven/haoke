<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<title>产品销售查询</title>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" media="all" href="../bootstrap/css/daterangepicker-bs3.css" />
	<script type="text/javascript" src="../bootstrap/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
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
</head>
<body>
	<h1 align="center">产品销售查询</h1>
        <div class="container well">
            <form action="" method="get">
          
            选择日期：  <input id="reportrange" name="riqi" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc" value="2014-01-01 - 2014-01-01">
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
              <br><br>产品分类选择：
			<select id="class" name="class" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">全部</option>
			<?php foreach ($class as $cla ):
			echo  $cla;
			endforeach;?>
			</select> 
				&nbsp;&nbsp;&nbsp;&nbsp;型号：

			<select id="xinghao" name="xinghao" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">全部</option>
			<?php foreach ($xinghao as $xing ):
			echo $xing;
			endforeach;?>
			</select> 

				&nbsp;&nbsp;&nbsp;&nbsp;颜色：

			<select id="yanse" name="yanse" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">全部</option>
			<?php foreach ($yanse as $yan ):
			echo $yan;
			endforeach;?>
			</select> 
				&nbsp;&nbsp;&nbsp;&nbsp;订单状态：
			<select id="status" name="status" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">全部</option>
			<?php foreach ($status as $sta ):
			echo $sta;
			endforeach;?>
			</select> 

				&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn btn-primary" type="button" onClick="Req();" value="查询" />
				</form>
				</div>
				<div class="container-fluid table-responsive well">
<table class="table table-bordered table-condensed table-striped table-hover">
	<thead>
		<tr>
			<th  style="text-align:center">#</th>
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
			<th  style="text-align:center">托运部</th>
			<th  style="text-align:center">客户地区</th>
			<th  style="text-align:center">客户名称</th>
			<th  style="text-align:center">负责人</th>
		</tr>
	</thead>
	
	<tbody id="webpage"  style="text-align:center">
	</tbody>
</table>
				
        </div>

</body>
</html>