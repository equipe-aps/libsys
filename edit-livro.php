<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LibSys</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../css/style.css" rel="stylesheet">
    <!-- More dependences -->
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <!-- Link Drive Folder Images https://drive.google.com/drive/u/0/folders/15rtNhjuVU4cFGFKyF55ZQrQbvDlT2n8i -->
    <!-- Icon -->
    <link rel="shortcut icon"  href="../favicon.ico">	
</head>
<body>
<?php


session_start();
		$nome = $_SESSION['nome'];
		$email = $_SESSION['user'];
		$idade = $_SESSION['idade'];
		$senha = $_SESSION['password'];

require_once ("conection/conexao.php");

$id = $_POST["id"];
$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$qtd = $_POST["qtd"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria = $POST["categoria"];

if($_FILES['image']['name']==""){
    $imagem = $_POST["imagem-text"];
}else{
    $arquivo = $_FILES['image']['name'];
    $imagem = "images/".$arquivo;
    echo $arquivo;

    move_uploaded_file($_FILES['image']['tmp_name'],$imagem);
}

$erro = 0;

if ($erro == 0) {

	$busca="UPDATE livro SET autor='$autor', titulo='$titulo', preco=$preco, imagem='$imagem', qtd=$qtd, descricao='$descricao' WHERE id=$id";
    $dados = mysql_query($busca);
    // transforma os dados em um array
    //$linha = mysql_fetch_assoc($dados);
	if (!$dados) {
        
        echo "Erro";

	} else{
        
        ?>
	    <script>
        $(function() {
        $("#ModalSuccess").modal();//chama o modal de compra bem sucedida 
        });
        </script>
	    
        <div class="modal fade" id="ModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-notify modal-success" role="document">
            <!--Content-->
            <div class="modal-content">
              <!--Header-->
              <div class="modal-header">
                <p class="heading lead">Sucesso</p>
    
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="white-text">&times;</span>
                </button>
              </div>
    
              <!--Body-->
              <div class="modal-body">
                <div class="text-center">
                  <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                  <p>Seu livro foi editado com Sucesso!</p>
                </div>
              </div>
    
              <!--Footer-->
              <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" onclick="window.location.href='pages/cadastrados-page.php'">OK!</button>
              </div>
            </div>
            <!--/.Content-->
          </div>
        </div>
        <?php
        //header('location:pages/cadastrados-page.php');
	}
}
?>
<!-- SCRIPTS -->
        <!-- JQuery -->
        <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="../js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="../js/mdb.min.js"></script>
</body>
</html>