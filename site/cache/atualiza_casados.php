<?php
	if(empty($db_mssql)) die();
	
	$pagina = "
	<tr>
	<td colspan=\"3\">Recem Casados
	</td>
	</tr>
	<tr>
    <td><b>#</b></td>
    <td><b>Marido</b></td>
	<td><b>Esposa</b></td>
	</tr>
	";

	$rank = 0;
	$result = mssql_query("SELECT TOP 5 nome, casado_com from [$db_mssql].[dbo].[Casamentos] WHERE status=2 AND tipo=0 ORDER BY id DESC");
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
    <td colspan='3'><center><img src='img/refresh.png' onclick=carregar('cache/casados.html','TopCasados','GET') style='cursor: pointer' /></center></td>
	</tr>
	<!-- Hora do Cache: $agora -->
	";
	EscreveCache("casados.html", $pagina);
?>