<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<title>��Ʒ���۲�ѯ</title>
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
             '����': [moment(), moment()],
             '����': [moment().subtract('days', 1), moment().subtract('days', 1)],
             '��ȥһ��': [moment().subtract('days', 6), moment()],
             '��ȥһ����': [moment().subtract('days', 29), moment()],
             '�����': [moment().startOf('month'), moment().endOf('month')],
             '�ϸ���': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
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
	         customRangeLabel: '��ѡ����',
	         daysOfWeek: ['��', 'һ', '��', '��', '��', '��','��'],
	         monthNames: ['һ��', '����', '����', '����', '����', '����', '����', '����', '����', 'ʮ��', 'ʮһ��', 'ʮ����'],
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
	<h3 align="center">��Ʒ���۲�ѯ</h3>
        <div class="container well">
            <form action="" method="get" style="font-size: 12px;">
          
            ѡ�����ڣ�  <input id="reportrange" name="riqi" style="width:200px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc" value="2014-01-01 - 2014-01-01">
			&nbsp;&nbsp;&nbsp;&nbsp;������<select id="area" name="area" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc" onchange="GetProvince()"> 
			<option value="all">ȫ��</option>
			<?php foreach ($areas as $area ):
			echo  $area;
			endforeach;?>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;ʡ�ݣ�<select id="province" name="province" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc" onchange="GetCity()"> 
			<option value="all">ȫ��</option>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;���У�<select id="city" name="city" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc" onchange="GetXian()"> 
			<option value="all">ȫ��</option>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;��/�أ�<select id="xian" name="xian" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">ȫ��</option>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="kehu" name="kehu" type="text" style="width: 100px" placeholder="�ͻ����ƣ�ȫ����">
              <br><br>��Ʒ����ѡ��
			<select id="class" name="class" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">ȫ��</option>
			<?php foreach ($class as $cla ):
			echo  $cla;
			endforeach;?>
			</select> 
				&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="xinghao" name="xinghao" type="text" style="width: 80px" placeholder="�ͺţ�ȫ����">

				&nbsp;&nbsp;&nbsp;&nbsp;��ɫ��

			<select id="yanse" name="yanse" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">ȫ��</option>
			<?php foreach ($yanse as $yan ):
			echo $yan;
			endforeach;?>
			</select> 
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="shoukuanfs" name="shoukuanfs" type="text" style="width: 100px" placeholder="�տʽ��ȫ����">
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="huikuantongdao" name="huikuantongdao" type="text" style="width: 100px" placeholder="�ؿ�ͨ����ȫ����">
			
				<br><br>����״̬��
			<select id="status" name="status" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">ȫ��</option>
			<option value="0">�µ�δ����</option>
			<option value="3">�ѽ���</option>
			<option value="5">�ص�</option>
			</select> 
			&nbsp;&nbsp;&nbsp;&nbsp;�ͻ������ˣ�
			<select id="fuzeren" name="fuzeren" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">ȫ��</option>
			<?php foreach ($user as $u ):
			echo $u;
			endforeach;?>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;�����ˣ�
			<select id="kaidanren" name="kaidanren" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">ȫ��</option>
			<?php foreach ($user as $u ):
			echo $u;
			endforeach;?>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;�����ˣ�
			<select id="fahuoren" name="fahuoren" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">ȫ��</option>
			<?php foreach ($fahuoren as $f ):
			echo $f;
			endforeach;?>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="tuoyunbu" name="tuoyunbu" type="text" style="width: 85px" placeholder="���˲���ȫ����">
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="tuoyunhao" name="tuoyunhao" type="text" style="width: 100px" placeholder="���˵��ţ�ȫ����">
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="tuoyunhao" name="tuoyunhao" type="text" style="width: 100px" placeholder="���Ե��ţ�ȫ����">

				&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn btn-primary" type="button" onClick="Req();" value="��ѯ" />
				</form>
				</div>
				<div class="container-fluid well" id = "webpage" data-spy="scroll" data-target="#navbar-example" data-offset="0" style="width:110%;height:55%;overflow:auto; position: relative;" class="table-bordered table-condensed">
				
        </div>

</body>
</html>