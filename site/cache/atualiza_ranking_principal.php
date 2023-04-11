<?php
	if(empty($db_mssql)) die();
	
	$pagina = "<tr>";
	
	// - DIARIO
	$rank = mssql_fetch_row(mssql_query("SELECT Name, AvatarLink, resetsd FROM [$db_mssql].[dbo].[Character] WHERE ctlcode=0 AND resetsd > 0 ORDER BY resetsd DESC"));
	if(strlen($rank[0]) == 0)
	{
		$rank[0] = "";
		$rank[1] = "avatar.png";
		$rank[2] = "0";
	}
	$pagina = $pagina . "
	<td style=\"text-align: center; border: 1px solid #303030; background-color: #282828; cursor: pointer;\" onclick=\"carregar('painel/perfil.php?personagem=" . $rank[0] . "','Centro','GET');\">
	<b>Top Di&aacute;rio</b>
	<br />" . $rank[0] . "<br />" . $rank[2] . " Reset's<br />
	<img src=\"img/avatar/" . $rank[1] . "\" style=\"max-width: 100px; max-height: 100px; width: 100px; height: 100px;\">
	</td>";
	
	// - SEMANAL
	$rank = mssql_fetch_row(mssql_query("SELECT Name, AvatarLink, resetss FROM [$db_mssql].[dbo].[Character] WHERE ctlcode=0 AND resetss > 0 ORDER BY resetss DESC"));
	if(strlen($rank[0]) == 0)
	{
		$rank[0] = "";
		$rank[1] = "avatar.png";
		$rank[2] = "0";
	}
	$pagina = $pagina . "
	<td style=\"text-align: center; border: 1px solid #303030; background-color: #282828; cursor: pointer;\" onclick=\"carregar('painel/perfil.php?personagem=" . $rank[0] . "','Centro','GET');\">
	<b>Top Semanal</b>
	<br />" . $rank[0] . "<br />" . $rank[2] . " Reset's<br />
	<img src=\"img/avatar/" . $rank[1] . "\" style=\"max-width: 100px; max-height: 100px; width: 100px; height: 100px;\">
	</td>";
	
	// - Mensal
	$rank = mssql_fetch_row(mssql_query("SELECT Name, AvatarLink, resetsm FROM [$db_mssql].[dbo].[Character] WHERE ctlcode=0 AND resetsm > 0 ORDER BY resetsm DESC"));
	if(strlen($rank[0]) == 0)
	{
		$rank[0] = "";
		$rank[1] = "avatar.png";
		$rank[2] = "0";
	}
	$pagina = $pagina . "
	<td style=\"text-align: center; border: 1px solid #303030; background-color: #282828; cursor: pointer;\" onclick=\"carregar('painel/perfil.php?personagem=" . $rank[0] . "','Centro','GET');\">
	<b>Top Mensal</b>
	<br />" . $rank[0] . "<br />" . $rank[2] . " Reset's<br />
	<img src=\"img/avatar/" . $rank[1] . "\" style=\"max-width: 100px; max-height: 100px; width: 100px; height: 100px;\">
	</td>";
	
	// - RESET
	$rank = mssql_fetch_row(mssql_query("SELECT Name, AvatarLink, resets FROM [$db_mssql].[dbo].[Character] WHERE ctlcode=0 AND resets > 0 ORDER BY resets DESC"));
	if(strlen($rank[0]) == 0)
	{
		$rank[0] = "";
		$rank[1] = "avatar.png";
		$rank[2] = "0";
	}
	$pagina = $pagina . "
	<td style=\"text-align: center; border: 1px solid #303030; background-color: #282828; cursor: pointer;\" onclick=\"carregar('painel/perfil.php?personagem=" . $rank[0] . "','Centro','GET');\">
	<b>Top Reset</b>
	<br />" . $rank[0] . "<br />" . $rank[2] . " Reset's<br />
	<img src=\"img/avatar/" . $rank[1] . "\" style=\"max-width: 100px; max-height: 100px; width: 100px; height: 100px;\">
	</td>";
	
	// - REI PVP
	$rank = mssql_fetch_row(mssql_query("SELECT Name, AvatarLink FROM [$db_mssql].[dbo].[Character] WHERE ReiPVP=1"));
	if(strlen($rank[0]) == 0)
	{
		$rank[0] = "Sem Rei";
		$rank[1] = "avatar.png";
		$rank[2] = "0";
	}
	$pagina = $pagina . "
	<td style=\"text-align: center; border: 1px solid #303030; background-color: #282828; cursor: pointer;\" onclick=\"carregar('painel/perfil.php?personagem=" . $rank[0] . "','Centro','GET');\">
	<b>Rei PVP</b><br />" . $rank[0] . "<br />&nbsp;<br />
	<img src=\"img/avatar/" . $rank[1] . "\" style=\"max-width: 100px; max-height: 100px; width: 100px; height: 100px;\">
	</td>";
	
	$pagina = $pagina . "
	</tr>
	<!-- Hora do Cache: $agora -->
	";
	EscreveCache("principal.html", $pagina);
?>