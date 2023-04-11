<form method="post" action="?f=2&login=<?php echo $login; ?>" enctype="multipart/form-data">
<div id="Falha"><?php if(strlen($erro) > 1) echo $erro; ?></div><br />
<table>
<tr>
<td class="Titulo" colspan="2">Dados do dep&oacute;sito
</td>
</tr>
      <tr>
        <td width="50%">Login</td>
        <td><?php echo $login; ?></td>
      </tr> 
	  <tr>
        <td>Banco <span style="color: #FF0000; font-weight: bold;">*</span></td>
        <td>
		<select name="banco" id="banco" style="width: 200px; padding: 2px;">
		<option value="Bradesco">Bradesco</option>
		</select>
		</td>
      </tr> 
	  <tr>
        <td>Data <span style="color: #FF0000; font-weight: bold;">*</span></td>
        <td><input type="text" value="<?php if(strlen($data > 1)) echo $data; ?>" name="data" id="data"></td>
      </tr> 
	  <tr>
        <td>Hora (Exemplo: 10:09:05)<span style="color: #FF0000; font-weight: bold;">*</span></td>
        <td><input type="text" value="<?php if(strlen($hora > 1)) echo $hora; ?>" name="hora" id="hora"></td>
      </tr> 
	  <tr>
        <td>Valor (Exemplo: 11,00) <span style="color: #FF0000; font-weight: bold;">*</span></td>
        <td><input type="text" value="<?php if(strlen($valor > 1)) echo $valor; ?>" name="valor_pst" id="valor_pst"></td>
      </tr> 
	  <tr>
        <td>N&uacute;mero <span style="color: #FF0000; font-weight: bold;">*</span></td>
        <td><input type="text" value="<?php if(strlen($numero > 1)) echo $numero; ?>" name="numero" id="numero"></td>
      </tr> 
</table>
<br />
<table>
<tr>
<td class="Titulo" colspan="2">Imagem do comprovante
</td>
<tr>
<td colspan="2">Selecione pelo menos uma foto do comprovante. A imagem deve ter qualidade ou ent&atilde;o o pagamento ser&aacute; recusado!</td>
</tr>
<tr>
	<td width="50%">Anexo 1</td>
	<td><input type="file" name="anexo1" id="anexo1"></td>
</tr>
<tr>
	<td>Anexo 2</td>
	<td><input type="file" name="anexo2" id="anexo2"></td>
</tr>
<tr>
	<td>Anexo 3</td>
	<td><input type="file" name="anexo3" id="anexo3"></td>
</tr>
</table>
<br>
<table>
<tr>
<td class="Titulo" colspan="2">Selecione onde ser&aacute; gasto sua doa&ccedil;&atilde;o
</td>
</tr>
	<tr>
        <td>Em que vou receber? <span style="color: #FF0000; font-weight: bold;">*</span></td>
		<td>
		<select id="receberem" name="receberem">
		<option value="0" selected></option>
		<option value="Receber tudo em Cash">Receber tudo em Cash</option>
		<option value="Receber em VIP (7 Dias) e resto em Cash">Receber em VIP (7 Dias) e resto em Cash (Se sobrar...)</option>
		<option value="Receber em VIP (30 Dias) e resto em Cash">Receber em VIP (30 Dias) e resto em Cash (Se sobrar...)</option>
		</select>
		</td>
	</tr>
</table>
<br />
<table>
<tr>
<td class="Titulo" colspan="2">Detalhes
</td>
</tr>
      <tr>
        <td>
		&nbsp;&nbsp;Comente somente se precisar informar algo.<br />
		<textarea id="comentario" name="comentario" style="max-width: 480px; color: #9d9b93; font-size: 12px; width: 99%; height: 150px; border: 1px solid #565454; background-color: #f2f2f2; border-spacing: 0px; padding: 0px;"><?php echo $comentario; ?></textarea></td>
      </tr>
</table>
<br />
<table><tr><td><input type="submit" name="Submit" value="Enviar"/></td></tr></table>
</form>