<?php require_once("../config/masterconfig.php"); ?>
<table>
	<tr>
	<td colspan="2">Regras do <?php echo $nome; ?> [30/01/2013]</td>
	</tr>
      <tr>
        <td width="40"><p>01</p></td>
        <td>As regras a seguir, poder&atilde;o ser alteradas sem pr&eacute;vio aviso. </td>
      </tr>
      <tr>
        <td><p>02</p></td>
        <td>Nomes Abusivos, apologias, racismo, no forum e no jogo, a <strong>conta</strong> ser&aacute; bloqueado. </td>
      </tr>
      <tr>
        <td><p>03</p></td>
        <td>Comercio de contas e itens (Fora ou dentro do jogo), essas negocia&ccedil;&otilde;es s&atilde;o de sua responsabilidade. </td>
      </tr>
      <tr>
        <td><p>04</p></td>
        <td>Proibimos palavr&otilde;es, xingamentos, racismo, e outros termos. Esses jogadores infratores, ser&atilde;o afastados da comunidade. </td>
      </tr>
      <tr>
        <td><p>05</p></td>
        <td>Efetuamos Bkp a cada 1H, durante este intervalo de 59minutos, pode ocorrer de dados n&atilde;o serem salvos, n&atilde;o nos responsabilizamos de itens, level, perdidos. </td>
      </tr>
      <tr>
        <td><p>06</p></td>
        <td>O servidor <?php echo $nome; ?> tenta manter-se online 99% do tempo, 24H por dia, manuten&ccedil;&otilde;es ser&atilde;o feitas de madrugada e avisadas na noticia do site. Pode ocorrer, a reinicializa&ccedil;&atilde;o momentanea do servidor, causando um Disconnect no jogador. </td>
      </tr>
      <tr>
        <td><p>07</p></td>
        <td>Programas Hackers, aproveitamento de bugs, no jogo, site e forum, resulta em <strong>Banimento</strong> da conta. </td>
      </tr>
      <tr>
        <td><p>08</p></td>
        <td>Nossa equipe de GameMaster"s e Administradores, nunca pedir&aacute; login e senhas dentro do jogo, ou no forum. Nossos sistemas possibilitam o acesso da Administra&ccedil;&atilde;o a conta. </td>
      </tr>
      <tr>
        <td><p>09</p></td>
        <td>Nomes Abusivos no forum e dentro do jogo, receber&atilde;o um Aviso via e-mail e ter&aacute; o prazo de 24H para mudar o nome, dependendo do grau de abusividade! </td>
      </tr>
      <tr>
        <td><p>10</p></td>
        <td>Nossos Lucros ganhos com o servidor, ser&aacute; usados para pagar contas do Site e do Host. </td>
      </tr>
      <tr>
        <td><p>11</p></td>
        <td>Para os jogadores que comprarem bonus no servidor, damos o prazo de entrega de 24 Horas!</td>
      </tr>
          <tr>
        <td><p>13</p></td>
        <td>Divulga&ccedil;&otilde;es em nosso forum, web chat ou dentro do jogo, resulta em banimento eterno da conta. </td>
      </tr>
      <tr>
        <td><p>14</p></td>
        <td>Proibimos que jogadores fechem entradas de mapas, isso prejudica o jogador que somente quer resetar. Mapas reservados para X1, GuildsWars, S&atilde;o: <strong>Devias2, Dungeon 2 e Outros mapas de Eventos do Jogo.</strong></td>
  </tr>
      <tr>
        <td><p>15</p></td>
        <td>N&atilde;o damos Reembolso de Itens perdidos por negocia&ccedil;&otilde;es ou falta de cuidado do respectivo dono. </td>
      </tr>
      <tr>
        <td><p>16</p></td>
        <td>Caso ocorrer o fechamento do servidor, n&atilde;o ter&aacute; devolu&ccedil;&atilde;o do dinheiro investido no servidor!</td>
      </tr>
      <tr>
        <td><p>17</p></td>
        <td>Qualquer dep&oacute;sito efetuado ser&aacute; considerado uma doa&ccedil;&atilde;o!</td>
      </tr>
      <tr>
        <td><p>18</p></td>
        <td>Comprovantes enviados v&aacute;lidos, ser&atilde;o guardados como backup, caso ocorra Reset total no servidor.</td>
      </tr>
</table>
<table>
<tr>
<td colspan="2">Voc&ecirc; concorda com os termos acima? </td>
</tr>
  <tr>
    <td width="50%">
		<input type="button" onclick="carregar('paginas/novaconta.php','Centro','GET')" value="Eu concordo" />
	</td>
    <td>
		<input type="button" onclick="carregar('paginas/principal.php','Centro','GET')" value="N&atilde;o concordo" />
	</td>
  </tr>
</table>