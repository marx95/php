<?php
	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
	$personagem = $_GET['personagem'];
	$func = $_GET['func'];
	$novonick = $_POST['novonick'];
	
	if($vip < 1) die("<span id='Falha'>Necess&aacute;rio ser Usuario VIP!</span>");
	
	if($func == 1)
	{
		if(empty($novonick)) die("<span id='Falha'>D&iacute;gite o nick!</span>");
		if(strlen($novonick) < 4) die("<span id='Falha'>M&iacute;nimo 4 d&iacute;gitos no Nick!</span>");
		if(strlen($novonick) > 10) die("<span id='Falha'>M&aacute;ximo 10 d&iacute;gitos no Nick!</span>");
		
		if(substr_count(strtolower($novonick), "webzen") > 0) die("<span id='Falha'>Boa Tentativa!</span>");
		if(substr_count($novonick, "{") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "}") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "=") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "[") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, ")") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "]") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "[") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "-") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "@") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, ",") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, ".") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, ":") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, ";") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "/") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "°") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "?") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "\\") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "§") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, '"') > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "<") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, ">") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "%") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "$") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "#") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "-") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "+") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, ".") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, ",") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "^") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "!") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "¬") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "ª") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "*") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "¨") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "¹") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "²") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "³") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "£") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "¢") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		if(substr_count($novonick, "_") > 0) die("<span id='Falha'>N&atilde;o use s&iacute;mbolos!</span>");
		
		$p_existe = mssql_num_rows(mssql_query("SELECT Name FROM [$db_mssql].[dbo].[Character] WHERE Name='$personagem' AND accountid='$login'"));
		if($p_existe == 0) die("<span id='Falha'>Personagem inexistente!</span>");
		
		$v_novonick = mssql_num_rows(mssql_query("select name from [$db_mssql].[dbo].[Character] where name='$novonick'"));
		
		if($personagem == $novonick) die("<span id='Falha'>O Nick &eacute; igual o Nick de seu personagem, tente outro!</span>");
		if($v_novonick > 0) die("<span id='Falha'>Nick j&aacute; está sendo usado!</span>");
		
		$pegacharacc = mssql_query("SELECT * FROM [$db_mssql].[dbo].[AccountCharacter] WHERE Id='$login'");
		$rpegacharacc = mssql_fetch_array($pegacharacc);
					
		if($rpegacharacc['GameID1'] == $personagem) { $gameid = 'GameID1'; } 
		if($rpegacharacc['GameID2'] == $personagem) { $gameid = 'GameID2'; } 
		if($rpegacharacc['GameID3'] == $personagem) { $gameid = 'GameID3'; } 
		if($rpegacharacc['GameID4'] == $personagem) { $gameid = 'GameID4'; } 
		if($rpegacharacc['GameID5'] == $personagem) { $gameid = 'GameID5'; }
					
		mssql_query("UPDATE [$db_mssql].[dbo].[Character] SET Name = '$novonick' WHERE Name='$personagem' AND AccountID='$login'");
		mssql_query("UPDATE [$db_mssql].[dbo].[AccountCharacter] SET $gameid='$novonick' WHERE $gameid='$personagem' AND Id='$login'");
		mssql_query("UPDATE [$db_mssql].[dbo].[Guild] SET G_Master='$novonick' WHERE G_Master='$personagem'");
		mssql_query("UPDATE [$db_mssql].[dbo].[GuildMember] SET Name='$novonick' WHERE Name='$personagem'");
		die("<script>carregar('paginas/concluido.php?id=6','Centro','GET')</script>");
	}
?>
<form method="post" title="Resultado" action="painel/nick.php?func=1&personagem=<?php echo $personagem; ?>">
<table>
<tr><td colspan='2'>Mudar o nick de: <?php echo $personagem; ?></td></tr>
<tr>
	<td width="50%">Novo nick:</td>
	<td><input type="text" name="novonick" id="novonick" maxlength="10" /></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="Trocar" /></td>
</tr>
</table>
<br />
<center><span id="Resultado"></span></center>