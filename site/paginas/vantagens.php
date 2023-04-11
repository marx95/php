<?php require_once("../config/masterconfig.php"); ?>
<table>
<tr><td colspan='3'>Vantagens VIP</td></tr>
      <tr>
        <td><b>#</b></td>
        <td><b>Free</b></td>
        <td><b>Vip</b></td>
      </tr>
	   <tr>
        <td><b>Level Resets</b></td>
        <td><?php echo $levelR_Free; ?></td>
        <td><?php echo $levelR_Vip; ?></td>
      </tr>
      <?php if($tipoR == "Acumulativo") echo "<!--"; ?>
      <tr>
        <td><b>Pontos por Resets</b></td>
        <td><?php echo $PontosReset_Free; ?></td>
        <td><?php echo $PontosReset_Vip; ?></td>
      </tr>
      <?php if($tipoR == "Acumulativo" || $tipoR == "acumulativo") echo "-->"; ?>
	  <tr>
        <td><b>Pontos por Level</b></td>
        <td>5/6/7</td>
        <td>6/7/8</td>
      </tr>
</table>
<table>
<tr><td colspan='3'>Comandos no Site</td></tr>
	<tr>
        <td><b>#</b></td>
        <td><b>Free</b></td>
        <td><b>Vip</b></td>
      </tr>
	  <tr>
        <td>Mudar Avatar</td>
        <td><img src="img/ok.png"></td>
        <td><img src="img/ok.png"></td>
      </tr>
      <tr>
        <td>Mudar Nick</td>
        <td><img src="img/no.png"></td>
        <td><img src="img/ok.png"></td>
      </tr>
      <tr>
        <td>Mudar Senha</td>
        <td><img src="img/no.png"></td>
        <td><img src="img/ok.png"></td>
      </tr>
      <tr>
        <td>Limpar Ba&uacute;</td>
        <td><img src="img/no.png"></td>
        <td><img src="img/ok.png"></td>
      </tr>
      <tr>
        <td>Auto XP</td>
        <td><img src="img/no.png"></td>
        <td><img src="img/ok.png"></td>
      </tr>
</table>
<table>
<tr><td colspan='4'>Comandos in Game</td></tr>
      <tr>
        <td><b>Comando</b></td>
        <td><b>Free</b></td>
        <td><b>Vip</b></td>
		<td><b>Vantagens</b></td>
      </tr>
	  <tr>
        <td><b>/bau</b></td>
        <td><img src="img/ok.png"></td>
        <td><img src="img/ok.png"></td>
		<td><b>3 ba&uacute;s para Free, 6 para VIP</b></td>
      </tr>
	  <tr>
        <td><b>/limparpk</b></td>
        <td><img src="img/no.png"></td>
        <td><img src="img/ok.png"></td>
		<td><b>Free tem que ir ao NPC</b></td>
      </tr>
	  <tr>
        <td><b>/reset</b></td>
        <td><img src="img/no.png"></td>
        <td><img src="img/ok.png"></td>
		<td><b>Free tem que ir ao NPC</b></td>
      </tr>
	  <tr>
        <td><b>/bar</b></td>
        <td><img src="img/no.png"></td>
        <td><img src="img/ok.png"></td>
		<td><b></b></td>
      </tr>
	  <tr>
        <td><b>/irbau</b></td>
        <td><img src="img/no.png"></td>
        <td><img src="img/ok.png"></td>
		<td><b></b></td>
      </tr>
	  </table>
	  <table>
	  <tr><td colspan='2'>Compre o seu vip e receba em menos de 24Horas</td></tr>
	  <tr>
        <td>Tempo</td>
		<td>Valor</td>
      </tr>
	  <tr>
        <td>7 Dias</td>
        <td>RS 7,00</td>
      </tr>
      <tr>
        <td>30  Dias</td>
        <td>R$ 15,00</td>
      </tr>
	  </table>