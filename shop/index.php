<?php require_once("config/masterconfig.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Webshop - Servidor <?php echo $nome; ?> - Compra segura de Itens!" />
<meta name="keywords" content="webshop, <?php echo $nome; ?>, bonus, shop, servidor, muonline, loja, webloja, mu, webzen" />
<link rel="stylesheet" href="shop.css" type="text/css" />
<link rel="shortcut icon" href="img/shop.ico" type="image/x-icon" />
<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="funcs.js"></script>
<title><?php echo $titulo; ?></title>
</head>
<body onmouseover="ToolMsg('');">
<div class="Preload">
	<img src="img/b_cima.jpg" />
	<img src="img/b_baixo.jpg" />
	<img src="img/bau_1.jpg" />
	<img src="img/bau_2.jpg" />
	<img src="img/bau_3.jpg" />
	<img src="img/bau_4.jpg" />
	<img src="img/itens/fundo/Clean.gif" />
	<img src="img/itens/fundo/32x32.gif" />
	<img src="img/itens/fundo/64x64.gif" />
</div>
<div class="banner">
	<div>
	<a href="javascript:void(0)" onclick="carregar('paginas/principal.php','Centro','GET')">
	<img src="img/2.png" />
	<img src="img/3.png" />
	</a>
	</div>
</div>
<div class="corpo">
	<div id="Menu"></div>
	<div id="Centro"></div>
	<div class="rodape"><?php echo "$rodape"; ?>&nbsp;&nbsp;&nbsp;&nbsp;</div>
</div>
<div id="ToolTip">&nbsp;</div>
</body>
</html>
<?php require_once("config/unset.php"); ?>