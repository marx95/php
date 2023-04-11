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
	$logindel = $_POST['logindel'];
	
	if(empty($logindel))			die("<span id='Falha'>Login em branco!</span>");
	
	mssql_query("DELETE FROM [$db_mssql].[dbo].[AccountCharacter] WHERE Id='$logindel'");
	mssql_query("DELETE FROM [$db_mssql].[dbo].[Character] WHERE AccountID='$logindel'");
	mssql_query("DELETE FROM [$db_mssql].[dbo].[Memb_Info] WHERE memb___id='$logindel'");
	mssql_query("DELETE FROM [$db_mssql].[dbo].[warehouse] WHERE AccountID='$logindel'");
	mssql_query("DELETE FROM [$db_mssql].[dbo].[warehouse] WHERE AccountID2='$logindel'");
	//mssql_query("DELETE FROM [$db_mssql].[dbo].[] WHERE ='$login'");
	
	die("<script>carregar('paginas/concluido.php?id=12','Paginas_Centro','GET')</script>");
}
?>
<form method="post" title="Resultado" action="painel_adm/deletaracc.php?f=1">
<table>
<tr><td colspan="2">Deletar Conta</td></tr>
<tr>
	<td width="50%">Login &aacute; deletar:</td>
	<td><input type="text" name="logindel" id="logindel" maxlength="10" /></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="Deletar" /></td>
</tr>
</table>
</form>
<br />
<center><span id="Resultado"></span></center>