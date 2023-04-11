<?php
	require_once("../config/masterconfig.php");
	require_once("../painel/accinfo.php");
	
	if($_POST['id'] == "") die("<script>carregar(\"paginas/principal.php\",\"Centro\",\"GET\")</script>");
	$id = $_POST['id'];
	
	if($Comprar_Itens_Logado == 0)
	{
		$logado_db	= mssql_fetch_row(mssql_query("SELECT ConnectStat FROM [$db_mssql].[dbo].[MEMB_STAT] WHERE memb___id = '$login'"));
		if($logado_db[0] == 1 && $Comprar_Itens_Logado == 0) die("<script>carregar('painel/logado.php','Resultado_V','GET')</script>");
	}
	$bau_aberto	= mssql_fetch_row(mssql_query("SELECT Bau_Aberto FROM [$db_mssql].[dbo].[Memb_Info] WHERE memb___id = '$login'"));
	if($bau_aberto[0] == 1) die("<script>carregar('status/bau_aberto.php','Resultado_V','GET')</script>");


	$col_valor = "valor";
	if($Ativar_Preco_Fixo == 1) $col_valor = "valor_fixo";
	$listar_item	= mssql_fetch_row(mssql_query("SELECT nome, vIndex, vunico, vdur, vGrupo, $col_valor, tamanho_x, tamanho_y, vimga, vimgb, vimgc, season FROM [$db_mssql].[dbo].[Webshop] WHERE id='$id'"));
	if(strlen($listar_item[0]) == 0) die("<script>carregar('paginas/principal.php','Centro','GET')</script>");
	
	$Serial_Mult = 6;
	if($Season == 1) $Serial_Mult = 6;
	if($Season == 2) $Serial_Mult = 6;
	if($Season == 3) $Serial_Mult = 8;
	
	$Serial			= str_pad("", $Serial_Mult, "1", STR_PAD_LEFT);
	$cord 			= split("x", $_POST['cord']);
	$x 				= $cord[0]-1;
	$y 				= $cord[1]-1;
	$Nome_Item 		= $listar_item[0];
	$Valor_Item	 	= $listar_item[5];
	$Tamanho_Item_X = $listar_item[6];
	$Tamanho_Item_Y = $listar_item[7];
	$Item_Season	= $listar_item[11];
	$Tipo 			= $_POST['tipo'];
	$DataCompra 	= date("d/m/Y");
	
	$vGrupo			= str_pad(dechex($listar_item[4]), 2, "0", STR_PAD_RIGHT);
	$vIndex 		= str_pad(dechex($listar_item[1]), 2, "0", STR_PAD_LEFT);
	$vDur 			= $listar_item[3];
	$vUnico 		= 128 * $listar_item[2];
	
	$postLevel		= $_POST['level'];
	$postOpt 		= $_POST['option'];
	$postLuck		= $_POST['luck'];
	$postSkill		= $_POST['skill'];
	$postAncient	= $_POST['ancient'];
	$postJoh		= $_POST['JOH'];
	$postRef		= $_POST['refine'];
	
	$postExe[1]		= $_POST['epcex1'];
	$postExe[2]		= $_POST['epcex2'];
	$postExe[3]		= $_POST['epcex3'];
	$postExe[4]		= $_POST['epcex4'];
	$postExe[5]		= $_POST['epcex5'];
	$postExe[6]		= $_POST['epcex6'];
	
	if($Tipo == 0 && $Ativar_Cash == 0) die("<center>Compra $StringBonus desativada!</center>");
	if($Tipo == 1 && $Ativar_Gold == 0) die("<center>Compra $StringGolds desativada!</center>");
	
	require_once("../config/verificar_compra.php");
	if($Season == 1) require_once("../config/codigo_item_s1.php");
	if($Season == 3) require_once("../config/codigo_item_s3.php");
	require_once("../config/g_preco_item.php");
	require_once("../config/g_nome_compra.php");
	require_once("../config/inserir_item_bau.php");

	if($Tipo == 0) $ProcQuery = $ProcBonus;
	if($Tipo == 1) $ProcQuery = $ProcGolds;
	
	mssql_query("UPDATE [$db_mssql].[dbo].[memb_info] SET $ProcQuery = $ProcQuery - $Valor_Total WHERE memb___id='$login'");
	mssql_query("UPDATE [$db_mssql].[dbo].[Webshop] SET comprado = comprado + 1 WHERE id='$id'");
	mssql_query("INSERT INTO [$db_mssql].[dbo].[Webshop_Compras](login, valor, item, data) VALUES('$login','$Valor_Total','$Nome_Compra','$DataCompra')");
	
	die("<script type=\"text/javascript\">carregar('painel/item_comprado.php?tipo=$Tipo','Centro','GET');</script>");
	//die("<script type=\"text/javascript\">carregar('painel/item_comprado.php?tipo=$Tipo&c=$Codigo_Item','Resultado_V','GET');</script>");
	?>