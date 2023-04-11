<?php
	error_reporting(0);
	header("Content-Type: text/html; charset=ISO-8859-1");
	date_default_timezone_set("America/Sao_Paulo");
	
	require_once("ip.php"); // - Pegar o IP
	
	//mssql
	$ip_mssql				= $server_ip;
	$u_mssql				= "sa";
	$p_mssql				= "094hjds38s52jkd2";
	$db_mssql				= "MuOnline";

	//Config Nomes e Frases do site
	$nome 					= "MuOver";
	$titulo					= "Webshop 2.6 $nome";
	$rodape 				= "Webshop 2.6 $nome - Sistema Autom&aacute;tico";
	$bonificar				= "http://muover.net/site/depositos/dados.html";
	$erro_die				= "<div id=\"Falha\">Ocorreu um erro e você não pode prosseguir</div>";

	//Coluna do bonus - Usado tb nas strings
	$Ativar_Gold			= 1;
	$Ativar_Cash			= 1;
	$Mostrar_Valor_Real		= 0;		// 1 = Mostrará o valor do cash em Reais R$

	$ProcBonus 				= "cashs";	//Para consulta mssql
	$StringBonus			= "Cashs";  //Para exibir no HTML

	$ProcGolds 				= "Golds";	//Para consulta mssql
	$StringGolds			= "Golds";  //Para exibir no HTML

	$DbVersion 				= 2;		// 97D, 99Z = 1 		1.0 = 2			1.04J = 3
	$Season					= 1;		// De acordo com o MuServer & Servidor
	$Comprar_Itens_Logado	= 1;		// 0 = Nao pode comprar itens logado no jogo
	$resets_minimos			= 0;
	
	// - Limitaçoes
	$mlevel 				= 13;	//MINIMO 0 MAX 13
	$mlevel_g 				= 9;	//golds
	$refine_lib				= 0;	// 1 = liberado para golds
	$mopt 					= 28;
	$mopt_g					= 16; 	// golds
	$mexe 					= 6;	// MINIMO 0 - MAX 6
	$mexe_g 				= 2;	// golds
	
	// - Preços
	
	$Ativar_Preco_Fixo		= 1;		// 1 = para pegar o valor da coluna "valor_fixo" na db
	$Mostrar_Valor_P_Fixo	= 1;		// 1 = Mostrará o valor ao invés da string Fixo na pagina de Itens
	$Soma_Preco_Fixo_Gold	= 0;		// - Soma ao valor total se o $Ativar_Preco_Fixo estivar ativado
	$Soma_Preco_Fixo_Cash	= 20;		// - Soma ao valor total se o $Ativar_Preco_Fixo estivar ativado
	
	$plevel 				= 0;  	//orig 5
	$plevel_g 				= 0;  	//orig 20
	
	$popt 					= 0; 	//orig 6
	$popt_g 				= 0; 	//orig 20
	
	$pexe 					= 0;	//orig 20
	$pexe_g 				= 0;	//orig 20

	$pluck					= 0;	//Orig 20
	$pluck_g				= 0;	//Orig 40

	$pskill					= 0;	//Orig 50
	$pskill_g				= 0;	//Orig 40

	$panc					= 0;	//Orig 100
	$panc_g					= 0;	//Orig 100

	$prefine				= 0;	//Orig 25
	$prefine_g				= 0;	//Orig 25

	$pjoh					= 0;	//Orig 90
	$pjoh_g					= 0;	//Orig 90
?>