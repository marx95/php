<?php
	if($Tipo == 0) 			$Nome_Compra = $Nome_Compra . " [" . $StringBonus . "]";
	if($Tipo == 1) 			$Nome_Compra = $Nome_Compra . " [" . $StringGolds . "]";
	$Nome_Compra 		  = $Nome_Compra . " " . $Nome_Item;
	
	if($postExe[1] == 1) 	$Nome_Exe = "Excelente";
	if($postExe[2] == 1) 	$Nome_Exe = "Excelente";
	if($postExe[3] == 1) 	$Nome_Exe = "Excelente";
	if($postExe[4] == 1) 	$Nome_Exe = "Excelente";
	if($postExe[5] == 1) 	$Nome_Exe = "Excelente";
	if($postExe[6] == 1) 	$Nome_Exe = "Excelente";
	if(strlen($Nome_Exe) > 0) $Nome_Compra = $Nome_Compra . " " . $Nome_Exe;
	
	if($postLevel > 0) 		$Nome_Compra = $Nome_Compra . "+" . $postLevel;
	if($postOpt > 0) 		$Nome_Compra = $Nome_Compra . "+" . $postOpt;
	if($postSkill == 1) 	$Nome_Compra = $Nome_Compra . "+Skill";
	if($postLuck == 1) 		$Nome_Compra = $Nome_Compra . "+Luck";
	if($postAncient == 1) 	$Nome_Compra = $Nome_Compra . "+Ancient";
	if($postJoh == 1) 		$Nome_Compra = $Nome_Compra . "+JoH";
	if(postRef == 1) 		$Nome_Compra = $Nome_Compra . "+Ref";
	
	$Nome_Compra = str_replace("    ", " ", $Nome_Compra);
	$Nome_Compra = str_replace("   ", " ", $Nome_Compra);
	$Nome_Compra = str_replace("   ", " ", $Nome_Compra);
	$Nome_Compra = str_replace("  ", " ", $Nome_Compra);
?>