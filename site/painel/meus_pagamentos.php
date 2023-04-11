<table>
<tr><td colspan="5">Meus Pagamentos</td></tr>
<tr>
	<td>#</td>
	<td>Valor</td>
	<td>Data & Hora</td>
	<td>Status</td>
	<td>Resposta</td>
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
	
	$query = mssql_query("SELECT valor, data, hora, aprovado, resposta FROM [$db_mssql].[dbo].[Confirmacoes] WHERE login='$login'");
	while($row = mssql_fetch_row($query))
	{
		$total++;
		switch($row[3])
		{
			case 0: $status = "Em analize..."; break;
			case 1: $status = "Recusado"; break;
			case 2: $status = "Aprovado"; break;
		}
		echo "
<tr>
	<td>$total</td>
	<td>$row[0]</td>
	<td>$row[1] $row[2]</td>
	<td>$status</td>
	<td>$row[4]</td>
</tr>
		";
	}
	if($total == 0) echo "<tr><td colspan='5'><center>Nenhum registro de pagamento!</center></td></tr>";
?>
</table>