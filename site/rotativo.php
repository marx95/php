<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body {
	background-color: #000;
	margin: 0px;
}
#BannerRotativo {
	width: 650px;
	height: 200px;
	background-color: #000;
	padding: 0px;
	border: 0px;
	padding: 0px;
	border-spacing: 0px;
	background-image: url(img/b_r_1.jpg);
	-webkit-transition: 0.15s ease-in;
	-moz-transition: 0.15s ease-in;
	-o-transition: 0.15s ease-in;
	transition: 0.15s ease-in;
}
#BannerRotativo tr:first-child td {
	height: 160px;
	background-image: none;
	cursor: pointer;
}
#BannerRotativo td {
	background-image: url(img/menu_topo_sub_bg.png);
	text-align: right;
	padding: 0px;
	border-spacing: 0px;
}
#BannerRotativo img {
	cursor: pointer;
	width: 28px;
	height: 28px;
	border: 2px solid #191919;
	border-radius: 2px;
	margin: 0px;
	margin-right: 4px;
	vertical-align: middle;

}
#BannerRotativo img:hover {
	border: 2px solid #7d0020;
}
</style>
</head>
<script type="text/javascript">
var BR_UltimaID = 1;
function BannerRotativoMudar(ID)
{
	if(ID == BR_UltimaID) return;
	if(ID == 1) document.getElementById('BannerRotativo').style.backgroundImage = "url(img/b_r_1.jpg)";
	if(ID == 2) document.getElementById('BannerRotativo').style.backgroundImage = "url(img/b_r_2.jpg)";
	if(ID == 3) document.getElementById('BannerRotativo').style.backgroundImage = "url(img/b_r_3.jpg)";
	BR_UltimaID = ID;
}
function BannerRotativoTimer()
{
	BR_UltimaID++;
	if(BR_UltimaID > 3) BR_UltimaID = 1;
	if(BR_UltimaID == 1) document.getElementById('BannerRotativo').style.backgroundImage = "url(img/b_r_1.jpg)";
	if(BR_UltimaID == 2) document.getElementById('BannerRotativo').style.backgroundImage = "url(img/b_r_2.jpg)";
	if(BR_UltimaID == 3) document.getElementById('BannerRotativo').style.backgroundImage = "url(img/b_r_3.jpg)";
}
</script>
<body onLoad="setInterval('BannerRotativoTimer()', 15000);">
<table id="BannerRotativo">
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td style="border-top: 1px dotted #191919">
    	<img src="img/b_r_1.jpg" onclick="BannerRotativoMudar(1)" />
        <img src="img/b_r_2.jpg" onclick="BannerRotativoMudar(2)" />
        <img src="img/b_r_3.jpg" onclick="BannerRotativoMudar(3)" />
    </td>
</tr>
</table>
</body>
</html>
