<table>
<tr><td colspan="4">Minhas compras no Webshop</td></tr>
<tr>
	<td>#</td>
	<td>Item</td>
	<td>Valor</td>
	<td>Data</td>
</tr>
<?php
if(!isset($_COOKIE["Marcao_Web_Login"]) || !isset($_COOKIE["Marcao_Web_Senha"]))
{
	die("<script>carregar('paginas/concluido.php?id=2','Centro','GET');</script>");
}
	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
	
	$query = mssql_query("SELECT item, valor, data FROM [$db_mssql].[dbo].[Webshop_Compras] WHERE login='$login'");
	while($row = mssql_fetch_row($query))
	{
		$total++;
		echo "
<tr>
	<td>$total</td>
	<td>$row[0]</td>
	<td>$row[1]</td>
	<td>$row[2]</td>
</tr>
		";
	}
	if($total == 0) echo "<tr><td colspan='4'><center>Nenhuma conta foi feita!</center></td></tr>";
?>
</table>