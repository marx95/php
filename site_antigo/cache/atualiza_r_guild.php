<?php
	if(empty($db_mssql)) die();
	
	$pagina = "
<table>
<tr><td colspan='5'>Top 50 Guild's</td></tr>
</tr>
<tr>
<td width='25'>#</td>
<td><strong>Guild</strong></td>
<td><strong>Dono</strong></td>
<td><strong>Membros</strong></td>
<td><strong>Pontos</strong></td>
</tr>
";

	$rank = 0;
	$result = mssql_query("SELECT TOP 50 G_Name, G_Master, G_Score from [$db_mssql].[dbo].[Guild] order by G_Score desc");
	while($row = mssql_fetch_row($result))
		{
			$rank += 1;
			$membros = mssql_num_rows(mssql_query("SELECT Name from [$db_mssql].[dbo].[GuildMember] where G_Name='$row[0]'"));

			$pontos_g = $row[2];
			if($pontos_g < 0 || $pontos_g == "") $pontos_g = 0;
			$pagina = $pagina . "
<tr>
<td><b>$rank</b></td>
<td>$row[0]</td>
<td onclick=carregar('painel/perfil.php?personagem=$row[1]','Centro','GET')><a href='javascript:void(0)'>$row[1]</a></td>
<td>$membros</td>
<td>$pontos_g</td>
</tr>
";
	}

	$pagina = $pagina . "
	</table>
	<!-- Hora do Cache: $agora -->
	";
	EscreveCache("ranking/top_guild.html", $pagina);
?>