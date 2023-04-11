<?php
	$vIndex_Item		= hexdec($item_info[0]);
	$vGrupo_Item		= str_replace("0", "", $item_info[9]);
	$vGrupo_Item		= hexdec($vGrupo_Item);

	$listar_item = mssql_fetch_row(mssql_query("SELECT nome, tamanho_x, tamanho_y, vimga, vimgb, vimgc FROM [$db_mssql].[dbo].[Webshop] WHERE vIndex = '$vIndex_Item' AND vGrupo = '$vGrupo_Item' AND season=$Season"));	
	
	$item_nome			= $listar_item[0];
	$cord_x 			= $listar_item[1];
	$cord_y 			= $listar_item[2];
		
	$img_a 				= $listar_item[3];
	$img_b 				= $listar_item[4];
	$img_c 				= $listar_item[5];
	
	$Item_Imagem 	= "00" . $img_a . $img_b . $img_c . ".gif";
?>