<?php
	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	
	$personagem = $_GET['personagem'];
	if($personagem == "Sem Rei") die("&nbsp;");
	
	$p_resultado = mssql_fetch_row(mssql_query("SELECT clevel, money, strength, dexterity, vitality, energy, leadership, resets, resetsd, resetss, resetsm, MapNumber, MapPosX, MapPosY, leveluppoint, AvatarLink, pklevel, avatarcoment, class FROM [$db_mssql].[dbo].[character] where Name='$personagem'"));
	$p_guild = mssql_fetch_row(mssql_query("select G_Name from [$db_mssql].[dbo].[GuildMember] where name='$personagem'"));
	if($p_guild[0] == "") $p_guild[0] = "Sem Guild";
	
	$pklevel = $p_resultado[16];
	$comentario = $p_resultado[17];
	if(strlen($comentario) < 2) $comentario = "Sem Comentario";
	
	//classes
	switch($p_resultado[18])
	{
		case 0: $classe = "Dark Wizard"; break;
		case 1: $classe = "Soul Master"; break;
		case 2: $classe = "Grand Master"; break;

		case 16: $classe = "Dark Night"; break;
		case 17: $classe = "Blade Knight"; break;
		case 18: $classe = "Blade Master"; break;

		case 32: $classe = "Elf"; break;
		case 33: $classe = "Muse Elf"; break;
		case 34: $classe = "Hight Elf"; break;

		case 48: $classe = "Magic Gladiator"; break;
		case 49: $classe = "Duel Master"; break;

		case 64: $classe = "Dark Lord"; break;
		case 65: $classe = "Lord Emperor"; break;
		default: $classe = "Desconhecido"; break;
	}
	
	switch($p_resultado[11])
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
			default: $mapa = "Mapa desconhecido"; break;
	}
		
	//Fix pontos
	for($i=2; $i<=6; $i++)
	{
		if($p_resultado[$i]<0 || $p_resultado[$i] > $Limite_de_Pontos) $p_resultado[$i] = $Limite_de_Pontos;
	}
?>
<table>
<tr>
  <td colspan="2">Estat&iacute;sticas de <?php echo $personagem; ?></td></tr>
<tr>
	<td colspan="2">
	<center>
		<img src="img/avatar/<?php echo $p_resultado[15]; ?>" /><br />
		<input type="text" value="http://muover.net?pag=painel/perfil.php&personagem=<?php echo $personagem; ?>" onclick="this.select();" id="LinkPerfil"/>
	</center>
	</td>
</tr>
<tr>
	<td colspan="2">
	<center><?php echo $comentario; ?></center>
	</td>
</tr>
<tr>
	<td width="50%">Classe:</td>
	<td><?php echo $classe; ?></td>
</tr>
<tr>
	<td>Level:</td>
	<td><?php echo $p_resultado[0]; ?></td>
</tr>
<tr>
	<td>Zen:</td>
	<td><?php echo $p_resultado[1]; ?></td>
</tr>
<tr>
	<td>Pontos para distribuir:</td>
	<td><?php echo $p_resultado[14]; ?></td>
</tr>
<tr>
	<td>For&ccedil;a:</td>
	<td><?php echo $p_resultado[2]; ?></td>
</tr>
<tr>
	<td>Agilidade:</td>
	<td><?php echo $p_resultado[3]; ?></td>
</tr>
<tr>
	<td>Vitalidade:</td>
	<td><?php echo $p_resultado[4]; ?></td>
</tr>
<tr>
	<td>Energia:</td>
	<td><?php echo $p_resultado[5]; ?></td>
</tr>
<tr>
	<td>Lideran&ccedil;a:</td>
	<td><?php echo $p_resultado[6]; ?></td>
</tr>
<tr>
	<td>Guild:</td>
	<td><?php echo $p_guild[0]; ?></td>
</tr>
<tr>
	<td>Mapa:</td>
	<td><?php echo $mapa . " (" . $p_resultado[12] . "/" . $p_resultado[13] . ")"; ?></td>
</tr>
<tr>
	<td>Status</td>
	<td>PK Level <?php echo $pklevel; ?></td>
</tr>
</table>
<br />
<table>
<tr><td colspan='2'>Seus Resets:</td></tr>
<tr>
	<td width="50%">Resets:</td>
	<td><?php echo $p_resultado[7]; ?></td>
</tr>
<tr>
	<td>Resets Di&aacute;rio:</td>
	<td><?php echo $p_resultado[8]; ?></td>
</tr>
<tr>
	<td>Resets Semanal:</td>
	<td><?php echo $p_resultado[9]; ?></td>
</tr>
<tr>
	<td>Resets Mensal:</td>
	<td><?php echo $p_resultado[10]; ?></td>
</tr>
</table>
<table>
<tr>
  <td colspan='3'>Pr&ecirc;mios conquistado por <?php echo $personagem; ?></td></tr>
<tr>
	<td width="10%"><center><b>#</b></center></td>
	<td width="40%"><b>Premio</b></td>
	<td><b>Data</b></td>
</tr>
<?php
	$query = mssql_query("SELECT premio, data FROM [$db_mssql].[dbo].[trofeus_site] WHERE personagem='$personagem'");
	while($trofeus = mssql_fetch_row($query))
	{
		$rank++;
		echo "
		<tr>
		<td><center>$rank</center></td>
		<td>$trofeus[0]</td>
		<td>$trofeus[1]</td>
		</tr>
		";
		
	}
	if($rank == 0)echo "<tr><td colspan='3'><center>Este personagem n&atilde;o ganhou nenhum premio ainda!</center></td></tr>";
?>
</table>