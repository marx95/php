<form method="post" title="Resultado_V" action="painel/verificador.php">
<!--<center><input type="button" value="Recarregar" onclick="carregar('painel/ver_item.php?id=<?php echo $_GET['id']; ?>&tipo=<?php echo $_GET['tipo']; ?>','Centro','GET')" /></center>-->
<?php
	require_once("../config/masterconfig.php");
	require_once("../painel/accinfo.php");
	echo $aviso . "<div class='ver_item'>";

	$id			= $_GET['id'];
	$tipo		= $_GET['tipo'];
	
	switch($tipo)
	{
		case 0:
			if($Ativar_Cash == 0) die("<center>Compra $StringBonus desativada!</center>");
			$modo			= "(Comprando com $StringBonus)";
			$max_item_lv	= $mlevel;
			$Moeda			= $StringBonus;
			$Soma_P_Fixo	= $Soma_Preco_Fixo_Cash;
		break;
		case 1: 
			if($Ativar_Gold == 0) die("<center>Compra $StringGolds desativada!</center>");
			$modo			= "(Comprando com $StringGolds)";
			$max_item_lv	= $mlevel_g;
			$mopt			= $mopt_g;
			$Moeda			= $StringGolds;
			$Soma_P_Fixo	= $Soma_Preco_Fixo_Gold;
		break;
	}

	$col_valor = "valor";
	if($Ativar_Preco_Fixo == 1) $col_valor = "valor_fixo";
	
	$listar_item = mssql_fetch_row(mssql_query("select nome, tipo, $col_valor, comprado, vimgc, vimga, vimgb, vskill, tamanho_x, tamanho_y, RF, ANC, vindex from [$db_mssql].[dbo].[Webshop] where id='$id'")) or die($erro_die);
	$xtotal		= $listar_item[2];
	if($Ativar_Preco_Fixo == 1) $xtotal += $Soma_P_Fixo;
	
	if($listar_item[7] > 0) $listskill = "<table><tr><td>Skill</td><td><input name=\"skill\" type=\"checkbox\" id=\"skill\" value=\"0\" onclick=\"soma_skill()\" /></td></tr></table>";

		//Height e Width para cada item
	switch($listar_item[8])
	{
		case 1; $width = 32; break;
		case 2; $width = 64; break;
		case 3; $width = 96; break;
		case 4; $width = 128; break;
		case 5; $width = 160; break;
		case 6; $width = 192; break;
		default: $width = 32; break;
	}

	switch($listar_item[9])
	{
		case 1; $height = 32; break;
		case 2; $height = 64; break;
		case 3; $height = 96; break;
		case 4; $height = 128; break;
		case 5; $height = 160; break;
		case 6; $height = 192; break;
		default: $height = 32; break;
	}

	$finalimg		= strtoupper($finalimg);
	$imagem 		= $width . "x" . $height;
	require_once("../config/veriexe.php");

	if($listar_item[12] > 30)
	{
		$listar_item[12] = "F9";
		$listar_item[4] = "00";
	}
	else
	{
		$listar_item[12] = "00";
	}


	if($listar_item[10] > 0 && $Season > 1)
	{
		if($tipo == 1 && $refine_lib == 0)
		{
			$refine = "";
		}else
		{
			$refine = "<table><tr><td>Refinação Lvl 380</td><td><input name=\"refine\" type=\"checkbox\" id=\"refine\" value='0' onclick=\"soma_refine()\" /></td></tr></table>";
		}
		
	}

	if($listar_item[11] > 0)
	{
		$ancient = "<table><tr><td>Op&ccedil;&atilde;o +10 Ancient</td><td>
		<select name=\"ancient\" id=\"ancient\" onchange=\"soma_ancient()\"><option value=\"0\">Sem Ancient</option><option value=\"1\">+5 Estamina</option><option value=\"2\">+9 Estamina</option></select></td></tr></table>";
	}
	
	if($listar_item[0] == "Fenrir") $listarexe = 1;
	$prefixo = $width . "x" . $height;
?>
<table><tr><td><b><?php echo $listar_item[0] . " " . $modo; ?></b></td></tr></table>
<p>
<div class="fundo_item_<?php echo $prefixo; ?>">
<img src="img/itens/<?php echo $listar_item[4] . $listar_item[5] . $listar_item[6] . $listar_item[12]; ?>.gif">
</div>
</p>
<table>
<tr>
<td>Item</td>
<td><b><?php echo $listar_item[0]; ?><b></td>
</tr>
</table>
<?php
	if($Season == 1) $lvl_Func = "soma_level()";
	if($Season == 2) $lvl_Func = "soma_level()";
	if($Season == 3) $lvl_Func = "verificajoh()";
	
	if($listarlevel == 1)
	{
		echo "
<table>
<tr>
<td>Level</td>
<td>
<select name=\"level\" id=\"level\" onchange=\"soma_level()\">";
		for($iLevel = 0; $iLevel <= $max_item_lv; $iLevel++)
		{
			echo "<option value='$iLevel'>+" . $iLevel . "</option>";
		}
	echo "</select>
</td></tr>
</table>";
	}

	if($listaropt == 1)
	{
		require_once("../config/veriopt.php");
		echo "
<table>
<tr>
<td>Options</td>
<td><select name=\"option\" id=\"option\" onchange=\"soma_option()\">$ListMaxOpt</select></td>
</tr>
</table>";
	}
	
	if($listarluck == 1)
	{
	echo "
<table>
<tr>
<td>Sorte</td>
<td><input name=\"luck\" type=\"checkbox\" id=\"luck\" value=\"0\" onclick=\"soma_luck()\" /></td>
</tr>
</table>";
	}
	
	if($listarskill == 1)	echo $listskill;
	if($listarref == 1)		echo $refine;
	if($listaranc == 1)		echo $ancient;
?>
</table>
<br />
<?php
	if($listarexe == 1)
	{
	echo "
<table>
<tr>
<td><b>Op&ccedil;&otilde;es Excelentes</b></td>
</tr>
</table>";

	if($tipo == 0)
	{
	echo "
<!--<table>
<tr>
<td><b>Marcar Tudo</b></td>
<td><input type=\"checkbox\" onclick=\"MarcaTudo()\" /></td>
</tr></table>--!>";
	}
	
	for($i=1; $i <= 6; ++$i)
	{
		if($listaexe[$i] != "")
		{
		echo "
<table>
<tr>
<td>$listaexe[$i]</td>
<td>$listaoptexe[$i]</td>
</tr>
</table>";
		}
	}
}

	if($listarjoh == 1 && $Season > 1)
	{
echo "
<table>
<tr>
<td><b>Jewel of Harmony</b></td>
</tr>
</tr>
<tr>
<td><select name='JOH' id='JOH' style='width: 250px;' onchange='verificajoh()' disabled>";

for($i=0;$i <= 10;++$i)
{
	if($JOHOPT[$i] <> "")
	{
		echo $JOHOPT[$i];
	}
else
{
	echo "<option value='0'>Sem opções disponiveis</option>";
}
}
echo "
</select>
</td>
</tr>
</table>
";
}
?>
<br />
<table>
<tr>
<td>O item <b><?php echo $listar_item[0]; ?></b> foi comprado <?php echo $listar_item[3]; ?> veses</td>
</tr>
</table>
<table>
<tr>
<td><b>Valor</b></td>
<td><div id="xtotal" value="xtotal"><?php echo "$listar_item[2] $Moeda"; ?></div></td>
</tr>
</table>
</div>
<br />
<style type="text/css">
#sobrepor
{
	position: absolute;
	background-image: none;
	width: <?php echo $width; ?>px;
	height: <?php echo $height; ?>px;
	margin-left: 1px;
	border: 0px;
}
#sobrepor:hover
{
	background-image: url(img/itens/fundo/<?php echo $width; ?>x<?php echo $height; ?>.gif);
	width: <?php echo $width; ?>px;
	height: <?php echo $height; ?>px;
}
#sobrepor div
{
	background-image: url(img/itens/Clean.gif);
	width: <?php echo $width; ?>px;
	height: <?php echo $height; ?>px;
	border: 0px;
}
#sobrepor div:hover
{
	background-image: url(img/itens/<?php echo $listar_item[4] . $listar_item[5] . $listar_item[6] . $listar_item[12]; ?>.gif);
	background-position: top left;
}
</style>
<?php
echo "
<div class=\"bau_pagina\" style=\"width: 350px\">
<p><b>Selecione a posi&ccedil;&atilde;o do item:</b></p>
<h3><p><b>Aten&ccedil;&atilde;o: N&atilde;o sobreponha items!</b></p></h3>
<h3><p><b>N&atilde;o devolvemos Gold's</b></p></h3>
";

switch($Season)
{
	case 1:
		$Espaco_Limpo 	= str_repeat("F", 20);
		$Tamanho_Bau	= 20;
	break;
	case 2:
		$Espaco_Limpo = str_repeat("F", 20);
		$Tamanho_Bau	= 20;
	break;
	case 3:
		$Espaco_Limpo = str_repeat("F", 32);
		$Tamanho_Bau	= 32;
	break;
}

	// - Verifica se bau existe (Esta função verifica se o bau existe, se nao existir, cria)
	require_once("../config/criar_bau.php");
	
	// - STORED PROCEDURES
	$MeuBau_Consulta = mssql_query("EXEC [$db_mssql].[dbo].[Webshop_Bau] '$login'");
	$StoredRow = mssql_fetch_row($MeuBau_Consulta);

	//--------------------------------------------JUNTA RESULTADOS DA STORED PROCEDURES
	for($a = 0; $a < 15; $a++){ $items = $items . strtoupper(bin2hex($StoredRow[$a])); }

	//- SPLIT PARA SEPARAR LINHAS DOS BAU*
	$item_tmp = str_split(strtoupper($items), $Tamanho_Bau);

//--------------------------------------------INICIO DO VISUAL
echo "<table class=\"bau\">";

for($h = 0; $h < 15; $h++)
{
	echo "\n<tr>";
	for($i = 0; $i<8; $i++)
	{
		if($item_tmp[$h*8+$i] != $Espaco_Limpo && $item_tmp[$h*8+$i] != "")
		{
			$item_info = str_split($item_tmp[$h*8+$i], 2);
			require("../config/imagem_item_s" . $Season . ".php");
	
			//for($x = 1; $x < $cord_x; $x++)
			//{
			//	$slot[$h*8+$i+$x] = $item_nome;
			//}
			
			for($y = 0; $y < $cord_y; $y++)
			{
				$slot[($h+$y)*8+$i] = $item_nome;
				for($x = 1; $x < $cord_x; $x++)
				{
					$slot[($h+$y)*8+$i+$x] = $item_nome;
				}
			}
			
			echo "<td id=\"bau_usado\"><img src=\"img/itens/" . $Item_Imagem . "\" onmousemove=\"ToolMsg('$item_nome')\" /></td>"; //gasto
		}else
		{
			$coordenada = ($i+1) . "x" . ($h+1); //Corx X cord Y
			$onclick = "onclick=\"InserirItem('" . $coordenada . "')\"";

			if(strlen($slot[$h*8+$i]) > 0)
			{
				echo "<td id=\"bau_usado\">&nbsp;</td>"; //gasto
			}else
			{
				echo "<td $onclick><div id=\"sobrepor\"><div></div></div></td>"; //livre
			}
		}
		
	}
	echo "\n</tr>";
}
?>
</table>
<p id="Desc" name="Desc">Selecione um slot para colocar o item!</p>
</div>
<input type="hidden" name="tipo" id="tipo" value="<?php echo $_GET['tipo']; ?>" />
<input type="hidden" name="tipo_compra" id="tipo_compra" value="<?php echo $_GET['tipo']; ?>" />
<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
<input type="hidden" id="plevel" name="plevel" value="0" />
<input type="hidden" id="poption" name="poption" value="0" />
<input type="hidden" id="pancient" name="pancient" value="0" />
<input type="hidden" id="prefine" name="prefine" value="0" />
<input type="hidden" id="pskill" name="pskill" value="0" />
<input type="hidden" id="pluck" name="pluck" value="0" />
<input type="hidden" id="pex1" name="pex1" value="0" />
<input type="hidden" id="pex2" name="pex2" value="0" />
<input type="hidden" id="pex3" name="pex3" value="0" />
<input type="hidden" id="pex4" name="pex4" value="0" />
<input type="hidden" id="pex5" name="pex5" value="0" />
<input type="hidden" id="pex6" name="pex6" value="0" />
<input type="hidden" id="pjoh" name="pjoh" value="0" />
<input type="hidden" id="cord" name="cord" value="-1x-1" />
<div id="CompraStatus">
	<span id="Resultado_V"></span>
	<p><input type="button" onclick="Compra_Status_Some()" value="Fechar" /></p>
</div>
<div id="CompraBox">
	<div id="xtotal2" value="xtotal2"><?php echo "$listar_item[2] $Moeda"; ?></div>
	<?php if($tipo == 0 && $Mostrar_Valor_Real == 1) echo "<div id=\"vReal\" value=\"\"></div>"; ?>
	<p id="ComprarB"><input type="submit" value="Comprar" onclick="ComprarItem()" /></p>
</div>
</form>
<?php
	switch($_GET['tipo'])
	{
		case 0: // - Cashs
			$Meu_Dinheiro 	= $cashs;
			$max_exe		= $mexe;
			$preco_level 	= $plevel;
			$preco_opt		= $popt;
			$preco_luck		= $pluck;
			$preco_skill	= $pskill;
			$preco_ancient	= $panc;
			$preco_exe		= $pexe;
			$preco_joh		= $pjoh;
			$preco_ref		= $prefine;
		break;
		case 1: // - Golds
			$Meu_Dinheiro = $golds;
			$max_exe		= $mexe_g;
			$preco_level 	= $plevel_g;
			$preco_opt		= $popt_g;
			$preco_luck		= $pluck_g;
			$preco_skill	= $pskill_g;
			$preco_ancient	= $panc_g;
			$preco_exe		= $pexe_g;
			$preco_joh		= $pjoh_g;
			$preco_ref		= $prefine_g;
		break;
	}
?>
<input type="hidden" name="MaxExEx" id="MaxExEx" value="<?php echo $max_exe; ?>" />
<input type="hidden" name="PExeEx" id="PExeEx" value="<?php echo $preco_exe; ?>" />
<input type="hidden" name="Prefine_Mxae" id="Prefine_Mxae" value="<?php echo $preco_ref; ?>" />
<input type="hidden" name="Anci_Pex" id="Anci_Pex" value="<?php echo $preco_ancient; ?>" />
<input type="hidden" name="pOptEx" id="pOptEx" value="<?php echo $preco_opt; ?>" />
<input type="hidden" name="pSkillEx" id="pSkillEx" value="<?php echo $preco_skill; ?>" />
<input type="hidden" name="pluckexex" id="pluckexex" value="<?php echo $preco_luck; ?>" />
<input type="hidden" name="plevelexex" id="plevelexex" value="<?php echo $preco_level; ?>" />
<input type="hidden" name="pjohexex" id="pjohexex" value="<?php echo $preco_joh; ?>" />
<input type="hidden" name="moeda_str" id="moeda_str" value="<?php echo $Moeda; ?>" />
<input type="hidden" id="pitem" name="pitem" value="<?php echo $xtotal; ?>" />
<input type="hidden" id="Season" name="Season" value="<?php echo $Season; ?>" />
<script type="text/javascript">
	SetPrecos();
	setInterval('Pisca()', 250);
	setInterval('Total()', 150);
	<?php if($tipo == 0 && $Mostrar_Valor_Real == 1)echo "ConverterValorCash('$listar_item[2]', 'vReal');"; ?>
</script>