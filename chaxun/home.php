<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<title>��Ʒ���۲�ѯ</title>
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
	<h1 align="center">��Ʒ���۲�ѯ</h1>
        <div class="container well">
            <form action="" method="get">
          
            ѡ�����ڣ�  <input id="reportrange" name="riqi" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc" value="2014-01-01 - 2014-01-01">
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
              <br><br>��Ʒ����ѡ��
			<select id="class" name="class" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">ȫ��</option>
			<?php foreach ($class as $cla ):
			echo  $cla;
			endforeach;?>
			</select> 
				&nbsp;&nbsp;&nbsp;&nbsp;�ͺţ�

			<select id="xinghao" name="xinghao" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">ȫ��</option>
			<?php foreach ($xinghao as $xing ):
			echo $xing;
			endforeach;?>
			</select> 

				&nbsp;&nbsp;&nbsp;&nbsp;��ɫ��

			<select id="yanse" name="yanse" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">ȫ��</option>
			<?php foreach ($yanse as $yan ):
			echo $yan;
			endforeach;?>
			</select> 
				&nbsp;&nbsp;&nbsp;&nbsp;����״̬��
			<select id="status" name="status" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="all">ȫ��</option>
			<?php foreach ($status as $sta ):
			echo $sta;
			endforeach;?>
			</select> 

				&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn btn-primary" type="button" onClick="Req();" value="��ѯ" />
				</form>
				</div>
				<div class="container-fluid table-responsive well">
<table class="table table-bordered table-condensed table-striped table-hover">
	<thead>
		<tr>
			<th  style="text-align:center">#</th>
			<th  style="text-align:center">����</th>
			<th  style="text-align:center">�µ�ʱ��</th>
			<th  style="text-align:center">����</th>
			<th  style="text-align:center">��Ʒ����</th>
			<th  style="text-align:center">��Ʒ�ͺ�</th>
			<th  style="text-align:center">����</th>
			<th  style="text-align:center">��ɫ</th>
			<th  style="text-align:center">����</th>
			<th  style="text-align:center">����</th>
			<th  style="text-align:center">С��</th>
			<th  style="text-align:center">����״̬</th>
			<th  style="text-align:center">�տʽ</th>
			<th  style="text-align:center">���˲�</th>
			<th  style="text-align:center">�ͻ�����</th>
			<th  style="text-align:center">�ͻ�����</th>
			<th  style="text-align:center">������</th>
		</tr>
	</thead>
	
	<tbody id="webpage"  style="text-align:center">
	</tbody>
</table>
				
        </div>

</body>
</html>