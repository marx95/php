<?php
	if($Tipo == 0)
	{
		$Meu_Dinheiro 	= $cashs;
			
		$preco_level 	= $plevel;
		$preco_opt		= $popt;
		$preco_luck		= $pluck;
		$preco_skill	= $pskill;
		$preco_ancient	= $panc;
		$preco_exe		= $pexe;
		$preco_joh		= $pjoh;
		$preco_ref		= $prefine;
		$Soma_P_Fixo	= $Soma_Preco_Fixo_Cash;
	}else
	{
		$Meu_Dinheiro	= $golds;
			
		$preco_level 	= $plevel_g;
		$preco_opt		= $popt_g;
		$preco_luck		= $pluck_g;
		$preco_skill	= $pskill_g;
		$preco_ancient	= $panc_g;
		$preco_exe		= $pexe_g;
		$preco_joh		= $pjoh_g;
		$preco_ref		= $prefine_g;
		$Soma_P_Fixo	= $Soma_Preco_Fixo_Gold;
	}
	
	$Valor_Total 	 = 0;
	$Valor_Total 	+= ($postLevel * 	$preco_level);
	$Valor_Total 	+= (($postOpt/4) * 	$preco_opt);
	$Valor_Total 	+= ($postLuck * 	$preco_luck);
	$Valor_Total 	+= ($postSkill * 	$preco_skill);
	$Valor_Total 	+= ($postAncient * 	$preco_ancient);
	$Valor_Total 	+= ($postExe[1] * $preco_exe);
	$Valor_Total 	+= ($postExe[2] * $preco_exe);
	$Valor_Total 	+= ($postExe[3] * $preco_exe);
	$Valor_Total 	+= ($postExe[4] * $preco_exe);
	$Valor_Total 	+= ($postExe[5] * $preco_exe);
	$Valor_Total 	+= ($postExe[6] * $preco_exe);
	
	if($Season > 1 && $postLevel >= 13 && $postJoh == 1) $Valor_Total += $preco_joh;
	if($Season > 1 && $postRef == 1) $Valor_Total 	+= $preco_ref;
	
	//if($Tipo == 0) $Valor_Total = ($Valor_Total/2); // - Compras com Cash tem valor dividido por 2
	$Valor_Total 	+= $Valor_Item;
	if($Ativar_Preco_Fixo == 1) $Valor_Total += $Soma_P_Fixo;
	
	if($Meu_Dinheiro < $Valor_Total)
	{
		$Falta = $Valor_Total - $Meu_Dinheiro;
		 die("<script>carregar(\"status/comprar_bonus.php?tipo=$Tipo&total=$Valor_Total&falta=$Falta&item=$Nome_Item\",\"Resultado_V\",\"GET\")</script>");
	}
?>