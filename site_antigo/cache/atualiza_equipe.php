<?php
	if(empty($db_mssql)) die();

	$pagina = "
	<tr>
	<td colspan=\"2\">Equipe $nome
	</td>
	</tr>
	";
	
	$rank = 0;
	$result = mssql_query("SELECT accountid, name, Tipo from [$db_mssql].[dbo].[Character] where tipo>=$CtlCode_Divulgador AND tipo<$CtlCode_Adminsitrador_Pl ORDER BY Tipo DESC");
	while($row = mssql_fetch_row($result))
	{
		$rank +=1;
		$gm_on	= mssql_fetch_row(mssql_query("select connectstat from [$db_mssql].[dbo].[memb_stat] where memb___id='$row[0]'"));
		$idc	= mssql_fetch_row(mssql_query("select GameIDC from [$db_mssql].[dbo].[accountcharacter] where id='$row[0]'"));
		$perso_ctlcode = $row[2];
		
		switch($gm_on[0])
		{
			case 0: $gm_st = "img/off.png"; break;
			case 1: $gm_st = "img/on.png"; break;
		}
		
		//Sistema de Divulgador
		$String_DV = "";
		if($row[2] == $CtlCode_Divulgador) $String_DV = "[DV]";
		
		if($idc[0] == $row[1])
		{
		$pagina = $pagina . "
			<tr onclick=carregar('painel/perfil.php?personagem=$row[1]','Centro','GET')>
          	<td width='80%'><a href='javascript:void(0)'>" . $String_DV . "$row[1]</a></td>
         	<td><img src='$gm_st' /></td>
	    	</tr>
		";
		}else
		{
		$pagina = $pagina . "
			<tr onclick=carregar('painel/perfil.php?personagem=$row[1]','Centro','GET')>
          	<td width='80%'><a href='javascript:void(0)'>$row[1]" . $String_DV . "</a></td>
         	<td><img src='img/off.png' /></td>
	    	</tr>
		";
		}
	}
	
	$pagina = $pagina . "
	<tr>
          <td colspan='2'><center><img src='img/refresh.png' onclick=carregar('cache/equipe.html','GMOnline','GET') style='cursor: pointer' /></center></td>
	    </tr>
		<!-- Hora do Cache: $agora -->
	";
	EscreveCache("equipe.html", $pagina);
?>