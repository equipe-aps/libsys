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
$id_compra = $_POST['id_compra'];
$status_livro =  $_POST['status_livro'];

if($status_livro == "solicitado"){
    require_once("../conection/conexao.php");
    $sql = "UPDATE livros_comprados SET status = 'a caminho' where id_compra = $id_compra";
    $dados = mysql_query($sql);
}else if($status_livro == "a caminho"){
    require_once("../conection/conexao.php");
    $sql = "UPDATE livros_comprados SET status = 'entregue' where id_compra = $id_compra";
    $dados = mysql_query($sql);
} else if($status_livro == "entregue"){
    require_once("../conection/conexao.php");
    $sql = "UPDATE livros_comprados SET status = 'finalizado' where id_compra = $id_compra";
    $dados = mysql_query($sql);
}
?>

<script>
$(function() {
$("#ModalSuccess").modal();//chama o modal de compra bem sucedida 
});
</script>

<!-- Modal -->
  <!-- Central Modal Medium Success -->
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
          <p>Status alterado com Sucesso!</p>
        </div>
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-primary" onclick="window.location.href='vendidos-page.php'">OK!</button>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<?php
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