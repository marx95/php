<?php
	require_once("../config/masterconfig.php");
	$cnc 	= @mssql_connect($ip_mssql, $u_mssql, $p_mssql) or die("Falha ao conectar no servidor de Banco de dados!");
	$db 	= @mssql_select_db($db_mssql, $cnc) or die("Falha ao conectar no Banco de dados primário!");
	
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
	if($CtlCode < $CtlCode_Adminsitrador) die("<center><span id='Falha'>P&aacute;gina somente para Administradores</span></center>");
	
	$cnn_mysql	= mysql_connect($ip_mysql, $u_mysql, $p_mysql);
	$sdb_mysql	= mysql_select_db($db_mysql, $cnn_mysql);

if($_GET['f'] == 1)
{
	$titulo 	= $_POST['titulo'];
	$texto		= base64_encode($_POST['texto']);
	$por		= $_POST['por'];
	$data		= date("H:i:s d/m/Y");
	mysql_query("INSERT INTO $db_mysql.noticias (titulo, texto, data, por) VALUES('$titulo', '$texto', '$data', '$por')");

	die("<script>carregar('painel_adm/noticias.php','Paginas_Centro','GET')</script>");
}

if($_GET['f'] == 2)
{
	$nid = $_GET['nid'];
	mysql_query("DELETE FROM $db_mysql.noticias WHERE id='$nid'");
	die("<script>carregar('painel_adm/noticias.php','Paginas_Centro','GET')</script>");
}
?>
<form method="post" title="Resultado" action="painel_adm/noticias.php?f=1">
<table>
<tr>
  <td colspan="2">Postar Not&iacute;cia</td></tr>
<tr>
	<td>Titulo:</td>
	<td><input type="text" name="titulo" id="titulo" maxlength="128" value=""></td>
</tr>
<tr>
	<td>Por:</td>
	<td><input type="text" name="por" id="por" maxlength="11" value=""></td>
</tr>
<tr>
	<td colspan="2"><textarea name="texto" style="width: 98%; height: 150px; border: 1px solid #dcdcdc; outline: none;"></textarea></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="Postar"></td>
</tr>
</table>
</form>
<center>
<span id="Resultado"></span>
</center>
<table>
<tr>
	<td colspan="3">Administrar Not&aacute;cias</td>
</tr>
<?php
	$q_mysql	= mysql_query("SELECT id, titulo FROM noticias ORDER BY id DESC");
	
	while($rows	= mysql_fetch_array($q_mysql))
	{
		$rank++;
	echo "<tr>
	<td width=\"20px\">$rank</td>
	<td>$rows[titulo]</td>
	<td width=\"156px\"><input type=\"button\" onclick=\"carregar('painel_adm/noticias.php?f=2&nid=$rows[id]','Paginas_Centro','GET')\" value=\"Deletar\" /></td>
	</tr>";	
	}
	
	if($rank == 0) echo "<tr><td><h2>Sem Not&iacute;cias</h2></td></tr>";
?>
</table>