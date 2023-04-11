<?php	
	if($_GET['func'] == 1)
	{
		//die("<span id='Falha'>pagina em manutencao!</span>");
		require_once("../config/masterconfig.php");
		require_once("../config/sql.php");
		require_once("../config/conexao_mssql.php");
		$email = $_POST['email'];
		
		if(empty($email)) die("<span id='Falha'>Dígite um E-mail válido!</span>");
		
		$existe = mssql_num_rows(mssql_query("SELECT mail_addr FROM [$db_mssql].[dbo].[Memb_Info] WHERE mail_addr='$email'"));
		if($existe == 0) die("<span id='Falha'>E-mail inválido!</span>");
		
		$ip	= $_SERVER['REMOTE_ADDR'];
		$total = 0;
		$info = "";
		$query_rec = mssql_query("SELECT memb___id, memb__pwd FROM [$db_mssql].[dbo].[Memb_Info] WHERE mail_addr='$email'");
		while($rec = mssql_fetch_row($query_rec))
		{
			$total++;
			$info = $info . "
---------------------------------
Login: $rec[0]
Senha: $rec[1]";
		}
		
		//Sistema de email
		$titulo = "Recuperar a senha do MuNovus";
		$corpo  = "[Recuperação de senha do MuNovus]

$info
---------------------------------

IP que fez o pedido de recuperação: $ip

[Nunca passe seus dados á ninguem, o MuNovus agradece!]";

		EnviarEMail($email, $titulo, $corpo);

	die("<script>carregar('paginas/concluido.php?id=21&mailsv=" . $email . "','Centro','GET');</script>");
	}
?>
<form method="POST" title="Resultado" action="paginas/recuperar.php?func=1">
<table>
<tr>
	<td colspan="2">Recuperar Conta</td>
</tr>
<tr>
	<td width="50%">Email:</td>
	<td><input type="text" name="email" value="" maxlength="30" /></td>
</tr>
	<td colspan="2"><input type="submit" value="Recuperar senha" /></td>
</tr>
</table>
</form>
<span id="Resultado"></span>