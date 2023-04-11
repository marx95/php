<?php
	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
	if($CtlCode < $CtlCode_Adminsitrador) die("<center><span id='Falha'>P&aacute;gina somente para Administradores</span></center>");
	$pid = $_GET['pid'];
	
	if($_GET['f'] == 1)
	{
		$r_pag = $_POST['r_pag'];
		$r_resp = $_POST['r_resp'];
		if(empty($pid)) die("<span id='Falha'>ID Inválida!</span>");
		if($r_pag == 0) die("<span id='Falha'>Selecione a opção do 'Oque fazer'</span>");
		if(strlen($r_resp) < 4) die("<span id='Falha'>Escreva a Resposta/Motivo/Comentario</span>");
		mssql_query("UPDATE [$db_mssql].[dbo].[Confirmacoes] SET aprovado=$r_pag, resposta='$r_resp' WHERE id=$pid");
		
		// - Email
		$p_mail = mssql_fetch_row(mssql_query("SELECT login FROM [$db_mssql].[dbo].[Confirmacoes] WHERE id=$pid"));
		$p_lg  = mssql_fetch_row(mssql_query("SELECT mail_addr FROM [$db_mssql].[dbo].[memb_info] WHERE memb___id='$p_mail[0]'"));
		switch($r_pag)
		{
			case 1:
				$titulo = "Seu comprovante foi Recusado! [MuNovus]";
				$corpo = "
				Seu comprovante foi recusado, motivo:
				$r_resp
				
				Dúvidas, entre em contato com o MuNovus no forum.
				[Nunca passe seus dados á ninguem, o MuNovus agradece!]
				";
			break;
			case 2:
				$titulo = "Seu comprovante foi Aprovado! [MuNovus]";
				$corpo = "
				Seu comprovante foi aprovado!
				
				Resposta do Administrador do MuNovus(Hotch):
				$r_resp
				
				Dúvidas, entre em contato com o MuNovus no forum.
				[Nunca passe seus dados á ninguem, o MuNovus agradece!]
				";
			break;
		}
		
		EnviarEMail("$p_lg[0]", $titulo, $corpo);
		
		die("<script>carregar('paginas/concluido.php?id=22','Centro','GET')</script>");
	}
	
	$p_row = mssql_fetch_row(mssql_query("SELECT login, valor, banco, data, hora, numero, receber, comentario, Anexo1, Anexo2, Anexo3 FROM [$db_mssql].[dbo].[Confirmacoes] WHERE id=$pid"));
	$Anexo[1] = $p_row[8];
	$Anexo[2] = $p_row[9];
	$Anexo[3] = $p_row[10];
?>
<table>
<tr><td colspan="2">Pagamento #<?php echo $pid; ?> - <?php echo $p_row[0]; ?></td></tr>
<tr>
	<td width="50%">Login</td>
	<td><?php echo $p_row[0]; ?></td>
</tr>
<tr>
	<td>Valor</td>
	<td><?php echo $p_row[1]; ?></td>
</tr>
<tr>
	<td>Banco que depositou</td>
	<td><?php echo $p_row[2]; ?></td>
</tr>
<tr>
	<td>Data - Hora</td>
	<td><?php echo $p_row[3]; ?> - <?php echo $p_row[4]; ?></td>
</tr>
<tr>
	<td>Numero do comprovante</td>
	<td><?php echo $p_row[5]; ?></td>
</tr>
</table>
<br />
<table>
<tr>
	<td colspan="2">Anexos</td>
</tr>
<?php
for($i=1; $i<3; $i++)
{

	if(strlen($Anexo[$i]) > 1)
	{
	$total++;
	echo "
	<tr>
	<td><input type='button' value='Ver Anexo $total' onclick=AbrirPop('img/confirmacoes/$Anexo[$i]') /></td>
</tr>";
	}
}

if($total == 0) echo "<tr><td><center>Usuario n&atilde;o anexou nada!</center></td></tr>";
?>
</table>
<br />
<table>
<tr>
	<td colspan="2">Dados da Bonifica&ccedil;&atilde;o</td>
</tr>
<tr>
	<td width="50%">Receber em:</td>
	<td><input type="text" value="<?php echo $p_row[6]; ?>" style="width: 98%" /></td>
</tr>
<tr>
	<td colspan="2"><center><b>Comentario feito pelo usuario</b></center></td>
</tr>
<tr>
	<td colspan="2"><textarea style="max-width: 480px; font-size: 12px; width: 99%; height: 150px;  border-spacing: 0px; padding: 0px;" disabled="disabled"><?php echo $p_row[7]; ?></textarea></td>
</tr>
</td>
</table>
<br />
<form method="post" title="Resultado" action="painel_adm/v_pagamentos.php?f=1&pid=<?php echo $pid; ?>">
<table>
<tr>
	<td colspan="2">Administrar Pagamento</td>
</tr>
<tr>
	<td>Oque fazer?</td>
	<td>
	<select id="r_pag" name="r_pag">
		<option value="0">Selecione uma op&ccedil;&atilde;o</option>
		<option value="1">Pagamento Recusado</option>
		<option value="2">Pagamento Aprovado</option>
	</select>
	</td>
</tr>
<tr>
	<td>Resposta/Motivo/Comentario</td>
	<td><input type="text" id="r_resp" name="r_resp" value="" maxlength="128" /></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" value="Proceder" /></td>
</tr>
</table>
</form>
<br />
<center><span id="Resultado"></span></center>