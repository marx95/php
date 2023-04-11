<?php
	if(empty($db_mssql)) die();
	
	$totalonline	= mssql_num_rows(mssql_query("SELECT memb___id FROM [$db_mssql].[dbo].[memb_stat] WHERE connectstat = 1"));
	$record			= mssql_fetch_row(mssql_query("SELECT total FROM [$db_mssql].[dbo].[Record_Site] WHERE id=0"));
	if($totalonline > $record[0])
	{
		$hoje = date("d/m/Y");
		mssql_query("UPDATE [$db_mssql].[dbo].[Record_Site] SET total=$totalonline, data='$hoje' WHERE id=0");
	}
		
	$pagina = "$totalonline<!-- Hora do Cache: $agora -->";
	EscreveCache("totalon.html", $pagina);
?>