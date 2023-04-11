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
	$login_t = $_POST['login_t'];
	
	if(empty($login_t))	die("<span id='Falha'>Login em branco!</span>");
	 
	$query_l = mssql_num_rows(mssql_query("SELECT memb___id FROM [$db_mssql].[dbo].[MEMB_INFO] WHERE memb___id = '$login_t'"));
	if($query_l == 0) die("<span id='Falha'>Login inexistente!</span>");
	
	mssql_query("UPDATE [$db_mssql].[dbo].[MEMB_INFO] SET vip=0, creditos=0 WHERE memb___id='$login_t'");
	
	die("<script>carregar('paginas/concluido.php?id=16','Paginas_Centro','GET')</script>");
}
?>
<form method="post" title="Resultado" action="painel_adm/t_vip.php?f=1">
<table>
<tr><td colspan="2">Tirar VIP</td></tr>
<tr>
	<td width="50%">Login:</td>
	<td><input type="text" name="login_t" id="login_t" maxlength="10"></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="Tirar VIP"></td>
</tr>
</table>
</form>
<br />
<center><span id="Resultado"></span></center>