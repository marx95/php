<?php
	$vIndex_Item		= $item_info[0];
	if(hexdec($item_info[7]) < 128)  $vGrupo_Item = "00";
	if(hexdec($item_info[7]) >= 128) $vGrupo_Item = "80";
	
	$listar_item = mssql_fetch_row(mssql_query("SELECT nome, tamanho_x, tamanho_y, vimgc FROM [$db_mssql].[dbo].[Webshop] WHERE vimga='$vIndex_Item' and vimgb='$vGrupo_Item' AND season=$Season"));
	
	$item_nome		= $listar_item[0];
	$cord_x 		= $listar_item[1];
	$cord_y 		= $listar_item[2];
	
	$img_a 			= $vIndex_Item;
	$img_b 			= $vGrupo_Item;
	$img_c 			= $listar_item[3];
	$img_d			= "";
	if($img_a == "AE" && $img_b == "80" && hexdec($item_info[1]) > 0) $img_d = "01";	// Crest of Monarch Fix
	
	$Item_Imagem 	= "00" . $img_a . $img_b . $img_c . $img_d . ".gif";
?>