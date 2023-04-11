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
		$login_banir = $_POST['login_banir'];
		$diasblock = $_POST['diasblock'];
		$motivoban = $_POST['motivoban'];
		
		if(strlen($login_banir) < 4) die("<span id='Falha'>Dígite um login válido!</span>");
		if(strlen($motivoban) == 0) die("<span id='Falha'>Dígite um motivo do block!</span>");
		if($diasblock == "") die("<span id='Falha'>Selecione o Total de dias que a conta ficará banida!</span>");
		if($login_banir == "marx95" || $login_banir == "00000") die("<span id='Falha'>Bela tentativa, trouxa ;)</span>");
		
		$verifica_loginblock = mssql_num_rows(mssql_query("SELECT memb___id FROM [$db_mssql].[dbo].[memb_info] WHERE memb___id='$login_banir'"));
		if($verifica_loginblock == 0) die("<span id='Falha'>Login inválido!</span>");
		
		mssql_query("UPDATE [$db_mssql].[dbo].[memb_info] SET Bloc_Code=1, dias_ban=$diasblock, motivo_ban='$motivoban' WHERE memb___id='$login_banir'");
		die("<script>carregar('paginas/concluido.php?id=7','Paginas_Centro','GET')</script>");
	}
?>
<form method="post" title="Resultado" action="painel_gm/banir_conta.php?func=1">
<table>
<tr><td colspan='2'>Banir Conta</td></tr>
<tr>
	<td width="50%">Digite o Login:</td>
	<td><input type="text" name="login_banir" id="login_banir" maxlength="10" /></td>
</tr>
<tr>
	<td>Motivo:</td>
	<td><input type="text" name="motivoban" id="motivoban" maxlength="255" /></td>
</tr>
<tr>
	<td>Dias em detenção:</td>
	<td>
	<select name="diasblock" id="diasblock">
	<option></option>
	<option value="1">1 Dia</option>
	<option value="2">2 Dias</option>
	<option value="3">3 Dias</option>
	<option value="4">4 Dias</option>
	<option value="7">7 Dias</option>
	<option value="14">14 Dias</option>
	<option value="30">30 Dias</option>
	<option value="555">Eterno</option>
	</select></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="Bloquear" /></td>
</tr>
</table>
<br />
<center><span id="Resultado"></span></center>