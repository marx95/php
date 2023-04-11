<?php
	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
	if($CtlCode < $CtlCode_Adminsitrador) die("<center><span id='Falha'>P&aacute;gina somente para Administradores</span></center>");
	
	$row = mssql_fetch_row(mssql_query("SELECT manutencao, titulo, msg FROM [$db_mssql].[dbo].[AntiHack_Status] WHERE id=0"));

if($_GET['f'] == 1)
{
	$status 	= $_POST['status'];
	$titulo 	= $_POST['titulo'];
	$msg 		= $_POST['msg'];
	
	mssql_query("UPDATE [$db_mssql].[dbo].[AntiHack_Status] SET manutencao='$status', titulo='$titulo', msg='$msg' WHERE id='0'");

	die("<script>carregar('paginas/concluido.php?id=30','Resultado','GET')</script>");
}

if($_GET['f'] == 2)
{
	mssql_query("TRUNCATE TABLE [$db_mssql].[dbo].[AntiHack_Log]");
	die("<script>carregar('painel_adm/antihack.php','Paginas_Centro','GET')</script>");
}
?>
<form method="post" title="Resultado" action="painel_adm/antihack.php?f=1">
<table>
<tr>
  <td colspan="2">Alterar Status de Manuten&ccedil;&atilde;o do AntiHack</td></tr>
<tr>
	<td>Status do AntiHack:</td>
	<td>
	<select name="status" id="status">
	<option value="0" <?php if($row[0] == 0) echo "selected=\"selected\""; ?>>Login Liberado</option>
	<option value="1" <?php if($row[0] == 1) echo "selected=\"selected\""; ?>>Login Travado</option>
	</select>
	</td>
</tr>
<tr>
	<td>Titulo:</td>
	<td><input type="text" name="titulo" id="titulo" maxlength="250" value="<?php echo $row[1]; ?>"></td>
</tr>
<tr>
	<td>Mensagem:</td>
	<td><input type="text" name="msg" id="msg" maxlength="512" value="<?php echo $row[2]; ?>"></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="Alterar"></td>
</tr>
</table>
</form>
<center>
<span id="Resultado"></span>
</center>
<table>
<tr><td colspan="4">Registros do AntiHack - <span style="cursor:pointer" onclick="carregar('painel_adm/antihack.php?f=2','Resultado','GET')">[Limpar Registros]</span></td></tr>
<tr>
	<td>#</td>
	<td>IP</td>
	<td>String</td>
	<td>Programa</td>
</tr>
<?php
	$query = mssql_query("SELECT IP, Log, Data FROM [$db_mssql].[dbo].[AntiHack_Log] ORDER BY id");
	while($row = mssql_fetch_row($query))
	{
		$rank++;
		$spl = explode("$$", base64_decode($row[1]));
		echo "
		<tr onmousemove=\"ToolMsg('Horario do ocorrido: <b>$row[2]</b>')\">
		<td>$rank</td>
		<td>$row[0]</td>
		<td>$spl[0]</td>
		<td>$spl[1]</td>
		</tr>
		";
	}
?>
</table>