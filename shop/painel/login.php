<?php
require_once("../config/masterconfig.php");

$func = $_GET['func'];

if(strlen($_COOKIE['Marcao_WebShop_Login']) >= 4 && strlen($_COOKIE['Marcao_WebShop_Senha']) >= 4)
{
	$login = $_COOKIE['Marcao_WebShop_Login'];
	$senha = $_COOKIE['Marcao_WebShop_Senha'];
	$func = 1;
	
}else
{
	$login = $_POST['login'];
	$senha = $_POST['senha'];
}


if($func == 1)
{
	if(strlen($login) < 4) die("<b>Digite o Login</b>");
	if(strlen($senha) < 4) die("<b>Digite a Senha</b>");
	
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	
	$Query_Verifica = mssql_num_rows(mssql_query("SELECT memb___id FROM [$db_mssql].[dbo].[memb_info] WHERE memb___id='$login' AND memb__pwd='$senha'"));
	
	if($Query_Verifica == 0) die("<b>Login ou Senha incorreta!</b>");
	
	setcookie("Marcao_WebShop_Login", $login, 0);
	setcookie("Marcao_WebShop_Senha", $senha, 0);
	
	$meus_resets_query = mssql_query("SELECT Resets FROM [$db_mssql].[dbo].[Character] WHERE accountid='$login'");
	$resets_tenho = 0;
	while($row_rst = mssql_fetch_row($meus_resets_query))
	{
		if($row_rst[0] > 0) $resets_tenho += $row_rst[0];
	}
	
	if($resets_tenho < $resets_minimos) die("<script>carregar('painel/falta_resets.php','Menu','GET');</script>");
	
	$listarbonus = mssql_fetch_row(mssql_query("select $ProcBonus, $ProcGolds from [$db_mssql].[dbo].[memb_info] where memb___id='$login'"));
	$logado = 1;
	$cashs = $listarbonus[0];
	$golds = $listarbonus[1];
	
	die("<script>carregar('painel/menu.php','Menu','GET');</script>");
}
?>
<form method="post" action="painel/login.php?func=1" title="Resultado_Login">
<div>
<p><b>Webshop <?php echo $nome; ?></b></p>
<p>Login</p>
<p><input name="login" type="text" id="login" maxlength="10"></p>
<p>Senha</p>
<p><input name="senha" type="password" id="senha" maxlength="10"></p>
<p><input type="submit" value="Entrar" onclick="Logar()"></p>
<p id="Resultado_Login"></p>
</div>
</form>