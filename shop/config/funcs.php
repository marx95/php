<?php
switch($_GET['func'])
{
	case 1:
		require_once("../config/masterconfig.php");
		require_once("../config/conexao_mssql.php");
		$TotalItem = mssql_num_rows(mssql_query("select id from [$db_mssql].[dbo].[Webshop]"));
		die("Temos $TotalItem Itens cadastrados!");
	break;
	case 2:
		require_once("../config/masterconfig.php");
		require_once("../config/conexao_mssql.php");
		$data = date("d/m/Y");
		$TotalComprasHoje = mssql_num_rows(mssql_query("SELECT id FROM [$db_mssql].[dbo].[Webshop_compras] WHERE data='$data'"));
		die("Foram feitas $TotalComprasHoje compras hoje!");
	break;
	
}
?>