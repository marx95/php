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
	$login_c = $_POST['login_c'];
	$dias = $_POST['dias'];
	
	if(empty($login_c))	die("<span id='Falha'>Login em branco!</span>");
	if(empty($dias))	die("<span id='Falha'>Quantidade de dias branco!</span>");
	if($dias == 0)	die("<span id='Falha'>Impossivel colocar 0 dia!</span>");
	 
	$query_l = mssql_num_rows(mssql_query("SELECT memb___id FROM [$db_mssql].[dbo].[MEMB_INFO] WHERE memb___id = '$login_c'"));
	if($query_l == 0) die("<span id='Falha'>Login inexistente!</span>");
	
	mssql_query("UPDATE [$db_mssql].[dbo].[MEMB_INFO] SET vip=1, creditos=creditos+$dias WHERE memb___id='$login_c'");
	
	die("<script>carregar('paginas/concluido.php?id=15','Paginas_Centro','GET')</script>");
}
?>
<form method="post" title="Resultado" action="painel_adm/c_vip.php?f=1">
<table>
<tr><td colspan="2">Colocar VIP</td></tr>
<tr>
	<td width="50%">Login:</td>
	<td><input type="text" name="login_c" id="login_c" maxlength="10"></td>
</tr>
<tr>
	<td>Dias VIP</td>
	<td><input type="text" name="dias" id="dias" maxlength="3"></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="Colocar o VIP"></td>
</tr>
</table>
</form>
<br />
<center><span id="Resultado"></span></center>