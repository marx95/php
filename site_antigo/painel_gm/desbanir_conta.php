<?php
	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
	if($CtlCode < $CtlCode_GameMaster) die("<center><span id='Falha'>Página somente para GameMaster's</span></center>");
	
	if($_GET['func'] == 1)
	{
		$login_desbanir = $_POST['login_desbanir'];
		if(strlen($login_desbanir) < 4) die("<span id='Falha'>Dígite um login válido!</span>");
		
		$verifica_loginblock = mssql_num_rows(mssql_query("SELECT memb___id FROM [$db_mssql].[dbo].[memb_info] WHERE memb___id='$login_desbanir'"));
		if($verifica_loginblock == 0) die("<span id='Falha'>Login inválido!</span>");
		
		mssql_query("UPDATE [$db_mssql].[dbo].[memb_info] SET Bloc_Code=0, dias_ban=0 WHERE memb___id='$login_desbanir'");
		die("<script>carregar('paginas/concluido.php?id=8','Paginas_Centro','GET')</script>");
	}
?>
<form method="post" title="Resultado" action="painel_gm/desbanir_conta.php?func=1">
<table>
<tr><td colspan='2'>Desbloquear Conta</td></tr>
<tr>
	<td width="50%">Digite o Login:</td>
	<td><input type="text" name="login_desbanir" id="login_desbanir" maxlength="10" /></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="Desbloquear" /></td>
</tr>
</table>
<br />
<center><span id="Resultado"></span></center>