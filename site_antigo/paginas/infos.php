<?php require_once("../config/masterconfig.php"); ?>
<table> 
<tr><td colspan="2">Informa&ccedil;&otilde;es do <?php echo $nome; ?></td></tr>
<tr> 
        <td width="50%">Nome</td> 
        <td><?php echo "$nome"; ?></td> 
</tr> <tr> 
        <td>Vers&atilde;o</td> 
        <td><?php echo "$version"; ?></td> 
  </tr> <tr>
        <td>Experiencia Normal </td>
	    <td><?php echo "$experience"; ?></td>
</tr>
<tr> 
        <td>BugBless</td> 
        <td><?php echo "$bb"; ?></td> 
</tr> <tr> 
        <td>Hor&aacute;rio </td> 
        <td>24H</td> 
    </tr> <tr> 
        <td>Criar Guilda</td> 
        <td><?php echo "$glevel"; ?></td> 
    </tr>
	</tr> <tr> 
        <td>Castle-Siege</td> 
        <td><?php echo "$csday"; ?></td> 
    </tr>
</table> 
<table id="Estatisticas">
<tr>
	<td colspan="2"><center>Carregando...</center></td>
</tr>
</table>
<table>
<tr><td colspan="3">Configura&ccedil;&atilde;o de Reset</td></tr>
<tr> 
	<td colspan="3"><p><b><?php echo $comoR; ?></b></p></td> 
</tr> 
<tr> 
	<td colspan="3"><b>Reset <?php echo $tipoR; ?></b></td> 
</tr> 
<tr>
  <td width='33%'>Tipo VIP </td>
  <td width='33%'>Level de Reset </td>
  <?php if($tipoR == "Acumulativo") echo "<!--"; ?><td width='33%'>Pontos por Reset </td><?php if($tipoR == "Acumulativo") echo "-->"; ?>
</tr>
<tr>
  <td>Free</td>
  <td><?php echo $levelR_Free; ?></td>
  <?php if($tipoR == "Acumulativo") echo "<!--"; ?><td><?php echo $PontosReset_Free; ?></td><?php if($tipoR == "Acumulativo") echo "-->"; ?>
</tr>
<tr>
  <td>Vip</td>
  <td><?php echo $levelR_Vip; ?></td>
  <?php if($tipoR == "Acumulativo") echo "<!--"; ?><td><?php echo $PontosReset_Vip; ?></td><?php if($tipoR == "Acumulativo") echo "-->"; ?>
</tr> 
</table> 
<table>
<tr><td colspan="2">Configura&ccedil;&atilde;o do Drop</td></tr>
		<tr> 
          <td width="50%">Drop Itens</td> 
          <td><?php echo "$drop"; ?>%</td> 
        </tr> 
		<tr> 
          <td>Drop Itens Excelent </td> 
          <td><?php echo "$dropEXE"; ?>%</td> 
        </tr> 
        <tr> 
          <td>Drop Itens Excelent c/ Skill</td> 
          <td><?php echo "$drop_skill"; ?>%</td> 
        </tr> <tr> 
          <td>Drop Itens c/ Excelent Luck </td> 
          <td><?php echo "$drop_luck"; ?>%</td> 
        </tr> 
</table> 
	  <table> 
<tr>
<!--
<td colspan="2">Sucessos e Rates</td></tr>
	  <tr>
        <td width="50%">+7 &aacute; +9 </td>
        <td><?php echo "$rate_equip"; ?>%</td>
      </tr> <tr>
        <td>+10</td>
        <td><?php echo "$rate_10"; ?>%</td>
      </tr> <tr> 
        <td>+11</td> 
        <td><?php echo "$rate_11"; ?>%</td> 
      </tr> <tr> 
        <td>+12</td> 
        <td><?php echo "$rate_12"; ?>%</td> 
      </tr> <tr> 
        <td>+13</td> 
        <td><?php echo "$rate_13"; ?>%</td> 
      </tr> 
	  </tr><tr> 
        <td>Sucesso Geral </td> 
	    <td><?php echo "$rate_geral"; ?>%</td> 
	    </tr> 
	-->
  </table> 
  <table>
  <tr><td colspan="2">Eventos do Jogo</td></tr>
  <tr>
  <td width="50%">Blood-Castle</td>
  <td><b style="color:#00CC33">Online</b></td>
  </tr>
  <tr>
  <td>Devil-Square</td>
  <td><b style="color:#00CC33">Online</b></td>
  </tr>
  <tr>
  <td>Chaos-Castle</td>
  <td><b style="color:#00CC33">Online</b></td>
  </tr>
  <tr>
  <td>Kalima-Event (Kundun)</td>
  <td><b style="color:#00CC33">Online</b></td>
  </tr>
  <tr>
  <td>Golden Dragon Invasion</td>
  <td><b style="color:#00CC33">Online</b></td>
  </tr>
  <tr>
  <td>White Wizard</td>
  <td><b style="color:#00CC33">Online</b></td>
  </tr>
  </table>
<table>
<tr><td colspan="2">Comandos</td></tr>
<?php
	for($i=0;$i <= 50;++$i)
	{
		if($comando[$i] <> "")
		{
			echo "<tr><td>$comando[$i]</td></tr>";
		}
	}
?>
</table>
<table>
<tr><td colspan="4">O Servidor <?php echo $nome; ?> &eacute; rodado com o melhor:</td></tr>
<tr>
<td><img src="img/dell.png" /></td>
<td><img src="img/xeon.png" /></td>
<td><img src="http://host.imguol.com/site/uolhost/images/out/novos/95x45-selo-patrocinado-claro.png" /></td>
<td><img src="img/windows.png" /></td>
</tr>
</table>
<script>carregar('cache/estatisticas.html','Estatisticas','GET');</script>