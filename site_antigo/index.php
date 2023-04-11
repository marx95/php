<?php
	require_once("config/masterconfig.php");
	setcookie("FacePop", "true");
	
	// - Sistema de Template
	$estilo = $_COOKIE['Estilo'];
	
	if(strlen($estilo) < 4)
	{
		$estilo = $estilo_padrao;
		setcookie("Estilo", $estilo);
	}
	
	if($_GET['f'] == 1)
	{
		setcookie("Estilo", $_GET['Estilo']);
		die("");
	}
	
	// - Preparação para o Domínio UolHost Lixo
	$query_url		= $_SERVER['QUERY_STRING'];
	$pag			= $_GET['pag'];
	$liberado		= 0;

	if(strpos($pag, ".php"))		$liberado = 1;
	if(strpos($pag, ".html"))		$liberado = 1;
	//if($pag == "index.php")			$liberado = 0;

	if(strlen($pag) < 4 || strlen($query_url) < 4 || $liberado == 0)
	{
		$func_padrao	= "carregar('paginas/principal.php','Centro','GET');";
	}else
	{
		$query_url		= "?" . $query_url;
		$query_url		= str_replace("%2F", "/", $query_url);
		$query_url		= str_replace("%3A", ":", $query_url);
		$query_url		= str_replace("%3F", "?", $query_url);
		$query_url		= str_replace("%3D", "=", $query_url);
		$query_url		= str_replace("%26", "&", $query_url);
		$query_url		= str_replace("+", " ", $query_url);
	
		$pag_url		= str_replace("?pag=", "", $query_url);
		$pag_url		= str_replace($pag . "&", $pag . "?", $pag_url);
		$func_padrao	= "carregar('$pag_url','Centro','GET');";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo $meta_desc; ?>" />
<meta name="keywords" content="<?php echo $meta_keywords; ?>" />
<link rel="shortcut icon" href="img/site.ico" type="image/x-icon" />
<link rel="stylesheet" href="<?php echo $estilo; ?>.css" type="text/css" id="Estilo" />
<script type="text/javascript">var AjaxIMG = "ajax_<?php echo $estilo; ?>.gif";</script>
<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="funcs.js"></script>
<title><?php echo $titulo; ?></title>
</head>
<body onLoad="setInterval('ReloadSite()', 120000); <?php echo $func_padrao; ?>" onmouseover="ToolMsg('');">
<div id="Cookie">
	<span id="EstiloCookie">&nbsp;</span>
	<span id="PaginasGeral">&nbsp;</span>
	<span id="PainelPlayer">&nbsp;</span>
	<span id="PainelGM">&nbsp;</span>
	<span id="PainelSUB">&nbsp;</span>
	<span id="PainelADM">&nbsp;</span>
</div>
<div id="Preload">
	<img src="img/mu_logo.png" />
	<img src="img/ajax_escuro.gif" />
	<img src="img/ajax_claro.gif" />
	<img src="img/vip_0.gif" />
	<img src="img/vip_1.gif" />
	<img src="img/download.png" />
	<img src="img/no.png" />
	<img src="img/ok.png" />
	<img src="img/avatar/avatar.png" />
</div>
<div id="Banner">
	<div>
		<select id="Template" onChange="MudarTemplate('<?php echo $estilo_id; ?>')">
			<option value="claro" <?php if($estilo == "claro") echo "selected"; ?>>Template Claro</option>
			<option value="escuro" <?php if($estilo == "escuro") echo "selected"; ?>>Template Escuro</option>
		</select>
	</div>
</div>
<div id="Caixa">
	<table id="Menu">
	<tr>
		<td onClick="carregar('paginas/principal.php','Centro','GET')">Principal</td>
		<td onClick="carregar('paginas/novaconta.php','Centro','GET')">Cadastro</td>
		<td onClick="carregar('paginas/downloads.php','Centro','GET')">Downloads</td>
		<td onClick="carregar('paginas/infos.php','Centro','GET')">Informa&ccedil;&otilde;es</td>
		<td onMouseOver="Mostra('Sub_Ranking')" onMouseOut="Oculta('Sub_Ranking')" onMouseMove="ToolMsg('Ranking atualizado a cada 30 Minutos!')">
		Ranking
	  	<ul id="Sub_Ranking">
			<li onClick="carregar('cache/ranking/top_resets.html','Centro','GET');">Top Resets</li>
			<li onClick="carregar('cache/ranking/top_diario.html','Centro','GET')">Top Diário</li>
			<li onClick="carregar('cache/ranking/top_semanal.html','Centro','GET')">Top Semanal</li>
			<li onClick="carregar('cache/ranking/top_mensal.html','Centro','GET')">Top Mensal</li>
			<li onClick="carregar('cache/ranking/top_guild.html','Centro','GET')">Top Guild</li>
			<li onClick="carregar('cache/ranking/top_pk.html','Centro','GET')">Top PVP</li>
			<li onClick="carregar('cache/ranking/top_mrs.html','Centro','GET')">Top MR's</li>
		</ul>
		</td>
		<td onMouseOver="Mostra('Sub_VipECash')" onMouseOut="Oculta('Sub_VipECash')">
		VIP &amp; Cash
	 	<ul id="Sub_VipECash">
			<li onClick="carregar('paginas/vantagens.php','Centro','GET');">Vantagens VIP</li>
			<li><a href="depositos/dados.html" rel="external">Como Comprar</a></li>
            <li><a href="depositos/dados.html" rel="external">Tabela Cash's</a></li>
			<li><a href="depositos/confirmar.php" rel="external">Confirmar Pagamento</a></li>
	 	</ul>
		</td>
		<td onClick="carregar('paginas/webshop.php','Centro','GET');">Webshop</td>
	</tr>
	</table>
	<table id="Corpo">
	<tr>
		<td valign="top">
			<div id="Lateral">
				<table id="Painel" onKeyPress="javascript:if (event.keyCode == 13) PainelLogin();">
				<tr>
					<td>Painel de Controle</td>
				</tr>
				<tr>
					<td><center>Carregando...</center></td>
				</tr>
				</table>
				<div id="Espaco"></div>
				<table id="Lateral_Infos">
				<tr>
					<td>Informa&ccedil;&otilde;es</td>
				</tr>
				<tr>
					<td><center>Carregando...</center></td>
				</tr>
				</table>
				<div id="Espaco"></div>
				<table id="GMOnline">
				<tr>
					<td>Equipe do <?php echo $nome; ?></td>
				</tr>
				<tr>
					<td><center>Carregando...</center></td>
				</tr>
				</table>
			</div>
		</td>
		<td valign="top" width="100%">
			<div id="Centro" class="Centro">
				<div style="margin: 0px auto; width: 56px; height: 24px;"><img src="img/ajax_<?php echo $estilo; ?>.gif" /></div>
			</div>
		</td>
		<td valign="top">
			<div id="Lateral">
				<table id="ReiPVP">
				<tr>
					<td>Rei do PVP</td>
				</tr>
				<tr>
					<td><center>Carregando...</center></td>
				</tr>
				</table>
				<div id="Espaco"></div>
				<table id="TopDiario">
				<tr>
					<td>Top 10 Di&aacute;rio</td>
				</tr>
				<tr>
					<td><center>Carregando...</center></td>
				</tr>
				</table>
				<div id="Espaco"></div>
				<table id="TopGeral">
				<tr>
					<td>Top 10</td>
				</tr>
				<tr>
					<td><center>Carregando...</center></td>
				</tr>
				</table>
			</div>
		</td>
	</tr>
	</table>
</div>
<div id="Rodape"><?php echo $rodape; ?> <span id="Acessos">Carregando...</span></div>
<script type="text/javascript">carregar('config/acessos.php','Acessos','GET');</script>
<div id="ToolTip">&nbsp;</div>
<?php 	if($_COOKIE['FacePop'] == "true") echo "<!--"; ?>
<div id="PopFace">
	<h1>Curta o <?php echo $nome; ?> no Facebook - <span style="cursor:pointer; color:#FF3300" onclick="FecharFacePop();">[x]</span></h1>
	<iframe src="http://www.facebook.com/plugins/likebox.php?href=http://www.facebook.com/munovus&width=500&height=258&show_faces=true&colorscheme=light&stream=false&show_border=false&header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:250px;" allowTransparency="true"></iframe>
</div>
<?php 	if($_COOKIE['FacePop'] == "true") echo "-->"; ?>
</body>
</html>
<?php require_once("config/unset.php"); ?>