<?php
	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
	
	if($CtlCode < $CtlCode_GameMaster) die("<center><span id='Falha'>Página somente para GameMaster's</span></center>");
?>
<table>
<tr>
	<td>Regras de GameMaster</td>
</tr>
<tr>
	<td>Proibido eventos com Itens Full's, fazer somente com a autoriza&ccedil;&otilde; do ADM!</td>
</tr>
<tr>
	<td>Antes de fazer evento, verificar os eventos que j&aacute; foram feitos.</td>
</tr>
<tr>
	<td>Eventos somente com Gold's, outros pr&ecirc;mios falar com o ADM!</td>
</tr>
<tr>
	<td>N&atilde;o lotar os jogadores de Itens (N&atilde;o podemos desvalorizar o Gold e outros itens)!</td>
</tr>
</table>

<table>
<tr>
	<td colspan="2">Comandos de GameMaster</td>
</tr>
<tr>
	<td>! MSG</td>
    <td>Fala global e j&aacute; aparece o nome.</td>
</tr>
<tr>
	<td>/puxar NICK</td>
    <td>Puxa o jogador at&eacute; voc&ecirc;.</td>
</tr>
<tr>
	<td>/puxartodos</td>
    <td>Puxa o servidor at&eacute; voc&ecirc;. CUIDADO!</td>
</tr>
<tr>
	<td>/gmove Nick MapaID X Y</td>
    <td>Move o Jogador at&eacute; a posi&ccedil;&atilde;o indicada.</td>
</tr>
<tr>
	<td>/dc NICK</td>
    <td>Disconecta o jogador indicado.</td>
</tr>
</table>
<?php die(); ?>
<table>
	<tr><td colspan='2'>Painel GameMaster</td></tr>
	<tr>
		<td width="50%"><input type="button" onclick="carregar('painel_gm/banir_conta.php','Paginas_Centro','GET')" value="Banir conta" /></td>
		<td><input type="button" onclick="carregar('painel_gm/desbanir_conta.php','Paginas_Centro','GET')" value="Desbanir conta" /></td>
	</tr>
	<tr>
		<td><input type="button" onclick="carregar('painel_gm/banir_personagem.php','Paginas_Centro','GET')" value="Banir Personagem" /></td>
		<td><input type="button" onclick="carregar('painel_gm/desbanir_personagem.php','Paginas_Centro','GET')" value="Desbanir Personagem" /></td>
	</tr>
	<tr>
		<td><input type="button" onclick="carregar('painel_gm/personagens_banidos.php','Paginas_Centro','GET')" value="Personagens Banidos" /></td>
		<td><input type="button" onclick="carregar('painel_gm/contas_banidos.php','Paginas_Centro','GET')" value="Contas Banidos" /></td>
	</tr>
</table>
<div id="Paginas_Centro"></div>
<script>carregar('painel_gm/comandos.php','Paginas_Centro','GET')</script>