<?php
	require_once("../config/masterconfig.php");
	require_once("../painel/accinfo.php");
?>
<div>
<p><b>Minha conta - <a href="javascript:void(0)" onclick="carregar('painel/sair.php','Centro','GET');">Deslogar</a></b></p>
<?php
	if($Ativar_Cash == 1) echo "<p id=\"cInfo\">$StringBonus: <b>$cashs</b>";
	if($Mostrar_Valor_Real == 1) echo " - <b id=\"MenuLCash\"></b></p>";
	if($Ativar_Gold == 1) echo "<p id=\"gInfo\">$StringGolds: <b>$golds</b></p>";
?>
<p><b>Links R&aacute;pidos</b></p>
<p><a href="<?php echo $bonificar; ?>" rel="external">Comprar <?php echo $StringBonus; ?></a></p>
<p><a href="javascript:void(0)" onclick="carregar('painel/bau.php','Centro','GET');">Ver meu ba&uacute;</a></p>
</div>
<div>
<b>Set"s</b>
<p><a href="javascript:void(0)" onclick="carregar('painel/itens.php?tipo=elmos','Centro','GET');">Elmos</a></p>
<p><a href="javascript:void(0)" onclick="carregar('painel/itens.php?tipo=armaduras','Centro','GET');">Armaduras</a></p>
<p><a href="javascript:void(0)" onclick="carregar('painel/itens.php?tipo=calcas','Centro','GET');">Calças</a></p>
<p><a href="javascript:void(0)" onclick="carregar('painel/itens.php?tipo=luvas','Centro','GET');">Luvas</a></p>
<p><a href="javascript:void(0)" onclick="carregar('painel/itens.php?tipo=botas','Centro','GET');">Botas</a></p>
</div>
<div>
<b>Armas e Escudos</b>
<p><a href="javascript:void(0)" onclick="carregar('painel/itens.php?tipo=espadas','Centro','GET');">Espadas</a></p>
<p><a href="javascript:void(0)" onclick="carregar('painel/itens.php?tipo=axes','Centro','GET');">Axes</a></p>
<p><a href="javascript:void(0)" onclick="carregar('painel/itens.php?tipo=spears','Centro','GET');">Spears</a></p>
<p><a href="javascript:void(0)" onclick="carregar('painel/itens.php?tipo=staffs','Centro','GET');">Staffs</a></p>
<p><a href="javascript:void(0)" onclick="carregar('painel/itens.php?tipo=maces','Centro','GET');">Maces</a></p>
<p><a href="javascript:void(0)" onclick="carregar('painel/itens.php?tipo=scepters','Centro','GET');">Scepters</a></p>
<p><a href="javascript:void(0)" onclick="carregar('painel/itens.php?tipo=arcos','Centro','GET');">Arcos</a></p>
<p><a href="javascript:void(0)" onclick="carregar('painel/itens.php?tipo=escudos','Centro','GET');">Escudos</a></p>
</div>
<div>
<b>Outros Itens</b>
<p><a href="javascript:void(0)" onclick="carregar('painel/itens.php?tipo=asas','Centro','GET');">Asas</a></p>
<p><a href="javascript:void(0)" onclick="carregar('painel/itens.php?tipo=pets','Centro','GET');">Pets</a></p>
<p><a href="javascript:void(0)" onclick="carregar('painel/itens.php?tipo=colares','Centro','GET');">Colares</a></p>
<p><a href="javascript:void(0)" onclick="carregar('painel/itens.php?tipo=aneis','Centro','GET');">An&eacute;is</a></p>
</div>
<?php if($Mostrar_Valor_Real == 1) echo "<script type=\"text/javascript\">ConverterValorCash('$cashs', 'MenuLCash');</script>"; ?>