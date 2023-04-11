<?php 

	$verifica_conta	= mssql_num_rows(mssql_query("SELECT memb___id FROM [$db_mssql].[dbo].[memb_info] WHERE memb___id='$login' AND memb__pwd='$senha'"));
	
	if($verifica_conta == 0) die("Erro #100");
		
	$conta			= mssql_fetch_row(mssql_query("SELECT vip, creditos, golds, cashs, mail_addr, bloc_code, memb_name FROM [$db_mssql].[dbo].[memb_info] WHERE memb___id='$login'"));	
	//$conta_status	= mssql_fetch_row(mssql_query("SELECT DisConnectTM, ConnectStat, IP, OnlineHours FROM [$db_mssql].[dbo].[Memb_Stat] WHERE memb___id='$login'"));
	$total_baus		= mssql_num_rows(mssql_query("SELECT accountid FROM [$db_mssql].[dbo].[warehouse] WHERE AccountID2='$login'"));
	
	//Ve se é adm
	//$CtlCode		= 0;
	//$sql_query		= mssql_query("SELECT Tipo FROM [$db_mssql].[dbo].[Character] WHERE AccountID='$login'");
	//while($gm_check = mssql_fetch_row($sql_query))
	//{
	//	if($gm_check[0] > $CtlCode) $CtlCode = $gm_check[0];
	//}

	$vip			= $conta[0];
	$golds			= $conta[2];
	$bonus			= $conta[3];
	$email			= $conta[4];
	$banido			= $conta[5];
	$nome_conta		= $conta[6];
	
	$no_jogo 		= "Offline";
	$ultimo_ip		= $conta_status[2];
	$ultimaconexao	= $conta_status[0];
	$tempoonline	= $conta_status[3];
	
	$tipo			= "Free";
	$resetolvl		= $levelR_Free;
	$pontosrr		= $PontosReset_Free;
	$comoresetar 	= "Como Resetar: Clicar no NPC de reset em Lorencia";
		
	if($banido == 1) die("Você está banido");
	if($conta_status[1] == 1) $no_jogo = "Online";
	
	if($conta[0] == 1)
	{
		$tipo		= "Vip";
		$resetolvl	= $levelR_Vip;
		$pontosrr	= $PontosReset_Vip;
		$comoresetar= "Como Resetar: Digite /reset";
	}
		
	if($conta[1] == 0) $sintaxe = "";
	if($conta[1] == 1) $sintaxe = "dia";
	if($conta[1] > 1) $sintaxe = "dias";
?>