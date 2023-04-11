<?php
	// - Definições para Inserir no Bau
	if($Season == 1) $Tamanho_Slot_Bau = 20;
	if($Season == 2) $Tamanho_Slot_Bau = 20;
	if($Season == 3) $Tamanho_Slot_Bau = 32;
	$Slot_Vazio 	 = str_pad($Slot_Vazio, $Tamanho_Slot_Bau, "F", STR_PAD_LEFT);
	
	// - Verifica se o Bau existe
	$bau_exist = mssql_num_rows(mssql_query("SELECT AccountID from [$db_mssql].[dbo].[Warehouse] WHERE AccountID='$login'"));
	if($bau_exist == 0) mssql_query("EXEC [$db_mssql].[dbo].[Webshop_CriarBau] '$login'");

	// - Pega o Bau
	$MeuBau_Consulta = mssql_query("EXEC [$db_mssql].[dbo].[Webshop_Bau] '$login'");
	$StoredRow = mssql_fetch_row($MeuBau_Consulta);
	
	// - (IMPORTANTE) Junta o Bau, Passa para HEX e  Deixa Maiusculo
	for($i = 0; $i < 15; $i++)
	{
		$Meu_Bau = $Meu_Bau . strtoupper(bin2hex($StoredRow[$i]));
		
	}
	
	// - (IMPORTANTE) Deixa MAIUSCULO
	$Slot_Bau = str_split($Meu_Bau, $Tamanho_Slot_Bau);
	
	// - (IMPORTANTE) Fixa os Slot's Nulos ou Bugados do Bau
	for($fix_y = 0; $fix_y < 15; $fix_y++)
	{
		for($fix_x = 0; $fix_x < 8; $fix_x++)
		{
			if(strlen($Slot_Bau[$fix_y*8+$fix_x]) < $Tamanho_Slot_Bau) $Slot_Bau[$fix_y*8+$fix_x] = $Slot_Vazio;
		}
	}
	
	// -- Verifica os Slot's que o Item irá ocupar!
	for($vY = $y; $vY < ($y+$Tamanho_Item_Y); $vY++)
	{
		for($vX = $x; $vX < ($x+$Tamanho_Item_X); $vX++)
		{
			if($Slot_Bau[$vY*8+$vX] != $Slot_Vazio) die("<script>carregar('painel/sem_espaco.php','Resultado_V','GET')</script>");
		}
	}
	
	$Slot_Bau[$y*8+$x] = $Codigo_Item;
	$Item_Final = "0x" . implode($Slot_Bau);
	
	mssql_query("UPDATE [$db_mssql].[dbo].[Warehouse] SET Items=$Item_Final WHERE AccountID='$login'");
?>