<?php
//coleta as informacoes vindas da URL
$estrela = $_GET["estrela"];
$id_vendedor = $_GET['id_v'];
$id_comprador = $_GET['id_c'];
$id_livro = $_GET['id_l'];
$id_compra = $_GET['id_compra'];

//insere no banco de dados os ids junto com a nota de avaliacao
require_once("conection/conexao.php");
$query="INSERT INTO avaliacao VALUES($id_compra, $id_vendedor, $id_comprador, $id_livro, $estrela)";
$result=mysql_query($query);


// volta para a tela do usuario
header('location:pages/user-page.php');
?>