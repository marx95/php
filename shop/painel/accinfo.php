<?php
	$login = $_COOKIE['Marcao_WebShop_Login'];
	$senha = $_COOKIE['Marcao_WebShop_Senha'];
	if(strlen($login) < 4) die("#erro 100");
	if(strlen($senha) < 4) die("#erro 100");
	
	require_once("../config/conexao_mssql.php");
	
	$Query_Verifica = mssql_num_rows(mssql_query("SELECT memb___id FROM [$db_mssql].[dbo].[memb_info] WHERE memb___id='$login' AND memb__pwd='$senha'"));
	
	if($Query_Verifica == 0) die("#erro 101");
	
	$listarbonus = mssql_fetch_row(mssql_query("select $ProcBonus, $ProcGolds from [$db_mssql].[dbo].[memb_info] where memb___id='$login'"));
	$logado = 1;
	$cashs = $listarbonus[0];
	$golds = $listarbonus[1];
?>