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
<meta name="description" content="<?php echo $meta_desc; ?>" />
<meta name="keywords" content="<?php echo $meta_keywords; ?>" />
<link rel="shortcut icon" href="img/site.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $titulo; ?></title>
<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="funcs.js"></script>
<style type="text/css">
	@import url("css/fonts.css");
	@import url("css/geral.css");
</style>
</head>

<body onload="<?php echo $func_padrao; ?>" onmouseover="ToolMsg('');">
<div id="BarraTop">
	<div id="Struct_Barra">
    	<div id="Menu_Barra" style="border-right:1px dotted #333333; border-left:1px dotted #333333;" onClick="carregar('paginas/principal.php','Centro','GET')">Home</div>
        <div id="Menu_Barra" style="border-right:1px dotted #333333;" onClick="carregar('paginas/novaconta.php','Centro','GET')">Cadastro</div>
        <div id="Menu_Barra" style="border-right:1px dotted #333333;" onClick="carregar('paginas/downloads.php','Centro','GET')">Donwloads</div>
        <div id="Menu_Barra" style="border-right:1px dotted #333333;" onClick="carregar('paginas/infos.php','Centro','GET')">Informações</div>
        <div id="Menu_Barra" style="border-right:1px dotted #333333;">Ranking</div>
        <div id="Menu_Barra" style="border-right:1px dotted #333333;">Vip & Cash</div>
        <div id="Menu_Barra" style="border-right:1px dotted #333333;" onClick="carregar('paginas/webshop.php','Centro','GET');">Webshop</div>
    </div>
</div>

<div id="Struct_All">
		<div id="Struct_Left">
        	<div id="Menu_Top">Painel de Controle</div>
            <div id="Menu_Main"></div>
            <div id="Menu_Bottom"></div>
            
            <div id="Menu_Top">Informações</div>
            <div id="Menu_Main">
              <table width="100%" align="center" id="Lateral_Infos">
                <tbody>
                  <tr>
                    <td width="50%"><strong>Versão:</strong></td>
                    <td>99Z</td>
                  </tr>
                  <tr>
                    <td><strong>Exp:</strong></td>
                    <td>10.000x</td>
                  </tr>
                  <tr>
                    <td><strong>Bug-Bless:</strong></td>
                    <td>Ligado</td>
                  </tr>
                  <tr>
                    <td><strong>Drop:</strong></td>
                    <td>80%</td>
                  </tr>
                  <tr>
                    <td><strong>Tipo Reset:</strong></td>
                    <td>Acumulativo</td>
                  </tr>
                  <tr>
                    <td><strong>Level Máximo:</strong></td>
                    <td>400</td>
                  </tr>
                  <tr onclick="carregar('paginas/jogadores_online.php','Centro','GET');">
                    <td><strong>Jogando:</strong></td>
                    <td><span id="UsersOnline">0</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div id="Menu_Bottom"></div>
            
            <div id="Menu_Top">Equipe</div>
			<div id="Menu_Main"></div>
			<div id="Menu_Bottom"></div>
        </div>
        
        <div id="Struct_Right">
        	<div id="Centro"></div>
        </div>
</div>
<div id="Rodape"><?php echo $rodape; ?> <span id="Acessos">Carregando...</span></div>
<script type="text/javascript">carregar('config/acessos.php','Acessos','GET');</script>
<div id="ToolTip">&nbsp;</div>
</body>
</html>
