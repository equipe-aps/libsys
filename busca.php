<!DOCTYPE html>
<html>
<head>
	<title></title>
		<meta charset="utf8"/>
		<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<?php
require_once ("conection/conexao.php");

$busca="SELECT  autor, titulo, preco, imagem, qtd FROM livro ORDER BY id desc";
$dados = mysql_query($sql);

?>
</body>
</html>