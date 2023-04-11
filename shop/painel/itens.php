<?php
require_once("../config/masterconfig.php");
require_once("../painel/accinfo.php");
		
	echo $aviso . "<br />";
	
	$col_valor = "valor";
	if($Ativar_Preco_Fixo == 1) $col_valor = "valor_fixo";
	
	$tipo = $_GET['tipo'];
	$veritens = "SELECT id, $col_valor, vimgc, vimga, vimgb, tamanho_x, tamanho_y, nome, vindex from [$db_mssql].[dbo].[Webshop] WHERE tipo='$tipo' AND visivel='1' AND Season<='$Season' ORDER BY $col_valor , id";
		
	$queryitens = mssql_query($veritens);
	while($listaritens = mssql_fetch_row($queryitens))
	{	
		$total += 1;
		
		switch($listaritens[5]){
			case 1; $width = 32; break;
			case 2; $width = 64; break;
			case 3; $width = 96; break;
			case 4; $width = 128; break;
			case 5; $width = 128; break;
			case 6; $width = 128; break;
			default: $width = 32; break;
		}
		
		switch($listaritens[6]){
			case 1; $height = 32; break;
			case 2; $height = 64; break;
			case 3; $height = 96; break;
			case 4; $height = 128; break;
			case 5; $height = 128; break;
			case 6; $height = 128; break;
			default: $height = 32; break;
		}
		
		if($listaritens[8] > 30){
			$listaritens[8] = "F9";
			$listaritens[2] = "00";
		}
		else{
			$listaritens[8] = "00";
		}

		$prefixo= $width . "x" . $height;
		$imagem = "img/itens/" . $listaritens[2] . $listaritens[3] . $listaritens[4] . $listaritens[8] . ".gif";
		if($total == 6){
			echo "<br />";
			$total = 1;
		}
		
	$estiloA = "btCompra";
	$estiloB = "btCompra";
	$stringA = "Comprar";
	$stringB = "Comprar";
	
	if($Ativar_Gold == 1 && $Ativar_Cash == 1)
	{ 
		$estiloA = "btCima";
		$estiloB = "btBaixo";
		$stringA = "$StringGolds";
		$stringB = "$StringBonus";
	}
	
	$item_preco = $listaritens[1];
	if($Ativar_Preco_Fixo == 1 && $Mostrar_Valor_P_Fixo == 0) $item_preco = "Fixo";
	
	echo "
	<div class='caixa_item'>
	<div class='fundo_item_$prefixo'><img src='$imagem'/></div>
	<p><b>" . $listaritens[7] . "</b></p>
	<p>Valor: " . $item_preco . "</p>
	<p>";
	
	if($Ativar_Gold == 1) echo "<input type=\"button\" value=\"$stringA\" class=\"$estiloA\" onclick=\"carregar('painel/ver_item.php?id=$listaritens[0]&tipo=1','Centro','GET')\" />";
	
	if($Ativar_Cash == 1) echo "<input type=\"button\" value=\"$stringB\" class=\"$estiloB\" onclick=\"carregar('painel/ver_item.php?id=$listaritens[0]&tipo=0','Centro','GET')\" />";
	echo "</p>
	</div>
";
	}
?>