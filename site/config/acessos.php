<?php
	require_once("masterconfig.php");
	
	$meuipv			= $_SERVER['REMOTE_ADDR'];
	$cnc 			= @mssql_connect($ip_mssql, $u_mssql, $p_mssql) or die("Falha ao conectar no servidor de Banco de dados!");
	$db 			= @mssql_select_db($db_mssql, $cnc) or die("Falha ao conectar no Banco de dados primário!");
	
	$t_ip			= mssql_num_rows(mssql_query("SELECT id FROM [$db_mssql].[dbo].[Acessos_Site] WHERE ip='$meuipv'"));
	$total_acessos	= mssql_num_rows(mssql_query("SELECT id FROM [$db_mssql].[dbo].[Acessos_Site]"));
	
	if($meuipv == $server_ip) die("$total_acessos Acessos."); // - Nao contar IP do adm
	
	if($t_ip == 0)
	{
		mssql_query("INSERT INTO [$db_mssql].[dbo].[Acessos_Site](ip, hoje, semana, mes, total) VALUES('$meuipv', '0','0','0','0')");
	}

	mssql_query("UPDATE [$db_mssql].[dbo].[Acessos_Site] SET hoje=hoje+1, semana=semana+1, mes=mes+1, total=total+1 WHERE ip='$meuipv'");
	die("$total_acessos Acessos.");
?>