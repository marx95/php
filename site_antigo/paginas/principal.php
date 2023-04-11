<?php require_once("../config/masterconfig.php"); ?>
<!--<center>
<input type="button" onclick="window.open('paginas/chat.php', '_blank', 'width=510,height=550,toolbar=no,location=no,resizable=no,directories=no,menubar=no,status=no'); return false;" value="Entrar no Chat" />
</center>-->

<table id="Noticias">
<tr>
	<td>&nbsp;&Uacute;ltimas Not&iacute;cias</td>
</tr>
<?php
	$cnn_mysql	= mysql_connect($ip_mysql, $u_mysql, $p_mysql);
	$sdb_mysql	= mysql_select_db($db_mysql, $cnn_mysql);
	
	$q_mysql	= mysql_query("SELECT titulo, texto, data, por FROM noticias ORDER BY id DESC LIMIT $noticias_na_pagina");
	
	while($rows	= mysql_fetch_array($q_mysql))
	{
		$rank++;
	echo "
	<tr>
	<td>
    <h2> " . $rows[titulo] . "</h2>
    " . base64_decode($rows[texto]) . "
	<br />
	<span style=\"font-size: 11px;\">Postado por <i>$rows[por]</i> &aacute;s <i>$rows[data]</i></span></td>
	</tr>";	
	}
	
	if($rank == 0) echo "<tr><td><h2>Sem Not&iacute;cias</h2></td></tr>";
?>
</table>
<br />
<center><h1>Skype ADM: marxdxd</h1>
<br />
<iframe src="http://www.xatech.com/web_gear/chat/chat.swf?id=196651562" width="500" height="300" frameborder="0"></iframe>
</center>