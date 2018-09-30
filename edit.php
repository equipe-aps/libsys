<!DOCTYPE html>
<html>
<head>
	<title></title>
		<meta charset="utf8"/>
		<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<?php


session_start();
		$nome = $_SESSION['nome'];
		$email = $_SESSION['user'];
		$idade = $_SESSION['idade'];
		$senha = $_SESSION['password'];

require_once ("conection/conexao.php");

$id = $_SESSION["id"];
$nome = $_POST["nome"];
$idade = $_POST["idade"];
$email = $_POST["user"];
$senha = $_POST["password"];

$erro = 0;

if ((int)$idade < 16){
	header('location:index2.html');
	$erro = 1;
}

if ($erro == 0) {

	$sql = "UPDATE usuario  SET nome='$nome', idade='$idade', email='$email', senha='$senha' WHERE id=$id";
	$result = mysql_query($sql);
	if (!$result) {
		header('location:user-page.php');
	} else{
		header('location:index.html');
	}
}
?>
</body>
</html>