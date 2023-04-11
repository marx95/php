<?php
	if(empty($db_mssql)) die();
	
	require_once("../config/consultas.php"); 
	
	$pagina = "
	<tr><td colspan=\"2\">Estat&iacute;sticas</td></tr>
	<tr>
	<td width='50%'>Total de Contas</td>
	<td>$contas</td>
	</tr>
	<tr>
	<td>Total de Personagens</td>
	<td>$chars</td>
	</tr>
	<tr>
	<td>Total de Guild's</td>
	<td>$guildas</td>
	</tr>
	<tr>
	<td>Total Online</td>
	<td>$totalonline</td>
	</tr>
	<tr>
	<td>Record Online</td>
	<td>$recordOnline <b>($recordData)</b></td>
	</tr>
	<tr>
	<td>Online desde:</td>
	<td>01/11/2012</td>
	</tr>
	<!-- Hora do Cache: $agora -->
	";
	
	EscreveCache("estatisticas.html", $pagina);
?>