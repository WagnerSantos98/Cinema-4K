<?php
include_once('./db/conexao.php');

$titulo = $_POST['titulo'];
$genero = $_POST['genero'];
$duracao = $_POST['duracao'];
$classificacao = $_POST['classificacao'];
$sinopse = $_POST['sinopse'];
$imagem = $_POST['imagem'];

$sql = "INSERT INTO tb_eventos(titulo,genero,duracao,classificacao,sinopse,imagem)
 VALUES ('$titulo', '$genero', '$duracao', '$classificacao', '$sinopse', '$imagem');";
$sql = mysqli_query($con, $sql)

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../assests/css/style.css">

    <!--Icons Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../assests/js/app.js"></script>
            
    <title>Painel Sistema Integrado</title> 
</head> 
<body>
    <!--Navbar-->   
    <header class="main-header">
        <label for="btn-nav" class="btn-nav"><i class="fa fa-bars"></i></label>
        <input type="checkbox" id="btn-nav">
        

        <!--Logout Cinema---> 
        <a class="navbar-brand" href="pages/logout.php" style="margin-left: 98%; color: #fff;" ><i class="fa-solid fa-right-from-bracket"></i></a>
        
        <nav>
          <ul class="navigation">
            <li>
                <a href="../index.php">Home</a>   
            </li>
            <li>
                <a href="../pages/eventos.php">Eventos</a>
            </li>
            <li>
                <a href="../pages/ingressos.php">Ingressos</a>
            </li>
            <li>
                <a href="../pages/configuracoes.php">Configurações</a>
            </li>
            
          </ul>
        </nav>
        
      </header>

     <div class="container">
        <div class="row">
          <div class="col s12">
            <ul class="tabs">
              <li class="tab col s3"><a href="#cinema">Cinema</a></li>
              <li class="tab col s3"><a href="#teatro">Teatro</a></li>
              <li class="tab col s3"><a href="#show">Show</a></li>
            </ul>
          </div>
      <!--Cadastro de Filme em Cartaz-->
      <div id="cinema" class="col s12">
      <div class="row">
    <form class="col s12" enctype="multipart/form-data" method="POST" action="">
      <div class="row">
        <div class="input-field col s6">
          <input id="titulo" name="titulo" type="text" class="validate">
          <label for="titulo">Título</label>
        </div>
        <div class="input-field col s6">
          <input id="genero" name="genero" type="text" class="validate">
          <label for="genero">Gênero</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="duracao" name="duracao" type="text" class="validate">
          <label for="duracao">Duração</label>
        </div>
        <div class="input-field col s6">
          <input id="classificacao" name="classificacao" type="text" class="validate">
          <label for="classificacao">Classificação</label>
        </div>
      </div>
      <div class="row">
      <div class="input-field col s12">
          <textarea id="sinopse" name="sinopse" class="materialize-textarea"></textarea>
          <label for="sinopse">Sinopse</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="imagem" name="imagem" type="file" class="validate">
        </div>
      </div>
      
    </form>
  </div>
        
      </div>
      <div id="teatro" class="col s12">Test 2</div>
      <div id="show" class="col s12">Test 3</div>
      </div>
    </div>

    <script>
      //Animação Tabs
    document.addEventListener("DOMContentLoaded", function(){
	    const tab = document.querySelector('.tabs');
	    M.Tabs.init(tab, {
	  swipeable: true,
	  duration: 300
	});
})

    </script>
</body>
</html>