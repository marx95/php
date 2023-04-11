<?php
	$id = $_GET['id'];
	$login = $_COOKIE['Marcao_WebShop_Login'];
	$senha = $_COOKIE['Marcao_WebShop_Senha'];
	switch($id)
	{
		case 0:
			require_once("../config/masterconfig.php");
			require_once("../config/conexao_mssql.php");
			$listarbonus = mssql_fetch_row(mssql_query("select $ProcBonus from [$db_mssql].[dbo].[memb_info] where memb___id='$login'"));
			echo "$StringBonus: <b>$listarbonus[0]</b>";
			if($Mostrar_Valor_Real == 1) echo " - <b id=\"MenuLCash\"></b><script type=\"text/javascript\">ConverterValorCash('$listarbonus[0]', 'MenuLCash');</script>";
			die();
		break;
		
		case 1:
			require_once("../config/masterconfig.php");
			require_once("../config/conexao_mssql.php");
			$listarbonus = mssql_fetch_row(mssql_query("select $ProcGolds from [$db_mssql].[dbo].[memb_info] where memb___id='$login'"));
			die("$StringGolds: <b>$listarbonus[0]</b>");
		break;
	}


?>