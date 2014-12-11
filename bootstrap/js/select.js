/**
 * 运用ajax实现二级关联列表
 */
	function GetCity(){
		var province = document.getElementById("province").value;
		CreateXMLHttpRequest();
		xmlobj.onreadystatechange = ShowCity;
		xmlobj.open("GET","getCity.php?province="+province,true);
		xmlobj.send(null);
	}
	function ShowCity(){
		if(xmlobj.readyState == 4 && xmlobj.status == 200){
			document.getElementById("city").innerHTML = xmlobj.responseText;
		}
	}