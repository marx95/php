	var MoedaSelect	= "";
	var Full		= 0;
	var totalEx		= 0;
	var max_exc		= 0;
	var G_pEx		= 0;
	var G_Prefine	= 0;
	var G_Anci		= 0;
	var G_OPT		= 0;
	var G_SKILL		= 0;
	var g_pluck		= 0;
	var g_level		= 0;
	var g_joh		= 0;
	var MarcarFullSt = 0;
	var Season = 0;
	
	function SetPrecos()
	{
		max_exc		= Number(document.getElementById('MaxExEx').value);
		G_pEx		= Number(document.getElementById('PExeEx').value);
		G_Prefine	= Number(document.getElementById('Prefine_Mxae').value);
		G_Anci		= Number(document.getElementById('Anci_Pex').value);
		G_OPT		= Number(document.getElementById('pOptEx').value);
		G_SKILL		= Number(document.getElementById('pSkillEx').value);
		g_pluck		= Number(document.getElementById('pluckexex').value);
		g_level		= Number(document.getElementById('plevelexex').value);
		g_joh		= Number(document.getElementById('pjohexex').value);	
		Season		= Number(document.getElementById('Season').value);	
	}
	
	function Total()
	{
		var valor = Number(document.getElementById('pitem').value);
		var level = Number(document.getElementById('plevel').value);
		var option = Number(document.getElementById('poption').value);
		var ancient = Number(document.getElementById('pancient').value);
		var refine = Number(document.getElementById('prefine').value);
		var skill = Number(document.getElementById('pskill').value);
		var luck = Number(document.getElementById('pluck').value);
		var ex1 = Number(document.getElementById('pex1').value);
		var ex2 = Number(document.getElementById('pex2').value);
		var ex3 = Number(document.getElementById('pex3').value);
		var ex4 = Number(document.getElementById('pex4').value);
		var ex5 = Number(document.getElementById('pex5').value);
		var ex6 = Number(document.getElementById('pex6').value);
		var joh = Number(document.getElementById('pjoh').value);
		var pTotal = Number(ex1 + ex2 + ex3 + ex4 + ex5 + ex6 + level + refine + ancient + luck + option + skill + joh);
		
		//if(document.getElementById('tipo_compra').value == 0)
		//{
		//	pTotal = valor + Number(pTotal/2);
		//}else
		//{
			pTotal = Number(valor + pTotal);
		//}
		
		MoedaSelect = document.getElementById('moeda_str').value;
		document.getElementById('xtotal').innerHTML = pTotal + " " + MoedaSelect;
		document.getElementById('xtotal2').innerHTML = pTotal + " " + MoedaSelect;
		if(document.getElementById('tipo_compra').value == 0) ConverterValorCash("" + pTotal, 'vReal');
	}
		
	
	function ContarMarcados()
	{
		totalEx = 0;
		if(document.getElementById('epcex1').checked == true) totalEx += 1;
		if(document.getElementById('epcex2').checked == true) totalEx += 1;
		if(document.getElementById('epcex3').checked == true) totalEx += 1;
		if(document.getElementById('epcex4').checked == true) totalEx += 1;
		if(document.getElementById('epcex5').checked == true) totalEx += 1;
		if(document.getElementById('epcex6').checked == true) totalEx += 1;
	}
	
	function soma_ex(qual)
	{
		if(document.getElementById('epcex' + qual).checked == true)
		{	
			if(totalEx < max_exc)
			{
				document.getElementById('epcex' + qual).value = 1;
				document.getElementById('pex' + qual).value = G_pEx;
			}else
			{
				document.getElementById('epcex' + qual).checked = false;
			}
		}
		else{
			document.getElementById('epcex' + qual).value = 0;
			document.getElementById('pex' + qual).value = 0;
		}
		ContarMarcados();
	}
		
		
	function soma_refine()
	{
		if(document.getElementById('refine').checked == true)
		{
			document.getElementById('prefine').value = G_Prefine;
			document.getElementById('refine').value = 1;
			document.getElementById('JOH').value = 0;
		}
		else
		{
			document.getElementById('prefine').value = 0;
			document.getElementById('refine').value = 0;
		}
		verificajoh();
	}
		
	function soma_ancient()
	{
		document.getElementById('pancient').value = G_Anci; //Number(G_Anci * document.getElementById('ancient').value);
	}
		
		
	function soma_option()
	{
		var pOption = (Number(document.getElementById('option').value)/4) * G_OPT;
		document.getElementById('poption').value = pOption;
	}
		
		
	function soma_skill()
	{
		if(document.getElementById('skill').checked == true)
		{
			document.getElementById('pskill').value = G_SKILL;
			document.getElementById('skill').value = 1;
		}
		else
		{
			document.getElementById('pskill').value = 0;
			document.getElementById('skill').value = 0;
		}
	}
		
		
	function soma_luck()
	{
		if(document.getElementById('luck').checked == true)
		{
			document.getElementById('pluck').value = g_pluck;
			document.getElementById('luck').value = 1;
		}
		else
		{
			document.getElementById('pluck').value = 0;
			document.getElementById('luck').value = 0;
		}
	}
		
		
	function trava(el)
	{
		document.getElementById('epcex1').checked = 0;
		document.getElementById('epcex1').value = 0;
		document.getElementById('epcex2').checked = 0;
		document.getElementById('epcex2').value = 0;
		document.getElementById('epcex3').checked = 0;
		document.getElementById('epcex3').value = 0;
		document.getElementById('epcex' + el).checked = 1;
		document.getElementById('epcex' + el).value = 1;
	}

	function soma_level()
	{
		var pLevel = Number(document.getElementById('level').value) * Number(g_level);
		document.getElementById('plevel').value = pLevel;	
		
		if(Season > 1)
		{
			if(document.getElementById('level').value == 13)
			{
				document.getElementById('JOH').disabled = false;
			}else
			{
				document.getElementById('JOH').disabled = true;
			}
		}
	}
	
	function verificajoh(oque)
	{
		var pLevel = Number(document.getElementById('level').value) * Number(g_level);
		document.getElementById('plevel').value = pLevel;
		
		if(document.getElementById('level').value == 13)
		{
			document.getElementById('JOH').disabled = false;
		}
		else
		{
			document.getElementById('JOH').value = 0;
			document.getElementById('JOH').disabled = true;
		}
		
		if(document.getElementById('JOH').value >= 1)
		{
			document.getElementById('pjoh').value = g_joh;
			document.getElementById('refine').checked = false;
			soma_refine();
		}
		else
		{
			document.getElementById('pjoh').value = 0;
		}
	}
	
	function InserirItem(valor)
	{
		document.getElementById('cord').value = valor;
		document.getElementById('Desc').innerHTML = 'O item será colocado no slot: <b>' + valor + '</b>';
	}
	
	function Compra_Status_Mostra()
	{
		document.getElementById('CompraStatus').style.visibility = "visible";
	}
	
	function Compra_Status_Some()
	{
		document.getElementById('CompraStatus').style.visibility = "hidden";
		document.getElementById('CompraBox').style.visibility = "visible";
	}
	
	function MarcaTudo()
	{
		if(document.getElementById('tipo_compra').value == 1) 
		{
			alert('Somente para compras com Cash!');
			return;
		}
		
		document.getElementById('epcex1').checked = true;
		document.getElementById('epcex2').checked = true;
		document.getElementById('epcex3').checked = true;
		document.getElementById('epcex4').checked = true;
		document.getElementById('epcex5').checked = true;
		document.getElementById('epcex6').checked = true;
		
		soma_ex(1);
		soma_ex(2);
		soma_ex(3);
		soma_ex(4);
		soma_ex(5);
		soma_ex(6);
	}
	
	var fblink = 0;
	function Pisca()
	{
		if(fblink == 0)
		{
			document.getElementById('Desc').style.color = "#c70d23";
			fblink = 1;
		}else
		{
			document.getElementById('Desc').style.color = "#000000";
			fblink = 0;
		}
	}
	
	function ComprarItem()
	{
		document.getElementById('CompraBox').style.visibility = "hidden";
		Compra_Status_Mostra();
	}
	
	function ConverterValorCash(Valor, IDR)
	{
		var ValorSpt = Valor.split("");
		var Resultado = "";
		switch(Valor.length)
		{
			case 1:	Resultado = "R$ 0,0" + ValorSpt[0]; break;
			case 2:	Resultado = "R$ 0," + ValorSpt[0] + ValorSpt[1]; break;
			case 3:	Resultado = "R$ " + ValorSpt[0] + "," + ValorSpt[1] + ValorSpt[2]; break;
			case 4:	Resultado = "R$ " + ValorSpt[0] + ValorSpt[1] + "," + ValorSpt[2] + ValorSpt[3]; break;
			case 5:	Resultado = "R$ " + ValorSpt[0] + ValorSpt[1] + ValorSpt[2] + "," + ValorSpt[3] + ValorSpt[4]; break;
		}
		document.getElementById(IDR).innerHTML = Resultado;
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
			document.getElementById("ToolTip").style.visibility	= "visible";
		}else
		{
			document.getElementById("ToolTip").style.visibility	= "hidden";
			return;
		}
	}