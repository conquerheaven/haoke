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
		var start = riqi.substr(0 , 10);
		var end = riqi.substr(13 , 10);
		message = "start="+start+"&end="+end+"&class="+leixing+"&xinghao="+xinghao+"&yanse="+yanse;
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