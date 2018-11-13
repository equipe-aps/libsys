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
        $id_comprador = $_SESSION['id'];
        $nome = $_SESSION['nome'];
        $email = $_SESSION['user'];
        $idade = $_SESSION['idade'];
        $senha = $_SESSION['password'];
        $valor = $_COOKIE['nome'];

require_once ("conection/conexao.php");
    $id_livro = $_POST['comprar'];
    $qtd_comprada = $_POST['qtd-comprada'];

    // cria a instrução SQL que vai selecionar os dados
    $sql = "SELECT id, id_vendedor, autor, descricao, titulo, preco, imagem, qtd FROM livro WHERE id=$id_livro";
    $dados = mysql_query($sql);
    $linha = mysql_fetch_assoc($dados);
    
require_once ("../conection/conexao.php");
    $id_vendedor = $_SESSION['id_vendedor'];
    $sql_vendedor="SELECT nome, email FROM usuario JOIN livro ON $id_vendedor = usuario.id";
    $dados_vendedor = mysql_query($sql_vendedor);
    $linha_vendedor = mysql_fetch_assoc($dados_vendedor);
    
    //cookie do livro
    setcookie('id', $linha['id'], (time() + (2 * 3600)));
    setcookie('titulo', $linha['titulo'], (time() + (2 * 3600)));
    setcookie('imagem', $linha['imagem'], (time() + (2 * 3600)));
    setcookie('autor', $linha['autor'], (time() + (2 * 3600)));
    setcookie('descricao', $linha['descricao'], (time() + (2 * 3600)));
    setcookie('preco', $linha['preco'], (time() + (2 * 3600)));

    setcookie('id_vendedor', $_SESSION['id_vendedor'], (time() + (2 * 3600)));
    setcookie('nome_vendedor', $linha_vendedor['nome'], (time() + (2 * 3600)));
    setcookie('email_vendedor', $linha_vendedor['email'], (time() + (2 * 3600)));


require_once ("conection/conexao.php");
$id_livro = $_POST['comprar'];
$qtd_comprada = $_POST['qtd-comprada'];

// cria a instrução SQL que vai selecionar os dados
$sql = "SELECT id, id_vendedor, autor, descricao, titulo, preco, imagem, qtd FROM livro WHERE id=$id_livro";
$dados = mysql_query($sql);
$linha = mysql_fetch_assoc($dados);

require_once ("../conection/conexao.php");
        $id_vendedor = $_SESSION['id_vendedor'];
        $sql_vendedor="SELECT nome, email FROM usuario JOIN livro ON $id_vendedor = usuario.id";
        $dados_vendedor = mysql_query($sql_vendedor);
        $linha_vendedor = mysql_fetch_assoc($dados_vendedor); 

if($qtd_comprada == 0){
    
    echo $qtd_comprada;
    echo "qtd: ".$id_comprador;
    ?>
    
    <script>
    $(function() {
    $("#ModalErrorZero").modal();//chama o modal de erro
    });
    </script>
    
    <!--Modal: modalError-->
    <div class="modal fade" id="ModalErrorZero" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content text-center">
          <!--Header-->
          <div class="modal-header d-flex justify-content-center">
            <p class="heading">Erro</p>
          </div>
            
          <!--Body-->
          <div class="modal-body">
            <div class="text-center">
                <i class="fa fa-times fa-4x animated rotateIn"></i>
                <p>Você esqueceu de selecionar a quantidade que deseja comprar!</p>
            </div>
          </div>

          <!--Footer-->
          <div class="modal-footer flex-center">
            <a href="pages/livro-detalhado-cookie.php" class="btn  btn-outline-danger">OK</a>
<!--            <button type="button" class="btn btn-primary" onclick="window.location.href='pages/user-page.php'">OK!</button>-->
          </div>
        </div>
        <!--/.Content-->
      </div>
    </div>
<!--Modal: modalError-->
    
    <?php
    
}else if($qtd_comprada > $linha['qtd']){
    echo "errou quantidade";
    ?>
    
    <script>
    $(function() {
    $("#ModalError").modal();//chama o modal de erro
    });
    </script>
    
    <!--Modal: modalError-->
    <div class="modal fade" id="ModalError" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content text-center">
          <!--Header-->
          <div class="modal-header d-flex justify-content-center">
            <p class="heading">Erro</p>
          </div>
            
          <!--Body-->
          <div class="modal-body">
            <div class="text-center">
                <i class="fa fa-times fa-4x animated rotateIn"></i>
                <p>A quantidade selecionada excede o estoque!</p>
            </div>
          </div>

          <!--Footer-->
          <div class="modal-footer flex-center">
            <a href="pages/livro-detalhado-cookie.php" class="btn  btn-outline-danger">OK</a>
<!--            <button type="button" class="btn btn-primary" onclick="window.location.href='pages/user-page.php'">OK!</button>-->
          </div>
        </div>
        <!--/.Content-->
      </div>
    </div>
<!--Modal: modalError-->

    <?php

}else{
    echo "entrou sucesso";
    //variavel contendo o restante de livros apos a compra
    $qtd_restante = ($linha['qtd']) - ($qtd_comprada);
    //atualiza a tabela livro com a nova quantidade do livro comprado
    require_once ("conection/conexao.php");
    $atualizar_livro_comprado = "UPDATE livro SET qtd = $qtd_restante WHERE id=$id_livro";
    $result_atualizacao = mysql_query($atualizar_livro_comprado);
    //insere a compra na tabela de compras
    require_once("conection/conexao.php");
    $comprar_livro = "INSERT INTO livros_comprados values($id_livro, $id_comprador, $id_vendedor, $qtd_comprada, NOW())";
    $result = mysql_query($comprar_livro);
    echo "Processando, por favor aguarde...". mysqli_error();
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
              <p>Sua compra foi efetuada com Sucesso! Obrigado por comprar com a LibSys. Volte sempre!</p>
            </div>
          </div>

          <!--Footer-->
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-primary" onclick="window.location.href='pages/user-page.php'">OK!</button>
          </div>
        </div>
        <!--/.Content-->
      </div>
    </div>
<!-- Central Modal Medium Success-->

    <?php
    
}
    
if($dados){
//    header('location:pages/cadastrados-page.php');
    
}else{
    echo "Failed in operation: " . mysqli_error();
}
?>
<!-- SCRIPTS -->
        <!-- JQuery -->
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>