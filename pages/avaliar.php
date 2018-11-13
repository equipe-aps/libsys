<?php

$nota = $_GET['estrela'];
$id_compra = $_GET['id_compra'];

echo "nota: ".$nota."<br>";
echo "id_compra: ".$id_compra;

require_once("../conection/conexao.php");
$sql="SELECT id_livro, id_vendedor, id_comprador FROM livros_comprados WHERE id_compra=$id_compra";
$dados = mysql_query($sql);
$linha = mysql_fetch_assoc($dados);

//*************************************
$id_vendedor = $linha['id_vendedor'];
$id_comprador = $linha['id_comprador'];
$id_livro = $linha['id_livro'];
echo $id_livro."<br>";
echo $id_vendedor."<br>";
echo $id_comprador."<br>";
//*************************************


//insere no banco de dados os ids junto com a nota de avaliacao
require_once("../conection/conexao.php");
$query = "INSERT INTO avaliacao values($id_compra, $id_vendedor, $id_comprador, $id_livro, $nota)";
$result = mysql_query($query);

ini_set('display_errors', '1');
//volta para a tela do usuario
header('location:comprados-page.php');

?>