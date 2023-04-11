<?php
	require_once("../config/sql.php");
	$cnc = @mssql_connect($ip_mssql, $u_mssql, $p_mssql) or die("Falha ao conectar no servidor de Banco de dados!");
	$db = @mssql_select_db($db_mssql, $cnc) or die("Falha ao conectar no Banco de dados primário!");
?>