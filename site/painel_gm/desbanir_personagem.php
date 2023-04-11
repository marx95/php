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
		$personagem_desbanir = $_POST['personagem_desbanir'];
		
		if(strlen($personagem_desbanir) < 4) die("<span id='Falha'>Dígite um nome válido!</span>");
		
		$verifica_persoblock = mssql_num_rows(mssql_query("SELECT Name FROM [$db_mssql].[dbo].[Character] WHERE Name='$personagem_desbanir'"));
		if($verifica_persoblock == 0) die("<span id='Falha'>Personagem inválido!</span>");
		
		mssql_query("UPDATE [$db_mssql].[dbo].[Character] SET CtlCode=0, dias_ban=0 WHERE Name='$personagem_desbanir'");
		die("<script>carregar('paginas/concluido.php?id=10','Paginas_Centro','GET')</script>");
	}
?>
<form method="post" title="Resultado" action="painel_gm/desbanir_personagem.php?func=1">
<table>
<tr><td colspan='2'>Desbloquear Personagem</td></tr>
<tr>
	<td width="50%">Digite o nome:</td>
	<td><input type="text" name="personagem_desbanir" id="personagem_desbanir" maxlength="10" /></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="Desbloquear" /></td>
</tr>
</table>
<br />
<center><span id="Resultado"></span></center>