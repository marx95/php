<?php
	if(empty($db_mssql)) die();
	
	$pagina = "
<div><input type=\"button\" onclick=\"carregar('paginas/premios.php','Centro','GET')\" value=\"Pr&ecirc;mio Mensal\" \></div>
<table>
<tr><td colspan='7'>Top 50 Mensal</td></tr>
</tr>
<tr>
<td width='25'>#</td>
<td><strong>Jogador</strong></td>
<td><strong>Classe</strong></td>
<td><strong>Level</strong></td>
<td><strong>Resets</strong></td>
<td><strong>Guild</strong></td>
<td><strong>Vip</strong></td>
</tr>";
	$rank = 0;
	$result = mssql_query("SELECT TOP 50 accountid, name, class, clevel, resetsm from [$db_mssql].[dbo].[Character] WHERE resetsm > 0 AND ctlcode=0 order by resetsm desc, clevel desc");
	while($row = mssql_fetch_row($result))
		{
			$rank += 1;
			$guild_char= mssql_fetch_row(mssql_query("select G_Name from [$db_mssql].[dbo].[GuildMember] where name='$row[1]'"));
			$vip_char= mssql_fetch_row(mssql_query("select vip from [$db_mssql].[dbo].[Memb_Info] where memb___id='$row[0]'"));
			
			switch($vip_char[0])
			{
				case 0: $vip_char = 0; break;
				case 1: $vip_char = 1; break;
				case 2: $vip_char = 2; break;
			}
			
			switch($row[2])
			{
			case 0:  $classe = "Dark Wizard"; break;
			case 1:  $classe = "Soul Master"; break;
			case 2:  $classe = "Grand Master"; break;
			case 3:  $classe = "Grand Master"; break;

			case 16: $classe = "Dark Night"; break;
			case 17: $classe = "Blade Knight"; break;
			case 18: $classe = "Blade Master"; break;
			case 19: $classe = "Blade Master"; break;

			case 32: $classe = "Elf"; break;
			case 33: $classe = "Muse Elf"; break;
			case 34: $classe = "High Elf"; break;
			case 35: $classe = "High Elf"; break;

			case 48: $classe = "Magic Gladiator"; break;
			case 49: $classe = "Duel Master"; break;
			case 50: $classe = "Duel Master"; break;

			case 64: $classe = "Dark Lord"; break;
			case 65: $classe = "Lord Emperor"; break;
			case 66: $classe = "Lord Emperor"; break;

			case 80: $classe = "Summoner"; break;
			case 81: $classe = "Bloody Summoner"; break;
			case 82: $classe = "Dimension Master"; break;
			case 83: $classe = "Dimension Master"; break;

			case 96: $classe = "Rage Fighter"; break;
			case 97: $classe = "First Master"; break;
			case 98: $classe = "Rage Fighter"; break;
			case 99: $classe = "Rage Fighter"; break;
			case 100: $classe = "Rage Fighter"; break;
			}
			
			$pagina = $pagina . "
<tr onclick=carregar('painel/perfil.php?personagem=$row[1]','Centro','GET')>
<td><b>$rank</b></td>
<td><a href='javascript:void(0)'>$row[1]</a></td>
<td>$classe</td>
<td>$row[3]</td>
<td>$row[4]</td>
<td>$guild_char[0]</td>
<td><img src='img/vip_$vip_char.gif' border='0'></td>
</tr>
";
	}

	$pagina = $pagina . "
	</table>
	<!-- Hora do Cache: $agora -->
	";
	EscreveCache("ranking/top_mensal.html", $pagina);
?>