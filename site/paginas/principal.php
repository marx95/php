<?php require_once("../config/masterconfig.php"); ?>
<iframe src="rotativo.php" style="box-shadow: 0 0 3px 3px #000; min-width:650px; min-height: 200px; width: 650px; height: 200px; border: 0px; margin: 0px auto; display: block; border:1px solid #000; outline: 1px solid #191919; background-color: #000" frameborder="0px"></iframe>
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
	<td style=\"padding-left: 6px;"; if($rank > 1) { echo "background-color: #282828; border: 1px solid #303030;";} echo "\">
    <h2> " . $rows[titulo] . "</h2>
    " . base64_decode($rows[texto]) . "
	<br />
	<span style=\"font-size: 11px;\">Postado por <i>$rows[por]</i> &aacute;s <i>$rows[data]</i></span></td>
	</tr>";	
	}
	
	if($rank == 0) echo "<tr><td><h2>Sem Not&iacute;cias</h2></td></tr>";
?>
</table>
<table id="Ranking_Principal">
<tr>
	<td>Carregando...</td>
</tr>
</table>
<center>
<br />
<input type="button" onclick="carregar('paginas/premios.php','Centro','GET')" value="Veja a Lista de Pr&ecirc;mios dos Ranking's" \="">
<br />
<h2>Skype do Admin: marxdxd</h2>
<br />
<iframe src="http://www.xatech.com/web_gear/chat/chat.swf?id=196651562" width="500" height="300" frameborder="0" style="border-radius: 3px; border: 1px solid #191319; background-color: #000"></iframe>
</center>
<script type="text/javascript">carregar('cache/principal.html','Ranking_Principal','GET');</script>