<?php
	if(empty($db_mssql)) die();
	
	$pagina = "
<table>
<tr><td colspan='6'>Top 50 PVP</td></tr>
</tr>
<tr>
<td width='25'>#</td>
<td><strong>Nome</strong></td>
<td><strong>Matou</strong></td>
<td><strong>Morreu</strong></td>
</tr>
";
	
	$rank = 0;
	$result = mssql_query("SELECT TOP 50 Name, matou, morreu FROM [$db_mssql].[dbo].[Character] WHERE matou > 0 OR morreu > 0 ORDER BY matou desc");
	while($row = mssql_fetch_row($result))
		{
			$rank += 1;
			
			$pagina = $pagina . "
<tr onclick=carregar('painel/perfil.php?personagem=$row[0]','Centro','GET')>
<td><b>$rank</b></td>
<td><a href='javascript:void(0)'>$row[0]</a></td>
<td>$row[1]</td>
<td>$row[2]</td>
</tr>
";
	}
	$pagina = $pagina . "
	</table>
	<!-- Hora do Cache: $agora -->
	";
	EscreveCache("ranking/top_pk.html", $pagina);
?>