<?php 
	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
	
	$personagem =  $_GET['personagem'];
	$p_existe = mssql_num_rows(mssql_query("SELECT Name, CtlCode, dias_ban, motivo_ban FROM [$db_mssql].[dbo].[Character] WHERE Name='$personagem' AND accountid='$login'"));
	if($p_existe == 0) die("<span id='Falha'>Personagem inexistente!</span>");
	
	$p_info = mssql_fetch_row(mssql_query("SELECT CtlCode, dias_ban, motivo_ban FROM [$db_mssql].[dbo].[Character] WHERE Name='$personagem' AND accountid='$login'"));
	$ctlcode = $p_info[0];

	if($ctlcode == 1)
	{
		$dias_block = $p_info[1];
		switch($dias_block)
			{
				case 1: $frase = "Personagem banido por $dias_block dia"; break;
				case 555: $frase = "Personagem banido <b>ETERNAMENTE</b>"; break;
				default: $frase = "Personagem banido por $dias_block dias"; break;
			}
		die("<table><tr><td colspan='2'><center>$frase<br /><b>motivo: </b><br />$p_info[2]</center></td></tr></table>");
	}
?>
<table>
<tr><td colspan='2'>Personagem: <?php echo $personagem; ?></td></tr>
<tr>
<td><input type="button" onclick="carregar('painel/perfil.php?personagem=<?php echo $personagem; ?>','Sub_Centro','GET')" value="Perfil" /></td>
<td><input type="button" onclick="window.open('painel/avatar.php?personagem=<?php echo $personagem; ?>&login=<?php echo $login; ?>&senha=<?php echo md5($senha); ?>', '_blank', 'width=600,height=250,toolbar=no,location=no,resizable=no,directories=no,menubar=no,status=no'); return false;" value="Mudar Foto" /></td>
</tr>
<tr>
<td><input type="button" onclick="carregar('painel/pk.php?personagem=<?php echo $personagem; ?>','Sub_Centro','GET')" value="Limpar PK" /></td>
<td><input type="button" onclick="carregar('painel/nick.php?personagem=<?php echo $personagem; ?>','Sub_Centro','GET')" value="Mudar Nick" /></td>
</tr>
<tr>
<td><input type="button" onclick="carregar('painel/pontos.php?personagem=<?php echo $personagem; ?>','Sub_Centro','GET')" value="Distribuir Pontos" /></td>
<td><input type="button" onclick="carregar('painel/mover.php?personagem=<?php echo $personagem; ?>','Sub_Centro','GET')" value="Mover Personagem" /></td>
</tr>
</table>
<br />
<center><div id="Sub_Centro"></div></center>