<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<title>��Ʒ���۲�ѯ</title>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" media="all" href="../bootstrap/css/daterangepicker-bs3.css" />
	<script type="text/javascript" src="../bootstrap/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/moment.js"></script>
	<script type="text/javascript" src="../bootstrap/js/daterangepicker.js"></script>
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
	<h1>��Ʒ���۲�ѯ</h1>
        <div class="container well">
            <form action="" method="get">
             ѡ�����ڣ�  <input id="reportrange" name="riqi" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc" value="2014-01-01 - 2014-01-01">

              &nbsp;&nbsp;&nbsp;&nbsp; ��Ʒ����ѡ��
			<select name="class" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="volvo">Volvo</option> 
			<option value="saab">Saab</option> 
			<option value="fiat">Fiat</option> 
			<option value="audi">Audi</option> 
			</select> 
				&nbsp;&nbsp;&nbsp;&nbsp;�ͺţ�

			<select name="xinghao" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="volvo">Volvo</option> 
			<option value="saab">Saab</option> 
			<option value="fiat">Fiat</option> 
			<option value="audi">Audi</option> 
			</select> 

				&nbsp;&nbsp;&nbsp;&nbsp;��ɫ��

			<select name="yanse" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> 
			<option value="volvo">Volvo</option> 
			<option value="saab">Saab</option> 
			<option value="fiat">Fiat</option> 
			<option value="audi">Audi</option> 
			</select> 

				&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit">��ѯ</button>
				</form>
<table class="table table-condensed table-hover table-bordered">
	<thead>
		<tr>
			<th>��Ʒ������</th>
			<th>����</th>
			<th>��Ʒ����</th>
			<th>��Ʒ�ͺ�</th>
			<th>����</th>
			<th>��ɫ</th>
			<th>����</th>
			<th>����</th>
			<th>С��</th>
			<th>����</th>
			<th>�տ����</th>
			<th>�տʽ</th>
			<th>���˲�</th>
			<th>�ͻ�����</th>
			<th>�ͻ�����</th>
			<th>������</th>
		</tr>
	</thead>
	<tbody>
		<tr class="info">
			<td>2014/10/8</td>
			<td>ɳ����</td>
			<td>079Aɳ����<br></td>
			<td>079A</td>
			<td>��ľ���</td>
			<td>����</td>
			<td>1</td>
			<td>880</td>
			<td>880</td>
			<td>45468</td><td>�ѽ���</td>
			<td>�ֽ�</td><td>���ն�</td>
			<td>�㽭����</td>
			<td>������</td>
			<td>����</td>
		</tr>
	</tbody>
</table>
				
				
        </div>

</body>
</html>