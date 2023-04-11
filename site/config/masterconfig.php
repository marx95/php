<?php
	error_reporting(0);
	header("Content-Type: text/html; charset=utf-8");
	ini_set("default_charset", "utf-8");
	date_default_timezone_set("America/Sao_Paulo");
	
	require_once("ip.php"); // - Pegar o IP
	
	$email_adm				= "marxxfds@gmail.com";	// - Receber Notificações VIA email
	
	//mssql config
	$ip_mssql				= $server_ip;
	$u_mssql				= "sa";
	$p_mssql				= "094hjds38s52jkd2";
	$db_mssql				= "MuOnline";

	//mysql config
	$ip_mysql 				= "dbmy0043.whservidor.com";
	$u_mysql 				= "pgcontrol";
	$p_mysql 				= "667d2d7";
	$db_mysql				= "pgcontrol"; 
	$noticias_na_pagina		= 5;	// - Numero de notícias que irá listar

	//Config
	$site_link				= "http://muover.net/site/";
	$site_version			= "2.8";
	$nome					= "MuOver";
	$titulo					= "$nome Medium! - Promovendo 24Horas de divers&atilde;o! - [Cadastre-se e ganhe: 8 Dias VIP, 3000 Pontos, Set Semi-Full + Arma Full!]";
	$meta_desc				= "$nome - Ganhe: 8 Dias VIP, 3000 Pontos, Set Semi-Full + Arma Full!!";
	$meta_keywords			= "mu, mujb, muonline, rpg, webzen, global, away, mudd, mutotal, muaway, global, rpg, 3d, leader, google, muover";
	$rodape					= "Website $nome $site_version - &copy; 2014 - Todos os direitos reservados.";
	$vi_curr_info			= 0; //1 para VI_CURR_INFO ATIVADA
	$season					= 1;
	$mostrar_total_online	= 0;
	
	//Configura&ccedil;ões relacionadas ao webshop
	$Ativar_Cash			= 1;
	$Ativar_Gold			= 1;
	$moeda_real				= "bonus";
	$moeda_virtual			= "golds";
	$query_real				= "cashs"; // - Mssql
	$query_virtual			= "golds"; // - mssql

	//Oque ganha ao registrar?
	$bonusinicial			= 0;
	$goldInicial			= 0;
	$vip					= 1;
	$dias					= 8;
	$limite_registros_p_dia = 5;
	$vantagens				= "8 Dias VIP, 3000 Pontos, Set Semi-Full + Arma Full!";
	$ativar_via_email		= 0;

	//LINKAGEM Secundaria
	$masterlink				= "http://muover.net";
	$hostlink				= "http://muover.net";
	$webshop				= "http://muover.net/shop/";

	//paginas downloads
	$cliente_1				= "https://mega.co.nz/#!rV8FFbrK!RGxZKjRoEICh4x7k5V0fpmwLEZDWYPkGQ_du8MQ-REY";
	$cliente_2				= "http://pgcontrol.com.br/muover/MuOver_SemSom_30012014.exe";
	$cliente_3				= "";
	$peso_cliente			= "65 MB";

	$cliente_full_1			= "";
	$cliente_full_2			= "";
	$cliente_full_3			= "";
	$peso_cliente_full		= "216 MB";

	$patch_1				= "https://mega.co.nz/#!CElV0ZxC!pRJUl0f_a2SGH_US75YXxNBXqUut733Nb1xEtrIHt_Y";
	$patch_2				= "http://pgcontrol.com.br/muover/MuOver_Patch_30012014.exe";
	$patch_3				= "";
	$peso_patch				= "1.6 MB";

	$sonsmusicas_1			= ""; //""http://munovus.net/arquivos/SonsMusicas.rar";
	$sonsmusicas_2			= ""; //"http://pgcontrol.com.br/muonline/SonsMusicas.rar";
	$sonsmusicas_3			= "";
	$peso_sonsmusicas		= "121 MB";

	//Especifica&ccedil;ões do server
	$version				= "99z + Itens";
	$experience				= "10.000x";
	$bb						= "Ligado";
	$csday					= "--"; //S&aacute;bados
	$maxlvl					= 400;
	$glevel					= 200;
	$ptsmgdl				= 7;
	$ptsoutros				= 5;

	//Reset
	$comoR					= "Clique no NPC de Reset (Lorencia 140 140)";
	$tipoR					= "Acumulativo";
	$levelR_Free			= 400;
	$levelR_Vip				= 370;
	$PontosReset_Free		= 450;
	$PontosReset_Vip		= 500;

	$pontosinicial_Free 	= 50;
	$pontosinicial_Vip 		= 100;


	//drops
	$drop					= 80;
	$dropEXE				= 50;
	$drop_skill				= 50;
	$drop_luck				= 50;

	//RATES
	$rate_equip 			= 100;
	$rate_10				= 100;
	$rate_11				= 100;
	$rate_12				= 100;
	$rate_13				= 100;
	$rate_geral				= 100;

	//String Comandos
	$comando[1]				= "/post MSG <b>Envia mensagem para todo o servidor</b>";
	$comando[2]				= "/for ou /f <b>Adiciona pontos em For&ccedil;a</b>";
	$comando[3]				= "/agi ou /a <b>Adiciona pontos em Agilidade</b>";
	$comando[4]				= "/vit ou /v <b>Adiciona pontos em Vitalidade</b>";
	$comando[5]				= "/ene ou /e <b>Adiciona pontos em Energia</b>";
	$comando[6]				= "/com ou /c <b>Adiciona pontos em Comando</b>";
	$comando[7]				= "/limparpk <b>Limpa o pk</b>";
	$comando[8]				= "/reset <b>Reseta o personagem - Somente VIP</b>";
	$comando[9]				= "/bau <n> <b>Muda de ba&uacute; (1 at&uacute; 5)</b>";
	$comando[10]			= "/info <b>Infos do desenvolvedor</b>";
	$comando[11]			= "/irbau <b>Teleporta ao ba&uacute;</b>";
	$comando[12]			= "/bar <b>Teleporta ao bar</b>";
	$comando[13]			= "/masterreset <b>D&aacute; o MasterReset</b>";

	//CONFIGURAÇAO DOS VIPS
	$valor_vip_7Dias		= 700;
	$valor_vip_30Dias		= 1500;

	// - Configuração do Painel
	$CtlCode_Jogador			= "0";
	$CtlCode_Divulgador			= "26";
	$CtlCode_GameMaster			= "28";
	$CtlCode_SubAdminsitrador	= "30";
	$CtlCode_Adminsitrador		= "32";
	$CtlCode_Adminsitrador_Pl	= "34";

	// - Limitação de pontos
	$Limite_de_Pontos			= 32767;

	function EnviarEMail($Para, $Titulo, $Corpo)
	{
	//SMTP
		$smtp_server			= "muover.net";		
		$smtp_email				= "naoresponda@muover.net";
		$smtp_senha				= "gk6nA71*";
		$smtp_porta				= "25";
		$smtp_nome				= $nome;

		require_once("php_mail_smtp/class.phpmailer.php");
		$mail = new PHPMailer();
		$mail->SetLanguage("br", "../config/");
		$mail->IsSMTP();

		$mail->From 		= "$smtp_email";						//email do remetente
		$mail->FromName 	= "$smtp_nome";							//Nome de formatado do remetente
		
		$mail->Host 		= "$smtp_server";						//SMTP Sv
		$mail->Port			= "$smtp_porta";
		$mail->Mailer 		= "smtp";								//Usando protocolo SMTP
		
		$mail->AddAddress("$Para");									// E-mail de destino
		$mail->Subject 		= "$Titulo";
		$mail->Body 		= "$Corpo";

		$mail->SMTPAuth 	= true;
		$mail->Username 	= "$smtp_email"; 
		$mail->Password 	= "$smtp_senha";
		$mail->Send();
	}
?>