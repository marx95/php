<?php
	if(empty($db_mssql)) die();
	
	$pagina = "
	<tr>
	<td colspan=\"3\">Top Di&aacute;rio
	</td>
	</tr>
	<tr>
    <td><b>#</b></td>
    <td><b>Nome</b></td>
	<td><b>Resets</b></td>
	</tr>
	";
	
	$rank = 0;
	$result = mssql_query("SELECT TOP 10 name, resetsd, avatarlink from [$db_mssql].[dbo].[Character] WHERE ctlcode=0 AND Resets > 0 ORDER BY resetsd DESC");
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
    <td colspan='3' onclick=\"carregar('paginas/premios.php','Centro','GET')\" style=\"font-weight: bold; text-align: center; cursor: pointer;\">Ver Pr&ecirc;mios</td>
	</tr>
	<tr>
    <td colspan='3'><center><img src='img/refresh.png' onclick=carregar('cache/diario.html','TopDiario','GET') style='cursor: pointer' /></center></td>
	</tr>
	<!-- Hora do Cache: $agora -->
	";
	EscreveCache("diario.html", $pagina);
?>