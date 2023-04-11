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
	$tipo	= $_POST['tipo'];
	$quem	= $_POST['quem'];
	$valor	= $_POST['valor'];
	
	if($quem == 0) die("<span id='Falha'>Selecione quem irá receber!</span>");
	if($tipo == 0) die("<span id='Falha'>Selecione o Tipo de premio</span>");
	if($valor == 0) die("<span id='Falha'>Coloque um valor!</span>");
	switch($tipo)
	{
		case 1: $moeda = "golds"; break;
		case 2: $moeda = "bonus"; break;
	}
	
	switch($quem)
	{
		case 1: mssql_query("UPDATE [$db_mssql].[dbo].[Memb_Info] SET $moeda=$moeda+$valor"); break;
		case 2: mssql_query("UPDATE [$db_mssql].[dbo].[Memb_Info] SET $moeda=$moeda+$valor WHERE vip=0"); break;
		case 3: mssql_query("UPDATE [$db_mssql].[dbo].[Memb_Info] SET $moeda=$moeda+$valor WHERE vip=1"); break;
		case 4: 
		$consulta = mssql_query("SELECT memb___id FROM [$db_mssql].[dbo].[Memb_Stat] WHERE ConnectStat=1");
		while($row = mssql_fetch_row($consulta))
		{
			mssql_query("UPDATE [$db_mssql].[dbo].[Memb_Info] SET $moeda=$moeda+$valor WHERE memb___id='$row[0]'");
		}
		break;
		case 5:
		$consulta = mssql_query("SELECT memb___id FROM [$db_mssql].[dbo].[Memb_Stat] WHERE ConnectStat=1");
		while($row = mssql_fetch_row($consulta))
		{
			mssql_query("UPDATE [$db_mssql].[dbo].[Memb_Info] SET $moeda=$moeda+$valor WHERE memb___id='$row[0]' AND vip=0");
		}
		break;
		case 6:
		$consulta = mssql_query("SELECT memb___id FROM [$db_mssql].[dbo].[Memb_Stat] WHERE ConnectStat=1");
		while($row = mssql_fetch_row($consulta))
		{
			mssql_query("UPDATE [$db_mssql].[dbo].[Memb_Info] SET $moeda=$moeda+$valor WHERE memb___id='$row[0]' AND vip=1");
		}
		break;
	}
	
	die("<script>carregar('paginas/concluido.php?id=20','Paginas_Centro','GET')</script>");
}

?>
<form method="post" title="Resultado" action="painel_adm/presentear.php?f=1">
<table>
<tr><td colspan="2">Presentear jogadores</td></tr>
<tr>
	<td>Quem presentear</td>
	<td>
	<select name="quem" id="quem">
		<option value="0" selected>Selecione</option>
		<option value="1">Todas as Contas</option>
		<option value="2">Todas as Contas Free</option>
		<option value="3">Todas as Contas Vip</option>
		<option value="4">Todas as Contas Online</option>
		<option value="5">Todas as Contas Free Online</option>
		<option value="6">Todas as Contas Vip Online</option>
	</select>
	</td>
</tr>
<tr>
	<td width="50%">Tipo</td>
	<td>
	<select name="tipo" id="tipo">
		<option value="0" selected>Selecione</option>
		<option value="1">Golds</option>
		<option value="2">Cashs</option>
	</select>
	</td>
</tr>
<tr>
	<td>Valor</td>
	<td><input type="text" name="valor" id="valor" maxlength="4" value="0" />
</tr>
<tr>
	<td colspan="2"><input type="submit" value="Presentear"></td>
</tr>
</table>
</form>
<br />
<center><span id="Resultado"></span></center>