<?php
	header("Content-Type: text/html; charset=ISO-8859-1");
	//die("Código do item: <br /> " . $_GET['c']);
	if($_GET['tipo'] == 0) $atualizar = "cInfo";
	if($_GET['tipo'] == 1) $atualizar = "gInfo";
?>
<div id="Sucesso">
<p><b>O item foi comprado com sucesso!</b></p>
<p>O item comprado, <a href="painel/bau.php"><b>clique aqui</b></a> e veja seu ba&uacute; online! </p>
</div>
<script type="text/javascript">carregar('painel/atualizador.php?id=<?php echo $_GET['tipo']; ?>','<?php echo $atualizar; ?>','GET');</script>