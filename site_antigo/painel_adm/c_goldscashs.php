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
	$login_c 	= $_POST['login_c'];
	$quant 		= $_POST['quant'];
	$tipo		= $_POST['tipo_c'];
	
	if(empty($login_c))	die("<span id='Falha'>Login em branco!</span>");
	if(empty($quant))	die("<span id='Falha'>Quantidade branco!</span>");
	if($quant == 0)		die("<span id='Falha'>Impossivel colocar 0!</span>");
	if($tipo == "0")		die("<span id='Falha'>Selecione o Tipo!</span>");
	 
	$query_l = mssql_num_rows(mssql_query("SELECT memb___id FROM [$db_mssql].[dbo].[MEMB_INFO] WHERE memb___id = '$login_c'"));
	if($query_l == 0) die("<span id='Falha'>Login inexistente!</span>");
	
	mssql_query("UPDATE [$db_mssql].[dbo].[MEMB_INFO] SET $tipo=$tipo+$quant WHERE memb___id='$login_c'");
	
	if($tipo == "golds") die("<script>carregar('paginas/concluido.php?id=13','Paginas_Centro','GET')</script>");
	die("<script>carregar('paginas/concluido.php?id=14','Paginas_Centro','GET')</script>");
}
?>
<form method="post" title="Resultado" action="painel_adm/c_goldscashs.php?f=1">
<table>
<tr><td colspan="2">Colocar Gold's ou Cash's</td></tr>
<tr>
	<td width="50%">Login:</td>
	<td><input type="text" name="login_c" id="login_c" maxlength="10"></td>
</tr>
<tr>
	<td>Tipo</td>
	<td><select name="tipo_c" id="tipo_c">
    	<option value="0">Selecione...</option>
        <option value="golds">Gold's</option>
        <option value="cashs">Cash's</option>
        </select></td>
</tr>
<tr>
	<td>Quantidade</td>
	<td><input type="text" name="quant" id="quant" maxlength="8"></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="Colocar"></td>
</tr>
</table>
</form>
<br />
<center><span id="Resultado"></span></center>