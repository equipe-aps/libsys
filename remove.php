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
$id = $_SESSION['id'];

// zerar qtd dos livros do usuario
$zerar = "UPDATE livro SET qtd=0 WHERE id_vendedor=$id";
$result_sql_zerar = mysql_query($zerar);

require_once ("conection/conexao.php");
$id = $_SESSION['id'];
// cria a instrução SQL que vai selecionar os dados
$sql = "DELETE FROM usuario WHERE id=$id";
$dados = mysql_query($sql);

if($dados){
	header('location:index.html');
}else{
	header('location:user-page.php');
}
?>
</body>
</html>