<?php
	if($Season != 3) die();

	switch($postLevel)
	{
		case 0:  $Level_Marcado = 0; break;
		case 1:  $Level_Marcado = 1; break;
		case 2:  $Level_Marcado = 2; break;
		case 3:  $Level_Marcado = 3; break;
		case 4:  $Level_Marcado = 4; break;
		case 5:  $Level_Marcado = 6; break;
		case 6:  $Level_Marcado = 8; break;
		case 7:  $Level_Marcado = 10; break;
		case 8:  $Level_Marcado = 12; break;
		case 9:  $Level_Marcado = 14; break;
		case 10: $Level_Marcado = 17; break;
		case 11: $Level_Marcado = 20; break;
		case 12: $Level_Marcado = 26; break;
		case 13: $Level_Marcado = 32; break;
		case 14: $Level_Marcado = 38; break;
		case 15: $Level_Marcado = 44; break;
	}
		
	switch($postOpt)
	{
		case 0:  $Option += 0; break;
		case 4:  $Option += 1; break;
		case 8:  $Option += 2; break;
		case 12: $Option += 3; break;
		case 16: $Option += 0; $Unico += 64; break;
		case 20: $Option += 1; $Unico += 64; break;
		case 24: $Option += 2; $Unico += 64; break;
		case 28: $Option += 3; $Unico += 64; break;
	}
	
	switch($postLuck)
	{
		case 0: $Luck  = 0; break;
		case 1: $Luck += 4; break;
	}
	
	switch($postSkill)
	{
		case 0: $Skill  = 0;   break;
		case 1: $Skill += 128; break;
	}
	
	switch($postAncient)
	{
		case 0: $Ancient = 0; break;
		case 1: $Ancient = 5; break;
		case 2: $Ancient = 9; break;
	}
	
	if($postExe[1] == 1) { $Exe_Marcado = 15; $Exe_Total += 1; }
	if($postExe[2] == 1) { $Exe_Marcado = 15; $Exe_Total += 2; }
	if($postExe[3] == 1) { $Exe_Marcado = 15; $Exe_Total += 4; }
	if($postExe[4] == 1) { $Exe_Marcado = 15; $Exe_Total += 8; }
	if($postExe[5] == 1) { $Exe_Marcado = 15; $Exe_Total += 16; }
	if($postExe[5] == 1) { $Exe_Marcado = 15; $Exe_Total += 32; }
		
	if($postAncient > 0) 		$Ancient_Marcado = 20;
	$Level_Option_Luck_Skill 	= str_pad(dechex(($postLevel * 8) + ($Option) + ($Luck) + ($Skill)), 2, "0", STR_PAD_LEFT);
		
	$Dur_Level_Exe_Anc_Cod		= ($vDur) + ($Level_Marcado) + ($Exe_Marcado) + ($Ancient_Marcado);
	if($Dur_Level_Exe_Anc_Cod > 255) $Dur_Level_Exe_Anc_Cod = 255;
	$Dur_Level_Exe_Ancient 		= str_pad(dechex($Dur_Level_Exe_Anc_Cod), 2, "0", STR_PAD_LEFT);
		
	$Exe_Option					= str_pad(dechex(($Exe_Total) + ($Unico)), 2, "0", STR_PAD_LEFT);
	$Ancient					= str_pad(dechex($Ancient), 2, "0", STR_PAD_LEFT);
		
	if($postJoh == 0) 	$Harmony = "00";
	if($postJoh == 1) 	$Harmony = "1D";
	if($postJoh == 2) 	$Harmony = "2D";
	if($postJoh == 3) 	$Harmony = "3D";
	if($postJoh == 4) 	$Harmony = "4D";
	if($postJoh == 5) 	$Harmony = "5D";
	if($postJoh == 6) 	$Harmony = "6D";
	if($postJoh == 7) 	$Harmony = "7D";
	if($postJoh == 8) 	$Harmony = "8D";
	if($postJoh == 9) 	$Harmony = "9D";
	if($postJoh == 10) 	$Harmony = "AD";
	$Harmony 					= hexdec($Harmony);
	$Ref_Harmony				= dechex(($postRef * 128) + ($Harmony));
	
	$Codigo_Item				= str_pad(strtoupper($vIndex . $Level_Option_Luck_Skill . $Dur_Level_Exe_Ancient . $Serial . $Exe_Option . $Ancient . $vGrupo . $Ref_Harmony), 32, "0", STR_PAD_RIGHT);
?>