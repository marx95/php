<?php
	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
	if($CtlCode < $CtlCode_Adminsitrador) die("<center><span id='Falha'>P&aacute;gina somente para Administradores</span></center>");
?>
<table>
<tr><td colspan="4">Visualizar todos os Cargos</td></tr>
<tr>
	<td>#</td>
	<td>Login</td>
	<td>Nome</td>
	<td>Cargo</td>
</tr>
<?php
	$query = mssql_query("SELECT AccountID, Name, Tipo FROM [$db_mssql].[dbo].[Character] WHERE tipo > 0");
	while($row = mssql_fetch_row($query))
	{
		$rank++;
		switch($row[2])
		{
			case $CtlCode_Divulgador: 			$cargo = "Divulgador"; break;
			case $CtlCode_GameMaster: 			$cargo = "GameMaster"; break;
			case $CtlCode_SubAdminsitrador: 	$cargo = "Sub-Administrador"; break;
			case $CtlCode_Adminsitrador: 		$cargo = "Administrador"; break;
			case $CtlCode_Adminsitrador_Pl: 	$cargo = "Administrador-Jogador"; break;
		}
		echo "
		<tr>
		<td>$rank</td>
		<td>$row[0]</td>
		<td>$row[1]</td>
		<td>$cargo</td>
		</tr>
		";
	}
?>
</table>