<?php
	$Bau_Existe = mssql_num_rows(mssql_query("SELECT AccountID from [$db_mssql].[dbo].[Warehouse] WHERE AccountID='$login'"));
	if($Bau_Existe == 0)
	{
		// - Definições para Inserir no Bau
		if($Season == 1) $Tamanho_Slot_Bau = 20;
		if($Season == 2) $Tamanho_Slot_Bau = 20;
		if($Season == 3) $Tamanho_Slot_Bau = 32;
		$Slot_Vazio 	 = str_pad($Slot_Vazio, $Tamanho_Slot_Bau, "F", STR_PAD_LEFT);
		for($i = 1; $i< 120; $i++) { $Slots_Bau_Limpo[$i] = $Slot_Vazio; }
		$Bau_Limpo = "0x" . implode($Slots_Bau_Limpo);
		mssql_query("INSERT INTO [$db_mssql].[dbo].[Warehouse] (AccountID, AccountID2, BauID, Items, DbVersion) VALUES ('$login', '', '1', $Bau_Limpo, '$DbVersion')");
	}
?>