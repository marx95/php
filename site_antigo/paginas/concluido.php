<?php
require_once("../config/masterconfig.php");
$id = $_GET['id'];

switch($id)
{
	case 1; die("<span id='Sucesso'>Sua conta foi criada, por&eacute;m, <b>foi enviado um email de confirma&ccedil;&atilde;o para " . $_GET['mail'] . "</b>. Em 10 Minutos você receber&aacute; o email!</span>"); break;
	case 2; die("<span id='Falha'>Necess&aacute;rio logar no painel!</span>"); break;
	case 3; die("<span id='Sucesso'>Seu Vip foi atualizado com sucesso!</span>"); break;
	case 4; die("<span id='Falha'>Faltou bonus para comprar seu VIP!</span><br /><br /><br /><span id='Falha'><a href='javascript:void(0)' onclick=carregar('paginas/dados.php','Centro','GET')>Clique aqui a veja como obter Bonus</a></span>"); break;
	case 5; die("<span id='Sucesso'>Seu comprovante foi enviado, em breve ser&aacute; confirmado!</span>"); break;
	case 6; die("<span id='Sucesso'>Nick trocado com sucesso!</span>"); break;
	case 7; die("<span id='Sucesso'>Conta bloqueada com sucesso!</span>"); break;
	case 8; die("<span id='Sucesso'>Conta desbloqueada com sucesso!</span>"); break;
	case 9; die("<span id='Sucesso'>Personagem bloqueado com sucesso!</span>"); break;
	case 10; die("<span id='Sucesso'>Personagem desbloqueado com sucesso!</span>"); break;
	case 11; die("<span id='Sucesso'>Conta de GameMaster criada com sucesso!</span>"); break;
	case 12; die("<span id='Sucesso'>Conta deletada com sucesso!</span>"); break;
	case 13; die("<span id='Sucesso'>Gold's colocados com sucesso!</span>"); break;
	case 14; die("<span id='Sucesso'>Cash's colocados com sucesso!</span>"); break;
	case 15; die("<span id='Sucesso'>Vip colocado com sucesso!</span>"); break;
	case 16; die("<span id='Sucesso'>Vip tirado com sucesso!</span>"); break;
	case 17; die("<span id='Sucesso'>Pronto, o personagem est&aacute; full!</span>"); break;
	case 18; die("<span id='Sucesso'>Pronto, o personagem est&aacute; zerado!</span>"); break;
	case 19; die("<span id='Sucesso'>Premia&ccedil;&atilde;o atualizada com sucesso!</span>"); break;
	case 20; die("<span id='Sucesso'>Comando executado com sucesso!</span>"); break;
	case 21; die("<span id='Sucesso'>Sucesso! Foi enviado um email para <b>" . $_GET['mailsv'] . "</b>!</span>"); break;
	case 22; die("<span id='Sucesso'>O dep&oacute;sito foi administrado com sucesso!</span>"); break;
	case 23; die("<span id='Sucesso'>IP adicionado na lista negra com sucesso!</span>"); break;
	case 24; die("<span id='Sucesso'>IP tirado na lista negra com sucesso!</span>"); break;
	case 25; die("<span id='Sucesso'>Personagem alterado com sucesso!</span>"); break;
	case 26; die("<span id='Sucesso'>Senha alterado com sucesso!</span><script type\"text/javascript\">Deslogar()</script>"); break;
	case 27; die("<span id='Sucesso'>Sua conta foi confirmada com sucesso!</span>"); break;
	case 28; die("<span id='Sucesso'>Sucesso! <b>foi enviado um email de confirma&ccedil;&atilde;o para " . $_GET['mail'] . "</b>. Em 10 Minutos você receber&aacute; o email!</span>"); break;
	case 29; die("<span id='Sucesso'>Rei do PVP alterado com sucesso!</span>"); break;
	case 30; die("<span id='Sucesso'>Status do AntiHack alterado com sucesso!</span>"); break;
	case 31; die("<span id='Sucesso'>Not&iacute;cia adicionada com sucesso!</span>"); break;
	case 32; die("<span id='Sucesso'>Not&iacute;cia deletada com sucesso!</span>"); break;
	case 33; die("<span id='Sucesso'>Sua conta foi criada com sucesso! Voc&ecirc; j&aacute; pode jogar!</span>"); break;
}
?>