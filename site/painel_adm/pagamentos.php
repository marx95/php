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
<tr><td colspan="4">Visualizar Pagamentos</td></tr>
<tr>
	<td width="10%">#</td>
	<td width="30%">Login</td>
	<td width="30%">Valor</td>
	<td width="30%">
	<?php
	if($_GET['ap'] == 0) $selA = "selected";
	if($_GET['ap'] == 1) $selB = "selected";
	if($_GET['ap'] == 2) $selC = "selected";
	?>
	<select id="ap" onchange="PagamentosSelect()">
		<option value="0"<?php echo $selA; ?>>Novos Pagamentos</option>
		<option value="1"<?php echo $selB; ?>>Pagamentos Recusados</option>
		<option value="2"<?php echo $selC; ?>>Pagamentos Aprovados</option>
	</select>
	</td>
	</tr>
<?php
$ap = $_GET['ap'];
if(empty($ap)) $ap = 0;
$query = mssql_query("SELECT id, login, valor FROM [$db_mssql].[dbo].[Confirmacoes] WHERE aprovado = $ap");

while($row = mssql_fetch_row($query))
{
	$rank++;
	echo "
<tr>
	<td>$rank</td>
	<td>$row[1]</td>
	<td>$row[2]</td>
	<td><input type='button' onclick=carregar('painel_adm/v_pagamentos.php?pid=$row[0]','Centro','GET') value='Ver Detalhes >>' /></td>
</tr>
	";
}
?>
</table>