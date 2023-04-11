<?php
	die();
	header("Content-Type: text/html; charset=ISO-8859-1");
	ini_set("allow_url_fopen", 1);
	
	$fip = fopen("http://munovus.net/ip.txt", "r");
	$server_ip = fgets($fip);
	fclose($fip);
	
	//mssql
	$ip_mssql				= $server_ip;
	$u_mssql				= "sa";
	$p_mssql				= "094hjds38s52jkd2";
	$db_mssql				= "MuOnline";
	
	$cnc = @mssql_connect($ip_mssql, $u_mssql, $p_mssql) or die("Falha ao conectar no servidor de Banco de dados!");
	$db = @mssql_select_db($db_mssql, $cnc) or die("Falha ao conectar no Banco de dados primário!");
		
	//mssql_query("UPDATE Webshop SET valor_fixo=0 WHERE vGrupo >= 7 AND vGrupo <= 11");
	
	// Sets DK
	mssql_query("UPDATE Webshop SET valor_fixo=3 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 5");
	mssql_query("UPDATE Webshop SET valor_fixo=3 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 8");
	mssql_query("UPDATE Webshop SET valor_fixo=4 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 0");
	mssql_query("UPDATE Webshop SET valor_fixo=4 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 6");
	mssql_query("UPDATE Webshop SET valor_fixo=5 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 9"); // - Plate
	mssql_query("UPDATE Webshop SET valor_fixo=5 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 1"); // - Dragon
	mssql_query("UPDATE Webshop SET valor_fixo=6 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 16");
	mssql_query("UPDATE Webshop SET valor_fixo=6 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 17");
	mssql_query("UPDATE Webshop SET valor_fixo=7 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 21");
	
	// Sets DW
	mssql_query("UPDATE Webshop SET valor_fixo=3 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 2");
	mssql_query("UPDATE Webshop SET valor_fixo=3 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 4");
	mssql_query("UPDATE Webshop SET valor_fixo=4 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 7");
	mssql_query("UPDATE Webshop SET valor_fixo=4 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 3");
	mssql_query("UPDATE Webshop SET valor_fixo=5 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 18");
	mssql_query("UPDATE Webshop SET valor_fixo=6 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 22");
	//mssql_query("UPDATE Webshop SET valor_fixo=$preco_set[4] WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = ");
	
	// Sets Elf
	mssql_query("UPDATE Webshop SET valor_fixo=3 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 10");
	mssql_query("UPDATE Webshop SET valor_fixo=3 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 11");
	mssql_query("UPDATE Webshop SET valor_fixo=4 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 12");
	mssql_query("UPDATE Webshop SET valor_fixo=5 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 13");
	mssql_query("UPDATE Webshop SET valor_fixo=5 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 14");
	mssql_query("UPDATE Webshop SET valor_fixo=6 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 19");
	mssql_query("UPDATE Webshop SET valor_fixo=7 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 24");

	// Sets MG
	mssql_query("UPDATE Webshop SET valor_fixo=5 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 15");
	mssql_query("UPDATE Webshop SET valor_fixo=6 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 20");
	mssql_query("UPDATE Webshop SET valor_fixo=7 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 23");
	
	// Sets DL
	mssql_query("UPDATE Webshop SET valor_fixo=5 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 25");
	mssql_query("UPDATE Webshop SET valor_fixo=5 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 26");
	mssql_query("UPDATE Webshop SET valor_fixo=6 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 27");
	mssql_query("UPDATE Webshop SET valor_fixo=7 WHERE vGrupo >= 7 AND vGrupo <= 11 AND vIndex = 28");
	
	// Swords, Axes, Staffs, Bows, Shields, Maces, Spears
	mssql_query("UPDATE Webshop SET valor_fixo=CAST(SQRT(valor) AS int) WHERE vGrupo<7"); // - Faz por raiz quadrada da coluna valor
	
	// Aneis e Colares
	mssql_query("UPDATE Webshop SET valor_fixo=5 WHERE tipo='colares'");
	mssql_query("UPDATE Webshop SET valor_fixo=5 WHERE tipo='aneis'");
	
	// Asas
	mssql_query("UPDATE Webshop SET valor_fixo=20 WHERE tipo='asas'");
	
	// pets
	mssql_query("UPDATE Webshop SET valor_fixo=2 WHERE tipo='pets'");
?>