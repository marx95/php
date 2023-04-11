function RankClasse()
{
	var Valor = document.getElementById('classe').value;
	if(Valor == '') return;
	if(Valor == 'Todos') Valor = 'top_resets';
	carregar('cache/ranking/' + Valor + '.html', 'Centro','GET');
}

function RankSelect()
{
	var Valor = document.getElementById('ranktipo').value;
	if(Valor == '') return;
	carregar('cache/ranking/' + Valor, 'Centro','GET');
}

function PagamentosSelect()
{
	var Valor = document.getElementById('ap').value;
	carregar('painel_adm/pagamentos.php?ap=' + Valor,'Paginas_Centro','GET')
}

function PainelLogin()
{
	var Login = document.getElementById('login').value;
	var Senha = document.getElementById('senha').value;
	if(Login.length < 4) return;
	if(Senha.length < 4) return;
	carregar('lateral/painel.php?login=' + Login + '&senha=' + Senha,'Painel','GET');
}
function Deslogar()
{
	// - Unset nos cookie's
	carregar('paginas/cookie.php?f=0','PaginasGeral','GET');
	carregar('painel/cookie.php?f=0','PainelPlayer','GET');
	carregar('painel_gm/cookie.php?f=0','PainelGM','GET');
	carregar('painel_sub/cookie.php?f=0','PainelSUB','GET');
	carregar('painel_adm/cookie.php?f=0','PainelADM','GET');
	
	// - Carrega as paginas finais
	carregar('lateral/painel.php?f=1','Painel','GET');
	carregar('paginas/principal.php','Centro','GET');	
}

function CarregaPersonagem(Valor)
{
	if(Valor.length >= 4) carregar('painel/opcoes_painel.php?personagem=' + Valor,'Paginas_Centro','GET');
}

function ReloadSite()
{
	carregar('config/acessos.php','Acessos','GET');
	
	// - Lateral Esquerdo
	carregar('config/atualizador.php?id=0','UsersOnline','GET');	
	carregar('cache/equipe.html','GMOnline','GET');
	
	// - Centro	
	carregar('cache/principal.html','Ranking_Principal','GET');

}

function Mostra(ID)
{
	document.getElementById(ID).style.visibility = "visible";
}

function Oculta(ID)
{
	document.getElementById(ID).style.visibility = "hidden";
}

function ToolMsg(Msg)
{
	if(Msg.length >= 4)
	{
		var PosX = window.event.pageX;
		var PosY = window.event.pageY;
		document.getElementById("ToolTip").style.left		= (PosX + 20) + "px";
		document.getElementById("ToolTip").style.top		= (PosY + 15) + "px";
		document.getElementById("ToolTip").innerHTML		= Msg;
		Mostra("ToolTip");
	}else
	{
		Oculta("ToolTip");
		return;
	}
}

function AbrirPop(Url)
{
	onclick = window.open(Url, '_blank', 'width=800,height=600,toolbar=no,location=no,resizable=no,directories=no,menubar=no,status=no'); return false;
}

function FecharFacePop()
{
	document.getElementById('PopFace').style.visibility = "hidden";
	carregar('index.php?FacePop=1','Funcs','GET');
}