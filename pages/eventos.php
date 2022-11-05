<?php
include_once('../db/conexao.php');
session_start();

//Cadastro de Filme
if(isset($_POST['cadastrar_cinema'])){
  $titulo = $_POST['titulo'];
  $genero = $_POST['genero'];
  $duracao = $_POST['duracao'];
  $classificacao = $_POST['classificacao'];
  $sinopse = $_POST['sinopse'];
  $elenco = $_POST['elenco'];
  $diretor = $_POST['diretor'];
  $data_estreia = $_POST['data_estreia'];
  $distribuidora = $_POST['distribuidora'];
  $trailer = $_POST['trailer'];
  $sql_cinema = "INSERT INTO tb_cinema(titulo,genero,duracao,classificacao,sinopse,elenco,diretor,data_estreia,distribuidora,trailer)
  VALUES ('$titulo', '$genero', '$duracao', '$classificacao', '$sinopse', '$elenco', '$diretor', '$data_estreia', '$distribuidora', '$trailer');";
  $sql_cinemas = mysqli_query($con, $sql_cinema);
}


//Cadastro de Peça de Teatro
if(isset($_POST['cadastrar_teatro'])){
  $evento = $_POST['evento'];
  $artista = $_POST['artista'];
  $localizacao = $_POST['localizacao'];
  $classi = $_POST['classi'];
  $sql_teatro = "INSERT INTO tb_teatro(evento,artista,localizacao,classi)
  VALUES ('$evento', '$artista', '$localizacao', '$classi');";
  $sql_teatros = mysqli_query($con, $sql_teatro);
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

    <!--Icons Material Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    

    <style>
      
    </style>
            
    <title>Painel Sistema Integrado</title> 
</head> 
<body>
    <!--Navbar-->   
    <nav class="red" style="padding: 0px 10px;">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo" >Sistema Inegrado</a>

            <a href="#" class="sidenav-trigger" data-target="mobile-nav"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <li><a href="../index.php">Home</a></li>
                <li><a href="./eventos.php">Eventos</a></li>
                <li><a href="./cartaz.php">Cartaz/Em Breve</a></li>
                <li><a href="./configuracoes.php">Configurações</a></li>
                <li><a href="./logout.php"><i class="material-icons">exit_to_app</i></a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-nav">
        <li><a href="./index.php">Home</a></li>
        <li><a href="./cadastro.php">Eventos</a></li>
        <li><a href="./cartaz.php">Cartaz/Em Breve</a></li>
        <li><a href="./configuracoes.php">Configurações</a></li>
    </ul>

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
    <form class="col s12"  method="POST" action="">
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
        <div class="input-field col s6">
          <input id="elenco" name="elenco" type="text" class="validate">
          <label for="elenco">Elenco</label>
        </div>
        <div class="input-field col s6">
          <input id="diretor" name="diretor" type="text" class="validate">
          <label for="diretor">Diretor</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="data_estreia" name="data_estreia" type="text" class="validate">
          <label for="data_estreia">Data de Estreia</label>
        </div>
        <div class="input-field col s6">
          <input id="distribuidora" name="distribuidora" type="text" class="validate">
          <label for="distribuidora">Distribuidora</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="trailer" name="trailer" type="text" class="validate">
          <label for="trailer">Trailer</label>
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
    </script>
    
</body>
</html>