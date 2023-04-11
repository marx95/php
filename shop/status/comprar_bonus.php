<?php 
	header('Content-Type: text/html; charset=ISO-8859-1');
	require_once("../config/masterconfig.php");
	$total = $_GET['total'];
	$falta = $_GET['falta'];
		
	switch($_GET['tipo'])
	{
		case 0: $Moeda = $StringBonus; break;
		case 1: $Moeda = $StringGolds; break;
	}
?>
<div id="Falha">
	<p><b>Faltou <i><?php echo $Moeda; ?></i> para comprar o item <?php echo $_GET['item']; ?></b></p>
	<p>Total: <?php echo $total . " " . $Moeda; ?></p>
	<p>Falta: <?php echo $falta . " " . $Moeda; ?></p>
	<?php if($_GET['tipo'] == 0){ echo "<p><a href='$bonificar' rel='external'>Clique aqui para Comprar $Moeda</a></p>";} ?>
</div>