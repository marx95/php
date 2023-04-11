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
		$personagem_banir = $_POST['personagem_banir'];
		$diasblock = $_POST['diasblock'];
		$motivoban = $_POST['motivoban'];
		
		if(strlen($personagem_banir) < 4) die("<span id='Falha'>Dígite um nome válido!</span>");
		if(strlen($motivoban) == 0) die("<span id='Falha'>Dígite um motivo do block!</span>");
		if($personagem_banir == "Hotch_ADM" || $personagem_banir == "BirD_ADM") die("<span id='Falha'>Bela tentativa, trouxa ;)</span");
		
		if($diasblock == "") die("<span id='Falha'>Selecione o Total de dias que o personagem ficará banido!</span>");
		
		$verifica_persoblock = mssql_num_rows(mssql_query("SELECT Name FROM [$db_mssql].[dbo].[Character] WHERE Name='$personagem_banir'"));
		if($verifica_persoblock == 0) die("<span id='Falha'>Personagem inválido!</span>");
		
		mssql_query("UPDATE [$db_mssql].[dbo].[Character] SET CtlCode=1, dias_ban=$diasblock, motivo_ban='$motivoban' WHERE Name='$personagem_banir'");
		die("<script>carregar('paginas/concluido.php?id=9','Paginas_Centro','GET')</script>");
	}
?>
<form method="post" title="Resultado" action="painel_gm/banir_personagem.php?func=1">
<table>
<tr><td colspan='2'>Banir Personagem</td></tr>
<tr>
	<td width="50%">Digite o nome:</td>
	<td><input type="text" name="personagem_banir" id="personagem_banir" maxlength="10" /></td>
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