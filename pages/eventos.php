<?php
include_once('../db/conexao.php');
session_start();

if(isset($_POST['cadastrar_cinema'])){

  if(!empty($_FILES["imagem"]["name"])){
    $fileName = basename($_FILES["imagem"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if(in_array($fileType, $allowTypes)){
      $imagem = $_FILES['imagem']['tmp_name'];
      $imageContent = addslashes(file_get_contents($imagem));

      $codigo = $_POST['codigo'];
      $titulo = $_POST['titulo'];
      $genero = $_POST['genero'];
      $duracao = $_POST['duracao'];
      $classificacao = $_POST['classificacao'];
      $sinopse = $_POST['sinopse'];
      $sql = "INSERT INTO tb_cinema(codigo,titulo,genero,duracao,classificacao,sinopse,imagem)
      VALUES ('$codigo', '$titulo', '$genero', '$duracao', '$classificacao', '$sinopse', '$imagem');";
      $sql = mysqli_query($con, $sql);
    }
  }
}

//Consulta Cinema
$codigo = filter_input(INPUT_GET, 'codigo', FILTER_SANITIZE_STRING);
if(!empty($codigo)){

  $result_cinema = "SELECT* FROM tb_cinema WHERE codigo =:codigo LIMIT :limit";

  $resultado_cinema = $conn->prepare($result_cinema);
  $resultado_cinema->bindParam(':codigo', $codigo, PDO::PARAM_STR);
  $resultado_cinema->bindParam(':limit', $codigo, PDO::PARAM_INT);
  $resultado_cinema->execute();

  if()
}


if(isset($_POST['cadastrar_teatro'])){
  $evento = $_POST['evento'];
  $artista = $_POST['artista'];
  $localizacao = $_POST['localizacao'];
  $classi = $_POST['classi'];
  $sql = "INSERT INTO tb_teatro(evento,artista,localizacao,classi)
  VALUES ('$evento', '$artista', '$localizacao', '$classi');";
  $sql = mysqli_query($con, $sql);
}


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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
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
          <input id="codigo" name="codigo" type="text" class="validate">
          <label for="codigo">Código</label>
        </div>
      </div>
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
          <input id="duracao"  name="duracao" type="text" class="duracao">
          <label for="duracao">Duração</label>
        </div>
        <div class="input-field col s6">
          <select id="classificacao" name="classificacao">
            <option value="" disabled selected>Selecione...</option>
            <option>Livre</option>
            <option>+10</option>
            <option>+12</option>
            <option>+14</option>
            <option>+16</option>
            <option>+18</option>
          </select>
        <label>Classificação</label>
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

      <button name="cadastrar_cinema" class="waves-effect waves-light btn" type="submit"><i class="fa fa-send"></i> Cadastrar</button>
      
    </form>
  </div>
        
      </div>
      <!--Cadastro de Teatro em Cartaz-->
      <div id="teatro" class="col s12">
      <div class="row">
    <form class="col s12" method="POST" action="">
      <div class="row">
        <div class="input-field col s6">
          <input id="evento" name="evento" type="text" class="validate">
          <label for="evento">Evento</label>
        </div>
        <div class="input-field col s6">
          <input id="artista" name="artista" type="text" class="validate">
          <label for="artista">Artista</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="localizacao" name="localizacao" type="text" class="validate">
          <label for="localizacao">Local</label>
        </div>
        <div class="input-field col s6">
          <input id="classi" name="classi" type="text" class="validate">
          <label for="classi">Classificação</label>
        </div>
      </div>
      

      <button name="cadastrar_teatro" class="waves-effect waves-light btn" type="submit"><i class="fa fa-send"></i> Cadastrar</button>
      
    </form>
  </div>
      </div>
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

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });


  $(document).ready(function() {
  $(".uracao").mask("00:00:00");
});

jQuery("input.duracao")
        .mask("99:99:99")
        .focusout(function (event) {  
            var target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
            if(phone.length > 10) {  
                element.mask("99:99:99");  
            } else {  
                element.mask("99:99:99");  
            }  
        });
//https://pt.stackoverflow.com/questions/42238/m%C3%A1scara-de-telefones-usando-jquery-mask-plugin
    </script>
    
</body>
</html>