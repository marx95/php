<?php
	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
	if($CtlCode < $CtlCode_Adminsitrador) die("<center><span id='Falha'>P&aacute;gina somente para Administradores</span></center>");
?>
<table>
<tr>
  <td colspan="4">Todas as indica&ccedil;&otilde;es feitas</td></tr>
<tr>
	<td><b>#</b></td>
	<td><b>Login</b></td>
	<td><b>Indicou</b></td>
	<td><b>Cash's Ganhos</b></td>
</tr>
<?php
$query = mssql_query("SELECT login, indicou, cashs_ganhos FROM [$db_mssql].[dbo].[Indique_Site]");
while($row = mssql_fetch_row($query))
{
$rank++;
echo "
<tr>
	<td>$rank</td>
	<td>$row[0]</td>
	<td>$row[1]</td>
	<td>$row[2]</td>
</tr>
";
}
?>
</table>