<!--
Autores: Felipe Gomes
         Gustavo Soares
         Joel Felipe
-->
<!doctype html>
<html lang="pt-br">

    <head>
        <?php
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

        <!--Main Navigation-->
        <header class="header-user-page">
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" style="background-color: #2E2E2E">
                <div class="container">
                    <a class="navbar-brand h1 mb-0" href="#">
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
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="comprados-page.php" class="nav-link">Livros Comprados</a>
                            </li>
                            <li class="nav-item">
                                <a href="vendidos-page.php" class="nav-link">Livros Vendidos</a>
                            </li>
                        </ul>
                        <!-- SINO DE NOTIFICACAO -->
                        <?php
                        require_once("../conection/conexao.php");
                        $sql = "SELECT livros_comprados.*, livro.* FROM livros_comprados JOIN livro ON livros_comprados.id_vendedor = $id_usuario AND livros_comprados.status = 'solicitado' AND livro.id = livros_comprados.id_livro";
                        $dados = mysql_query($sql);
                        // transforma os dados em um array
                        $linha = mysql_fetch_assoc($dados);
                        // calcula quantos dados retornaram
                        $total = mysql_num_rows($dados);
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
                                                <a href="vendidos-page.php" class="grey-text"><?=$linha['titulo']?></a>
                                                <span class="timeline-date"><?=$linha['data_compra']?></span>
                                            </p>
                                        </li>
                                        <?php
                                        //incrementa contador de notificacoes
                                        $count++;
                                        }while($linha = mysql_fetch_assoc($dados));
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
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navdrop">Olá, <?=$nome?>
                                    <i class="fa fa-user ml-2"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editar-cadastro">Editar Cadastro</a>
                                    <a class="dropdown-item" href="../index.php">Sair</a>
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
            <!--Mask-->
            <!--Carousel Wrapper-->
            <section id="bannerzinho">
                <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                    <!--Indicators-->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                        <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                        <li data-target="#carousel-example-1z" data-slide-to="3"></li>
                    </ol>
                    <!--/.Indicators-->
                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">
                        <!--First slide-->
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="../banners/banner1.fw.png" alt="First slide">
                        </div>
                        <!--/First slide-->
                        <!--Second slide-->
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../banners/banner2.fw.png" alt="Second slide">
                        </div>
                        <!--/Second slide-->
                        <!--Third slide-->
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../banners/banner3.fw.png" alt="Third slide">
                        </div>
                        <!--/Third slide-->
                        <!--Four slide-->
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../banners/banner4.fw.png" alt="Third slide">
                        </div>
                        <!--/Four slide-->

                    </div>
                    <!--/.Slides-->
                    <!--Controls-->
                    <a class="carousel-control-prev" href="#carousel-example-1z" style="margin-left:-5%;" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-1z" style="margin-right:-5%;" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <!--/.Controls-->
                </div>
            </section>
            <!--/.Carousel Wrapper-->
            <!-- Mask -->

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
                                <input type="submit" class="btn btn-unique" value="Cadastrar Livro!"></input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- modal cadastrar livro -->

        </header>
        <!--Main Navigation-->

        <!--Main Layout-->
        <main>

            <div style="padding-left:400px; padding-right:20%; margin-bottom:100px; margin-top:25px" class="align-center justidy-content-center">
                <ul class="nav nav-pills mb-3 align-center justify-contnt-center" id="pills-tab" role="tablist" style="margin-top: -5%; border: 1px solid lightgray">
                    <li class="nav-item">
                        <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                            <i class="fa fa-rocket fa-3x prefix icon-right" aria-hidden="true"></i>
                            <p class="pull-right">PRONTA ENTREGA</p>
                            <span class="subtitle"> Rápido</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                            <i class="fa fa-shopping-cart fa-3x prefix icon-right" aria-hidden="true"></i>
                            <p class="pull-right">PAGAMENTO FÁCIL</p>
                            <span class="subtitle">Prático</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                            <i class="fa fa-th-large fa-3x prefix icon-right" aria-hidden="true"></i>
                            <p class="pull-right">DESIGN MODERNO</p>
                            <span class="subtitle">Bonito</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- BUSCA -->
            <div style="margin-left:25%; margin-bottom:100px; margin-top:-50px" class="align-center justidy-content-center">
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

            <div id="categoria-didatico" class="banner-categoria justify-content-center">
                <section>
                    <img class="d-block w-100" src="../banners/didatico-banner.png" alt="Didático">
                    <!-- Card deck -->
                    <div class="card-deck" style="margin-top: 2%;">
                        <!-- Grid row -->
                        <div class="row">
                            <?php

                            require_once ("../conection/conexao.php");

                            // cria a instrução SQL que vai selecionar os dados
                            $sql = "SELECT id, autor,  titulo, preco, imagem, qtd FROM livro WHERE categoria='didatico' AND id_vendedor != $id_usuario ORDER BY id desc";
                            $dados = mysql_query($sql);
                            // transforma os dados em um array
                            $linha = mysql_fetch_assoc($dados);
                            // calcula quantos dados retornaram
                            $total = mysql_num_rows($dados);
                            $conta = 1;
                            $count = 0;
                                // se o número de resultados for maior que zero, mostra os dados
                                if($total > 0) {
                                    // inicia o loop que vai mostrar todos os dados
                                    do {
                            ?>

                            <?php
                            //se tiver livros, pode mostrar
                            if($linha['qtd'] != 0){
                            ?>
                            <!-- teste -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4" style="margin-top: 2%">
                                <!-- Card -->
                                <div class="card align-items-center" style="width:250px; margin-right: 250px;">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <form method="post" action="livro-detalhado.php">
                                            <!--armazena o id do livro para mandar para a  pagina de detalhamento-->
                                            <input type="hidden" name="id" value="<?=$linha['id']?>"/>
                                            <input name="id" type="image" height="400" width="300" value="<?=$linha['id']?>" src="../<?=$linha['imagem']?>" class="card-img-top" alt=""/>
                                        </form>
                                    </div>
                                    <!-- Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a class="grey-text">
                                            <h5><?=$linha['autor']?></h5>
                                        </a>
                                        <h5>
                                            <strong>
                                                <a class="dark-grey-text"><?=$linha['titulo']?></a>
                                                <?php
                                                if($count == 0){
                                                ?>
                                                    <span class="badge badge-pill danger-color">NEW</span>
                                                <?php
                                                }
                                                $count+=1;
                                                ?>
                                            </strong>
                                        </h5>
                                        <p>Qtd: <?=$linha['qtd']?></p>
                                        <h4 class="font-weight-bold blue-text">
                                            <strong>R$<?=$linha['preco']?></strong>
                                        </h4>
                                        <form method="post" action="livro-detalhado.php">
                                            <!--armazena o id do livro para mandar para a  pagina de detalhamento-->
                                            <input type="hidden" name="id" value="<?=$linha['id']?>"/>
                                            <button name="id" value="<?=$linha['id']?>" class="btn btn-success">Veja mais</button>
                                        </form>
                                    </div>
                                    <!-- Card content -->
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Grid column -->
                            <!-- teste -->
                        <?php
                        //se nao tiver, mostra desabilitado
                        }else{
                        ?>
                            <!-- teste -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4" style="margin-top: 2%">
                                <!-- Card -->
                                <div class="card align-items-center" style="width:250px; margin-right: 250px;">
                                <!-- Card image -->
                                <div class="view overlay">
                                    <form method="post" action="livro-detalhado.php">
                                        <!--armazena o id do livro para mandar para a  pagina de detalhamento-->
                                        <input type="hidden" name="id" value="<?=$linha['id']?>"/>
                                        <input name="id" type="image" height="400" width="300" value="<?=$linha['id']?>" src="../<?=$linha['imagem']?>" class="card-img-top" alt=""/>
                                    </form>
                                </div>
                                <!-- Card image -->
                                <!-- Card content -->
                                <div class="card-body text-center">
                                    <!-- Category & Title -->
                                    <a class="grey-text">
                                        <h5><?=$linha['autor']?></h5>
                                    </a>
                                    <h5>
                                        <strong>
                                            <a class="dark-grey-text"><?=$linha['titulo']?></a>
                                            <?php
                                            if($count == 0){
                                            ?>
                                                <span class="badge badge-pill danger-color">NEW</span>
                                            <?php
                                            }
                                            $count+=1;
                                            ?>
                                        </strong>
                                    </h5>
                                    <h5 class="grey-text">
                                        <s>ESGOTADO</s>
                                    </h5>
                                    <form method="post" action="livro-detalhado.php">
                                        <!--armazena o id do livro para mandar para a  pagina de detalhamento-->
                                        <input type="hidden" name="id" value="<?=$linha['id']?>"/>
                                        <button name="id" value="<?=$linha['id']?>" class="btn btn-success">Veja mais</button>
                                    </form>
                                </div>
                                <!-- Card content -->
                            </div>
                            <!-- Card -->
                        </div>
                        <!-- Grid column -->
                        <!-- teste -->
                        <?php
                        }
                        ?>
                        <?php
                                    // finaliza o loop que vai mostrar os dados
                                    }while($linha = mysql_fetch_assoc($dados));
                                // fim do if
                                }
                        // tira o resultado da busca da memória
                        mysql_free_result($dados);
                        ?>

                        </div>
                        <!-- Grid row -->
                    </div>
                    <!-- Card deck -->
                </section>
            </div>

            <div id="categoria-fantasia" class="banner-categoria justify-content-center">
                <section>
                    <img class="d-block w-100" src="../banners/fantasia-banner.png" alt="Fantasia">
                    <!-- Card deck -->
                    <div class="card-deck" style="margin-top: 2%;">
                        <!-- Grid row -->
                        <div class="row">
                            <?php
                            require_once ("../conection/conexao.php");

                            // cria a instrução SQL que vai selecionar os dados
                            $sql = "SELECT id, autor,  titulo, preco, imagem, qtd FROM livro WHERE categoria='fantasia' AND id_vendedor != $id_usuario ORDER BY id desc";
                            $dados = mysql_query($sql);
                            // transforma os dados em um array
                            $linha = mysql_fetch_assoc($dados);
                            // calcula quantos dados retornaram
                            $total = mysql_num_rows($dados);
                            $conta = 1;
                            $count = 0;
                                // se o número de resultados for maior que zero, mostra os dados
                                if($total > 0) {
                                    // inicia o loop que vai mostrar todos os dados
                                    do {
                            ?>
                            
                            <?php
                            //se tiver livros, pode mostrar
                            if($linha['qtd'] != 0){
                            ?>
                            <!-- teste -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4" style="margin-top: 2%">
                                <!-- Card -->
                                <div class="card align-items-center" style="width:250px; margin-right: 250px;">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <form method="post" action="livro-detalhado.php">
                                            <!--armazena o id do livro para mandar para a  pagina de detalhamento-->
                                            <input type="hidden" name="id" value="<?=$linha['id']?>"/>
                                            <input name="id" type="image" height="400" width="300" value="<?=$linha['id']?>" src="../<?=$linha['imagem']?>" class="card-img-top" alt=""/>
                                        </form>
                                    </div>
                                    <!-- Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a class="grey-text">
                                            <h5><?=$linha['autor']?></h5>
                                        </a>
                                        <h5>
                                            <strong>
                                                <a class="dark-grey-text"><?=$linha['titulo']?></a>
                                                <?php
                                                if($count == 0){
                                                ?>
                                                    <span class="badge badge-pill danger-color">NEW</span>
                                                <?php
                                                }
                                                $count+=1;
                                                ?>
                                            </strong>
                                        </h5>
                                        <p>Qtd: <?=$linha['qtd']?></p>
                                        <h4 class="font-weight-bold blue-text">
                                            <strong>R$<?=$linha['preco']?></strong>
                                        </h4>
                                        <form method="post" action="livro-detalhado.php">
                                            <!--armazena o id do livro para mandar para a  pagina de detalhamento-->
                                            <input type="hidden" name="id" value="<?=$linha['id']?>"/>
                                            <button name="id" value="<?=$linha['id']?>" class="btn btn-success">Veja mais</button>
                                        </form>
                                    </div>
                                    <!-- Card content -->
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Grid column -->
                            <!-- teste -->
                        <?php
                        //se nao tiver, mostra desabilitado
                        }else{
                        ?>
                            <!-- teste -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4" style="margin-top: 2%">
                                <!-- Card -->
                                <div class="card align-items-center" style="width:250px; margin-right: 250px;">
                                <!-- Card image -->
                                <div class="view overlay">
                                    <form method="post" action="livro-detalhado.php">
                                        <!--armazena o id do livro para mandar para a  pagina de detalhamento-->
                                        <input type="hidden" name="id" value="<?=$linha['id']?>"/>
                                        <input name="id" type="image" height="400" width="300" value="<?=$linha['id']?>" src="../<?=$linha['imagem']?>" class="card-img-top" alt=""/>
                                    </form>
                                </div>
                                <!-- Card image -->
                                <!-- Card content -->
                                <div class="card-body text-center">
                                    <!-- Category & Title -->
                                    <a class="grey-text">
                                        <h5><?=$linha['autor']?></h5>
                                    </a>
                                    <h5>
                                        <strong>
                                            <a class="dark-grey-text"><?=$linha['titulo']?></a>
                                            <?php
                                            if($count == 0){
                                            ?>
                                                <span class="badge badge-pill danger-color">NEW</span>
                                            <?php
                                            }
                                            $count+=1;
                                            ?>
                                        </strong>
                                    </h5>
                                    <h5 class="grey-text">
                                        <s>ESGOTADO</s>
                                    </h5>
                                    <form method="post" action="livro-detalhado.php">
                                        <!--armazena o id do livro para mandar para a  pagina de detalhamento-->
                                        <input type="hidden" name="id" value="<?=$linha['id']?>"/>
                                        <button name="id" value="<?=$linha['id']?>" class="btn btn-success">Veja mais</button>
                                    </form>
                                </div>
                                <!-- Card content -->
                            </div>
                            <!-- Card -->
                        </div>
                        <!-- Grid column -->
                        <!-- teste -->
                        <?php
                        }
                        ?>
                            <?php
                                        // finaliza o loop que vai mostrar os dados
                                        }while($linha = mysql_fetch_assoc($dados));
                                    // fim do if
                                    }
                            // tira o resultado da busca da memória
                            mysql_free_result($dados);
                            ?>
                        </div>
                        <!-- Grid row -->
                    </div>
                    <!-- Card deck -->
                </section>
            </div>

            <!-- categoria infantil -->
            <div id="categoria-infantil" class="banner-categoria justify-content-center">
                <section>
                    <img class="d-block w-100" src="../banners/infantil-banner.png" alt="Infantil">
                    <!-- Card deck -->
                    <div class="card-deck" style="margin-top: 2%;">
                        <!-- Grid row -->
                        <div class="row">
                            <?php
                            require_once ("../conection/conexao.php");

                            // cria a instrução SQL que vai selecionar os dados
                            $sql = "SELECT id, autor,  titulo, preco, imagem, qtd FROM livro WHERE categoria='infantil' AND id_vendedor != $id_usuario ORDER BY id desc";
                            $dados = mysql_query($sql);
                            // transforma os dados em um array
                            $linha = mysql_fetch_assoc($dados);
                            // calcula quantos dados retornaram
                            $total = mysql_num_rows($dados);
                            $conta = 1;
                            $count = 0;
                                // se o número de resultados for maior que zero, mostra os dados
                                if($total > 0) {
                                    // inicia o loop que vai mostrar todos os dados
                                    do {
                            ?>
                            
                            <?php
                            //se tiver livros, pode mostrar
                            if($linha['qtd'] != 0){
                            ?>
                            <!-- teste -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4" style="margin-top: 2%">
                                <!-- Card -->
                                <div class="card align-items-center" style="width:250px; margin-right: 250px;">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <form method="post" action="livro-detalhado.php">
                                            <!--armazena o id do livro para mandar para a  pagina de detalhamento-->
                                            <input type="hidden" name="id" value="<?=$linha['id']?>"/>
                                            <input name="id" type="image" height="400" width="300" value="<?=$linha['id']?>" src="../<?=$linha['imagem']?>" class="card-img-top" alt=""/>
                                        </form>
                                    </div>
                                    <!-- Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a class="grey-text">
                                            <h5><?=$linha['autor']?></h5>
                                        </a>
                                        <h5>
                                            <strong>
                                                <a class="dark-grey-text"><?=$linha['titulo']?></a>
                                                <?php
                                                if($count == 0){
                                                ?>
                                                    <span class="badge badge-pill danger-color">NEW</span>
                                                <?php
                                                }
                                                $count+=1;
                                                ?>
                                            </strong>
                                        </h5>
                                        <p>Qtd: <?=$linha['qtd']?></p>
                                        <h4 class="font-weight-bold blue-text">
                                            <strong>R$<?=$linha['preco']?></strong>
                                        </h4>
                                        <form method="post" action="livro-detalhado.php">
                                            <!--armazena o id do livro para mandar para a  pagina de detalhamento-->
                                            <input type="hidden" name="id" value="<?=$linha['id']?>"/>
                                            <button name="id" value="<?=$linha['id']?>" class="btn btn-success">Veja mais</button>
                                        </form>
                                    </div>
                                    <!-- Card content -->
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Grid column -->
                            <!-- teste -->
                        <?php
                        //se nao tiver, mostra desabilitado
                        }else{
                        ?>
                            <!-- teste -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4" style="margin-top: 2%">
                                <!-- Card -->
                                <div class="card align-items-center" style="width:250px; margin-right: 250px;">
                                <!-- Card image -->
                                <div class="view overlay">
                                    <form method="post" action="livro-detalhado.php">
                                        <!--armazena o id do livro para mandar para a  pagina de detalhamento-->
                                        <input type="hidden" name="id" value="<?=$linha['id']?>"/>
                                        <input name="id" type="image" height="400" width="300" value="<?=$linha['id']?>" src="../<?=$linha['imagem']?>" class="card-img-top" alt=""/>
                                    </form>
                                </div>
                                <!-- Card image -->
                                <!-- Card content -->
                                <div class="card-body text-center">
                                    <!-- Category & Title -->
                                    <a class="grey-text">
                                        <h5><?=$linha['autor']?></h5>
                                    </a>
                                    <h5>
                                        <strong>
                                            <a class="dark-grey-text"><?=$linha['titulo']?></a>
                                            <?php
                                            if($count == 0){
                                            ?>
                                                <span class="badge badge-pill danger-color">NEW</span>
                                            <?php
                                            }
                                            $count+=1;
                                            ?>
                                        </strong>
                                    </h5>
                                    <h5 class="grey-text">
                                        <s>ESGOTADO</s>
                                    </h5>
                                    <form method="post" action="livro-detalhado.php">
                                        <!--armazena o id do livro para mandar para a  pagina de detalhamento-->
                                        <input type="hidden" name="id" value="<?=$linha['id']?>"/>
                                        <button name="id" value="<?=$linha['id']?>" class="btn btn-success">Veja mais</button>
                                    </form>
                                </div>
                                <!-- Card content -->
                            </div>
                            <!-- Card -->
                        </div>
                        <!-- Grid column -->
                        <!-- teste -->
                        <?php
                        }
                        ?>
                            <?php
                                        // finaliza o loop que vai mostrar os dados
                                        }while($linha = mysql_fetch_assoc($dados));
                                    // fim do if
                                    }
                            // tira o resultado da busca da memória
                            mysql_free_result($dados);
                            ?>
                        </div>
                        <!-- Grid row -->
                    </div>
                    <!-- Card deck -->
                </section>
            </div>
            <!-- categoria infantil -->
            <!-- categoria geral -->
            <div id="categoria-geral" class="banner-categoria justify-content-center">
                <section>
                    <img class="d-block w-100" src="../banners/geral-banner.png" alt="Geral">
                    <!-- Card deck -->
                    <div class="card-deck" style="margin-top: 2%;">
                        <!-- Grid row -->
                        <div class="row">
                            <?php
                            require_once ("../conection/conexao.php");

                            // cria a instrução SQL que vai selecionar os dados
                            $sql = "SELECT id, autor,  titulo, preco, imagem, qtd FROM livro WHERE categoria='geral' AND id_vendedor != $id_usuario ORDER BY id desc";
                            $dados = mysql_query($sql);
                            // transforma os dados em um array
                            $linha = mysql_fetch_assoc($dados);
                            // calcula quantos dados retornaram
                            $total = mysql_num_rows($dados);
                            $conta = 1;
                            $count = 0;


                            $_SESSION['imagem']=$linha['imagem'];
                            $_SESSION['autor']=$linha['autor'];
                            $_SESSION['titulo']=$linha['titulo'];
                            $_SESSION['preco']=$linha['preco'];
                            $_SESSION['qtd']=$linha['qtd'];
                                // se o número de resultados for maior que zero, mostra os dados
                                if($total > 0) {
                                    // inicia o loop que vai mostrar todos os dados
                                    do {
                            ?>
                            
                            <?php
                            //se tiver livros, pode mostrar
                            if($linha['qtd'] != 0){
                            ?>
                            <!-- teste -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4" style="margin-top: 2%">
                                <!-- Card -->
                                <div class="card align-items-center" style="width:250px; margin-right: 250px;">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <form method="post" action="livro-detalhado.php">
                                            <!--armazena o id do livro para mandar para a  pagina de detalhamento-->
                                            <input type="hidden" name="id" value="<?=$linha['id']?>"/>
                                            <input name="id" type="image" height="400" width="300" value="<?=$linha['id']?>" src="../<?=$linha['imagem']?>" class="card-img-top" alt=""/>
                                        </form>
                                    </div>
                                    <!-- Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a class="grey-text">
                                            <h5><?=$linha['autor']?></h5>
                                        </a>
                                        <h5>
                                            <strong>
                                                <a class="dark-grey-text"><?=$linha['titulo']?></a>
                                                <?php
                                                if($count == 0){
                                                ?>
                                                    <span class="badge badge-pill danger-color">NEW</span>
                                                <?php
                                                }
                                                $count+=1;
                                                ?>
                                            </strong>
                                        </h5>
                                        <p>Qtd: <?=$linha['qtd']?></p>
                                        <h4 class="font-weight-bold blue-text">
                                            <strong>R$<?=$linha['preco']?></strong>
                                        </h4>
                                        <form method="post" action="livro-detalhado.php">
                                            <!--armazena o id do livro para mandar para a  pagina de detalhamento-->
                                            <input type="hidden" name="id" value="<?=$linha['id']?>"/>
                                            <button name="id" value="<?=$linha['id']?>" class="btn btn-success">Veja mais</button>
                                        </form>
                                    </div>
                                    <!-- Card content -->
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Grid column -->
                            <!-- teste -->
                        <?php
                        //se nao tiver, mostra desabilitado
                        }else{
                        ?>
                            <!-- teste -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4" style="margin-top: 2%">
                                <!-- Card -->
                                <div class="card align-items-center" style="width:250px; margin-right: 250px;">
                                <!-- Card image -->
                                <div class="view overlay">
                                    <form method="post" action="livro-detalhado.php">
                                        <!--armazena o id do livro para mandar para a  pagina de detalhamento-->
                                        <input type="hidden" name="id" value="<?=$linha['id']?>"/>
                                        <input name="id" type="image" height="400" width="300" value="<?=$linha['id']?>" src="../<?=$linha['imagem']?>" class="card-img-top" alt=""/>
                                    </form>
                                </div>
                                <!-- Card image -->
                                <!-- Card content -->
                                <div class="card-body text-center">
                                    <!-- Category & Title -->
                                    <a class="grey-text">
                                        <h5><?=$linha['autor']?></h5>
                                    </a>
                                    <h5>
                                        <strong>
                                            <a class="dark-grey-text"><?=$linha['titulo']?></a>
                                            <?php
                                            if($count == 0){
                                            ?>
                                                <span class="badge badge-pill danger-color">NEW</span>
                                            <?php
                                            }
                                            $count+=1;
                                            ?>
                                        </strong>
                                    </h5>
                                    <h5 class="grey-text">
                                        <s>ESGOTADO</s>
                                    </h5>
                                    <form method="post" action="livro-detalhado.php">
                                        <!--armazena o id do livro para mandar para a  pagina de detalhamento-->
                                        <input type="hidden" name="id" value="<?=$linha['id']?>"/>
                                        <button name="id" value="<?=$linha['id']?>" class="btn btn-success">Veja mais</button>
                                    </form>
                                </div>
                                <!-- Card content -->
                            </div>
                            <!-- Card -->
                        </div>
                        <!-- Grid column -->
                        <!-- teste -->
                        <?php
                        }
                        ?>
                            <?php
                                        // finaliza o loop que vai mostrar os dados
                                        }while($linha = mysql_fetch_assoc($dados));
                                    // fim do if
                                    }
                            // tira o resultado da busca da memória
                            mysql_free_result($dados);
                            ?>
                        </div>
                        <!-- Grid row -->
                    </div>
                    <!-- Card deck -->
                </section>
            </div>
            <!-- categoria geral -->
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
                © 2018 Copyright
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