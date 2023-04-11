<?php require_once("../config/masterconfig.php"); ?>
<div class="paginas">
	<p><b>Bem Vindo ao Webshop do <?php echo $nome; ?></b></p>
    <table align="center">
    <tr>
    	<td><p><b>Gold's</b></p></td>
        <td><p><b>Cashs's</b></p></td>
    </tr>
    <tr>
        <td valign="top"><img src="img/golds_exemplo.png" style="border-radius: 3px; border:1px solid #000" /></td>
        <td valign="top"><img src="img/cashs_exemplo.png" style="border-radius: 3px; border:1px solid #000" /></td>
    </tr>
    </table>
    
    <p><b>Estátisticas</b></p>
	<p id='titens'>Carregando...</p>
	<p id='tcompras'>Carregando...</p>
</div>
<script>
carregar('config/funcs.php?func=1','titens','GET');
carregar('config/funcs.php?func=2','tcompras','GET');
</script>