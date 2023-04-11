<?php
	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
	if($CtlCode < $CtlCode_Adminsitrador) die("<center><span id='Falha'>P&aacute;gina somente para Administradores</span></center>");
	
if($_GET['f'] == 1)
{
	require_once("../config/criar_gm.php");
	$persomudar = $_POST['persomudar'];
	$tipo_p = $_POST['tipo_p'];
	
	if(empty($persomudar))			die("<span id='Falha'>Nome do personagem em branco!</span>");
	if($tipo_p == -1)				die("<span id='Falha'>Selecione o Tipo de personagem!</span>");
	
	$query_c = mssql_num_rows(mssql_query("SELECT Name FROM [$db_mssql].[dbo].[Character] WHERE Name = '$persomudar'"));
	if($query_c == 0) die("<span id='Falha'>Nome do personagem em uso!</span>");
	
	$CtlCode_DB	= 0;
	if($tipo_p >= $CtlCode_GameMaster && $tipo_p <= $CtlCode_Adminsitrador) $CtlCode_DB = 32;
	
	mssql_query("UPDATE [$db_mssql].[dbo].[Character] SET CtlCode=$CtlCode_DB, Tipo=$tipo_p WHERE name='$persomudar'");

	die("<script>carregar('paginas/concluido.php?id=25','Paginas_Centro','GET')</script>");
}
?>
<form method="post" title="Resultado" action="painel_adm/m_perso.php?f=1">
<table>
<tr><td colspan="2">Modificar CtlCode do Personagem</td></tr>
<tr>
	<td>Nome do char:</td>
	<td><input type="text" name="persomudar" id="persomudar" maxlength="10"></td>
</tr>
<tr>
	<td>Tipo:</td>
	<td>
	<select name="tipo_p" id="tipo_p">
	<option value="-1" selected="selected"></option>
	<option value="<?php echo $CtlCode_Jogador; ?>">Jogador</option>
	<option value="<?php echo $CtlCode_Divulgador; ?>">Divulgador</option>
	<option value="<?php echo $CtlCode_GameMaster; ?>">GameMaster</option>
	<option value="<?php echo $CtlCode_Adminsitrador; ?>">Administrador</option>
	<option value="<?php echo $CtlCode_Adminsitrador_Pl; ?>">Administrador Jogador</option>
	</select>
	</td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="Modificar"></td>
</tr>
</table>
</form>
<br />
<center><span id="Resultado"></span></center>