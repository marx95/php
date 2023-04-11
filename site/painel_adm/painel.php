<?php
	require_once("../config/masterconfig.php");
	require_once("../config/sql.php");
	require_once("../config/conexao_mssql.php");
	$login = $_COOKIE["Marcao_Web_Login"];
	$senha = $_COOKIE["Marcao_Web_Senha"];
	require_once("accinfo.php");
	
	if($CtlCode < $CtlCode_Adminsitrador) die("<center><span id='Falha'>P&aacute;gina somente para Administradores</span></center>");
	$hapag = mssql_num_rows(mssql_query("SELECT id FROM [$db_mssql].[dbo].[Confirmacoes] WHERE aprovado = 0"));
	
	if($hapag > 0) $hapagstyle = "style='color:#FF0000; text-shadow: -1px 0 #000000, 0 1px #000000, 1px 0 #000000, 0 -1px #000000;'";
?>
<table>
	<tr><td colspan="2">Painel Administrador</td></tr>
	<tr>
		<td width="50%"><input type="button" onclick="carregar('painel_adm/c_goldscashs.php','Paginas_Centro','GET')" value="Colocar Gold's ou Cash's" /></td>
		<td><input type="button" onclick="carregar('painel_adm/antihack.php','Paginas_Centro','GET')" value="AntiHack" /></td>
	</tr>
	<tr>
		<td><input type="button" onclick="carregar('painel_adm/criargm.php','Paginas_Centro','GET')" value="Criar Acc GM" /></td>
		<td><input type="button" onclick="carregar('painel_adm/deletaracc.php','Paginas_Centro','GET')" value="Deletar Acc" /></td>
	</tr>
	<tr>
		<td><input type="button" onclick="carregar('painel_adm/c_vip.php','Paginas_Centro','GET')" value="Colocar Vip" /></td>
		<td><input type="button" onclick="carregar('painel_adm/t_vip.php','Paginas_Centro','GET')" value="Tirar Vip" /></td>
	</tr>
	<tr>
		<td><input type="button" onclick="carregar('painel_adm/d_full.php','Paginas_Centro','GET')" value="Deixar P. Full" /></td>
		<td><input type="button" onclick="carregar('painel_adm/t_full.php','Paginas_Centro','GET')" value="Zerar Personagem" /></td>
	</tr>
	<tr>
		<td><input type="button" onclick="carregar('painel_adm/premio_hora.php','Paginas_Centro','GET')" value="Premia&ccedil;&atilde;o Online" /></td>
		<td><input type="button" onclick="carregar('painel_adm/presentear.php','Paginas_Centro','GET')" value="Presentear Contas" /></td>
	</tr>
	<tr>
		<td><input type="button" onclick="carregar('painel_adm/v_cargos.php','Paginas_Centro','GET')" value="Ver Cargos" /></td>
		<td><input type="button" onclick="carregar('painel_adm/pagamentos.php?ap=0','Paginas_Centro','GET')" value="Ver Pagamentos" <?php echo $hapagstyle; ?>/></td>
	</tr>
	<tr>
		<td><input type="button" onclick="carregar('painel_adm/m_perso.php','Paginas_Centro','GET')" value="Modificar CtlCode" /></td>
		<td><input type="button" onclick="carregar('painel_adm/v_indicacoes.php','Paginas_Centro','GET')" value="Todas as Indica&ccedil;&otilde;es" /></td>
	</tr>
	<tr>
		<td><input type="button" onclick="carregar('painel_adm/noticias.php','Paginas_Centro','GET')" value="Not&iacute;cias" /></td>
		<td>&nbsp;</td>
	</tr>
    <tr>
    <td colspan="2"><b>Server IP: <i><?php echo $server_ip; ?></i></b></td>
    </tr>
</table>
<div id="Paginas_Centro"></div>