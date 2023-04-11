<?php
	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
	if($CtlCode < $CtlCode_Adminsitrador) die("<center><span id='Falha'>P&aacute;gina somente para Administradores</span></center>");
	
	$free_g = mssql_fetch_row(mssql_query("SELECT premio FROM [$db_mssql].[dbo].[Premio_Online] WHERE tipo='Free' AND moeda='Gold'"));
	$free_c = mssql_fetch_row(mssql_query("SELECT premio FROM [$db_mssql].[dbo].[Premio_Online] WHERE tipo='Free' AND moeda='Cash'"));
	
	$vip_g = mssql_fetch_row(mssql_query("SELECT premio FROM [$db_mssql].[dbo].[Premio_Online] WHERE tipo='Vip' AND moeda='Gold'"));
	$vip_c = mssql_fetch_row(mssql_query("SELECT premio FROM [$db_mssql].[dbo].[Premio_Online] WHERE tipo='Vip' AND moeda='Cash'"));

if($_GET['f'] == 1)
{
	$free_g	 = $_POST['free_gold'];
	$free_c	 = $_POST['free_cash'];
	$vip_g	 = $_POST['vip_gold'];
	$vip_c	 = $_POST['vip_cash'];
	
	if(empty($free_g)) $free_g = 0;
	if(empty($free_c)) $free_c = 0;
	if(empty($vip_g)) $vip_g = 0;
	if(empty($vip_c)) $vip_c = 0;
	 
	mssql_query("UPDATE [$db_mssql].[dbo].[Premio_Online] SET premio=$free_g WHERE tipo='Free' AND moeda='Gold'");
	mssql_query("UPDATE [$db_mssql].[dbo].[Premio_Online] SET premio=$free_c WHERE tipo='Free' AND moeda='Cash'");
	mssql_query("UPDATE [$db_mssql].[dbo].[Premio_Online] SET premio=$vip_g WHERE tipo='Vip' AND moeda='Gold'");
	mssql_query("UPDATE [$db_mssql].[dbo].[Premio_Online] SET premio=$vip_c WHERE tipo='Vip' AND moeda='Cash'");
	
	die("<script>carregar('paginas/concluido.php?id=19','Paginas_Centro','GET')</script>");
}
?>
<form method="post" title="Resultado" action="painel_adm/premio_hora.php?f=1">
<table>
<tr>
  <td colspan="2">Premia&ccedil;&atilde;o para Jogadores online no Jogo</td></tr>
<tr>
<td colspan="2"><b>Este &eacute; o sistema que o servidor executa a cada hora!</b></td>
</tr>
<tr>
	<td width="50%">Free Gold</td>
	<td><input type="text" name="free_gold" id="free_gold" maxlength="4" value="<?php echo $free_g[0]; ?>"></td>
</tr>
<tr>
	<td>Free Cash</td>
	<td><input type="text" name="free_cash" id="free_cash" maxlength="4" value="<?php echo $free_c[0]; ?>"></td>
</tr>
<tr>
	<td>Vip Gold</td>
	<td><input type="text" name="vip_gold" id="vip_gold" maxlength="4" value="<?php echo $vip_g[0]; ?>"></td>
</tr>
<tr>
	<td>Vip Cash</td>
	<td><input type="text" name="vip_cash" id="vip_cash" maxlength="4" value="<?php echo $vip_c[0]; ?>"></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="Atualizar"></td>
</tr>
</table>
</form>
<br />
<center><span id="Resultado"></span></center>