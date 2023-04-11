<?php
	if(empty($db_mssql)) die();
	
	$pagina = "
	<tr>
	<td colspan=\"3\">Top Mensal
	</td>
	</tr>
	<tr>
    <td><b>#</b></td>
    <td><b>Nome</b></td>
	<td><b>Resets</b></td>
	</tr>
	";
	
	$rank = 0;
	$result = mssql_query("SELECT TOP 5 name, resetsm, avatarlink from [$db_mssql].[dbo].[Character] WHERE ctlcode=0 ORDER BY resetsm DESC");
	while($row = mssql_fetch_row($result))
	{
		$rank +=1;
		$pagina = $pagina . "
		<tr onclick=carregar('painel/perfil.php?personagem=$row[0]','Centro','GET')>
		<td>$rank</td>
		<td><a href='javascript:void(0)'>$row[0]</a></td>
		<td>$row[1]</td>
		</tr>
		";
	}
	
	$pagina = $pagina . "
	<tr>
	<td colspan='3'>
	<center><b><a href='http://munovus.net/forum/viewtopic.php?f=5&t=6&p=7' rel='external'>Ver Pr&ecirc;mios</a></b></center>
	</td>
	</tr>
	<tr>
    <td colspan='3'><center><img src='img/refresh.png' onclick=carregar('cache/mensal.html','TopMensal','GET') style='cursor: pointer' /></center></td>
	</tr>
	<!-- Hora do Cache: $agora -->
	";
	EscreveCache("mensal.html", $pagina);
?>