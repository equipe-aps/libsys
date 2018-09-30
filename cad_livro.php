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
	$id = $_SESSION["id"];

require_once ("conection/conexao.php");

$arquivo = $_FILES['image']['name'];
$destino = "images/".$arquivo;
echo $arquivo;

move_uploaded_file($_FILES['image']['tmp_name'],$destino);

$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$preco = $_POST["preco"];
$qtd = $_POST["qtd"];
$categoria = $_POST["categoria"];
$descricao = $_POST["descricao"];
$image = $_POST["image"];
$erro = 0;

/*if ((int)$idade < 16){
	header('location:index2.html');
	$erro = 1;
}*/

if ($erro == 0) {
	
	$sql = "INSERT INTO livro (id_vendedor, titulo, autor, preco, descricao, categoria, imagem, qtd) VALUES ('$id', '$titulo', '$autor', '$preco', '$descricao', '$categoria', '$destino', '$qtd')";
	$result = mysql_query($sql);
	if (!$result) {
		//header('location:index2.html');
		die("Não foi possível  conectar ao Banco de Dados: " . mysql_error());
	} else{
		header('location:pages/user-page.php');
	}
}
?>
</body>
</html>