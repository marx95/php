<?php
	if($postRef == 1 && $postJoh == 1 && $Season > 1) die("<b>Ocorreu um erro!</b><br /><br />N&atilde;o &eacute; poss&iacute;vel ter Refine e JoH ao mesmo tempo!");
	
	if($x < 0 || $x > 7)  die("<script>carregar('status/falta_cord.php','Resultado_V','GET')</script>");
	if($y < 0 || $y > 14) die("<script>carregar('status/falta_cord.php','Resultado_V','GET')</script>");
	if(($x + $Tamanho_Item_X) > 8) die("<script>carregar('status/falta_cord.php','Resultado_V','GET')</script>");
	if(($y + $Tamanho_Item_Y) > 15) die("<script>carregar('status/falta_cord.php','Resultado_V','GET')</script>");
	
	if($postExe[1] == 1) $Total_Exe_Marcada += 1;
	if($postExe[2] == 1) $Total_Exe_Marcada += 1;
	if($postExe[3] == 1) $Total_Exe_Marcada += 1;
	if($postExe[4] == 1) $Total_Exe_Marcada += 1;
	if($postExe[5] == 1) $Total_Exe_Marcada += 1;
	if($postExe[6] == 1) $Total_Exe_Marcada += 1;
	
	if($Tipo == 0 && $Total_Exe_Marcada > $mexe) 	die("<b>Ocorreu um erro!</b><br /><br />Voc&ccedil; s&oacute; pode marcar $mexe op&ccedil;&otilde;e(s) excelentes!");
	if($Tipo == 1 && $Total_Exe_Marcada > $mexe_g) 	die("<b>Ocorreu um erro!</b><br /><br />Voc&ccedil; s&oacute; pode marcar $mexe_g op&ccedil;&otilde;e(s) excelentes!");
?>