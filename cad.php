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

$nome = $_POST["nome"];
$idade = $_POST["idade"];
$email = $_POST["user"];
$senha = $_POST["senha"];
$erro = 0;

if ((int)$idade < 16){
	header('location:index2.html');
	$erro = 1;
}

if ($erro == 0) {
	
	$sql = "INSERT INTO usuario (nome, idade, email, senha) VALUES ('$nome', '$idade', '$email', '$senha')";
	$result = mysql_query($sql);
	if (!$sql) {
		header('location:index2.html');
	} else{
		header('location:index.html');
	}
}
?>
</body>
</html>