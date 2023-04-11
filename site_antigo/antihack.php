<?php 
	$func 					= $_GET['f'];
	
	$crc_sv_maindll			= "-987990288"; 	// <- Main.dll CRC VB6
	$crc_sv_antihackexe		= "-1922075782"; 	// <- AntiHack.exe CRC VB6
	$crc_sv_mainexe			= "1862047378"; 	// <- Main.exe CRC VB6
	
	$crc_cliente			= $_GET['crc'];
	$chave 					= "AH_MarxD";	// <- CommandLine
	
	$ip 					= $_SERVER['REMOTE_ADDR'];
	$agora					= date("H:i:s d/m/Y");

	// - Nуo Mexer
	$crc_cliente 			= str_replace("-", "", $crc_cliente);
	$crc_sv_maindll 		= str_replace("-", "", $crc_sv_maindll);
	$crc_sv_antihackexe 	= str_replace("-", "", $crc_sv_antihackexe);
	$crc_sv_mainexe 		= str_replace("-", "", $crc_sv_mainexe);
	
	if($_GET['chave'] != $chave) die("#ChaveErrada#");
	
	require_once("config/masterconfig.php");
	require_once("config/sql.php");
	$cnc 	= mssql_connect($ip_mssql, $u_mssql, $p_mssql) or die("#ChaveErrada#");
	$db 	= mssql_select_db($db_mssql, $cnc) or die("#ChaveErrada#");
	
	switch($func)
	{
		case 0:
			// - ESTREIA
			$estreia_data 		= date("d/m/Y");
			$estreia_data_spt 	= explode("/", $estreia_data);
			if($estreia_data_spt[0] < 18) die("#LoginTravado#Estrщia do MuOver#MuOver serс aberto dia 18, сs 14Horas!");
			if($estreia_data_spt[0] == 18)
			{
				$estreia_hora 		= date("H:i:s");
				$estreia_hora_spt 	= explode(":", $estreia_hora);

				if($estreia_hora_spt[0] < 14) die("#LoginTravado#Estrщia do MuOver#MuOver serс aberto HOJE сs 14Horas!");
			}
			// -- ESTREIA
			
			$crc_cliente_spt	= explode("|", $crc_cliente);
			
			if($crc_cliente_spt[0] != $crc_sv_maindll)
			{
				$detectado 		= base64_encode("Main.dll Modificado");
				mssql_query("INSERT INTO [$db_mssql].[dbo].[AntiHack_Log] (IP, Log, Data) VALUES('$ip', '$detectado', '$agora')");
				die("#LoginTravado#Modificaчуo no Cliente#Abra o Launcher e espere atualizar. Se o problema persistir, contate a nossa equipe pelo forum. (Erro 100). " . $crc_cliente_spt[0]);
			}
			
			if($crc_cliente_spt[1] != $crc_sv_antihackexe)
			{
				$detectado 		= base64_encode("AntiHack.exe Modificado");
				mssql_query("INSERT INTO [$db_mssql].[dbo].[AntiHack_Log] (IP, Log, Data) VALUES('$ip', '$detectado', '$agora')");
				die("#LoginTravado#Modificaчуo no Cliente#Abra o Launcher e espere atualizar. Se o problema persistir, contate a nossa equipe pelo forum. (Erro 101). " . $crc_cliente_spt[1]);
			}
			
			if($crc_cliente_spt[2] != $crc_sv_mainexe)
			{
				$detectado 		= base64_encode("Main.exe Modificado");
				mssql_query("INSERT INTO [$db_mssql].[dbo].[AntiHack_Log] (IP, Log, Data) VALUES('$ip', '$detectado', '$agora')");
				die("#LoginTravado#Modificaчуo no Cliente#Abra o Launcher e espere atualizar. Se o problema persistir, contate a nossa equipe pelo forum. (Erro 102). " . $crc_cliente_spt[2]);
			}
			
			$row = mssql_fetch_row(mssql_query("SELECT manutencao, titulo, msg FROM [$db_mssql].[dbo].[AntiHack_Status] WHERE id=0"));
			if($row[0] == 1) die("#LoginTravado#$row[1]#$row[2]");
			
			if($ip == $server_ip) $server_ip = "192.168.0.2";
			$Liberar = "#LoginLiberado#Main.exe#" . $server_ip . "#55901#";
			die($Liberar);
		break;
		case 1:
			$detectado 		= base64_encode($_GET['detectado']);
			mssql_query("INSERT INTO [$db_mssql].[dbo].[AntiHack_Log] (IP, Log, Data) VALUES('$ip', '$detectado', '$agora')");
			die("#Sucesso#");
		break;
	}
	
	die("#LoginTravado#Func Errada#");
?>