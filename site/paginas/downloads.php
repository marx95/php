<?php require_once("../config/masterconfig.php"); ?>
<table>
<tr>
	<td colspan="5">Download's</td>
</tr>
<tr>
	<td width="30%"><b>Arquivo</b></td>
	<td><b>Tamanho</b></td>
 	<td><b>Link 1</b></td>
	<td><b>Link 2</b></td>
	<td><b>Link 3</b></td>
</tr> 
<tr onmousemove="ToolMsg('Sem m&uacute;sicas e efeitos sonoros');">
	<td>Cliente Compacto</td>
	<td><?php echo $peso_cliente; ?></td>
	<td><?php if(strlen($cliente_1) > 0) echo "<a href=\"$cliente_1\" rel=\"external\"><img src=\"img/download.png\" /></a>"; ?></td>
	<td><?php if(strlen($cliente_2) > 0) echo "<a href=\"$cliente_2\" rel=\"external\"><img src=\"img/download.png\" /></a>"; ?></td>
	<td><?php if(strlen($cliente_3) > 0) echo "<a href=\"$cliente_3\" rel=\"external\"><img src=\"img/download.png\" /></a>"; ?></td>
</tr><?php /*
<tr>
	<td>Cliente Completo</td>
	<td><?php echo $peso_cliente_full; ?></td>
	<td><?php if(strlen($cliente_full_1) > 0) echo "<a href=\"$cliente_full_1\" rel=\"external\"><img src=\"img/download.png\" /></a>"; ?></td>
	<td><?php if(strlen($cliente_full_2) > 0) echo "<a href=\"$cliente_full_2\" rel=\"external\"><img src=\"img/download.png\" /></a>"; ?></td>
	<td><?php if(strlen($cliente_full_3) > 0) echo "<a href=\"$cliente_full_3\" rel=\"external\"><img src=\"img/download.png\" /></a>"; ?></td>
</tr> */ ?>
<tr onmousemove="ToolMsg('Para quem possui um Cliente 99B, 99Z ou 1.0H!');">
	<td>Patch</td>
	<td><?php echo $peso_patch; ?></td>
	<td><?php if(strlen($patch_1) > 0) echo "<a href=\"$patch_1\" rel=\"external\"><img src=\"img/download.png\" /></a>"; ?></td>
	<td><?php if(strlen($patch_2) > 0) echo "<a href=\"$patch_2\" rel=\"external\"><img src=\"img/download.png\" /></a>"; ?></td>
	<td><?php if(strlen($patch_3) > 0) echo "<a href=\"$patch_3\" rel=\"external\"><img src=\"img/download.png\" /></a>"; ?></td>
</tr>
<tr onmousemove="ToolMsg('M&uacute;sicas e Sons para o Cliente sem som.');">
	<td>Sons e M&uacute;sicas</td>
	<td><?php echo $peso_sonsmusicas; ?></td>
	<td><?php if(strlen($sonsmusicas_1) > 0) echo "<a href=\"$sonsmusicas_1\" rel=\"external\"><img src=\"img/download.png\"/></a>"; ?></td>
	<td><?php if(strlen($sonsmusicas_2) > 0) echo "<a href=\"$sonsmusicas_2\" rel=\"external\"><img src=\"img/download.png\" /></a>"; ?></td>
	<td><?php if(strlen($sonsmusicas_3) > 0) echo "<a href=\"$sonsmusicas_3\" rel=\"external\"><img src=\"img/download.png\" /></a>"; ?></td>
</tr> 
</table>