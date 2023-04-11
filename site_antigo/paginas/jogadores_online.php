<?php
	require_once("../config/masterconfig.php");
	require_once("../config/conexao_mssql.php");
?>
<table>
<tr><td colspan="4">Jogadores Online</td></tr>
<?php
$sql = mssql_query("SELECT DISTINCT
MuOnline.dbo.AccountCharacter.GameIDC,
MuOnline.dbo.memb_stat.ServerName,
MuOnline.dbo.memb_stat.ConnectTM 
FROM [$db_mssql].[dbo].[memb_stat] 
JOIN MuOnline.dbo.AccountCharacter ON MuOnline.dbo.Memb_stat.memb___id = MuOnline.dbo.AccountCharacter.ID 
COLLATE Latin1_general_CI_AS 
WHERE MuOnline.dbo.Memb_stat.connectstat = 1");
while($row=mssql_fetch_array($sql))
{
			$avatar = mssql_fetch_row(mssql_query("select avatarlink, clevel, MapNumber, MapPosX, MapPosY, ctlcode from [$db_mssql].[dbo].[Character] where name='$row[GameIDC]'"));

		
			switch($avatar[2])
			{
			case 0: $mapa = "Lorencia"; break;
			case 1: $mapa = "Dungeon"; break;
			case 2: $mapa = "Devias"; break;
			case 3: $mapa = "Noria"; break;
			case 4: $mapa = "LostTower"; break;
			case 5: $mapa = "Exilio"; break;
			case 6: $mapa = "Arena"; break;
			case 7: $mapa = "Atlans"; break;
			case 8: $mapa = "Tarkan"; break;
			case 9: $mapa = "DevilSquare"; break;
			case 10: $mapa = "Icarus"; break;
			case 11: $mapa = "Blood Castle I"; break;
			case 12: $mapa = "Blood Castle II"; break;
			case 13: $mapa = "Blood Castle III"; break;
			case 14: $mapa = "Blood Castle IV"; break;
			case 15: $mapa = "Blood Castle V"; break;
			case 16: $mapa = "Blood Castle VI"; break;
			case 17: $mapa = "Blood Castle VII"; break;
			case 18: $mapa = "Chaos Castle I"; break;
			case 19: $mapa = "Chaos Castle II"; break;
			case 20: $mapa = "Chaos Castle III"; break;
			case 21: $mapa = "Chaos Castle IV"; break;
			case 22: $mapa = "Chaos Castle V"; break;
			case 23: $mapa = "Chaos Castle VI"; break;
			case 24: $mapa = "Kalima I"; break;
			case 25: $mapa = "Kalima II"; break;
			case 26: $mapa = "Kalima III"; break;
			case 27: $mapa = "Kalima IV"; break;
			case 28: $mapa = "Kalima V"; break;
			case 29: $mapa = "Kalima VI"; break;
			case 30: $mapa = "Valley Of Loren"; break;
			case 31: $mapa = "Land Of Trials"; break;
			case 33: $mapa = "Aida"; break;
			case 34: $mapa = "Crywolf"; break;
			case 37: $mapa = "Kantru Remains"; break;
			case 38: $mapa = "Kantru Relics"; break;
			case 40: $mapa = "Silent Map"; break;
			case 41: $mapa = "Barracs"; break;
			case 42: $mapa = "Refuge"; break;
			case 45: $mapa = "Illusion Temple"; break;
			case 51: $mapa = "Elbeland"; break;
			case 56: $mapa = "Swamp Of Calmness"; break;
			case 57: $mapa = "Raklion"; break;
			case 58: $mapa = "Deep Raklion"; break;
			case 62: $mapa = "Village Of Santa"; break;
			case 63: $mapa = "Vulcan"; break;
			case 64: $mapa = "Duel Map"; break;
			}
			
			if($row[GameIDC] != "" AND $avatar[5] < 32)
			{
			$rank++;
			$rank_linha++;
			if($rank_linha == 5) { $rank_linha = 1; echo "</tr><tr>"; }
			$tip = "Mapa: $mapa ($avatar[3] $avatar[4])<br />Level: $avatar[1]<br />Logado desde: $row[ConnectTM]";
		echo "
 <td style=\"Cursor: Pointer;\" onclick=\"carregar('painel/perfil.php?personagem=$row[GameIDC]','Centro','GET');\" onmousemove=\"ToolMsg('$tip')\">
 <center>
 <b>$rank</b> - $row[GameIDC]<br />
 <img src=\"img/avatar/$avatar[0]\" style=\"width: 80px; height: 80px; border: 0px; border-radius: 3px;\"><br />
 </center></td>
";
}
		}
		
		if($rank > 0)
		{
			if($rank_linha < 5)
			{
				for($i = $rank_linha; $i < 4; $i++)
				{
					echo "<td>&nbsp;</td>";
				}
			}
		}
		
		if($rank == 0)
		{
			echo "
			<tr>
			<td colspan=\"4\"><center>N&atilde;o &aacute; jogadores online no momento!</center></td>
			<tr>
			";
		}
		?>
    </table>