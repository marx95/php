<?php
$bloqueados = array("'", ";", "--", "<", ">","&","?"); 
foreach($_POST as $valor)
{
	foreach($bloqueados as $bloqueados2)
	{
		if(substr_count(strtolower($valor), strtolower($bloqueados2)) > 0) die("<center>Bloqueado: $bloqueados2</center>");
	}
}
foreach($_GET as $valor)
{
	foreach($bloqueados as $bloqueados2)
	{
		if(substr_count(strtolower($valor), strtolower($bloqueados2)) > 0) die("<center>Bloqueado: $bloqueados2</center>");
	}
}
?>