<?php require_once("../config/masterconfig.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="../img/site.ico" type="image/x-icon" />
<title><?php echo $nome; ?> - Dados de Pagamento</title>
<style type="text/css">
<!--
* {
	outline: none;
}
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #666666;
}
body {
	background-color: #FFFFFF;
	margin-left: 10px;
	margin-top: 10px;
	margin-right: 10px;
	margin-bottom: 10px;
}
.Titulo {
	font-size: 16px;
	font-weight: bold;
	color: #666666;
	background-color: #f2f2f2;
	height: 35px;
	line-height: 35px;
	width: 100%;
	border-bottom: 1px solid #666666;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
	}
td {
	width: 50%;
	color: #666666;
	text-align: center;
	padding-top: 5px;
	padding-bottom: 5px;
}
table {
	border: 1px solid #666666;
	border-radius: 5px;
	color: #808080;
	
	width: 600px;
	padding: 0px;
	border-spacing: 0px;
	margin: 0px auto;
}
a:link {
	color: #666666;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #666666;
}
a:hover {
	text-decoration: none;
	color: #808080;
}
a:active {
	text-decoration: none;
	color: #666666;
}
a {
	font-weight: bold;
}
#Logo {
    color: #dcdcdc;
	font-size: 36px;
    text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
	'width: 800px;
	display: table;
	margin: 0px auto;
}
input {
	text-align: center;
}
input[type="text"] {
	border: 1px solid #666666;
	width: 135px;
	height: 15px;
}
input[type="text"]:hover {
	background-color: #f2f2f2;
	border: 1px solid #808080;
}
input[type="password"] {
	border: 1px solid #666666;
	width: 135px;
	height: 15px;
}
input[type="password"]:hover {
	background-color: #f2f2f2;
	border: 1px solid #808080;
}
input[type="submit"] {
	border-radius: 2px;
	border: 1px solid #666666;
	width: 135px;
	height: 25px;
	background-color: #f0f0f0;
	cursor: pointer;
}
input[type="submit"]:hover {
	background-color: #f2f2f2;
	border: 2px solid #808080;
}
#Falha {
	width: 100%;
	color: #FF0000;
	font-weight: bold;
	text-align: center;
}
-->
</style></head>

<body>
<div id="Logo"><?php echo $nome; ?> - Confirmar Pagamento </div>
<br />
<?php

if($_GET['f'] == 1)
{
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$erro = 0;
	if(empty($login)) $erro = "Preencha o Login!";
	if(empty($senha)) $erro = "Preencha a Senha!";
	if(strlen($login) < 4) $erro = "Login inv&aacute;lido!";
	if(strlen($senha) < 4) $erro = "Senha inv&aacute;lida!";
	
	if(strlen($erro) < 4)
	{
		require_once("../config/conexao_mssql.php");
		
		$verificar = mssql_num_rows(mssql_query("SELECT memb___id FROM [$db_mssql].[dbo].[memb_info] WHERE memb___id='$login' AND memb__pwd='$senha'"));
		
		if($verificar == 0) 
		{
			$erro = "Login ou Senha inv&aacute;lidos!";
		}else {
			$verificar_bloc = mssql_fetch_row(mssql_query("SELECT bloc_code FROM [$db_mssql].[dbo].[memb_info] WHERE memb___id='$login' AND memb__pwd='$senha'"));
			
			if($verificar_bloc[0] == 1)
			{
				$erro = "Conta bloqueada!";
			}else
			{
				die(require_once("pag_confirmar.php"));
			}
		}
	}
}

if($_GET['f'] == 2)
{
	$login		= $_GET['login'];
	$banco		= $_POST['banco'];
	$data		= $_POST['data'];
	$hora		= $_POST['hora'];
	$valor_pst	= str_replace(".", ",", $_POST['valor_pst']);
	$numero		= $_POST['numero'];
	$comentario	= $_POST['comentario'];
	$receber	= $_POST['receberem'];
	$total		= 0;
	$anexo1		= $_FILES["anexo1"];
	$anexo2		= $_FILES["anexo2"];
	$anexo3		= $_FILES["anexo3"];
	
	if(empty($data))	$erro = "Necess&aacute;rio preencher a Data do dep&oacute;sito!";
	if(empty($hora))	$erro = "Necess&aacute;rio preencher a Hora do dep&oacute;sito!";
	if(empty($valor_pst))	$erro = "Necess&aacute;rio preencher o Valor do dep&oacute;sito!";
	if(empty($numero))	$erro = "Necess&aacute;rio preencher o Numero do dep&oacute;sito!";
	if($receber == "0")	$erro = "Selecione no que ser&aacute; gasto sua doa&ccedil;&atilde;o!";
	if($banco == "0")	$erro = "Selecione o banco em que foi feito o dep&oacute;sito!";
	if(strlen($anexo1['tmp_name']) > 0)
	{
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $anexo1["type"])) $erro = "Imagem do Anexo 1 inv&aacute;lida!  A imagem deve ser jpg, jpeg, bmp, gif ou png.";
		
		$img_anexo1 = md5($login . date("d/m/y H:i:s") . "_anexo1") . ".png";
        $conf_dir = "../img/confirmacoes/" . $img_anexo1;
		
		 move_uploaded_file($anexo1["tmp_name"], $conf_dir);
		 $total++;
	}
	
	if(strlen($anexo2['tmp_name']) > 0)
	{
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $anexo2["type"])) $erro = "Imagem do Anexo 2 inv&aacute;lida!  A imagem deve ser jpg, jpeg, bmp, gif ou png.";
		
		$img_anexo2 = md5($login . date("d/m/y H:i:s") . "_anexo2") . ".png";
        $conf_dir = "../img/confirmacoes/" . $img_anexo2;
		
		 move_uploaded_file($anexo2["tmp_name"], $conf_dir);
		 $total++;
	}
	
	if(strlen($anexo3['tmp_name']) > 0)
	{
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $anexo3["type"])) $erro = "Imagem do Anexo 3 inv&aacute;lida!  A imagem deve ser jpg, jpeg, bmp, gif ou png.";
		
		$img_anexo3 = md5($login . date("d/m/y H:i:s") . "_anexo3") . ".png";
        $conf_dir = "../img/confirmacoes/" . $img_anexo3;
		
		 move_uploaded_file($anexo3["tmp_name"], $conf_dir);
		 $total++;
	}
	
	//if($total == 0) $erro = "Necessário anexar pelo menos 1 foto do comprovante, com boa qualidade e legível!";
	
	if(strlen($erro) < 4)
	{
		require_once("../config/masterconfig.php");
		require_once("../config/conexao_mssql.php");
		
		mssql_query("INSERT INTO [$db_mssql].[dbo].[Confirmacoes](login, banco, data, valor, hora, numero, comentario, receber, Anexo1, Anexo2, Anexo3) VALUES('$login', '$banco', '$data', '$valor_pst', '$hora', '$numero', '$comentario','$receber','$img_anexo1','$img_anexo2','$img_anexo3')");
		
		$corpo = "Foi realizado uma confirmação de pagamento no valor de R$" . $valor_pst . ". \n" . "Acesse o Painel de Controle para mais informações! \n\n" . "(Servidor $nome 2014)";
		EnviarEMail($email_adm, "Novo depósito - Servidor $nome!", $corpo);
		die("<center><b>Sucesso, seu pagamento ser&aacute; confirmado em at&eacute; 24Horas!</b></center>");
	}else {
		die(require_once("pag_confirmar.php"));
	}
}
?>
<form method="post" action="?f=1">
<table>
  <tr>
    <td colspan="2" class="Titulo">Logue-se antes de confirmar </td>
  </tr>
  <tr>
    <td>Login</td>
    <td><input type="text" name="login" id="login" value="" maxlength="11" /></td>
  </tr>
  <tr>
    <td>Senha</td>
    <td><input type="password" name="senha" id="senha" value="" maxlength="11" /></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" value="Logar" /></td>
  </tr>
  <?php
  	if(strlen($erro) > 4)
  	{
		echo "
	<tr>
    <td colspan='2'>$erro</td>
	</tr>
		";
  	}
  ?>
</table>
</form>
</body>
</html>
