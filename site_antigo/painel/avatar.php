<?php 
	require_once("../config/masterconfig.php");
	$estilo = $_COOKIE['Estilo'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Mudar Foto de <?php echo $_GET['personagem']; ?></title>
<link rel="stylesheet" href="../<?php echo $estilo; ?>.css" type="text/css" />
<style type="text/css">
<!--
body {
	margin: 5px;
}
-->
</style></head>
<body>
<div class="Centro">
<center>
<?php
	require_once("../config/conexao_mssql.php");
	$login = $_GET["login"];
	$senha_md5 = $_GET['senha'];
	$personagem = $_GET['personagem'];

	$v_senha = mssql_fetch_row(mssql_query("SELECT memb__pwd FROM [$db_mssql].[dbo].[Memb_Info] WHERE memb___id='$login'"));
	if(md5($v_senha[0]) != $senha_md5) die("Função Invalida!");
	
	$p_existe = mssql_num_rows(mssql_query("SELECT Name FROM [$db_mssql].[dbo].[Character] WHERE Name='$personagem' AND AccountID='$login'"));
	
	if($p_existe == 0) die("Personagem inexistente!");
	
	if($_GET['func'] == 1)
	{
		$descri	= $_POST['desc'];
		$arquivo = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
		$config["tamanho"] = 500000;
		$config["largura"] = 200;
		$config["altura"]  = 200;
		$tamanhos = getimagesize($arquivo["tmp_name"]);
		
		if(strlen($descri) > 50)
		{
			die("Descrição do Avatar com mais de 50 Dígitos! <br /><a href='avatar.php?personagem=$personagem&login=$login&senha=$senha_md5' style='color: #FF0000'>Tentar novamente!</a>");
		}
		
		if($arquivo)
		{ 
    	// Verifica se o mime-type do arquivo é de imagem
   		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $arquivo["type"]))
		{
			die("Arquivo em formato inválido! A imagem deve ser jpg, jpeg, bmp, gif ou png. Envie outro arquivo! <br /><a href='avatar.php?personagem=$personagem&login=$login&senha=$senha_md5' style='color: #FF0000'>Tentar novamente!</a>");
		}

		if($arquivo["size"] > $config["tamanho"])
		{
			die("Muito Grande, deve ser menor que " . $config["tamanho"] . " bytes <br /><a href='avatar.php?personagem=$personagem&login=$login&senha=$senha_md5' style='color: #FF0000'>Tentar novamente!</a>");
		}
		
		if($tamanhos[0] > $config["largura"])
        {
            die("Largura da imagem não deve ultrapassar " . $config["largura"] . " pixels <br /><a href='avatar.php?personagem=$personagem&login=$login&senha=$senha_md5' style='color: #FF0000'>Tentar novamente!</a>");
        }
		
		if($tamanhos[1] > $config["altura"])
        {
            die("Altura da imagem não deve ultrapassar " . $config["largura"] . " pixels <br /><a href='avatar.php?personagem=$personagem&login=$login&senha=$senha_md5' style='color: #FF0000'>Tentar novamente!</a>");
        }
		
		preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);
		$nome_img = md5($nome . date("d/m/y H:i:s")) . ".png";
        $imagem_dir = "../img/avatar/" . $nome_img;
		
		//Deleta antiga imagem
		$del_img = mssql_fetch_row(mssql_query("SELECT avatarlink FROM [$db_mssql].[dbo].[Character] WHERE Name='$personagem' AND AccountID='$login'"));
		
		if($del_img[0] != "avatar.png") unlink("../img/avatar/". $del_img[0]);
		
        // Faz o upload da imagem
        move_uploaded_file($arquivo["tmp_name"], $imagem_dir);
		mssql_query("update [$db_mssql].[dbo].[Character] set avatarlink='$nome_img', avatarcoment = '$descri' where name='$personagem' AND AccountID='$login'");
		
		die("
		<center>
		Avatar trocado com sucesso!
		<br />
		<a href='javascript:this.close()'>Concluir / Fechar</a>
		</center>
		");
		}
	}
?>
<form method="post" action="?func=1&personagem=<?php echo $personagem; ?>&login=<?php echo $login; ?>&senha=<?php echo $senha_md5; ?>" enctype="multipart/form-data">
<table>
<tr><td colspan='2'>Mudar o Avatar do personagem: <?php echo $personagem; ?></td></tr>
<tr>
<td width="50%">Dimens&otilde;es M&aacute;ximas:</td>
<td>200x200</td>
</tr>
<tr>
<td>Tamanho M&aacute;ximo:</td>
<td>500kb</td>
</tr>
<tr>
<td>Selecione a Imagem</td>
<td><input type="file" name="foto" id="foto" style="width: 95%"></td>
</tr>
<tr>
<td width="50%">Descri&ccedil;&atilde;o</td>
<td><input type="text" name="desc" id="desc" maxlength="50" style="width: 95%"></td>
</tr>
<tr>
<td colspan="2"><input type="submit" value="Trocar"></td>
</tr>
</table>
</form>
</center>
</div>
</body>
</html>