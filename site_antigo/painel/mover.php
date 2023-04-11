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

	mssql_query("UPDATE [$db_mssql].[dbo].[Character] set MapNumber=0, MapPosX=123, MapPosY=123 WHERE name='$personagem'");
	die("<center><span id='Sucesso'>$personagem movido para Lorencia!</span></center>");
?>