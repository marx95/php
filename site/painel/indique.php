<?php
	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
	$mid = mssql_fetch_row(mssql_query("SELECT memb_guid FROM [$db_mssql].[dbo].[memb_info] WHERE memb___id='$login'"));
?>
<table>
<tr><td>Primeiro, o que é o Indique e Ganhe:</td></tr>
      <tr>
      <td><span style="text-align: justify">Ajude a divulgar o servidor e ganhe Cash's á cada indicação. Poste o Link de divulgação em sites, foruns, orkut, facebook e em troca você ganhará Cash's. O Link de divulgação é o link onde o novo jogador deverá se registrar e jogar (Sim ele tem que jogar). <a href="http://munovus.net/forum/viewtopic.php?f=4&t=66" rel="external"><b>Mais informações clique aqui. </b></a></span></td>
      </tr>
</table>
<table>
<tr><td>Link de Divulgação</td></tr>
      <tr>
      <td><input type="text" style="width:50%" value="http://munovus.net/site/?pag=paginas/novaconta.php?ind=<?php echo $mid[0]; ?>" onClick="this.select()" /></td>
      </tr>
</table>
<table>
<tr><td colspan="3">Jogadores que usaram o meu Link</td></tr>
<tr>
	<td width="25"><center><b>#</b></center></td>
	<td><center><b>Jogador</b></center></td>
	<td><center><b>Cash's Ganhos</b></center></td>
</tr>
<?php
$query = mssql_query("SELECT cashs_ganhos FROM [$db_mssql].[dbo].[Indique_Site] WHERE login='$login'");
while($row = mssql_fetch_row($query))
{
	$rank++;
	$total += $row[0];
	if($row[0] >= 120)
	{
		$max = "onmousemove=\"ToolMsg('Limite de cash excedido no <b>Jogador N&ordm;$rank</b>, indique outra pessoa!')\"";
	}else
	{
		$max = "";
	}
	echo "
	<tr $max>
		<td><center>$rank</center></td>
		<td><center>Jogador N&ordm;$rank</center></td>
		<td><center>$row[0]</center></td>
	</tr>
	";
}
if($rank == 0)
{
	echo "<tr><td colspan=\"3\"><center>Você não indicou ninguem!</center></td></tr>";
}else
{
	echo "
	<tr>
		<td><center>#</center></td>
		<td><center>Total Ganho:</center></td>
		<td><center>$total</center></td>
	</tr>
	";
}
?>
</table>