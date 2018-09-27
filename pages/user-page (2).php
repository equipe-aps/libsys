<!doctype html>
<html>

	<head>
        <?=
            session_start();
            if((!isset ($_SESSION['user']) == true) and (!isset ($_SESSION['password']) == true))
            {
            unset($_SESSION['user']);
            unset($_SESSION['password']);
            header('location:index.html');
            }
            $nome = $_SESSION['nome'];
            $email = $_SESSION['user'];
            $idade = $_SESSION['idade'];
            $senha = $_SESSION['password'];
        ?>
		<meta charset="utf-8">
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
		<!-- More dependences -->
		<!-- Icon -->
		<link rel="shortcut icon" href="https://banner2.kisspng.com/20180319/ijw/kisspng-black-white-computer-icons-book-png-book-icon-5ab02df11585d6.9013344215214955370882.jpg" />
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
								<a href="#" class="nav-link">Início</a>
							</li>

							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">Vender Livros</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" data-toggle="modal" data-target="#cadastrar-livro">Cadastrar Livros</a>
									<a class="dropdown-item" href="">Livros Cadastrados</a>
									<a class="dropdown-item" href="">Editar Livro</a>
								</div>
							</li>

							<li class="nav-item">
								<a href="#" class="nav-link">Livros Comprados</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">Livros Vendidos</a>
							</li>
						</ul>

						<ul class="navbar-nav ml-auto">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navdrop">
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
									<div class="form-group">
										<label for="user" class="col-form-label">Nome:</label>
										<input name="nome" type="text" class="form-control" id="nome" value="<?=$nome?>">
									</div>
									<!-- email -->
									<div class="form-group">
										<label for="email" class="col-form-label">Email:</label>
										<input name="email" type="email" class="form-control" id="email" value="<?=$email?>">
									</div>
									<!-- idade -->
									<div class="form-group">
										<label for="idade" class="col-form-label">Idade:</label>
										<input name="idade" type="text" class="form-control" id="idade" value="<?=$idade?>">
									</div>
									<!-- senha -->
									<div class="form-group">
										<label for="senha" class="col-form-label">Senha:</label>
										<input name="senha" type="password" class="form-control" id="senha" value="<?=$senha?>">
									</div>

								</div>
								<div class="modal-footer">
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
					</ol>
					<!--/.Indicators-->
					<!--Slides-->
					<div class="carousel-inner" role="listbox">
						<!--First slide-->
						<div class="carousel-item active">
							<img class="d-block w-100" src="https://drive.google.com/uc?id=1v5fF3kfRGyfryCVjuB0VO1BI4XpZprxS" alt="First slide">
						</div>
						<!--/First slide-->
						<!--Second slide-->
						<div class="carousel-item">
							<img class="d-block w-100" src="http://www.imagemeprotocolo.com/wp-content/uploads/2017/11/geral_06-1920x300.jpg" alt="Second slide">
						</div>
						<!--/Second slide-->
						<!--Third slide-->
						<div class="carousel-item">
							<img class="d-block w-100" src="https://drive.google.com/uc?id=1EP-dbPVjd7atmkLyvyBPUzM6EUn5XBeo" alt="Third slide">
						</div>
						<!--/Third slide-->
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
						<form method="post" action="../cad_livro.php" id="formcadlivro" name="formcadlivro">
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
										<option value="1" selected>Didático</option>
										<option value="2">Fantasia</option>
										<option value="3">Infantil</option>
										<option value="4">Geral</option>
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
							
								<!-- input image -->
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
									</div>
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="image" aria-describedby="inputGroupFileAddon01">
										<label class="custom-file-label" for="image">Capa do livro</label>
									</div>
								</div>

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

            <div>
                <ul class="nav nav-pills mb-3 pull-right tab-ul-right" id="pills-tab" role="tablist" style="margin-top: 10px; border: 1px solid lightgray">
                    <li class="nav-item">
                        <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                            <i class="fa fa-rocket fa-3x prefix icon-right" aria-hidden="true"></i>
                            <p class="pull-right">PRONTA ENTREGA</p>
                            <span class="subtitle"> teste</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                            <i class="fa fa-shopping-cart fa-3x prefix icon-right" aria-hidden="true"></i>
                            <p class="pull-right">PAGAMENTO FÁCIL</p>
                            <span class="subtitle"> teste</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                            <i class="fa fa-th-large fa-3x prefix icon-right" aria-hidden="true"></i>
                            <p class="pull-right">DESIGN MODERNO</p>
                            <span class="subtitle"> teste</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div id="categoria-didatico" class="banner-categoria justify-content-center">
                <section>
                    <img class="d-block w-100" src="https://drive.google.com/uc?id=1zr5EXbItMpW2tNHkkKC-aAsHxj5g_Lfk" alt="Didático">
                    <!-- Card deck -->
                    <div class="card-deck" style="margin-top: 2%;">
                        <!-- Grid row -->
                        <div class="row">
                            <!-- Grid column -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                                <!-- Card -->
                                <div class="card align-items-center">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <img src="https://upload.wikimedia.org/wikipedia/pt/d/d9/Capa_do_livro_Como_Ser_um_Pirata.jpg" class="card-img-top" alt="">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!-- Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a href="" class="grey-text">
                                            <h5>Shirt</h5>
                                        </a>
                                        <h5>
                                            <strong>
                                                <a href="" class="dark-grey-text">
                                                    Denim shirt
                                                    <span class="badge badge-pill danger-color">NEW</span>
                                                </a>
                                            </strong>
                                        </h5>
                                        <h4 class="font-weight-bold blue-text">
                                            <strong>120$</strong>
                                        </h4>
                                    </div>
                                    <!-- Card content -->
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Grid column -->
                            <!-- Grid column -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                                <!-- Card -->
                                <div class="card align-items-center">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <img src="https://upload.wikimedia.org/wikipedia/pt/d/d9/Capa_do_livro_Como_Ser_um_Pirata.jpg" class="card-img-top" alt="">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!-- Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a href="" class="grey-text">
                                            <h5>Shirt</h5>
                                        </a>
                                        <h5>
                                            <strong>
                                                <a href="" class="dark-grey-text">
                                                    Denim shirt
                                                    <span class="badge badge-pill danger-color">NEW</span>
                                                </a>
                                            </strong>
                                        </h5>
                                        <h4 class="font-weight-bold blue-text">
                                            <strong>120$</strong>
                                        </h4>
                                    </div>
                                    <!-- Card content -->
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Grid column -->
                            <!-- Grid column -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                                <!-- Card -->
                                <div class="card align-items-center">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <img src="https://upload.wikimedia.org/wikipedia/pt/d/d9/Capa_do_livro_Como_Ser_um_Pirata.jpg" class="card-img-top" alt="">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!-- Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a href="" class="grey-text">
                                            <h5>Shirt</h5>
                                        </a>
                                        <h5>
                                            <strong>
                                                <a href="" class="dark-grey-text">
                                                    Denim shirt
                                                    <span class="badge badge-pill danger-color">NEW</span>
                                                </a>
                                            </strong>
                                        </h5>
                                        <h4 class="font-weight-bold blue-text">
                                            <strong>120$</strong>
                                        </h4>
                                    </div>
                                    <!-- Card content -->
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Grid column -->
                            <!-- Grid column -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                                <!-- Card -->
                                <div class="card align-items-center">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <img src="https://upload.wikimedia.org/wikipedia/pt/d/d9/Capa_do_livro_Como_Ser_um_Pirata.jpg" class="card-img-top" alt="">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!-- Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a href="" class="grey-text">
                                            <h5>Shirt</h5>
                                        </a>
                                        <h5>
                                            <strong>
                                                <a href="" class="dark-grey-text">
                                                    Denim shirt
                                                    <span class="badge badge-pill danger-color">NEW</span>
                                                </a>
                                            </strong>
                                        </h5>
                                        <h4 class="font-weight-bold blue-text">
                                            <strong>120$</strong>
                                        </h4>
                                    </div>
                                    <!-- Card content -->
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                    </div>
                    <!-- Card deck -->
                </section>
            </div>

            <div id="categoria-fantasia" class="banner-categoria justify-content-center">
                <section>
                    <img class="d-block w-100" src="https://drive.google.com/uc?id=1jd5LWtK1wIiTjlsJyHNh4HpEnCHsK86b" alt="Didático">
                    <!-- Card deck -->
                    <div class="card-deck" style="margin-top: 2%;">
                        <!-- Grid row -->
                        <div class="row">
                            <!-- Grid column -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                                <!-- Card -->
                                <div class="card align-items-center">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <img src="https://upload.wikimedia.org/wikipedia/pt/d/d9/Capa_do_livro_Como_Ser_um_Pirata.jpg" class="card-img-top" alt="">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!-- Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a href="" class="grey-text">
                                            <h5>Shirt</h5>
                                        </a>
                                        <h5>
                                            <strong>
                                                <a href="" class="dark-grey-text">
                                                    Denim shirt
                                                    <span class="badge badge-pill danger-color">NEW</span>
                                                </a>
                                            </strong>
                                        </h5>
                                        <h4 class="font-weight-bold blue-text">
                                            <strong>120$</strong>
                                        </h4>
                                    </div>
                                    <!-- Card content -->
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Grid column -->
                            <!-- Grid column -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                                <!-- Card -->
                                <div class="card align-items-center">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <img src="https://upload.wikimedia.org/wikipedia/pt/d/d9/Capa_do_livro_Como_Ser_um_Pirata.jpg" class="card-img-top" alt="">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!-- Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a href="" class="grey-text">
                                            <h5>Shirt</h5>
                                        </a>
                                        <h5>
                                            <strong>
                                                <a href="" class="dark-grey-text">
                                                    Denim shirt
                                                    <span class="badge badge-pill danger-color">NEW</span>
                                                </a>
                                            </strong>
                                        </h5>
                                        <h4 class="font-weight-bold blue-text">
                                            <strong>120$</strong>
                                        </h4>
                                    </div>
                                    <!-- Card content -->
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Grid column -->
                            <!-- Grid column -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                                <!-- Card -->
                                <div class="card align-items-center">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <img src="https://upload.wikimedia.org/wikipedia/pt/d/d9/Capa_do_livro_Como_Ser_um_Pirata.jpg" class="card-img-top" alt="">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!-- Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a href="" class="grey-text">
                                            <h5>Shirt</h5>
                                        </a>
                                        <h5>
                                            <strong>
                                                <a href="" class="dark-grey-text">
                                                    Denim shirt
                                                    <span class="badge badge-pill danger-color">NEW</span>
                                                </a>
                                            </strong>
                                        </h5>
                                        <h4 class="font-weight-bold blue-text">
                                            <strong>120$</strong>
                                        </h4>
                                    </div>
                                    <!-- Card content -->
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Grid column -->
                            <!-- Grid column -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                                <!-- Card -->
                                <div class="card align-items-center">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <img src="https://upload.wikimedia.org/wikipedia/pt/d/d9/Capa_do_livro_Como_Ser_um_Pirata.jpg" class="card-img-top" alt="">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!-- Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a href="" class="grey-text">
                                            <h5>Shirt</h5>
                                        </a>
                                        <h5>
                                            <strong>
                                                <a href="" class="dark-grey-text">
                                                    Denim shirt
                                                    <span class="badge badge-pill danger-color">NEW</span>
                                                </a>
                                            </strong>
                                        </h5>
                                        <h4 class="font-weight-bold blue-text">
                                            <strong>120$</strong>
                                        </h4>
                                    </div>
                                    <!-- Card content -->
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                    </div>
                    <!-- Card deck -->
                </section>
            </div>

            <!-- categoria infantil -->
            <div id="categoria-infantil" class="banner-categoria justify-content-center">
                <section>
                    <img class="d-block w-100" src="https://drive.google.com/uc?id=1MaCVIuJk9Ir-x3VHS_us75Yx5FH68MKq" alt="Didático">
                    <!-- Card deck -->
                    <div class="card-deck" style="margin-top: 2%;">
                        <!-- Grid row -->
                        <div class="row">
                            <!-- Grid column -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                                <!-- Card -->
                                <div class="card align-items-center">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <img src="https://upload.wikimedia.org/wikipedia/pt/d/d9/Capa_do_livro_Como_Ser_um_Pirata.jpg" class="card-img-top" alt="">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!-- Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a href="" class="grey-text">
                                            <h5>Shirt</h5>
                                        </a>
                                        <h5>
                                            <strong>
                                                <a href="" class="dark-grey-text">
                                                    Denim shirt
                                                    <span class="badge badge-pill danger-color">NEW</span>
                                                </a>
                                            </strong>
                                        </h5>
                                        <h4 class="font-weight-bold blue-text">
                                            <strong>120$</strong>
                                        </h4>
                                    </div>
                                    <!-- Card content -->
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Grid column -->
                            <!-- Grid column -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                                <!-- Card -->
                                <div class="card align-items-center">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <img src="https://upload.wikimedia.org/wikipedia/pt/d/d9/Capa_do_livro_Como_Ser_um_Pirata.jpg" class="card-img-top" alt="">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!-- Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a href="" class="grey-text">
                                            <h5>Shirt</h5>
                                        </a>
                                        <h5>
                                            <strong>
                                                <a href="" class="dark-grey-text">
                                                    Denim shirt
                                                    <span class="badge badge-pill danger-color">NEW</span>
                                                </a>
                                            </strong>
                                        </h5>
                                        <h4 class="font-weight-bold blue-text">
                                            <strong>120$</strong>
                                        </h4>
                                    </div>
                                    <!-- Card content -->
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Grid column -->
                            <!-- Grid column -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                                <!-- Card -->
                                <div class="card align-items-center">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <img src="https://upload.wikimedia.org/wikipedia/pt/d/d9/Capa_do_livro_Como_Ser_um_Pirata.jpg" class="card-img-top" alt="">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!-- Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a href="" class="grey-text">
                                            <h5>Shirt</h5>
                                        </a>
                                        <h5>
                                            <strong>
                                                <a href="" class="dark-grey-text">
                                                    Denim shirt
                                                    <span class="badge badge-pill danger-color">NEW</span>
                                                </a>
                                            </strong>
                                        </h5>
                                        <h4 class="font-weight-bold blue-text">
                                            <strong>120$</strong>
                                        </h4>
                                    </div>
                                    <!-- Card content -->
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Grid column -->
                            <!-- Grid column -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                                <!-- Card -->
                                <div class="card align-items-center">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <img src="https://upload.wikimedia.org/wikipedia/pt/d/d9/Capa_do_livro_Como_Ser_um_Pirata.jpg" class="card-img-top" alt="">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!-- Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a href="" class="grey-text">
                                            <h5>Shirt</h5>
                                        </a>
                                        <h5>
                                            <strong>
                                                <a href="" class="dark-grey-text">
                                                    Denim shirt
                                                    <span class="badge badge-pill danger-color">NEW</span>
                                                </a>
                                            </strong>
                                        </h5>
                                        <h4 class="font-weight-bold blue-text">
                                            <strong>120$</strong>
                                        </h4>
                                    </div>
                                    <!-- Card content -->
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Grid column -->
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
                    <img class="d-block w-100" src="https://drive.google.com/uc?id=1qZNQn0z8jbQB7w3zk5egr-p4wpkDVR2Y" alt="Didático">
                    <!-- Card deck -->
                    <div class="card-deck" style="margin-top: 2%;">
                        <!-- Grid row -->
                        <div class="row">
                            <!-- Grid column -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                                <!-- Card -->
                                <div class="card align-items-center">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <img src="https://upload.wikimedia.org/wikipedia/pt/d/d9/Capa_do_livro_Como_Ser_um_Pirata.jpg" class="card-img-top" alt="">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!-- Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a href="" class="grey-text">
                                            <h5>Shirt</h5>
                                        </a>
                                        <h5>
                                            <strong>
                                                <a href="" class="dark-grey-text">
                                                    Denim shirt
                                                    <span class="badge badge-pill danger-color">NEW</span>
                                                </a>
                                            </strong>
                                        </h5>
                                        <h4 class="font-weight-bold blue-text">
                                            <strong>120$</strong>
                                        </h4>
                                    </div>
                                    <!-- Card content -->
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Grid column -->
                            <!-- Grid column -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                                <!-- Card -->
                                <div class="card align-items-center">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <img src="https://upload.wikimedia.org/wikipedia/pt/d/d9/Capa_do_livro_Como_Ser_um_Pirata.jpg" class="card-img-top" alt="">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!-- Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a href="" class="grey-text">
                                            <h5>Shirt</h5>
                                        </a>
                                        <h5>
                                            <strong>
                                                <a href="" class="dark-grey-text">
                                                    Denim shirt
                                                    <span class="badge badge-pill danger-color">NEW</span>
                                                </a>
                                            </strong>
                                        </h5>
                                        <h4 class="font-weight-bold blue-text">
                                            <strong>120$</strong>
                                        </h4>
                                    </div>
                                    <!-- Card content -->
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Grid column -->
                            <!-- Grid column -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                                <!-- Card -->
                                <div class="card align-items-center">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <img src="https://upload.wikimedia.org/wikipedia/pt/d/d9/Capa_do_livro_Como_Ser_um_Pirata.jpg" class="card-img-top" alt="">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!-- Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a href="" class="grey-text">
                                            <h5>Shirt</h5>
                                        </a>
                                        <h5>
                                            <strong>
                                                <a href="" class="dark-grey-text">
                                                    Denim shirt
                                                    <span class="badge badge-pill danger-color">NEW</span>
                                                </a>
                                            </strong>
                                        </h5>
                                        <h4 class="font-weight-bold blue-text">
                                            <strong>120$</strong>
                                        </h4>
                                    </div>
                                    <!-- Card content -->
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Grid column -->
                            <!-- Grid column -->
                            <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                                <!-- Card -->
                                <div class="card align-items-center">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <img src="https://upload.wikimedia.org/wikipedia/pt/d/d9/Capa_do_livro_Como_Ser_um_Pirata.jpg" class="card-img-top" alt="">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!-- Card image -->
                                    <!-- Card content -->
                                    <div class="card-body text-center">
                                        <!-- Category & Title -->
                                        <a href="" class="grey-text">
                                            <h5>Shirt</h5>
                                        </a>
                                        <h5>
                                            <strong>
                                                <a href="" class="dark-grey-text">
                                                    Denim shirt
                                                    <span class="badge badge-pill danger-color">NEW</span>
                                                </a>
                                            </strong>
                                        </h5>
                                        <h4 class="font-weight-bold blue-text">
                                            <strong>120$</strong>
                                        </h4>
                                    </div>
                                    <!-- Card content -->
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- Grid column -->
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
				<a href="../index.html"> LibSys Online</a>
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