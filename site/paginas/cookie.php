<?php
if(empty($_GET['f'])) die("");

switch($_GET['f'])
{
	case 0: // - Deslogar
		setcookie("Marcao_Web_Login", "");
		setcookie("Marcao_Web_Senha", "");
	break;
	case 1: // - Logar
		$login = $_GET['login'];
		$senha = $_GET['senha'];
		if(strlen($login) < 4) die("Erro ao criar cookie de Login");
		if(strlen($senha) < 4) die("Erro ao criar cookie de Senha");
		setcookie("Marcao_Web_Login", "$login");
		setcookie("Marcao_Web_Senha", "$senha");
	break;
}
?>
<!--<script type="text/javascript">carregar('paginas/principal.php','Centro','GET');</script>-->