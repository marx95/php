<?php require_once("../config/masterconfig.php"); 
if($_GET['func']) echo "<!--"; ?>
<table>
<tr><td>Distribuindo Pontos dentro do jogo:</td></tr>
<tr>
	<td><center>
	    Onde <b>X</b> &eacute; o numeros de pontos &aacute; distribuir!
	</center></td>
</tr>
<tr>
	<td><b>/f X</b> ou <b>/for X</b></td>
</tr>
<tr>
	<td><b>/a X</b> ou <b>/agi X</b></td>
</tr>
<tr>
	<td><b>/v X</b> ou <b>/vit X</b></td>
</tr>
<tr>
	<td><b>/e X</b> ou <b>/ene X</b></td>
</tr>
<tr>
	<td><b>/c X</b> ou <b>/com X</b></td>
</tr>
</table>
<?php if($_GET['func']) echo "--!>"; ?>
<center>
<?php

	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
	$personagem = $_GET['personagem'];
	$func = $_GET['func'];
	
	$logado = mssql_fetch_row(mssql_query("SELECT connectstat FROM [$db_mssql].[dbo].[memb_stat] WHERE memb___id='$login'"));
	if($logado[0] == 1) die("<span id='Falha'>Deslogue do jogo!</span>");
	
	$p_existe = mssql_num_rows(mssql_query("SELECT Name FROM [$db_mssql].[dbo].[Character] WHERE Name='$personagem' AND accountid='$login'"));
	if($p_existe == 0) die("<span id='Falha'>Personagem inexistente!</span>");
	
	$p_resultado = mssql_fetch_row(mssql_query("SELECT leveluppoint, strength, dexterity, vitality, energy, leadership FROM [$db_mssql].[dbo].[character] WHERE Name='$personagem'"));
	
	for($i=1; $i<=4; $i++)
	{
		if($p_resultado[$i] < 0 || $p_resultado[$i] > $Limite_de_Pontos) $p_resultado[$i] = $Limite_de_Pontos;
	}
	
	if($func == 1)
	{
		$str = $_POST['str'];
		$agi = $_POST['agi'];
		$vit = $_POST['vit'];
		$ene = $_POST['ene'];
		$com = $_POST['com'];
		
		if(!is_numeric($str)) die("<span id='Falha'>Use somente N&uacude;meros!</span>");
		if(!is_numeric($agi)) die("<span id='Falha'>Use somente N&uacude;meros!</span>");
		if(!is_numeric($vit)) die("<span id='Falha'>Use somente N&uacude;meros!</span>");
		if(!is_numeric($ene)) die("<span id='Falha'>Use somente N&uacude;meros!</span>");
		if(!is_numeric($com)) die("<span id='Falha'>Use somente N&uacude;meros!</span>");
		
		if($str < 0) die("<span id='Falha'>Valor inv&aacute;lido!</span>");
		if($agi < 0) die("<span id='Falha'>Valor inv&aacute;lido!</span>");
		if($vit < 0) die("<span id='Falha'>Valor inv&aacute;lido!</span>");
		if($ene < 0) die("<span id='Falha'>Valor inv&aacute;lido!</span>");
		if($com < 0) die("<span id='Falha'>Valor inv&aacute;lido!</span>");
		
		$total = $str+$agi+$vit+$ene+$com;
		
		if($total == 0) die("<span id='Falha'>Imposs&iacute;vel distribuir 0 pontos!</span>");
		if($total > $p_resultado[0]) die("<span id='Falha'>Pontos insuficientes!</span>");
		
		if($p_resultado[1]+$str > $Limite_de_Pontos) die("<span id='Falha'>Voc&ecirc; passou de $Limite_de_Pontos em Força!</span>");
		if($p_resultado[2]+$agi > $Limite_de_Pontos) die("<span id='Falha'>Voc&ecirc; passou de $Limite_de_Pontos em Agilidade!</span>");
		if($p_resultado[3]+$vit> $Limite_de_Pontos) die("<span id='Falha'>Voc&ecirc; passou de $Limite_de_Pontos em Vitalidade!</span>");
		if($p_resultado[4]+$ene > $Limite_de_Pontos) die("<span id='Falha'>Voc&ecirc; passou de $Limite_de_Pontos em Energia!</span>");
		if($p_resultado[5]+$com > 32767) die("<span id='Falha'>Voc&ecirc; passou de 32000 em Comando!</span>");
		
		mssql_query("UPDATE [$db_mssql].[dbo].[Character] SET 
		Strength=Strength+$str, 
        Dexterity=Dexterity+$agi, 
        Vitality=Vitality+$vit,  
        leveluppoint=leveluppoint-$total, 
        Energy=Energy+$ene,
		Leadership=Leadership+$com WHERE name='$personagem' 
        AND accountid='$login'");
		
		die("<script>carregar('painel/pontos.php?personagem=$personagem&func=2','Sub_Centro','GET')</script>");
	}
?>
<form method="post" title="Resultado" action="painel/pontos.php?func=1&personagem=<?php echo $personagem; ?>">
<table>
<tr><td colspan="3">Distribuir Pontos</td></tr>
<tr>
	<td colspan="2"><b>Pontos para distribuir:</b></td>
	<td><?php echo $p_resultado[0]; ?></td>
</tr>
<tr>
	<td width="20%"><b>#</b></td>
	<td width="20%"><b>Status Atual</b></td>
	<td width="30%"><b>Distribuir</b></td>
</tr>
<tr>
	<td>For&ccedil;a:</td>
	<td><?php echo $p_resultado[1]; ?></td>
	<td><input type="text" maxlength="5" name="str" id="str" value="0" /></td>
</tr>
<tr>
	<td>Agilidade:</td>
	<td><?php echo $p_resultado[2]; ?></td>
	<td><input type="text" maxlength="5" name="agi" id="agi" value="0" /></td>
</tr>
<tr>
	<td>Vitalidade:</td>
	<td><?php echo $p_resultado[3]; ?></td>
	<td><input type="text" maxlength="5" name="vit" id="vit" value="0" /></td>
</tr>
<tr>
	<td>Energia:</td>
	<td><?php echo $p_resultado[4]; ?></td>
	<td><input type="text" maxlength="5" name="ene" id="ene" value="0" /></td>
</tr>
<tr>
	<td>Comando:</td>
	<td><?php echo $p_resultado[5]; ?></td>
	<td><input type="text" maxlength="5" name="com" id="com" value="0" /></td>
</tr>
<tr>
	<td colspan="3"><p><input type="submit" value="Enviar" /></p></td>
</tr>
</table>
</form>
</center>
<br />
<center><span id="Resultado"><?php if($func == 2) die("<span id='Sucesso'>Pontos distribuidos com sucesso!<span>"); ?></span></center>