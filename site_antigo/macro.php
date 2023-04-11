<?php
	require_once("config/masterconfig.php");
	require_once("config/sql.php");
	
	$cnc 	= mssql_connect($ip_mssql, $u_mssql, $p_mssql) or die("#ChaveErrada#");
	$db 	= mssql_select_db($db_mssql, $cnc) or die("#ChaveErrada#");
	
	$login 	= $_GET['login'];
	$count 	= $_GET['count'];
	$ip 	= $_SERVER['REMOTE_ADDR'];
	
	$existe = mssql_num_rows(mssql_query("SELECT total FROM [$db_mssql].[dbo].[Macro_DV] WHERE login='$login'"));
	if($existe == 0)
	{
		mssql_query("INSERT INTO [$db_mssql].[dbo].[Macro_DV] (login, total, ip) VALUES('$login', '$count', '$ip')");
		die("#SUCESSO#");
	}
		
	mssql_query("UPDATE [MuOnline].[dbo].[Macro_DV] SET total=total+$count WHERE login='$login'");
	die("#SUCESSO#");
?>