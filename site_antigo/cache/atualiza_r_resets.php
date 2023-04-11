<?php
if(empty($db_mssql)) die();

$classe[0]	= "top_resets";			$classe_arq[0]	= "top_resets";
$classe[1]	= "Dark Wizard";		$classe_arq[1]	= 0;
$classe[2]	= "Soul Master";		$classe_arq[2]	= 1;
$classe[3]	= "Grand Master";		$classe_arq[3]	= 2;
$classe[4]	= "Dark Night";			$classe_arq[4]	= 16;
$classe[5]	= "Blade Night";		$classe_arq[5]	= 17;
$classe[6]	= "Blade Master";		$classe_arq[6]	= 18;
$classe[7]	= "Elf";				$classe_arq[7]	= 32;
$classe[8]	= "Muse Elf";			$classe_arq[8]	= 33;
$classe[9]	= "High Elf";			$classe_arq[9]	= 34;
$classe[10]	= "Magic Gladiator";	$classe_arq[10] = 48;
$classe[11]	= "Duel Master";		$classe_arq[11] = 49;
$classe[12]	= "Dark Lord";			$classe_arq[12] = 64;
$classe[13]	= "Lord Emperor";		$classe_arq[13] = 65;

if($season < 3) { $blankA = "<!--"; $blankB = "-->"; }
for($i = 0; $i < 14; $i++)
{
	$pagina = "
<table>
<tr><td colspan='2'>Escolha a Classifica&ccedil;&atilde;o:</td></tr>
</tr>
<tr>
<td width='50%'><strong>Classificar por:</strong></td>
<td>
<select name='classe' id='classe' onchange='RankClasse()'>
<option value=''>Selecione a classe</option>
<option value='Todos'>Todos</option>
<option value=''></option>
<option value='0'>Dark Wizard</option>
<option value='1'>Soul Master</option>
$blankA<option value='2'>Grand Master</option>$blankB
<option value=''></option>
<option value='16'>Dark Night</option>
<option value='17'>Blade Knight</option>
$blankA<option value='18'>Blade Master</option>$blankB
<option value=''></option>
<option value='32'>Elf</option>
<option value='33'>Muse Elf</option>
$blankA<option value='34'>High Elf</option>$blankB
<option value=''></option>
<option value='48'>Magic Gladiator</option>
$blankA<option value='49'>Duel Master</option>$blankB
<option value=''></option>
<option value='64'>Dark Lord</option>
$blankA<option value='65'>Lord Emperor</option>$blankB
</select>
</td>
</tr>
</table>
<table>
<tr><td colspan='4'>Top 100 Reset's</td></tr>
<tr>
";
	
	if($i > 0) $procurar_por = "AND class='" . $classe_arq[$i] . "'";
	$rank = 0;
	$total_linha = 0;
	$query = mssql_query("SELECT TOP 100 Name, Resets, AvatarLink FROM [$db_mssql].[dbo].[Character] WHERE CtlCode = 0 AND Resets > 0 $procurar_por ORDER BY Resets DESC");
while ($row = mssql_fetch_row($query))
{
	$rank++;
	$total_linha++;
	if($total_linha == 5) { $total_linha = 1; $pagina = $pagina . "</tr><tr>";}
	$pagina = $pagina . "
	<td onclick=\"carregar('painel/perfil.php?personagem=$row[0]','Centro','GET');\" style=\"Cursor: pointer;\"><center><b>$rank</b> - $row[0]<br />$row[1] Resets<br /><img src=\"img/avatar/$row[2]\" style=\"width: 80px; height: 80px; border: 0px; border-radius: 3px;\"><br></center></td>
	";

}
	
	$pagina = $pagina . "
	</tr>
	</table>
	<!-- Hora do Cache: $agora -->
	";
	$arquivo_nome = "ranking/" . $classe_arq[$i] . ".html";
	EscreveCache("$arquivo_nome", $pagina);
}
?>