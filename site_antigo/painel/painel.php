<?php
	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
?>
<table>
<tr>
  <td>Informa&ccedil;&otilde;es R&aacute;pidas</td></tr>
		<tr>
		<td>
		<p style="color: #dab022; font-weight: bold;">Voc&ecirc; reseta no level <?php echo $resetolvl; ?><?php if($tipoR == "Pontuativo") echo " e ganha " . $pontosrr . " pontos por Reset!"; ?>.<br />
		<?php echo $comoresetar; ?></p>
		</td>
		</tr>
</table>
<table>
	<tr><td colspan='2'>Gerenciar Personagens</td></tr>
	<tr>
	<td width='50%'><b>Escolha o personagem:</b>
	</td>
    <td>
	<select id="personagem" onchange="CarregaPersonagem(this.value)">
	<option></option>
<?php
	$query = "SELECT name FROM [$db_mssql].[dbo].[Character] WHERE accountid = '$login' ORDER BY resets DESC";
	$result = mssql_query($query);
	while($row = mssql_fetch_row($result))
	{
		echo "<option value='$row[0]'>$row[0]</option>";
	}
?>
	</select>
	</td>
	</tr>
</table>
<div id="Paginas_Centro"></div>