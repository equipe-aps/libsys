<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$con = mysql_connect("mysql.hostinger.com.br", "u923371810_admin", "retiroartes");
$db = mysql_select_db("u923371810_grupo", $con);
if (!$con) {
	die("Não foi possível  conectar ao Banco de Dados: " . mysql_error());
}
mysql_query("SET NAME 'utf8");
mysql_query('SET character_set_conection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_result=utf8');

?>