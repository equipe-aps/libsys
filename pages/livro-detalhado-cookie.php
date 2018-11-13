<!--
Autores: Felipe Gomes
		 Gustavo Soares
		 Joel Felipe
-->
<!doctype html>
<html lang="pt-br">

<head>

    <?=
            session_start();
            if((!isset ($_SESSION['user']) == true) and (!isset ($_SESSION['password']) == true))
            {
            unset($_SESSION['user']);
            unset($_SESSION['password']);
            header('location:index.php');
            }
            
            $nome = $_SESSION['nome'];
            $email = $_SESSION['user'];
            $idade = $_SESSION['idade'];
            $senha = $_SESSION['password'];
            
            require_once ("../conection/conexao.php");
            $sql = "SELECT * FROM usuario WHERE email='$email'";
            $dados = mysql_query($sql);
            // transforma os dados em um array
            $linha = mysql_fetch_assoc($dados);
            
            $id_usuario = $linha['id'];
            $nome = $linha['nome'];
            $email = $linha['email'];
            $idade = $linha['idade'];
            $senha = $linha['senha'];
        ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LibSys</title>
    <?php header("Content-Type: text/html; charset=utf-8",true);?>
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
    require_once ("../conection/conexao.php");
    $id = $_POST['id'];

    $sql="SELECT id, id_vendedor, autor, descricao, titulo, preco, imagem, qtd FROM livro WHERE id=$id ORDER BY id desc";
    $dados = mysql_query($sql);
    $linha = mysql_fetch_assoc($dados);

    ?>


    <!--Main Navigation-->
    <header class="header-user-page">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" style="background-color: #2E2E2E">
            <div class="container">
                <a class="navbar-brand h1 mb-0" href="user-page.php">
                    <img src="https://drive.google.com/uc?id=1A9hBkYD_Nkb2W9dg7z31jt87jcnSbRcU" height="30" alt="Logo do site">
                </a>
                <!--</div>-->
                <!--<div class="container">-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSite">
                    <ul class="navbar-nav ml-auto mr-auto">
                        <li class="nav-item">
                            <a href="user-page.php" class="nav-link">Início</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">Vender Livros</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" data-toggle="modal" data-target="#cadastrar-livro">Cadastrar Livros</a>
                                <a class="dropdown-item" href="cadastrados-page.php">Livros Cadastrados</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#editar-livro">Editar Livro</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="comprados-page.php" class="nav-link">Livros Comprados</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Livros Vendidos</a>
                        </li>
                    </ul>
                    
                    <!-- SINO DE NOTIFICACAO -->
                    <?php
                    require_once("../conection/conexao.php");
                    $sql1 = "SELECT livros_comprados.*, livro.* FROM livros_comprados JOIN livro ON livros_comprados.id_vendedor = $id_usuario AND livros_comprados.status = 'solicitado' AND livro.id = livros_comprados.id_livro";
                    $dados1 = mysql_query($sql1);
                    // transforma os dados em um array
                    $linha1 = mysql_fetch_assoc($dados1);
                    // calcula quantos dados retornaram
                    $total = mysql_num_rows($dados1);
                    $count = 0;
                    ?>
                    <div class="dropdown" style="float: right; padding: 13px">
                        <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                            <i class="fa fa-bell-o" style="font-size: 20px; float: left; color: white">
                            </i>
                        </a>
                        
                        <ul class="dropdown-menu dropdown-menu-left pull-right" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <a href="#" class="dropdown-menu-header">Novos Pedidos</a>
                                <?php $id_usuario ?>
                            </li>
                            <ul class="timeline timeline-icons timeline-sm" style="margin:10px;width:210px">
                                
                                <?php
                                if($total > 0){
                                    do{
                                    ?>
                                    <li>
                                        <p>
                                            <span class="timeline-icon"><i class="fa fa-book" style="color:#42a5f5"></i></span>
                                            <a href="vendidos-page.php" class="grey-text"><?=$linha1['titulo']?></a>
                                            <span class="timeline-date"><?=$linha1['data_compra']?></span>
                                        </p>
                                    </li>
                                    <?php
                                    //incrementa contador de notificacoes
                                    $count++;
                                    }while($linha1 = mysql_fetch_assoc($dados1));
                                }else{
                                ?>
                                    <li>
                                        <p>
                                            <span class="timeline-icon"><i class="fa fa-check" style="color:#00C851"></i></span>
                                            Nenhuma notificação
                                        </p>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                            
                        </ul>
                        
                        <?php
                        if($count > 0){
                        ?>
                            <!-- contador de notificacoes -->
                            <span class="badge badge-notify badge-danger"><?=$count?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- SINO DE NOTIFICACAO -->
                    
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navdrop">Olá,
                                <?=$nome?>
                                <i class="fa fa-user ml-2"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editar-cadastro">Editar Cadastro</a>
                                <a class="dropdown-item" href="../index.html">Sair</a>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--modal confirmacao de remocao do usuario-->
        <!-- Button trigger modal-->
        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalConfirmDeleteUser">Launch modal</button>-->

        <!--Modal: modalConfirmDelete-->
        <div class="modal fade" id="modalConfirmDeleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-notify modal-danger " role="document">
                <!--Content-->
                <div class="modal-content text-center">
                    <!--Header-->
                    <div class="modal-header d-flex justify-content-center">
                        <p class="heading">Deseja Continuar?</p>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                        <i class="fa fa-times fa-4x animated rotateIn"></i>
                        <p>Tem certeza que deseja excluir esta conta? Os livros que foram inseridos por este usuário serão zerados
                            do estoque. Deseja Continuar?</p>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer flex-center">
                        <a href="../remove.php" class="btn  btn-outline-danger waves-effect">Sim</a>
                        <a class="btn  btn-danger waves-effect" data-dismiss="modal">Não</a>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!--Modal: modalConfirmDelete-->
        <!--modal confirmacao de remocao do usuario-->

        <!-- Modal popup editar cadastro -->
        <div class="modal fade" id="editar-cadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Editar Cadastro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="../edit.php" id="formcad" name="formcad">
                            <div class="modal-body">
                                <!-- nome do usuario -->
                                <div class="md-form form-sm">
                                    <i class="fa fa-user prefix"></i>
                                    <input type="text" id="nome" class="form-control form-control-sm validate" name="nome" value="<?=$nome?>">
                                    <label for="nome">Nome</label>
                                </div>
                                <!-- email -->
                                <div class="md-form form-sm">
                                    <i class="fa fa-envelope prefix"></i>
                                    <input type="email" id="user" class="form-control form-control-sm validate" name="user" value="<?=$email?>">
                                    <label for="user">Email</label>
                                </div>
                                <!-- idade -->
                                <div class="md-form form-sm">
                                    <i class="fa fa-calendar prefix"></i>
                                    <input type="text" id="idade" class="form-control form-control-sm validate" name="idade" value="<?=$idade?>">
                                    <label for="idade">Idade</label>
                                </div>
                                <!-- senha -->
                                <div class="md-form form-sm">
                                    <i class="fa fa-lock prefix"></i>
                                    <input type="password" id="password" class="form-control form-control-sm validate" name="password" value="<?=$senha?>">
                                    <label for="password">Senha</label>
                                </div>

                            </div>
                            <div class="modal-footer col">

                                <input type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" href="#modalConfirmDeleteUser" value="Remover">

                                <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Sair" />
                                <input type="submit" class="btn btn-primary" value="Editar" />
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal popup cadastro -->

        <!-- modal popup cadastrar livro -->
        <div class="modal fade" id="cadastrar-livro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" action="../cad_livro.php" enctype="multipart/form-data" id="formcadlivro" name="formcadlivro">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Cadastre aqui seu livro</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-3">
                            <div class="border-light">
                                <!-- Name -->
                                <input type="text" id="titulo" name="titulo" class="form-control mb-4" placeholder="Título">
                            </div>

                            <div class="border-light">
                                <!-- Email -->
                                <input type="text" id="autor" name="autor" class="form-control mb-4" placeholder="Autor">
                            </div>

                            <!--preco-->
                            <div class="border-light input-group ">
                                <div class="input-group-prepend mb-4">
                                    <div class="input-group-text">R$</div>
                                </div>
                                <input type="number" id="preco" name="preco" min="00.00" step="0.01" class="form-control py-0 mb-4" placeholder="00,00">
                            </div>

                            <div class="form-row ">
                                <div class="col border-light">
                                    <!-- categoria -->
                                    <select id="categoria" name="categoria" class="browser-default custom-select">
                                        <option value="" disabled>Selecione uma categoria</option>
                                        <option value="didatico" selected>Didático</option>
                                        <option value="fantasia">Fantasia</option>
                                        <option value="infantil">Infantil</option>
                                        <option value="geral">Geral</option>
                                    </select>
                                </div>
                                <div class="col border-light">
                                    <!-- Last name -->
                                    <input type="number" id="qtd" name="qtd" min="1" max="5" step="1" class="form-control py-0 mb-4" placeholder="Qtd">
                                </div>
                            </div>

                            <!-- Message -->
                            <div class="form-group border-light mb-4">
                                <textarea class="form-control rounded-0 md-textarea mb-4" id="descricao" name="descricao" rows="3" lenght="300" placeholder="Descrição"></textarea>
                            </div>

                            <script>
                                $(function() {
										// We can attach the `fileselect` event to all file inputs on the page
										$(document).on('change', ':file', function() {
										var input = $(this),
											numFiles = input.get(0).files ? input.get(0).files.length : 1,
											label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
										input.trigger('fileselect', [numFiles, label]);
										});

										// We can watch for our custom `fileselect` event like this
										$(document).ready( function() {
											$(':file').on('fileselect', function(event, numFiles, label) {

												var input = $(this).parents('.input-group').find(':text'),
													log = numFiles > 1 ? numFiles + ' files selected' : label;

												if( input.length ) {
													input.val(log);
												} else {
													if( log ) alert(log);
												}
											});
										});
									});
								</script>
                            <!--teste-->
                            <div class="input-group mb-3">
                                <label class="input-group-prepend">
                                    <span class="input-group-text">Upload
                                        <input type="file" id="image" name="image" style="display: none;" multiple>

                                    </span>
                                </label>
                                <div class="custom-file">
                                    <input type="text" class="custom-file-input form-control" readonly value="Nenhuma Imagem">
                                </div>

                            </div>
                            <small id="image-preference" class="form-text text-muted" style="margin-top: -5%">
                                De preferência com as dimensões 300x400
                            </small>

                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <input type="submit" class="btn btn-unique" value="Cadastrar Livro!">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal cadastrar livro -->

        <!-- BUSCA -->
        <div style="margin-left:25%; margin-bottom:80px; margin-top:80px" class="align-center justidy-content-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h2>O que você procura?</h2>
                        <div id="custom-search-input">
                            <div class="input-group btn-group col-md-12" role="group">
                                <form id="form-busca" name="form-busca" class="input-group form-inline md-form form-sm" method="post" action="busca-page.php">
                                    <input id="busca-digitada" name="busca-digitada" type="text" class="form-control form-control-sm mr-3 w-75" placeholder="Buscar"/>
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    <?php
                                    //armazena o valor digitado em uma variavel para ser usado na consulta
                                    require_once("../conection/conexao.php");
                                    $buscas = $_POST["busca-digitada"];
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BUSCA-->


        <!--modal comprar livro-->

        <!-- Modal: modalQuickView -->
        <div class="modal fade in" id="modalComprarLivro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <div class="row">
                  <div class="col-lg-5">
                    <!--Carousel Wrapper-->
                    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                      <!--Slides-->
                      <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="../<?=$_COOKIE['imagem']?>"
                            alt="First slide">
                        </div>
                      </div>
                      <!--/.Slides-->
                      <!--Controls-->
                      <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                      <!--/.Controls-->
                    </div>
                    <!--/.Carousel Wrapper-->
                  </div>
                  <div class="col-lg-7">
                    <h2 class="h2-responsive product-name">
                      <strong><?=$_COOKIE['titulo']?></strong>
                    </h2>
                    <h4 class="h4-responsive">
                      <span class="green-text">
                        <strong>R$ <?=$_COOKIE['preco']?></strong>
                      </span>
                      <span class="grey-text">
                        <small>
                          <s>R$ <?=$_COOKIE['preco']+20?></s>
                        </small>
                      </span>
                    </h4>

                    <!--Accordion wrapper-->
                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">

                      <!-- Accordion card -->
                      <div class="card">

                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingOne">
                          <a class="collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h5 class="mb-0">
                              Descrição <i class="fa fa-angle-down rotate-icon"></i>
                            </h5>
                          </a>
                        </div>

                        <!-- Card body -->
                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne"
                          data-parent="#accordion">
                          <div class="card-body">
                            <?=$_COOKIE['descricao']?>
                          </div>
                        </div>
                      </div>
                      <!-- Accordion card -->

                      <!-- Accordion card -->
                    <!--  <div class="card">-->

                        <!-- Card header -->
                    <!--    <div class="card-header" role="tab" id="headingTwo">-->
                    <!--      <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false"-->
                    <!--        aria-controls="collapseTwo">-->
                    <!--        <h5 class="mb-0">-->
                    <!--          Details <i class="fa fa-angle-down rotate-icon"></i>-->
                    <!--        </h5>-->
                    <!--      </a>-->
                    <!--    </div>-->

                        <!-- Card body -->
                    <!--    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">-->
                    <!--      <div class="card-body">-->
                    <!--        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad-->
                    <!--        squid. 3 wolf moon officia aute,-->
                    <!--        non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.-->
                    <!--      </div>-->
                    <!--    </div>-->
                    <!--  </div>-->
                      <!-- Accordion card -->

                      <!-- Accordion card -->
                    <!--  <div class="card">-->

                        <!-- Card header -->
                    <!--    <div class="card-header" role="tab" id="headingThree">-->
                    <!--      <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false"-->
                    <!--        aria-controls="collapseThree">-->
                    <!--        <h5 class="mb-0">-->
                    <!--          Shipping <i class="fa fa-angle-down rotate-icon"></i>-->
                    <!--        </h5>-->
                    <!--      </a>-->
                    <!--    </div>-->

                        <!-- Card body -->
                    <!--    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree"-->
                    <!--      data-parent="#accordion">-->
                    <!--      <div class="card-body">-->
                    <!--        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad-->
                    <!--        squid. 3 wolf moon officia aute,-->
                    <!--        non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.-->
                    <!--      </div>-->
                    <!--    </div>-->
                    <!--  </div>-->
                      <!-- Accordion card -->
                    <!--</div>-->
                    <!--/.Accordion wrapper-->

                    <!-- Add to Cart -->
                    <div class="card-body">
                      <form method="post" action="../comprar-livro.php">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="md-form">
                              <select id="qtd-comprada" name="qtd-comprada" class="mdb-select colorful-select dropdown-primary">
                                  <option value="0" disabled selected>Selecione a Quantidade</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>
                          </div>
                        </div>
                      </div>

                      <div class="text-center">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                        <input type="hidden" id="comprar" name="comprar" value="<?=$_COOKIE['id']?>">
                        <button type="submit" class="btn btn-primary">Comprar
                          <i class="fa fa-shopping-cart ml-2" aria-hidden="true"></i>
                        </button>
                      </div>
                        </form>
                    </div>
                    <!-- /.Add to Cart -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    </header>
    <!--Main Navigation-->

    <!--Main Layout-->
    <main>

        <section class="row" style="margin: 150px; margin-top:-10%; ;">
            <div id="area-livro" class="col row" style="margin:10px; ;">
                <div id="imagem-livro" class="col" style="margin: 10px; padding:10px; ;">
                    <img src="../<?=$_COOKIE['imagem']?>" height="350" width="250" style="border:1px solid black" alt="<?=$_COOKIE['titulo']?>">

                </div>
                <!--conteudo da descricao do livro-->
                <div id="informacao" class="col" style="margin: 10px; padding-top:40px; ;">

                    <h4 class="font-weight-bold mb-3"><?=$_COOKIE['titulo']?></h4>
                    <!--autor com tab-->
                    <h6 class="font-weight-bold grey-text mb-3" style="padding-left:2em ">Autor: <?=$_COOKIE['autor']?></h6>
                    <hr class="grey"/>
                    <h6 class="font-weight-bold mb-3">Quantidade Disponível: <?=$_COOKIE['qtd']?></h6>
                    <h4 class="h3-responsive font-weight-bold mb-3">PREÇO: R$<?=$_COOKIE['preco']?></h4>
                    <div class="row justify-content-md-center center-block">

                        <form method="post" action="#" name="formcomprar" id="formcomprar">
                            <!--armazena o id do livro para mandar para a  pagina de detalhamento-->
                            <input type="hidden" name="id" value="<?=$_COOKIE['id']?>"/>
                            <button type="button" name="id" value="<?=$_COOKIE['id']?>" class="btn btn-success waves-effect"
                                    data-toggle="modal" data-target="#modalComprarLivro">
                                <i class="fa fa-shopping-cart" style="margin-right:10px;"></i>Comprar</button>
                        </form>
                        <!--<form method="post" action="#" name="formcomprar" id="formcomprar">-->
                            <!--armazena o id do livro para mandar para a  pagina de detalhamento-->
                        <!--    <input type="hidden" name="id" value="<?=$_COOKIE['id']?>"/>-->
                        <!--    <button name="id" value="<?=$_COOKIE['id']?>" class="btn btn-outline-success waves-effect">-->
                        <!--        <i class="fa fa-shopping-cart" style="margin-right:10px;"></i>Adicionar ao carrinho-->
                        <!--    </button>-->
                        <!--</form>-->
                    </div>

                </div>
                <div id="descricao" class="row container" style="margin: 10px; padding-top:0px; border-radius: 10px; border: 1px solid #2E2E2E;">
                    <div id="descricao-title" class="col" style="margin: 10px; margin-bottom:0px; padding-top:0px;;">
                        <h4 class="font-weight-bold mb-0">Descrição:</h4>
                    </div>
                    <div class="w-100"></div>
                    <div id="descricao=text" class="col" style="margin: 10px; padding-top:-10px;;">
                        <p style="overflow: auto; word-wrap:break-word; white-space: -moz-pre-wrap; white-space: pre-warp;">
                            <?=$_COOKIE['descricao']?>
                        </p>
                    </div>

                </div>
            </div>
            <div id="area-vendedor" class="col" style=" margin:10px;;">
                <!--<div class="row justify-content-md-center col-xs-2 center-block" style="float:none; margin:10px; border:1px solid black;">
                    informacao do livro
                </div>-->
                <!-- Section: Testimonials v.1 -->
                <section class="text-center my-5" style="">

                  <!-- Section heading -->
                  <!-- Section description -->


                  <!-- Grid row -->
                  <div class="row">

                    <!-- Grid column -->
                    <div class="col-lg-6 col-xs-6 col-md-12 mb-5 d-md-flex container">
                        <div class="avatar mb-md-0 mb-4 mx-4 container" style="border-radius: 10px; ; background: linear-gradient(#bbdefb, #fff);">
                            <h5 class="h1-responsive font-weight-bold mb-2" style="padding-top:20px;">Vendedor</h5>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Default-welcomer.png" height="100" width="100" class="rounded z-depth-2" alt="Sample avatar" >

                            <div class="mx-4">
                                <!--consulta informacao vendedor-->
                                <?php
//                                require_once ("../conection/conexao.php");
//                                $id_vendedor = $_SESSION['id_vendedor'];
//                                $sql="SELECT nome, email FROM usuario JOIN livro ON $id_vendedor = usuario.id";
//                                $dados = mysql_query($sql);
//                                $linha = mysql_fetch_assoc($dados);
//
                                ?>


                                <h4 class="font-weight-bold mb-0" style="margin-top:10px;"><?=$_COOKIE['nome_vendedor']?></h4>
                                <div class="orange-text">
                                    <?php
                                    for ($i = 0; $i < $_COOKIE['media_vendedor']; $i++) {
                                        ?>
                                        <i class="fa fa-star"> </i>
                                        <?php
                                    }

                                    ?>
                                    <!--<i class="fa fa-star-half-full"> </i>-->
                                </div>
                                <h6 class="font-weight-bold grey-text mb-3"><?=$_COOKIE['email_vendedor']?></h6>
                                <p class="grey-text"></p>

                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                  </div>
                  <!-- Grid row -->

                </section>
                <!-- Section: Testimonials v.1 -->
            </div>
        </section>



        <!--modal comprar livro-->

    </main>
    <!--Main Layout-->

    <!--Footer-->
    <footer class="page-footer font-small unique-color-dark pt-3">

        <!-- Footer Elements -->
        <div class="container">

            <!-- Call to action -->
            <ul class="list-unstyled list-inline text-center py-2">
                <li class="list-inline-item">
                    <!-- mensagem do footer -->
                    <h5 class="mb-1">LibSys, o mundo da leitura perto de você</h5>
                </li>

            </ul>
            <!-- Call to action -->

        </div>
        <!-- Footer Elements -->
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">
            ? 2018 Copyright
            <a href="../index.php"> LibSys Online</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!--Footer-->

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
