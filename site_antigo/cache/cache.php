<?php
	if($_GET['chave'] <> "marcao_system_cache74633") die("Chave_Errada");
	
	function EscreveCache($arq, $cont)
	{
		$arquivo = fopen($arq, "w");
		fwrite($arquivo, $cont); 
		fclose($arquivo);
	}
	
	$id = $_GET['id'];
	if($id == "" || $id < 0 || $id > 2) die();
	
	require_once("../config/masterconfig.php");
	require_once("../config/conexao_mssql.php");
	$agora = date("d/m/Y H:i:s");
	
	switch($id)
	{
		case 0:
			//require_once("atualiza_casados.php");
			require_once("atualiza_diario.php");
			require_once("atualiza_geral.php");
			//require_once("atualiza_semanal.php");
			//require_once("atualiza_mensal.php");
			require_once("atualiza_equipe.php");
			require_once("atualiza_estatisticas.php");
			//require_once("atualiza_totalon.php");
			die("Sucesso");
		break;
		
		case 1:
			require_once("atualiza_r_resets.php");
			die("Sucesso");
		break;
		
		case 2:
			require_once("atualiza_r_diario.php");
			require_once("atualiza_r_semanal.php");
			require_once("atualiza_r_mensal.php");
			require_once("atualiza_r_guild.php");
			require_once("atualiza_r_pk.php");
			require_once("atualiza_r_mrs.php");
			die("Sucesso");
		break;
	}
?>