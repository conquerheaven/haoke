/**
 * 
 */
	var xmlobj;
	var message;
	function getMessage(){
		var riqi = document.getElementById("reportrange").value;
		var leixing = document.getElementById("class").value;
		var xinghao = document.getElementById("xinghao").value;
		var yanse = document.getElementById("yanse").value;
		var area = document.getElementById("area").value;
		var province = document.getElementById("province").value;
		var city = document.getElementById("city").value;
		var xian = document.getElementById("xian").value;
		var status = document.getElementById("status").value;
		var start = riqi.substr(0 , 10);
		var end = riqi.substr(13 , 10);
		
		var proname = document.getElementById("proname").value;
		var pinpai = document.getElementById("pinpai").value;
		var fuzeren = document.getElementById("fuzeren").value;
		var jiajucheng = document.getElementById("jiajucheng").value;
		var kehu = document.getElementById("kehu").value;
		var shoukuanfs = document.getElementById("shoukuanfs").value;
		var kaidanren = document.getElementById("kaidanren").value;
		var fahuoren = document.getElementById("fahuoren").value;
		var tuoyunbu = document.getElementById("tuoyunbu").value;
		var tuoyunhao = document.getElementById("tuoyunhao").value;
		var danhao = document.getElementById("danhao").value;
		//alert(kehu+" "+jiajucheng);
		message = "start="+start+"&end="+end+"&class="+leixing+"&xinghao="+xinghao+"&yanse="+yanse+"&area="+area+"&province="+province+"&city="+city+"&xian="+xian+"&status="+status;
		message += "&pinpai="+pinpai+"&fuzeren="+fuzeren+"&jiajucheng="+jiajucheng+"&kehu="+kehu+"&shoukuanfs="+shoukuanfs+"&kaidanren="+kaidanren;
		message += "&fahuoren="+fahuoren+"&tuoyunbu="+tuoyunbu+"&tuoyunhao="+tuoyunhao+"&danhao="+danhao+"&proname="+proname;
	}
	function CreateXMLHttpRequest(){
		if(window.ActiveXObject){
			xmlobj = new ActiveXObject("Microsoft.XMLHTTP");
		}
		else if(window.XMLHttpRequest){
			xmlobj = new XMLHttpRequest();
		}
	}
	function Req(){
		getMessage();
		CreateXMLHttpRequest();
		xmlobj.onreadystatechange = StarHandler;
		xmlobj.open("GET","chaxun.php?"+message,true);
		xmlobj.send(null);
	}
	function StarHandler(){
		if(xmlobj.readyState == 4 && xmlobj.status == 200){
			document.getElementById("webpage").innerHTML = xmlobj.responseText;
		}
	}
	function download(){
		window.location.href='download.php';
	}
	function beifen(){
		getMessage();
		CreateXMLHttpRequest();
		xmlobj.onreadystatechange = StarHandler;
		xmlobj.open("GET","beifen.php?"+message,true);
		xmlobj.send(null);
	}