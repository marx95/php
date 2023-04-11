<?php
//die();
$bau_limpo = "0x" . str_repeat("FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF", 120);

mssql_query("UPDATE [$db_mssql].[dbo].[warehouse] SET Items=$bau_limpo WHERE AccountID='$login'");
?>
<div class="paginas">
	<p><b>O baú foi limpo com sucesso!</b></p>
	<p>O seu baú foi limpo.</p>
</div>