<?php
require_once("masterconfig.php");

switch($_GET['id'])
{
	case 0: 
		require_once("conexao_mssql.php");
		$totalonline	= mssql_num_rows(mssql_query("SELECT connectstat FROM [$db_mssql].[dbo].[memb_stat] WHERE connectstat = 1"));
		$record			= mssql_fetch_row(mssql_query("SELECT total FROM [$db_mssql].[dbo].[Record_Site] WHERE id=0"));
		if($totalonline > $record[0])
		{
			$hoje = date("d/m/Y");
			mssql_query("UPDATE [$db_mssql].[dbo].[Record_Site] SET total=$totalonline, data='$hoje' WHERE id=0");
		}
		die("$totalonline");	
	break;
}


?>
