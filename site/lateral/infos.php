<?php require_once("../config/masterconfig.php"); ?>
<tr>
	<td colspan="2">Informa&ccedil;&otilde;es</td>
</tr>
<tr>
          <td width="50%">Vers&atilde;o</td>
          <td><?php echo $version; ?></td>
	    </tr>
	    <tr>
          <td>Exp</td>
          <td><?php echo $experience; ?></td>
	    </tr>
	    <tr>
          <td>Bug-Bless</td>
          <td><?php echo $bb; ?></td>
	    </tr>
		<tr>
          <td>Drop</td>
          <td><?php echo $drop; ?>%</td>
	    </tr>
		<tr>
          <td>Tipo Reset</td>
          <td><?php echo $tipoR; ?></td>
	    </tr><!--
		<tr>
          <td>Reset Level</td>
          <td><?php echo $levelR_Free; ?></td>
	    </tr>-->
		<?php if($tipoR <> "Acumulativo"){ echo "
		<tr>
          <td>Pontos Reset</td>
          <td>$PontosReset_Free</td>
	    </tr>";
		} ?>
		<tr>
          <td>Level M&aacute;ximo</td>
          <td><?php echo $maxlvl; ?></td>
	    </tr>
        <?php if($mostrar_total_online == 1) echo "
		<tr style=\"cursor: pointer\" onclick=\"carregar('paginas/jogadores_online.php','Centro','GET');\">
          <td>Jogando</td>
          <td><span id=\"UsersOnline\">Carregando...</span></td>
	    </tr>"; ?>
	<tr>
          <td colspan="2"><center>
          <a href="javascript: void(0)" onclick="carregar('paginas/infos.php','Centro','GET')"><b>Mais informa&ccedil;&otilde;es</b></a>
          </center></td>
	    </tr>
		<?php if($mostrar_total_online == 1) echo "<script>carregar('config/atualizador.php?id=0','UsersOnline','GET');</script>"; ?>