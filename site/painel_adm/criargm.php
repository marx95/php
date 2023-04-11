<?php
	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
	if($CtlCode < $CtlCode_Adminsitrador) die("<center><span id='Falha'>P&aacute;gina somente para Administradores</span></center>");
	
if($_GET['f'] == 1)
{
	require_once("../config/criar_gm.php");
	$logincriar = $_POST['logincriar'];
	$senhacriar = $_POST['senhacriar'];
	$charcriar = $_POST['charcriar'];
	$tipo_p = $_POST['tipo_p'];
	$CtlCode_DB	= 0;
	
	if(empty($logincriar))			die("<span id='Falha'>Login em branco!</span>");
	if(empty($senhacriar))			die("<span id='Falha'>Senha em branco!</span>");
	if(empty($charcriar))			die("<span id='Falha'>Char em branco!</span>");
	if($tipo_p == -1)				die("<span id='Falha'>Selecione o Tipo de personagem!</span>");
	if(tipo_p == $CtlCode_Divulgador) die("<span id='Falha'>Não é possivel criar Divulgador por aqui!</span>");
	$query_l = mssql_num_rows(mssql_query("SELECT memb___id FROM [$db_mssql].[dbo].[MEMB_INFO] WHERE memb___id = '$logincriar'"));
	$query_c = mssql_num_rows(mssql_query("SELECT Name FROM [$db_mssql].[dbo].[Character] WHERE Name = '$charcriar'"));
	if($query_l == 1) die("<span id='Falha'>Login em uso!</span>");
	if($query_c == 1) die("<span id='Falha'>Nome do personagem em uso!</span>");
	if($tipo_p >= $CtlCode_GameMaster && tipo_p < $CtlCode_Adminsitrador_Pl) $CtlCode_DB = 32;
	
	$GM_I[0] = "14EF89007516A87F0000CDEF6B00C10DC77F0000F16F7F00EC35E57F0000116F7F00C7A210FF0000316F7F0012908FFF0000516F7F00C42512FF0000716F7F00";
	$GM_I[1] = "1D7489FF0000856FF700CD5B24FF0000FFFFFFFFFFFFFFFFFFFFAD6B61003BCC53FF0000B66B6100C72BC6FF0000B86B61004D876DFF0000FFFFFFFFFFFFFFFF";
	$GM_Itens = "0x" . $GM_I[0] . $GM_I[1];
	
	$cashs = 0;
	$golds = 500;
	
	mssql_query("INSERT INTO [$db_mssql].[dbo].[MEMB_INFO](memb___id, bloc_code, mail_addr, ctl1_code, sno__numb, memb__pwd, memb_name, fpas_ques, fpas_answ, cashs, vip, creditos, golds, email_confirmado) VALUES('$logincriar', 0, 'gm@munovus.net', '0','0', '$senhacriar', 'MuNovus', '', '', '$cashs', '1', '9999', '$golds', '1')");
	mssql_query("INSERT INTO [$db_mssql].[dbo].[AccountCharacter](id, GameID1, GameID2, GameID3, GameID4, GameID5) VALUES ('$logincriar', '$charcriar', 'a', 'b', 'c', 'd')");
	mssql_query("INSERT INTO [$db_mssql].[dbo].[Character](AccountID, Name, cLevel, class, MapNumber, MapPosX, MapPosY, ctlcode, inventory, dbversion, Tipo) VALUES ('$logincriar', '$charcriar', 400, 17, 0, 123, 123, '$CtlCode_DB', $GM_Itens, 2, $tipo_p)");
	
	die("<script>carregar('paginas/concluido.php?id=11','Paginas_Centro','GET')</script>");
}
?>
<form method="post" title="Resultado" action="painel_adm/criargm.php?f=1">
<table>
<tr><td colspan="2">Criar Conta com Personagem de GM</td></tr>
<tr>
	<td width="50%">Login:</td>
	<td><input type="text" name="logincriar" id="logincriar" maxlength="10"></td>
</tr>
<tr>
	<td>Senha</td>
	<td><input type="password" name="senhacriar" id="senhacriar" maxlength="10"></td>
</tr>
<tr>
	<td>Nome do char:</td>
	<td><input type="text" name="charcriar" id="charcriar" maxlength="10"></td>
</tr>
<tr>
	<td>Tipo:</td>
	<td>
	<select name="tipo_p" id="tipo_p">
	<option value="-1" selected="selected"></option>
	<option value="<?php echo $CtlCode_Jogador; ?>">Jogador</option>
	<option value="<?php echo $CtlCode_GameMaster; ?>">GameMaster</option>
	<option value="<?php echo $CtlCode_Adminsitrador; ?>">Administrador</option>
	<option value="<?php echo $CtlCode_Adminsitrador_Pl; ?>">Administrador Jogador</option>
	</select>
	</td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="Criar"></td>
</tr>
</table>
</form>
<br />
<center><span id="Resultado"></span></center>