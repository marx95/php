<?php
$contas				= mssql_num_rows(mssql_query("SELECT memb___id FROM [$db_mssql].[dbo].[memb_info] WHERE email_confirmado='1'"));
$chars				= mssql_num_rows(mssql_query("SELECT name FROM [$db_mssql].[dbo].[character]"));
$guildas			= mssql_num_rows(mssql_query("SELECT g_name FROM [$db_mssql].[dbo].[guild]"));

$totalonline		= mssql_num_rows(mssql_query("SELECT memb___id FROM [$db_mssql].[dbo].[memb_stat] WHERE connectstat = 1"));
$record				= mssql_fetch_row(mssql_query("SELECT total, data FROM [$db_mssql].[dbo].[Record_Site] WHERE id=0"));
$recordOnline		= $record[0];
$recordData			= $record[1];

if($totalonline > $record[0])
{
	$hoje = date("d/m/Y");
	mssql_query("UPDATE [$db_mssql].[dbo].[Record_Site] SET total=$totalonline, data='$hoje' WHERE id=0");
	$record			= $totalonline;
	$recordData		= "$hoje";
}

//$guildmaster	= mssql_fetch_row(mssql_query("SELECT OWNER_GUILD FROM [$db_mssql].[dbo].[MuCastle_Data]"));
//$ClastleMaster = $guildmaster[0];

?>