<?php
$bloqueados = array("'", ";", "--", "<", ">","&","?", "+", "="); 

foreach($_POST as $valor)
{
	foreach($bloqueados as $bloqueados2)
	{
		if(substr_count(strtolower($valor), strtolower($bloqueados2)) > 0) die("<center>Caractere especial bloqueado: <b style = \"color: #CC3300\">$bloqueados2</b><br />Você não pode usar essa caractere, por favor, retire-a!</center>");
	}
}

foreach($_GET as $valor)
{
	foreach($bloqueados as $bloqueados2)
	{
		if(substr_count(strtolower($valor), strtolower($bloqueados2)) > 0) die("<center>Caractere especial bloqueado: <b style = \"color: #CC3300\">$bloqueados2</b><br />Você não pode usar essa caractere, por favor, retire-a!</center>");
	}
}
?>