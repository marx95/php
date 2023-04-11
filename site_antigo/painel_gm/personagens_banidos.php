<?php
	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
	if($CtlCode < $CtlCode_GameMaster) die("<center><span id='Falha'>Página somente para GameMaster's</span></center>");
?>
<table>
<tr><td colspan='4'>Personagens Bloqueados</td></tr>
</tr>
<tr>
        <td width="25">#</td>
        <td><strong>Login</strong></td>
		<td><strong>Personagem</strong></td>
        <td><strong>Dias restantes</strong></td>
  </tr>
<?php
	$result = mssql_query("SELECT accountid, name, dias_ban, motivo_ban FROM [$db_mssql].[dbo].[Character] where ctlcode=1 order by dias_ban desc");
	while($row = mssql_fetch_row($result))
			{
			$rank++;
			if($row[2] == 555) $row[2] = "Eterno";
			$motivo = $result[3];
			if(strlen($motivo) < 4) $motivo = "Sem Motivo";
			echo "
			<tr onmousemove=\"ToolMsg('$motivo');\">
				<td>$rank</td>
				<td>$row[0]</td>
				<td>$row[1]</td>
				<td>$row[2]</td>
			</tr>
			";
			}
?>
</table>