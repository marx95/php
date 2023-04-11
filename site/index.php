<?php
	require_once("config/masterconfig.php");
	
	if($_GET['FacePop'] == 1) { setcookie("FacePop", "true"); die(); }
	if($_GET['f'] == 2) // - Enviar Email
	{
		$para 	= base64_decode($_GET['para']);
		$titulo	= base64_decode($_GET['titulo']);
		$corpo	= base64_decode($_GET['corpo']);
		EnviarEMail($para, $titulo, $corpo);
		die("Sucesso");
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $titulo; ?></title>
<meta name="description" content="<?php echo $meta_desc; ?>" />
<meta name="keywords" content="<?php echo $meta_keywords; ?>" />
<link rel="shortcut icon" href="img/site.ico" type="image/x-icon" />
<link rel="stylesheet" href="css/fontes.css" type="text/css" />
<link rel="stylesheet" href="css/site.css" type="text/css" />
<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="funcs.js"></script>
</head>
<body onLoad="setInterval('ReloadSite()', 120000); <?php echo $func_padrao; ?>" onmouseover="ToolMsg('');">
<div id="Cookie">
	<span id="Funcs">&nbsp;</span>
	<span id="PaginasGeral">&nbsp;</span>
	<span id="PainelPlayer">&nbsp;</span>
	<span id="PainelGM">&nbsp;</span>
	<span id="PainelSUB">&nbsp;</span>
	<span id="PainelADM">&nbsp;</span>
</div>
<div id="Preload">
	<img src="img/mu_logo.png" />
	<img src="img/loading.gif" />
	<img src="img/vip_0.gif" />
	<img src="img/vip_1.gif" />
	<img src="img/download.png" />
	<img src="img/no.png" />
	<img src="img/ok.png" />
	<img src="img/avatar/avatar.png" />
    <img src="img/menu_topo_sub_bg.png" />
    <img src="img/menu_topo_sub_bg2.png" />
</div>
<div id="Menu_Topo">
	<div>
		<div id="Menu_Topo_BT" style="border-left:1px dotted #333;" onClick="carregar('paginas/principal.php','Centro','GET')">Principal</div>
    	<div id="Menu_Topo_BT" onClick="carregar('paginas/novaconta.php','Centro','GET')">Cadastro</div>
    	<div id="Menu_Topo_BT" onClick="carregar('paginas/downloads.php','Centro','GET')">Downloads</div>
    	<div id="Menu_Topo_BT" onClick="carregar('paginas/infos.php','Centro','GET')">Informações</div>
    	<div id="Menu_Topo_BT" onMouseOver="Mostra('Sub_Ranking')" onMouseOut="Oculta('Sub_Ranking')" onMouseMove="ToolMsg('Ranking atualizado a cada 30 Minutos!')">
        Ranking's
        <ul id="Sub_Ranking" style="visibility: hidden;">
			<li onclick="carregar('cache/ranking/top_resets.html','Centro','GET');">Top Resets</li>
			<li onclick="carregar('cache/ranking/top_diario.html','Centro','GET')">Top Diário</li>
			<li onclick="carregar('cache/ranking/top_semanal.html','Centro','GET')">Top Semanal</li>
			<li onclick="carregar('cache/ranking/top_mensal.html','Centro','GET')">Top Mensal</li>
			<li onclick="carregar('cache/ranking/top_guild.html','Centro','GET')">Top Guild</li>
			<li onclick="carregar('cache/ranking/top_pk.html','Centro','GET')">Top PVP</li>
			<li onclick="carregar('cache/ranking/top_mrs.html','Centro','GET')">Top MR's</li>
		</ul>
        </div>
    	<div id="Menu_Topo_BT" onMouseOver="Mostra('Sub_VipECash')" onMouseOut="Oculta('Sub_VipECash')">
        Vip & Cash
        <ul id="Sub_VipECash" style="visibility: hidden;">
			<li onclick="carregar('paginas/vantagens.php','Centro','GET');">Vantagens VIP</li>
			<li><a href="depositos/dados.html" rel="external" target="_blank">Como Comprar</a></li>
            <li><a href="depositos/dados.html" rel="external" target="_blank">Tabela Cash's</a></li>
			<li><a href="depositos/confirmar.php" rel="external" target="_blank">Confirmar Pagamento</a></li>
	 	</ul>
        </div>
    	<div id="Menu_Topo_BT" onClick="carregar('paginas/webshop.php','Centro','GET');">Webshop</div>
    </div>
</div>
<div id="Banner">&nbsp;</div>
	<div id="Corpo">
		<div id="Lateral">
   			<table id="Painel" onKeyPress="javascript:if (event.keyCode == 13) PainelLogin();">
			<tr>
				<td>Painel de Controle</td>
			</tr>
			<tr>
				<td><center>Carregando...</center></td>
			</tr>
			</table>
			<table id="Lateral_Infos">
			<tr>
				<td>Informa&ccedil;&otilde;es</td>
			</tr>
			<tr>
				<td><center>Carregando...</center></td>
			</tr>
			</table>
			<table id="GMOnline">
			<tr>
				<td>Equipe do <?php echo $nome; ?></td>
			</tr>
			<tr>
				<td><center>Carregando...</center></td>
			</tr>
			</table>
    	</div>
    	<div id="Centro"></div>
	</div>
</div><!-- fim div banner -->
<div id="Rodape"><?php echo $rodape; ?> <span id="Acessos">Carregando...</span></div>
<script type="text/javascript">carregar('config/acessos.php','Acessos','GET');</script>
<div id="ToolTip">&nbsp;</div>
<?php 	if($_COOKIE['FacePop'] == "true") echo "<!--"; ?>
<div id="PopFace">
	<h1>Curta o <?php echo $nome; ?> no Facebook - <span style="cursor:pointer; color:#FF3300" onclick="FecharFacePop();">[x]</span></h1>
	<iframe src="http://www.facebook.com/plugins/likebox.php?href=http://www.facebook.com/muoveroficial&width=500&height=258&show_faces=true&colorscheme=light&stream=false&show_border=false&header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:250px;" allowTransparency="true"></iframe>
</div>
<?php 	if($_COOKIE['FacePop'] == "true") echo "-->"; ?>
</body>
</html>
<?php require_once("config/unset.php"); ?>