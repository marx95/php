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
<tr><td colspan='3'>Contas Bloqueadas</td></tr>
</tr>
<tr>
        <td width="25">#</td>
        <td><strong>Login</strong></td>
        <td><strong>Dias restantes</strong></td>
  </tr>
<?php
	$result = mssql_query("SELECT memb___id, dias_ban, motivo_ban FROM [$db_mssql].[dbo].[Memb_Info] WHERE email_confirmado = 1 AND Bloc_Code=1 order by dias_ban desc");
	while($row = mssql_fetch_row($result))
			{
			$rank++;
			if($row[1] == 555) $row[1] = "Eterno";
			$motivo = $result[2];
			if(strlen($motivo) < 4) $motivo = "Sem Motivo";
			echo "
			<tr onmousemove=\"ToolMsg('$motivo');\">
				<td>$rank</td>
				<td>$row[0]</td>
				<td>$row[1]</td>
			</tr>
			";
			}
?>
</table>