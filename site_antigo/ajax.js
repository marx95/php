// AjaxHelper
function carregar(requrl, destid, reqtype, reqdata, formname)
{
	if (formname)
	{
		var dataobj = new Object({'ajax': true});
		var formelement = formname.elements;
		for (var i=0; i<formelement.length; i++)
		{
			var formtag = formelement[i];
			if (formtag.name)
			{
				dataobj[formtag.name] = formtag.value;
			}
		}
	}
	else
	{
		if (reqdata)
		{
			var dataobj = reqdata + '&ajax=true';
		}
		else
		{
			var dataobj = {'ajax': true};
		}
	}
	
	$.ajax(
	{
		type: reqtype,
		url: requrl,
		data: dataobj,
		cache: false,
		beforeSend: function()
		{
			var Width_IMG  = "24px";
			var Height_IMG = "26px";
			if(AjaxIMG == "ajax_escuro.gif")
			{
				Width_IMG  = "56px";
				Height_IMG = "23px";
			}
			$("#" + destid).html('<div style="margin: 0px auto; width: ' + Width_IMG + '; height: ' + Height_IMG + ';"><img src="http://muover.net/site/img/' + AjaxIMG + '" /></div>');
		},
		error: function(XMLHttpRequest)
		{
			switch(XMLHttpRequest.status)
			{
				case 0: var statuserror = "Erro desconhecido - Verifique sua Conexão ou a Hora de seu computador!"; break;
				case 400: var statuserror = "<b>Erro 400:</b> Solicitação incorreta"; break;
				case 401: var statuserror = "<b>Erro 401:</b> Autenticação requerida"; break;
				case 403: var statuserror = "<b>Erro 403:</b> Acesso proibido"; break;
				case 404: var statuserror = "<b>Erro 404:</b> P&aacute;gina n&atilde;o encontrada"; break;
				case 405: var statuserror = "<b>Erro 405:</b> Método de solicitação não suportado"; break;
				case 500: var statuserror = "<b>Erro 500:</b> Erro interno do Servidor"; break;
				case 503: var statuserror = "<b>Erro 503:</b> Serviço não disponível"; break;
				default: var statuserror = "Erro " + XMLHttpRequest.status + ": Mais informações em http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html";
			}
			$("#" + destid).html('<p align="center" style="line-height: 155%" class="texto">' + statuserror + '</p>');
		},
		success: function(data)
		{
			//if(data.indexOf("MSSQL_ERROR") > 0) carregar(requrl, destid, reqtype, reqdata, formname);
			$("#" + destid).html(data);
		},
		complete: function()
		{
			ajaxforms();
			ajaxlinks();
		}
	});
}

function ajaxforms()
{
	var formsobj = document.forms;
	for (i=0; i<formsobj.length; i++)
	{
		var thisform = formsobj[i];
		if (!thisform.onsubmit)
		{
			if(thisform.title)
			{
				thisform.onsubmit = function()
				{
					carregar(thisform.action, thisform.title, 'POST', null, this);
					return false;
				}
			}
			else
			{
				thisform.onsubmit = function()
				{
					carregar(thisform.action, 'PainelAjax', 'POST', null, this);
					return false;
				}
			}
		}
	}
}

function ajaxlinks()
{
	var linksobj = document.links;
	for (i=0; i<linksobj.length; i++)
	{
		link = linksobj[i];
		if (!link.onclick)
		{
			if (link.rel)
			{
				switch (link.rel)
				{
					case 'normal' : break;
					case 'external' : link.target = "_blank"; break;
					case 'tooltip' : link.onclick = new Function("return false"); break;
					default : link.onclick = new Function("carregar('" + link.href + "', '" + link.rel + "', 'GET'); return false;");
				}
			}
			else
			{
				link.onclick = new Function("carregar('" + link.href + "', 'Centro', 'GET'); return false;");
			}
		}
	}
}

$(document).ready(function()
{		
	// - Lateral Esquerdo
	carregar('lateral/painel.php','Painel','GET');
	carregar('lateral/infos.php','Lateral_Infos','GET');
	carregar('cache/equipe.html','GMOnline','GET');
	
	// - Lateral Direito	
	//carregar('cache/casados.html','TopCasados','GET');
	carregar('lateral/reipvp.php','ReiPVP','GET');
	carregar('cache/diario.html','TopDiario','GET');
	carregar('cache/geral.html','TopGeral','GET');
	//carregar('cache/semanal.html','TopSemanal','GET');
	//carregar('cache/mensal.html','TopMensal','GET');
	ajaxforms();
	ajaxlinks();
});

function Zebrar_Table(tbDest)
{
		Tabela = document.getElementById(tbDest);
        var linhas = Tabela.getElementsByTagName("tr");
        for(var i = 0, tam = linhas.length; i < tam; i++)
		{
        	(i%2) == 0 ? linhas[i].className = "td_down" : void(0);
		}
 }