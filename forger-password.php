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

$email = $_POST["user"];
$senha = $_POST["senha"];
$confsenha = $_POST["conf-senha"];

$erro = 0;

if ($senha != $confsenha){
    echo "<script>alert('asdasdas');</script>"; //use double quotes for js inside php!
    header('location:index.html');

    $erro = 1;
}

if ($erro == 0) {

    $sql = "UPDATE usuario  SET senha='$senha' WHERE email='$email'";
    $result = mysql_query($sql);
    header('location:index.html');
}
?>
</body>
</html>