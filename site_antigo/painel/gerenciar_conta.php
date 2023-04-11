<?php
	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
?>
<table>
<tr><td colspan="3">Dados da conta: <?php echo $login; ?></td></tr>
<tr>
	<td width="35%">Login:</td>
	<td width="35%"><?php echo $login; ?></td>
	<td><input type="button" onclick="carregar('painel/alterar_senha.php','Paginas_Centro','GET')" value="Alterar Senha" /></td>
</tr>
<tr>
	<td>Senha:</td>
	<td><?php echo str_repeat("*", strlen($senha)); ?></td>
	<td><input type="button" onclick="carregar('painel/lbau.php','Paginas_Centro','GET')" value="Limpar Ba&uacute;" /></td>
  </tr>
<tr>
	<td>Email:</td>
	<td><?php echo $email; ?></td>
	<td>&nbsp;</td>
  </tr><!--
<tr>
	<td>Status no jogo:</td>
	<td><?php echo $no_jogo; ?></td>
	<td>&nbsp;</td>
  </tr>
<tr>
	<td>Ultima conex&atilde;o:</td>
	<td><?php echo $ultimaconexao; ?></td>
	<td>&nbsp;</td>
  </tr>
  <tr>
	<td>Horas Online:</td>
	<td><?php echo $tempoonline; ?></td>
	<td>&nbsp;</td>
  </tr>-->
<tr>
	<td>Quantidade de ba&uacute;(s)</td>
	<td><?php echo $total_baus; ?></td>
	<td>&nbsp;</td>
  </tr>
</table>
<div id="Paginas_Centro"></div>