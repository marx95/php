<?php
		require_once("../config/masterconfig.php");
		require_once("../painel/accinfo.php");
	
		$id = $_POST['id'];
		
		if($id == "") die("<script>carregar('paginas/principal.php','Centro','GET')</script>");
		
		$logado_db		= mssql_fetch_row(mssql_query("select ConnectStat from [$db_pri_mssql].[dbo].[MEMB_STAT] WHERE memb___id = '$login'"));
		/*if($logado_db[0] == 1) die("<script>carregar('painel/logado.php','Resultado_V','GET')</script>");*/
		if($logado_db[0] == 1)
		{
			$bau_aberto		= mssql_fetch_row(mssql_query("select Aberto from [$db_sec_mssql].[dbo].[Info_Bau] WHERE AccountID = '$login'"));
			if($bau_aberto[0] == 1) die("<script>carregar('status/bau_aberto.php','Resultado_V','GET')</script>");
		}

		$listar_item	= mssql_fetch_row(mssql_query("select nome, vindex, vunico, vdur, vid, valor, tamanho_x, tamanho_y from [$db_sec_mssql].[dbo].[Webshop] where id='$id'"));
		if($listar_item[0] == "") die("<script>carregar('paginas/principal.php','Centro','GET')</script>");
		
		$serial 		= $listar_serial[0]+1;
		
		$serial			= str_pad(dechex($serial), 8, "0", STR_PAD_LEFT);
		$cord 			= split("x", $_POST['cord']);
		$x 				= $cord[0]-1;
		$y 				= $cord[1]-1;
		$NomeItemF 		= $listar_item[0];
		$valor_item	 	= $listar_item[5];
		$valor_total 	= 0;
		$accon 			= $listar_logado[0];
		$idc 			= str_pad(dechex($listar_item[1]), 2, "0", STR_PAD_LEFT); //id hex do item
		$index 			= dechex($listar_item[4]);
		$level			= $_POST['level'];
		$durabilidade	= $listar_item[3];
		$joh 			= $_POST['JOH'];
		$Ancient 		= $_POST['ancient'];
		$unico 			= $listar_item[2];
		$OptPost 		= $_POST['option'];
		$tipo 			= $_POST['tipo'];
		$refine			= $_POST['refine'];
		
		if($joh > 0 && $refine == 1 && $Season > 1) die("Erro detectado, noob! PHP_HANDLER_CRASH('Joh > 0 && Ref Equal 1')");
		if($x < 0) die("<script>carregar('status/falta_cord.php','Resultado_V','GET')</script>");
		if($y < 0) die("<script>carregar('status/falta_cord.php','Resultado_V','GET')</script>");
		switch($tipo)
		{
			case 0: 
				$Moeda = "$StringBonus";
				$meubonus = $listarbonus[0];
				$ProcQuery = $ProcBonus;
			break;
			case 1: 
				$Moeda = "$StringGolds";
				$meubonus = $listarbonus[1];
				$ProcQuery = $ProcGolds;
			break;
		}

		//Jewel of harmony
		if($Season > 1)
		{
			if($joh > 0 && $level >= 13)
			{
				$joh_p = "+ Jewel of Harmony";
				$valor_total = $valor_total + $pjoh;
			}else
			{
				$joh = 0;
			}

			switch($joh)
			{
				case 0: $joh = "00"; break;
				case 1: $joh = "1D"; break;
				case 2: $joh = "2D"; break;
				case 3: $joh = "3D"; break;
				case 4: $joh = "4D"; break;
				case 5: $joh = "5D"; break;
				case 6: $joh = "6D"; break;
				case 7: $joh = "7D"; break;
				case 8: $joh = "8D"; break;
				case 9: $joh = "9D"; break;
				case 10: $joh = "AD"; break;
				default: $joh = "00"; break;
			}
		}
		//Level
		switch($level)
		{
			case 0: $level_f = 0; break;
			case 1: $level_f = 1; $valor_total = $valor_total + ($plevel * 1); break;
			case 2: $level_f = 2; $valor_total = $valor_total + ($plevel * 2); break;
			case 3: $level_f = 3; $valor_total = $valor_total + ($plevel * 3); break;
			case 4: $level_f = 4; $valor_total = $valor_total + ($plevel * 4); break;
			case 5: $level_f = 6; $valor_total = $valor_total + ($plevel * 5); break;
			case 6: $level_f = 8; $valor_total = $valor_total + ($plevel * 6); break;
			case 7: $level_f = 10; $valor_total = $valor_total + ($plevel * 7); break;
			case 8: $level_f = 12; $valor_total = $valor_total + ($plevel * 8); break;
			case 9: $level_f = 14; $valor_total = $valor_total + ($plevel * 9); break;
			case 10: $level_f = 17; $valor_total = $valor_total + ($plevel * 10); break;
			case 11: $level_f = 20; $valor_total = $valor_total + ($plevel * 11); break;
			case 12: $level_f = 26; $valor_total = $valor_total + ($plevel * 12); break;
			case 13: $level_f = 32; $valor_total = $valor_total + ($plevel * 13); break;
			case 14: $level_f = 38; $valor_total = $valor_total + ($plevel * 14); break;
			case 15: $level_f = 65; $valor_total = $valor_total + ($plevel * 15); break;
			default: $level_f = 0; break;
		}
		
		//option
		switch($OptPost)
		{
			case 0: $option = 0; $opt = 0; break;
			case 4: $option = 1; $opt = 0; $valor_total = $valor_total + ($popt * (4/4)); break;
			case 8: $option = 2; $opt = 0; $valor_total = $valor_total + ($popt * (8/4)); break;
			case 12: $option = 3; $opt = 0; $valor_total = $valor_total + ($popt * (12/4)); break;
			case 16: $option = 0; $opt = 64; $valor_total = $valor_total + ($popt * (16/4)); break;
			case 20: $option = 1; $opt = 64; $valor_total = $valor_total + ($popt * (20/4)); break;
			case 24: $option = 2; $opt = 64; $valor_total = $valor_total + ($popt * (24/4)); break;
			case 28: $option = 3; $opt = 64; $valor_total = $valor_total + ($popt * (28/4)); break;
			default: $option = 0; $opt = 0; break;
		}
		
		//Luck
		if($_POST['luck'] == 1)
		{
			$luck = 4;
			$luckPost = "+Luck";
			$valor_total = $valor_total + $pluck;
		}
		else
		{
			$luck = 0;
			$luckPost = "";
		}
		
		//Skill
		if($_POST['skill'] == 1)
		{
			$skill = 128;
			$skillPost = "+Skill";
			$valor_total = $valor_total + $pskill;
		}
		else
		{
			$skill = 0;
			$skillPost = "";
		}
		
		//Refine 380 option
		if($Season > 1)
		{
			if($refine == 1)
			{
				$index = "$index" . "8";
				$ref_p = "+ 380";
				$valor_total = $valor_total + $prefine;
			}
			else
			{
				$ref_p = "";
				$index = "$index" . "0";
			}
		}

		if($_POST['ancient'] == 1)
		{
			$Anc = "09";
			$Anc_p = "+ Ancient";
			$valor_total = $valor_total + $panc;
		}
		else
		{
			$Anc = "00";
			$Anc_p = "";
		}


		//Opçoes Exe
		if($_POST['epcex1'] == 1)
		{
			$opt_exe_marcada_total++;
			$epcex1_p = 32;
			$exeserial = 15;
			$valor_total = $valor_total + $pexe;
		}
		else
		{
			$epcex1_p = 0;
			$exeserial = 0;
		}
		
		if($_POST['epcex2'] == 1)
		{
			$opt_exe_marcada_total++;
			$epcex2_p = 16;
			$exeserial = 15;
			$valor_total = $valor_total + $pexe;
		}
		else
		{
			$epcex2_p = 0;
			$exeserial = 0;
		}
		
		if($_POST['epcex3'] == 1)
		{
			$opt_exe_marcada_total++;
			$epcex3_p = 8;
			$exeserial = 15;
			$valor_total = $valor_total + $pexe;
		}
		else
		{
			$epcex3_p = 0;
			$exeserial = 0;
		}
		
		if($_POST['epcex4'] == 1)
		{
			$opt_exe_marcada_total++;
			$epcex4_p = 4;
			$exeserial = 15;
			$valor_total = $valor_total + $pexe;
		}
		else
		{
			$epcex4_p = 0;
			$exeserial = 0;
		}
		
		if($_POST['epcex5'] == 1)
		{
			$opt_exe_marcada_total++;
			$epcex5_p = 2;
			$exeserial = 15;
			$valor_total = $valor_total + $pexe;
		}
		else
		{
			$epcex5_p = 0;
			$exeserial = 0;
		}
		
		if($_POST['epcex6'] == 1)
		{
			$opt_exe_marcada_total++;
			$epcex6_p = 1;
			$exeserial = 15;
			$valor_total = $valor_total + $pexe;
		}
		else
		{
			$epcex6_p = 0;
			$exeserial = 0;
		}
		
		if($tipo == 0 && $opt_exe_marcada_total > $mexe) die("Erro detectado, noob! PHP_HANDLER_CRASH('TipoCash && TotalOptExe > Max_Exe')");
		if($tipo == 1 && $opt_exe_marcada_total > $mexe_g) die("Erro detectado, noob! PHP_HANDLER_CRASH('TipoGold && TotalOptExe > Max_Exe')");
		
		if($id == 351)
		{
			if($_POST['epcex3'] == 1){
				$UOE_f = "04";
				$fen_p = "+Ilusão";
			}
			if($_POST['epcex2'] == 1){
				$UOE_f = "02";
				$fen_p = "+Defesa";
			}
			if($_POST['epcex1'] == 1){
				$UOE_f = "01";
				$fen_p = "+Ataque";
			}
		}
		else
		{
			$exe = ($epcex1_p)+($epcex2_p)+($epcex3_p)+($epcex4_p)+($epcex5_p)+($epcex6_p);
			$UOE_f = str_pad(dechex(($opt)+($exe)), 2, "0", STR_PAD_LEFT);
		}

		$LSLO_f = str_pad(dechex(($level*8)+($skill)+($luck)+($option)), 2, "0", STR_PAD_LEFT);
		$vdur = str_pad(dechex(($durabilidade)), 2, "0", STR_PAD_LEFT);
		$multF = 236 - (((($listar_item[5])*($listar_item[6])) * 5));

		switch($Season)
		{
			case 1:
				$Espaco_Limpo 	= str_repeat("F", 20);
				$Tamanho_Bau	= 20;
				$joh = "";
			break;
			case 2:
				$Espaco_Limpo = str_repeat("F", 20);
				$Tamanho_Bau	= 20;
			break;
			case 3:
				$Espaco_Limpo = str_repeat("F", 32);
				$Tamanho_Bau	= 20;
			break;
		}

		$item_final = strtoupper($idc . $LSLO_f . $vdur . $serial . $UOE_f . $Anc . $index . $joh);
		$item_final = str_pad($item_final, $Tamanho_Bau, "0", STR_PAD_RIGHT);

		//Nome Exe na DB
		if($exe > 0){
			$exePost = "Exellent";
		}
		else
		{
			$exePost = "";
		}
		
		if($level > 0){
			$levelPost = "+$level";
		}
		else
		{
			$levelPost = "";
		}
		
		if($OptPost > 0){
			$OptionPost = "+$OptPost";
		}
		else
		{
			$OptionPost = "";
		}

		//Seta os valores de Bonus(total/2+valor_item) ou golds (total+valor_item)
		if($tipo == 0){
			$valor_total = $valor_item + ($valor_total / 2);
		}else
		{
			$valor_total = $valor_item + $valor_total;
		}
		
		if($meubonus < $valor_total){
			$valor_falta = $valor_total - $meubonus;
			 die("<script>carregar('status/comprar_bonus.php?total=$valor_total&falta=$valor_falta&item=$listar_item[0]&tipo=$tipo','Resultado_V','GET')</script>");
		}
		
		$DataCompra = date("d/m/Y");
		$WareItemNome = "[$Moeda] $listar_item[0] $exePost $levelPost $OptionPost $skillPost $luckPost $ref_p $joh_p $Anc_p $fen_p";
		$WareItemNome = str_replace("   ", " ", $WareItemNome);
		$WareItemNome = str_replace("   ", " ", $WareItemNome);
		$WareItemNome = str_replace("  ", " ", $WareItemNome);
		
		//--------------------------------------------Verifica se bau existe
		$bau_exist = mssql_num_rows(mssql_query("SELECT AccountID from [$db_pri_mssql].[dbo].[Warehouse] WHERE AccountID='$login'"));
		if($bau_exist == 0) mssql_query("EXEC [$db_sec_mssql].[dbo].[Webshop_CriarBau] '$login'");

		//VERIFICA E INSERE O ITEM NO BAU
		$MeuBau_Consulta = mssql_query("EXEC [$db_sec_mssql].[dbo].[Webshop_Bau] '$login'");
		$StoredRow = mssql_fetch_row($MeuBau_Consulta);
		
		// - Isto é super importante, Deixa tudo maiusculo e passa para HEX
		for($a = 0; $a < 15; $a++){
			$items = $items . bin2hex($StoredRow[$a]);
		}
		
		$item_tmp = str_split(strtoupper($items), $Tamanho_Bau);
		$items = $items . strtoupper(bin2hex($StoredRow[$a]));
		
		// - ISTO FIXA OS QUADRADOS DO BAU
		for($fix_y = 0; $fix_y < 15; $fix_y++)
		{
			for($fix_x = 0; $fix_x<8; $fix_x++)
			{
				if($item_tmp[$fix_y*8+$fix_x] == ""){
					$item_tmp[$fix_y*8+$fix_x] = $Espaco_Limpo;
				}
			}
		}
		
		//Verifica os quadrados do bau
		for($vY = $y; $vY < ($y+$listar_item[7]); $vY++) // altura
		{
			for($vX = $x; $vX < ($x+$listar_item[6]); $vX++)
			{
				if($item_tmp[$vY*8+$vX] <> $Espaco_Limpo)
				{
					die("<script>carregar('painel/sem_espaco.php','Resultado_V','GET')</script>");
				}
			}
		}
		
		$item_tmp[$y*8+$x] = $item_final;
		$item_bau = "0x" . implode($item_tmp);
		
		mssql_query("UPDATE [$db_pri_mssql].[dbo].[warehouse] SET Items=$item_bau WHERE AccountID='$login'");
		mssql_query("UPDATE [$db_pri_mssql].[dbo].[memb_info] SET $ProcQuery = $ProcQuery - $valor_total WHERE memb___id='$login'");
		mssql_query("UPDATE [$db_sec_mssql].[dbo].[Webshop] SET comprado = comprado + 1 WHERE id='$id'");
		mssql_query("insert into [$db_sec_mssql].[dbo].[Webshop_Compras](login, valor, item, data) VALUES('$login', $valor_total, '$WareItemNome', '$DataCompra')");
		
		die("<script type=\"text/javascript\">alert('$item_final'); carregar('painel/item_comprado.php?tipo=$tipo','Centro','GET');</script>");
?>