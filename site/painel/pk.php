<?php
if(!isset($_COOKIE["Marcao_Web_Login"]) || !isset($_COOKIE["Marcao_Web_Senha"]))
{
	die("<script>carregar('paginas/concluido.php?id=2','Centro','GET');</script>");
}
	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
	
	$personagem = $_GET['personagem'];
	
	$VerificaPk = mssql_fetch_row(mssql_query("select pklevel from [$db_mssql].[dbo].[Character] where name='$personagem'"));
	if($VerificaPk[0] <= 3) die("<center><span id='Sucesso'>Voc&ecirc; n&atilde;o est&aacute; PK</span></center>");
	
	$VerificaStatus = mssql_fetch_row(mssql_query("select connectstat from [$db_mssql].[dbo].[memb_stat] where memb___id='$login'"));
	if($VerificaStatus[0] == 1) die("<center><span id='Falha'>Saia do jogo antes de Limpar o PK</span></center>");
	
	mssql_query("UPDATE [$db_mssql].[dbo].[Character] set pklevel=3, pktime=0 where name='$personagem'");
	die("<center><span id='Sucesso'>Voc&ecirc; foi perdoado!</span></center>");
?>