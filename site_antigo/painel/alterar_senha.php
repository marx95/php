<?php
	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
	
	if($_GET['func'] == 1)
	{
		$novasenha = $_POST['novasenha'];
		if(strlen($novasenha) < 4) die("M&iacute;nimo 4 d&iacute;gitos!");
		mssql_query("UPDATE [$db_mssql].[dbo].[memb_info] SET memb__pwd='$novasenha' WHERE memb___id='$login'");
			
		$corpo = "
		Sua senha foi alterada com sucesso!
			
		------------------------------
		Login: $login
		Senha: $novasenha
			------------------------------
			
		[Nunca passe seus dados á ninguem, o MuNovus agradece!]
		";
		EnviarEMail($email, "Senha alterada - MuNovus", $corpo);
		die("<script>carregar('paginas/concluido.php?id=26','Paginas_Centro','GET')</script>");
	}
?>
<form method="POST" title="Resultado" action="painel/alterar_senha.php?func=1">
<table>
<tr><td colspan='2'>Alterar Senha</td></tr>
<tr>
	<td width="50%">Nova senha:</td>
	<td><input type="password" name="novasenha" value="" maxlength="10" /></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="Alterar" /></td>
</tr>
</table>
</form>
<span id="Resultado"></span>