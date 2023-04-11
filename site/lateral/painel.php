<?php 
require_once("../config/masterconfig.php");

 // - Função para deslogar do painel
if($_GET['f'] == 1)
{
	setcookie("Marcao_Web_Login", "");
	setcookie("Marcao_Web_Senha", "");
	$_COOKIE['Marcao_Web_Login'] = NULL;
	$_COOKIE['Marcao_Web_Senha'] = NULL;
}

// - Sistema de Cookie
if((strlen($_COOKIE['Marcao_Web_Login']) >= 4) && (strlen($_COOKIE['Marcao_Web_Senha']) >= 4))
{
	$login				= $_COOKIE['Marcao_Web_Login'];
	$senha				= $_COOKIE['Marcao_Web_Senha'];
}else
{
	$login				= $_GET['login'];
	$senha				= $_GET['senha'];
}

// - Verificaçao de login e senha
if(!empty($login) && !empty($senha) && $_GET['f'] != 1)
{		

	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	
	$verifica_conta = mssql_num_rows(mssql_query("SELECT memb___id FROM [$db_mssql].[dbo].[memb_info] WHERE memb___id='$login' AND memb__pwd='$senha'"));
	
	if($verifica_conta == 0){
		$erro = "Login ou Senha invalidos!";
	}else
	{
		setcookie("Marcao_Web_Login", "$login");
		setcookie("Marcao_Web_Senha", "$senha");
		
		$conta = mssql_fetch_row(mssql_query("SELECT vip, creditos, golds, cashs, bloc_code, dias_ban, motivo_ban, email_confirmado, mail_addr, memb_name FROM [$db_mssql].[dbo].[memb_info] WHERE memb___id='$login'"));
		
		$golds = $conta[2];
		$bonus = $conta[3];
		$nome_conta =  $conta[9];
		$email_confirmado = $conta[7];
		
		if($email_confirmado == 0)
		{
			die("
			<tr>
			<td colspan=\"2\">Painel de Controle</td>
			</tr>
			<tr>
				<td colspan='2'><center>Confirme a sua conta</center></td>
			</tr>
			<tr>
				<td colspan='2'><center><span><a href=javascript:void(0) onclick=\"carregar('paginas/novaconta.php?func=3&login=$login','Centro','GET');\"><b>Reenviar Confirmação</b></a></span></center></td>
			</tr>
			<tr>
				<td colspan='2'><span><a href=javascript:void(0) onclick='Deslogar()'><b>Deslogar</b></a></span></td>
			</tr>
			");
		}
		
		if($conta[4] == 1)
		{
			$dias_block = $conta[5];
			switch($dias_block)
			{
				case 1: $frase = "Você foi banido por $dias_block dia"; break;
				case 555: $frase = "Você foi banido <b>ETERNAMENTE</b>"; break;
				default: $frase = "Você foi banido por $dias_block dias"; break;
			}
			die("
			<tr>
			<td colspan=\"2\">Painel de Controle</td>
			</tr>
			<tr>
				<td colspan='2'><center>$frase<br /><b>motivo: </b><br />$conta[6]</center></td>
			</tr>
			<tr>
				<td colspan='2'><span><a href=javascript:void(0) onclick='Deslogar()'><b>Deslogar</b></a></span></td>
			</tr>
			");
		}
		
		//Ve se é adm
		$CtlCode = 0;
		$sql_query = mssql_query("SELECT Tipo FROM [$db_mssql].[dbo].[Character] WHERE AccountID='$login'");
		while($gm_check = mssql_fetch_row($sql_query))
		{
			if($gm_check[0] > $CtlCode) $CtlCode = $gm_check[0];
		}
	
		if($conta[0] == 0) $tipo = "Free";
		if($conta[0] == 1) $tipo = "Vip";
		
		if($conta[1] == 0) $sintaxe = "";
		if($conta[1] == 1) $sintaxe = "dia";
		if($conta[1] > 1) $sintaxe = "dias";
		echo "
		<tr>
			<td colspan=\"2\">Bem-Vindo, " . $nome_conta . "!</td>
			</tr>
		<tr>
			<td>Login:</td>
			<td>$login</td>
		</tr>
			<td>Tipo:</td>
			<td>$tipo - $conta[1] $sintaxe</td>
		<tr>
		</tr>";
		if($Ativar_Gold == 1)
		{
		echo "
		<tr>
			<td>Gold:</td>
			<td>$golds</td>
		</tr>";
		}
		if($Ativar_Cash == 1)
		{
		echo "
		<tr>
			<td>Cash:</td>
			<td>$bonus</td>
		</tr>";
		}
		if($CtlCode >= $CtlCode_GameMaster)
		{
			echo "<tr>
			<td colspan='2'><a href=javascript:void(0) onclick=carregar('painel_gm/painel.php','Centro','GET')><b>Painel GameMaster</b></a></td>
		</tr>";
		}
		
		if($CtlCode >= $CtlCode_Adminsitrador)
		{
			echo "<tr>
			<td colspan='2'><a href=javascript:void(0) onclick=carregar('painel_adm/painel.php','Centro','GET')><b>Painel Administrador</b></a></td>
		</tr>";
		}
		
		echo "
		<tr>
			<td colspan='2'><a href=javascript:void(0) onclick=carregar('painel/gerenciar_conta.php','Centro','GET')><b>Gerenciar conta</b></a></td>
		</tr>
		<tr>
			<td colspan='2'><a href=javascript:void(0) onclick=carregar('painel/painel.php','Centro','GET')><b>Gerenciar Personagens</b></a></td>
		</tr>
		<tr>
			<td colspan='2'><a href='depositos/confirmar.php' rel='external'><b>Confirmar Pagamento</b></a>	</td>
		</tr>
		<tr>
			<td colspan='2'><a href=javascript:void(0) onclick=carregar('painel/compras_webshop.php','Centro','GET')><b>Compras no Webshop</b></a>	</td>
		</tr>
		<tr>
			<td colspan='2'><a href=javascript:void(0) onclick=carregar('painel/meus_pagamentos.php','Centro','GET')><b>Meus Pagamentos</b></a>	</td>
		</tr><!--
		<tr>
			<td colspan='2'><a href=javascript:void(0) onclick=carregar('painel/indique.php','Centro','GET')><b>Indique e Ganhe</b></a>	</td>
		</tr>-->
		<tr>
			<td colspan='2'><span><a href=javascript:void(0) onclick='Deslogar()'><b>Deslogar</b></a></span></td>
		</tr>
		";
		
		die("
	<script type=\"text/javascript\">
		carregar('paginas/cookie.php?f=1&login=$login&senha=$senha','PaginasGeral','GET');
		carregar('painel/cookie.php?f=1&login=$login&senha=$senha','PainelPlayer','GET');
		carregar('painel_gm/cookie.php?f=1&login=$login&senha=$senha','PainelGM','GET');
		carregar('painel_adm/cookie.php?f=1&login=$login&senha=$senha','PainelADM','GET');
	</script>;
		");
	}
}
?>
		<tr>
        <td colspan="2">Painel de Controle</td>
	    </tr>
		<tr>
        <td colspan="2"><input type="text" id="login" maxlength="10" value="" /></td>
	    </tr>
	    <tr>
        <td colspan="2"><input type="password" id="senha" maxlength="10" value="" /></td>
	    </tr>
	    <tr>
		<td colspan="2"><input type="button" value="LOGAR" onclick="PainelLogin()" /></td>
	    </tr>
		<?php if(strlen($erro) > 4) echo "<tr><td><p style='color: #CC0000'>$erro</p></td></tr>"; ?>
		<tr>
		<td><center><a href="javascript:void(0)" onclick="carregar('paginas/recuperar.php','Centro','GET')">Recuperar Senha</a></center></td>
	    </tr>