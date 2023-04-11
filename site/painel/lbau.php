<?php
	require_once("../config/masterconfig.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
	$func = $_GET['func'];
	
	if($vip < 1) die("<span id='Falha'>Necess&aacute;rio ser Usuario VIP!</span>");
	$bauid = mssql_fetch_row(mssql_query("SELECT BauID FROM [$db_mssql].[dbo].[Warehouse] WHERE Accountid='$login'"));
	
	if($func == 1)
	{
		mssql_query("UPDATE [$db_mssql].[dbo].[Warehouse] SET Items=0xFF WHERE accountid='$login' AND BauID=$bauid[0]");
		die("<script>carregar('painel/lbau.php?func=3','Resultado_L','GET')</script>");
	}
	
	if($func == 2) die("<span id='Falha'>Opera&ccedil;&atilde;o cancelada!</span>");
	if($func == 3) die("<span id='Sucesso'>O Ba&uacute; n&ordm;$bauid[0] foi limpo com sucesso!</span>");
	
?>
<center><span id="Resultado_L">
<table>
    <tr><td colspan="2">Tem certeza que deseja Limpar o Ba&uacute; n&ordm;<?php echo $bauid[0]; ?>?</td></tr>
<tr>
<td colspan="2">
<center>Ao proceder esta opera&ccedil;&atilde;o, voc&ecirc; perder&aacute; tudo que estiver no ba&uacute; numero <?php echo $bauid[0]; ?> (o ba&uacute; selecionado)!</center>
</td>
</tr>
<tr>
	<td><input type="button" value="Sim" onclick="carregar('painel/lbau.php?func=1','Resultado_L','GET')" /></td>
	<td><input type="button" value="N&atilde;o" onclick="carregar('painel/lbau.php?func=2','Resultado_L','GET')" /></td>
</tr>
</table>
</span></center>