<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
    $id_livro = $_POST['id'];
    
    require_once ("../conection/conexao.php");
            $sql = "SELECT * FROM livros_comprados WHERE id_livro=$id_livro";
            $dados = mysql_query($sql);
            // transforma os dados em um array
            $linha = mysql_fetch_assoc($dados);
            echo $linha['id_livro'].":".$linha['status'];
            
            $status = NULL;
            if($linha['status'] == "solicitado"){
                $status = 1;
            }else if($linha['status'] == "a caminho"){
                $status = 2;
            }else{
                $status = 3;
            }
    ?>
    <div class="container">
        <h1 class="text-center">Rastreamento</h1>
        <div id="rootwizard">
        	<div class="navbar">
        	  <div class="navbar-inner">
        	    <div class="container">
                	<ul>
                	  	<li><a href="#tab1" data-toggle="tab" >Solicitado</a></li>
                		<li><a href="#tab2" data-toggle="tab" >A caminho</a></li>
                		<li><a href="#tab3" data-toggle="tab" >Entregue</a></li>
                	</ul>
        	    </div>
        	  </div>
        	</div>
            <div id="bar" class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
            </div>
        	<div class="tab-content">
        	    <div class="tab-pane" id="tab1">
    	            1
        	    </div>
        	    <div class="tab-pane" id="tab2">
    	            2
        	    </div>
        		<div class="tab-pane" id="tab3">
        		    3
        	    </div>
        		<ul class="pager wizard">
        			<li class="previous first" style="display:none;"><a href="#">First</a></li>
        			<li class="previous"><a href="#">Previous</a></li>
        			<li class="next last" style="display:none;"><a href="#">Last</a></li>
        		  	<li class="next"><a href="#">Next</a></li>
        		</ul>
        	</div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/jquery.bootstrap.wizard.js"></script>
    <script>
    $(document).ready(function() {
      	$('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
      	    
    		var $total = navigation.find('li').length;
    		var $current = index+1;
    		var $percent = ($current/$total) * 100;
    		$('#rootwizard .progress-bar').css({width:$percent+'%'});
    	}});
    });
    </script>
  </body>
</html>