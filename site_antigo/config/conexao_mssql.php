<?php
	require_once("../config/sql.php");
	$cnc 	= @mssql_connect($ip_mssql, $u_mssql, $p_mssql) or die("#MSSQL_ERROR#CNN");
	$db 	= @mssql_select_db($db_mssql, $cnc) or die("#MSSQL_ERROR#SEL");
?>