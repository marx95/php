<?php 
require_once("../config/masterconfig.php");
$ip				= $_SERVER['REMOTE_ADDR'];

if($_GET['func'] == 1)
{	
	require_once("../config/conexao_mssql.php");
	
	if(mssql_num_rows(mssql_query("SELECT ID FROM [$db_mssql].[dbo].[IP_Cache] WHERE ip='$ip'")) > $limite_registros_p_dia) die("<center><span id='Falha'>Limite de $limite_registros_p_dia registro(s) por dia!</span></center>");
	
	$login			= $_POST['login_cadastro'];
	$senha			= $_POST['senha_cadastro'];
	$resenha		= $_POST['resenha_cadastro'];
	$email			= $_POST['email'];
	$cnome			= $_POST['cnome'];
	$captchaSv		= strtoupper($_POST['CaptchaCheck']);
	$captcha		= strtoupper($_POST['captcha']);
	$Set_Premio		= $_POST['set_premio'];
	$onde_conheceu	= $_POST['onde_conheceu'];
	
	if($captchaSv != $captcha)	die("<span id='Falha'>C&oacute;digo de verifica&ccedil;&atilde;o inval&iacute;do!</span>");
	if(empty($login))			die("<span id='Falha'>Login em branco!</span>");
	if(empty($senha))			die("<span id='Falha'>Senha em branco!</span>");
	if(empty($cnome))			die("<span id='Falha'>Nome em branco!</span>");
	if(empty($resenha))			die("<span id='Falha'>Resenha em branco!</span>");
	if(empty($email))			die("<span id='Falha'>Email em branco!</span>");
	if(empty($Set_Premio))		die("<span id='Falha'>Selecione o Pr&ecirc;mio do cadastro!</span>");
	if(strlen($login) < 4) 		die("<span id='Falha'>Login m&iacute;nimo 4 dígitos!</span>");
	if(strlen($senha) < 4)		die("<span id='Falha'>Senha m&iacute;nimo 4 dígitos!</span>");
	if(strlen($resenha) < 4)	die("<span id='Falha'>Resenha m&iacute;nimo 4 dígitos!</span>");
	if(strlen($email) < 10)		die("<span id='Falha'>Email m&iacute;nimo 10 dígitos!</span>");
	if($Set_Premio == 0)		die("<span id='Falha'>Selecione o Pr&ecirc;mio do cadastro!</span>");
	if($onde_conheceu == "0")		die("<span id='Falha'>Selecione onde conheceu o $nome!</span>");
	
	if(strpos($email, "@hotmail.com"))		$email_sucesso = 1;
	if(strpos($email, "@gmail.com"))		$email_sucesso = 1;
	if(strpos($email, "@facebook.com"))		$email_sucesso = 1;
	if(strpos($email, "@yahoo.com"))		$email_sucesso = 1;
	if(strpos($email, "@live.com"))			$email_sucesso = 1;
	if(strpos($email, "@munovus.net"))		$email_sucesso = 1;
	
	if($email_sucesso == 0) die("
	<span id='Falha'>Email inv&aacute;lido, disponivel apenas nos sequintes servidores:</span><br />
	<span id='Falha'>@Hotmail.com</span><br />
	<span id='Falha'>@GMail.com</span><br />
	<span id='Falha'>@Live.com</span><br />
	<span id='Falha'>@Yahoo.com</span><br />
	<span id='Falha'>@Facebook.com</span><br />
	<span id='Falha'>@" . $nome . ".net</span>");
	
	$query_e = mssql_num_rows(mssql_query("SELECT mail_addr FROM [$db_mssql].[dbo].[MEMB_INFO] WHERE mail_addr = '$email'"));
	$query_l = mssql_num_rows(mssql_query("SELECT memb___id FROM [$db_mssql].[dbo].[MEMB_INFO] WHERE memb___id = '$login'"));

	if($query_l == 1) die("<span id='Falha'>Login em uso!</span>");
	if($query_e == 1) die("<span id='Falha'>Email em uso!</span>");
	if($senha <> $resenha) die("<span id='Falha'>Senha e re-senha não são iguais!</span>");
	if($login == $senha) die("<span id='Falha'>Login e Senha não pode ser iguais!</span>");
	
	if($ativar_via_email == 0)
	{
		$email_confirmado 		= 1;
		$email_confirmado_dias 	= 0;
		$bloc_code 				= 0;
		$dias_ban 				= 0;
	}else
	{
		$email_confirmado 		= 0;
		$email_confirmado_dias 	= 4;
		$bloc_code 				= 1;
		$dias_ban 				= 555;
	}
	
	mssql_query("INSERT INTO [$db_mssql].[dbo].[Memb_Info](memb___id, mail_addr, ctl1_code, sno__numb, memb__pwd, memb_name, fpas_ques, fpas_answ, cashs, vip, creditos, golds, email_confirmado, email_confirmado_dias, bloc_code, dias_ban, Cad_Premio, onde_conheceu) VALUES('$login', '$email', '0','0', '$senha', '$cnome', '', '', '$bonusinicial', '$vip', '$dias', '$goldInicial', '$email_confirmado', '$email_confirmado_dias', '$bloc_code', '$dias_ban', '$Set_Premio', '$onde_conheceu')");
	
	if(!empty($_POST['indicador']))
	{
		$totalip = mssql_num_rows(mssql_query("SELECT IP FROM [$db_mssql].[dbo].[memb_stat] WHERE ip='$ip'"));
		if(totalip == 0)
		{
			$ind_id = $_POST['indicador'];
			$indicador = mssql_fetch_row(mssql_query("SELECT memb___id FROM [$db_mssql].[dbo].[memb_info] WHERE memb_guid='$ind_id'"));
			$ind_login = $indicador[0];
			mssql_query("INSERT INTO [$db_mssql].[dbo].[Indique_Site](login, indicou, ultimo, cashs_ganhos, resets_adicionados) VALUES('$ind_login', '$login', '0', '0', '0')");
		}
	}
	
	if($ativar_via_email == 0)
	{
		require_once("../config/cadastro_premio.php");
		
		$premio = $Set[$Set_Premio];
		mssql_query("INSERT INTO [$db_mssql].[dbo].[warehouse](AccountID, AccountID2, DbVersion, BauID, money, Items) VALUES('$login','$login','2','1','0', $premio)");
		mssql_query("INSERT INTO [$db_mssql].[dbo].[IP_Cache](ip) VALUES('$ip')");
		if($vi_curr_info == 1) mssql_query("INSERT INTO [$db_mssql].[dbo].[VI_CURR_INFO](ends_days, chek_code, used_time, memb___id, memb_name, memb_guid, sno__numb, Bill_Section, Bill_value, Bill_Hour, Surplus_Point, Surplus_Minute, Increase_Days )  VALUES ('2013', '1', '1234', '$login', '$cnome', 1, '7', '6', '3', '6', '6', '2012-00-00 00:00:00', '0' )");
		die("<script>carregar('$site_link/paginas/concluido.php?id=33','Centro','GET');</script>");
	}
	
	$mgid = mssql_fetch_row(mssql_query("SELECT memb_guid FROM [$db_mssql].[dbo].[Memb_Info] WHERE memb___id='$login'"));
	$memb_guid = $mgid[0];
	// - Email de registr
	$corpo_email = "
[Você se registrou no MuNovus]

PARA CONFIRMAR SUA CONTA, ENTRE NO LINK:
http://munovus.net/site/?pag=paginas/novaconta.php&func=2&confirmar=$memb_guid
[Você tem 2 dias para confirmar sua conta!]

Presenteado com:
$vantagens
---------------------------------
Login: $login
Senha: $senha
---------------------------------

IP usado no registro: $ip

[Nunca passe seus dados á ninguem, o MuNovus agradece!]
	";
	
	EnviarEMail($email, "Confirmar Conta - MuNovus", $corpo_email);
	die("<script>carregar('$site_link/paginas/concluido.php?id=1&mail=$email','Centro','GET');</script>");
}

if($_GET['func'] == 2) // - CONFIRMAR CONTA
{
	require_once("../config/conexao_mssql.php");
	require_once("../config/cadastro_premio.php");
	
	$confirmar = $_GET['confirmar'];
	$existe = mssql_num_rows(mssql_query("SELECT memb___id FROM [$db_mssql].[dbo].[Memb_Info] WHERE memb_guid='$confirmar'"));
	
	if($existe == 0) die("<span id='Falha'>Login inexistente!</span>");
	
	$verifica_lg = mssql_fetch_row(mssql_query("SELECT email_confirmado, memb___id, Cad_Premio FROM [$db_mssql].[dbo].[Memb_Info] WHERE memb_guid='$confirmar'"));
	
	$login = $verifica_lg[1];
	$premio = $Set[$verifica_lg[2]];
	if($verifica_lg[0] == 1) die("<span id='Falha'>Login já foi confirmado!</span>");
	
	mssql_query("UPDATE [$db_mssql].[dbo].[Memb_Info] SET bloc_code = 0, dias_ban = 0, email_confirmado = 1, email_confirmado_dias = 0 WHERE memb_guid='$confirmar'");
	mssql_query("INSERT INTO [$db_mssql].[dbo].[warehouse](AccountID, AccountID2, DbVersion, BauID, money, Items) VALUES('$login','$login','2','1','0', $premio)");
	mssql_query("INSERT INTO [$db_mssql].[dbo].[IP_Cache](ip) VALUES('$ip')");
	
	if($vi_curr_info == 1) mssql_query("INSERT INTO [$db_mssql].[dbo].[VI_CURR_INFO](ends_days, chek_code, used_time, memb___id, memb_name, memb_guid, sno__numb, Bill_Section, Bill_value, Bill_Hour, Surplus_Point, Surplus_Minute, Increase_Days )  VALUES ('2013', '1', '1234', '$login', '$cnome', 1, '7', '6', '3', '6', '6', '2012-00-00 00:00:00', '0' )");
	
	die("<script>carregar('$site_link/paginas/concluido.php?id=27','Centro','GET');</script>");
}

if($_GET['func'] == 3)
{
	require_once("../config/conexao_mssql.php");
	$login = $_GET['login'];
	
	$existe = mssql_num_rows(mssql_query("SELECT memb_guid FROM [$db_mssql].[dbo].[Memb_Info] WHERE memb___id='$login'"));
	
	if($existe == 0) die("<span id='Falha'>Login inexistente!</span>");
	
	$verifica_lg = mssql_fetch_row(mssql_query("SELECT email_confirmado, memb_guid, memb__pwd, mail_addr FROM [$db_mssql].[dbo].[Memb_Info] WHERE memb___id='$login'"));
	
	mssql_query("UPDATE [$db_mssql].[dbo].[Memb_Info] SET email_confirmado_dias=2 WHERE memb___id='$login'");
	
	if($verifica_lg[0] == 1) die("<span id='Falha'>Login já foi confirmado!</span>");
	$memb_guid	= $verifica_lg[1];
	$senha		= $verifica_lg[2];
	$email		= $verifica_lg[3];
	
	// - Email de registr
	$corpo_email = "
[Você se registrou no MuNovus]

PARA CONFIRMAR SUA CONTA, ENTRE NO LINK:
http://munovus.net/site/?pag=paginas/novaconta.php&func=2&confirmar=$memb_guid
[Você tem 2 dias para confirmar sua conta!]

Presenteado com:
$vantagens
---------------------------------
Login: $login
Senha: $senha
---------------------------------

IP usado no registro: $ip

[Nunca passe seus dados á ninguem, o MuNovus agradece!]
	";
	
	EnviarEMail($email, "Confirmar Conta - MuNovus", $corpo_email);
	die("<script>carregar('$site_link/paginas/concluido.php?id=28&mail=$email','Centro','GET');</script>");
}
?>
<form title="Resultado" method="post" action="<?php echo $site_link; ?>paginas/novaconta.php?func=1">
<?php
if(!empty($_GET['ind']))
{
	$indicador = $_GET['ind'];
}else
{
	$indicador = $_COOKIE['Marcao_Web_Indique'];
}

if(strlen($indicador) > 0)
{
	setcookie("Marcao_Web_Indique", "$indicador");
	echo "<input type=\"hidden\" name=\"indicador\" value=\"$indicador\" />";
}
?>
<table>
	<tr>
	<td colspan="2">Cadastro</td>
	</tr>
	  <tr>
        <td width="50%">Login - M&aacute;ximo 10 D&iacute;gitos </td>
        <td><input name="login_cadastro" type="text" id="login_cadastro" maxlength="10" style="text-transform: lowercase;" tabindex="1">
        </td>
      </tr>
	  <tr>
        <td>Senha - M&aacute;ximo 10 D&iacute;gitos </td>
        <td><input name="senha_cadastro" type="password" id="senha_cadastro" maxlength="10" style="text-transform: lowercase;" tabindex="2">
        </td>
      </tr>
	  <tr>
        <td>Re-Senha - M&aacute;ximo 10 D&iacute;gitos </td>
        <td><input name="resenha_cadastro" type="password" id="resenha_cadastro" maxlength="10" style="text-transform: lowercase;" tabindex="3">
        </td>
      </tr>
	  <tr>
        <td>Nome - M&aacute;ximo 20 D&iacute;gitos </td>
        <td>
          <input name="cnome" type="text" id="cnome" maxlength="20" style="text-transform: lowercase;" tabindex="4" />
        </td>
    </tr>
	  <tr>
        <td>Email - M&aacute;ximo 35 D&iacute;gitos </td>
        <td><input name="email" type="text" id="email" maxlength="40" style="text-transform: lowercase;" tabindex="5">
        </td>
      </tr>
      <tr>
      <td>Onde conheceu o <?php echo $nome; ?>?</td>
      <td>
      <select name="onde_conheceu" id="onde_conheceu">
        <option value="0" selected></option>
        <option value="Google">Google</option>
        <option value="Forums (RZ, ZG, WC, etc...)">Forums (RZ, ZG, WC, etc...)</option>
        <option value="Xats">Xats</option>
        <option value="Amigos">Amigos</option>
        <option value="LanHouse">LanHouse</option>
        <option value="Facebook">Facebook</option>
        <option value="Outros">Outros</option>
        </select>
        </td>
  </table>
  <table>
  <tr>
	<td colspan="3">Selecione o Pr&ecirc;mio do Cadastro</td>
	</tr>
    <tr>
    <td onmousemove="ToolMsg('Bronze Set +9 Semi-Full & Blade +13 Full')"><img src="img/dk.jpg" onclick="document.getElementById('set_premio').value = 1;" id="Img_BoxCad" /></td>
    <td onmousemove="ToolMsg('Sphinx Set +9 Semi-Full & Serpent Staff +13 Full')"><img src="img/dw.jpg" onclick="document.getElementById('set_premio').value = 2;" id="Img_BoxCad" /></td>
    <td onmousemove="ToolMsg('Silk Set +9 Semi-Full & Battle Bow +13 Full')"><img src="img/elf.jpg" onclick="document.getElementById('set_premio').value = 3;" id="Img_BoxCad" /></td>
    </tr>
    <tr>
    <td colspan="3">
    <p>
    <select name="set_premio" id="set_premio">
    	<option value="0" selected>Selecione...</option>
    	<option value="1">Bronze Set +9 Semi-Full & Blade +13 Full</option>
    	<option value="2">Sphinx Set +9 Semi-Full & Serpent Staff +13 Full</option>
    	<option value="3">Silk Set +9 Semi-Full & Battle Bow +13 Full</option>
    </select>
    </p>
    </tr>
    </table>
  <table>
  <tr>
	<td colspan="2">D&iacute;gite o c&oacute;digo de verifica&ccedil;&atilde;o</td>
	</tr>
  <?php
  	$cap[1]			= "a";
	$cap[2]			= "b";
	$cap[3]			= "c";
	$cap[4]			= "d";
	$cap[5]			= "e";
	$cap[6]			= "f";
	$cap[7]			= "g";
	$cap[8]			= "h";
	$cap[9]			= "l"; // < - i Trocado por L
	$cap[10]		= "j";
	$cap[11]		= "k";
	$cap[12]		= "l";
	$cap[13]		= "m";
	$cap[14]		= "n";
	$cap[15]		= "o";
	$cap[16]		= "p";
	$cap[17]		= "q";
	$cap[18]		= "r";
	$cap[19]		= "s";
	$cap[20]		= "t";
	$cap[21]		= "u";
	$cap[22]		= "v";
	$cap[23]		= "w";
	$cap[24]		= "x";
	$cap[25]		= "y";
	$cap[26]		= "z";
	
	$rnd1			= rand(1, 25);	
	$rnd2			= rand(1, 26);	
	$rnd3			= rand(1, 26);
	
	$captcha 		= strtoupper($cap[$rnd1] . "" . rand(0, 9) . $cap[$rnd2] . "" . rand(0, 9) . $cap[$rnd3] . rand(0, 9));
  ?>
    <tr>
	    <td width="50%">
			<input type="hidden" name="CaptchaCheck" value="<?php echo $captcha; ?>" title="" />
			<span style="font-weight:bold; letter-spacing: 1px; cursor:default;"><?php echo $captcha; ?></span></td>
	    <td>
	      <input name="captcha" type="text" id="captcha" maxlength="6" style="text-transform: uppercase;" tabindex="6" />
        </td>
    </tr>
  </table>
<h3><input type="submit" name="Submit" value="Cadastrar" tabindex="7"/></h3>
</form>
<span id="Resultado"></span>