/**
 * 运用ajax实现二级关联列表
 */
	function GetProvince(){
		var area = document.getElementById("area").value;
		CreateXMLHttpRequest();
		xmlobj.onreadystatechange = ShowProvince;
		xmlobj.open("GET","getProvince.php?area="+area,true);
		xmlobj.send(null);
	}
	function ShowProvince(){
		if(xmlobj.readyState == 4 && xmlobj.status == 200){
			document.getElementById("province").innerHTML = xmlobj.responseText;
		}
	}
	
	function GetCity(){
		var area = document.getElementById("province").value;
		CreateXMLHttpRequest();
		xmlobj.onreadystatechange = ShowCity;
		xmlobj.open("GET","getProvince.php?area="+area,true);
		xmlobj.send(null);
	}
	function ShowCity(){
		if(xmlobj.readyState == 4 && xmlobj.status == 200){
			document.getElementById("city").innerHTML = xmlobj.responseText;
		}
	}
	
	function GetXian(){
		var area = document.getElementById("city").value;
		CreateXMLHttpRequest();
		xmlobj.onreadystatechange = ShowXian;
		xmlobj.open("GET","getProvince.php?area="+area,true);
		xmlobj.send(null);
	}
	function ShowXian(){
		if(xmlobj.readyState == 4 && xmlobj.status == 200){
			document.getElementById("xian").innerHTML = xmlobj.responseText;
		}
	}