<?php
	require_once("../config/masterconfig.php");
	require_once("../config/conexao_mssql.php");
	
	$rei_pvp = mssql_fetch_row(mssql_query("SELECT Name, AvatarLink FROM [$db_mssql].[dbo].[Character] WHERE ReiPVP = 1"));
	
	if(strlen($rei_pvp[0]) < 4)
	{
		$rei_pvp[0] = "Sem Rei";
		$rei_pvp[1] = "avatar.png";
	}
?>
<tr>
<td>Rei do PVP</td>
</tr>
<tr onClick="carregar('painel/perfil.php?personagem=<?php echo $rei_pvp[0]; ?>','Centro','GET')">
	<td style="cursor: pointer"><center><b><?php echo $rei_pvp[0]; ?></b></center></td>
</tr>
<tr onClick="carregar('painel/perfil.php?personagem=<?php echo $rei_pvp[0]; ?>','Centro','GET')">
	<td><center><img src="img/avatar/<?php echo $rei_pvp[1]; ?>" style="max-height: 100px; height: 100px;
	 max-width: 100px; width: 100px; border: 100px; cursor: pointer;" /></center></td>
</tr>
<tr>
    <td colspan="3" onclick="carregar('paginas/premios.php','Centro','GET')" style="font-weight: bold; text-align: center; cursor: pointer;">Ver Pr&ecirc;mios</td>
</tr>
<tr>
    <td colspan="3"><center><img src="img/refresh.png" onclick="carregar('lateral/reipvp.php','ReiPVP','GET')" style="cursor: pointer"></center></td>
</tr>