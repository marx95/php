<?php require_once("../config/masterconfig.php"); ?>
<div>
<p><b>Minha conta - <a href="javascript:void(0)" onclick="carregar('painel/sair.php','Centro','GET');">Deslogar</a></b></p>
<p><b>Aten&ccedil;&atilde;o, falta resets</b>!</p>
<p>Para acessar, &eacute; necess&aacute;rio:</p>
<p><b><?php echo $resets_minimos; ?> Reset's.</b></p>
<p><b><a href="javascript:void(0)" onclick="carregar('painel/login.php','Menu','GET');">Atualizar</a></b></p>
</div>