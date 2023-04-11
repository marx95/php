<?php
require_once("../config/masterconfig.php");
require_once("../painel/accinfo.php");

echo $aviso . "<div class='bau_pagina'>
<div class='Bau_1'>Meu baú</div>
<div class='Bau_2'>";

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

	//--------------------------------------------STORED PROCEDURES
	$MeuBau_Consulta = mssql_query("EXEC [$db_mssql].[dbo].[Webshop_Bau] '$login'");
	$StoredRow = mssql_fetch_row($MeuBau_Consulta);

	//--------------------------------------------ZEN DO BAU
	$meuzen = mssql_fetch_row(mssql_query("SELECT money from [$db_mssql].[dbo].[warehouse] where AccountID='$login'"));

	//--------------------------------------------JUNTA RESULTADOS DA STORED PROCEDURES
	for($a = 0; $a < 15; $a++){ $items = $items . strtoupper(bin2hex($StoredRow[$a])); }

	//--------------------------------------------SPLIT PARA SEPARAR LINHAS DOS BAU*
	$item_tmp = str_split(strtoupper($items), $Tamanho_Bau);

//--------------------------------------------INICIO DO VISUAL
echo "
	<table class='bau'>";

for($h = 0; $h < 15; $h++)
{
	echo "
		<tr>";
	for($i = 0; $i<8; $i++)
	{
		if($item_tmp[$h*8+$i] != $Espaco_Limpo && $item_tmp[$h*8+$i] != "")
		{

			$item_info = str_split($item_tmp[$h*8+$i], 2);
			require("../config/imagem_item_s" . $Season . ".php");
	
			//for($x = 1; $x < $cord_x; $x++)
			//{
				//$slot[$h*8+$i+$x] = $item_nome;
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
			if(strlen($slot[$h*8+$i]) > 0)
			{
				echo "<td id=\"bau_usado\">&nbsp;</td>"; //gasto
			}else
			{
				echo "<td $onclick><div id=\"sobrepor\"><div></div></div></td>"; //livre
			}
		}
		
	}
	echo "
		</tr>";
}
?>
</table>
</div>
<div class="Bau_3">&nbsp;<?php echo $meuzen[0]; ?></div>
<div class="Bau_4">&nbsp;</div>
</div>