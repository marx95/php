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
	$personagem = $_POST['personagem'];
	
	if(empty($personagem))	die("<span id='Falha'>Nome do personagem em branco!</span>");
	 
	$query_p = mssql_num_rows(mssql_query("SELECT Name FROM [$db_mssql].[dbo].[character] WHERE Name = '$personagem'"));
	if($query_p == 0) die("<span id='Falha'>Personagem inexistente!</span>");
	
	mssql_query("UPDATE [$db_mssql].[dbo].[character] SET strength = 64000, dexterity = 64000, vitality = 64000, energy = 64000, leadership = 64000 WHERE Name='$personagem'");
	
	die("<script>carregar('paginas/concluido.php?id=17','Paginas_Centro','GET')</script>");
}
?>
<form method="post" title="Resultado" action="painel_adm/d_full.php?f=1">
<table>
<tr><td colspan="2">Deixar Personagem Full</td></tr>
<tr>
	<td width="50%">Personagem:</td>
	<td><input type="text" name="personagem" id="personagem" maxlength="10"></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="Deixar Full"></td>
</tr>
</table>
</form>
<br />
<center><span id="Resultado"></span></center>