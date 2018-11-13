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
$id_livro = $_POST['remove-livro'];
echo $id_livro;
// cria a instrução SQL que vai selecionar os dados
$sql = "DELETE FROM livro WHERE id=$id_livro";
$dados = mysql_query($sql);

if($dados){
    header('location:pages/cadastrados-page.php');
}else{
    echo "Failed in operation: " . mysqli_error();
}
?>
</body>
</html>