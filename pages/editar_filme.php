<?php
include_once('../db/conexao.php');
session_start();


//Retorna o campos com valores do banco de dados
$id_filme = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_filme = "SELECT * FROM tb_cinema WHERE id = '$id_filme'";
$resultado_filme = mysqli_query($con, $result_filme);
$row_filmes = mysqli_fetch_assoc($resultado_filme);

//Alterar os dados dos filme
if (isset($_POST['editar_filme'])) {
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
  $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
  $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
  $duracao = filter_input(INPUT_POST, 'duracao', FILTER_SANITIZE_STRING);
  $classificacao = filter_input(INPUT_POST, 'classificacao', FILTER_SANITIZE_STRING);
  $sinopse = filter_input(INPUT_POST, 'sinopse', FILTER_SANITIZE_STRING);
  $elenco = filter_input(INPUT_POST, 'elenco', FILTER_SANITIZE_STRING);
  $diretor = filter_input(INPUT_POST, 'diretor', FILTER_SANITIZE_STRING);
  $data_estreia = filter_input(INPUT_POST, 'data_estreia', FILTER_SANITIZE_STRING);
  $distribuidora = filter_input(INPUT_POST, 'distribuidora', FILTER_SANITIZE_STRING);
  $trailer = filter_input(INPUT_POST, 'trailer', FILTER_SANITIZE_STRING);


  $sql = "UPDATE tb_cinema SET titulo='$titulo', genero='$genero', duracao='$duracao', classificacao='$classificacao', sinopse='$sinopse', elenco='$elenco',
                               diretor='$diretor', data_estreia='$data_estreia', distribuidora='$distribuidora', trailer='$trailer' WHERE id = '$id'";
  $sql = mysqli_query($con, $sql);
  if(mysqli_affected_rows($con)){
    $_SESSION['msg'] = "<p style='color:green;'>Registro atualizado com sucesso</p>";
    header("Location: ../pages/cartaz.php");
  }else{
    $_SESSION['msg'] = "<p style='color:red;'>Não foi possível atualizar o registro</p>";
    header("Location: ../pages/cartaz.php");
  }

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

    <!--Material Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
            
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
    <form class="col s12" method="POST" action="">
    
    <div class="row">
    <div class="input-field col s6">
          <input id="id" name="id" type="hidden" class="validate" value="<?php echo $row_filmes['id']; ?>">
        </div>
        <div class="input-field col s6">
          <input id="titulo" name="titulo" type="text" class="validate" value="<?php echo $row_filmes['titulo']; ?>">
          <label for="titulo">Título</label>
        </div>
        <div class="input-field col s6">
          <input id="genero" name="genero" type="text" class="validate" value="<?php echo $row_filmes['genero']; ?>">
          <label for="genero">Gênero</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="duracao"  name="duracao" type="text" class="duracao" value="<?php echo $row_filmes['duracao']; ?>">
          <label for="duracao">Duração</label>
        </div>
        <div class="input-field col s6">
          <select id="classificacao" name="classificacao" value="<?php echo $row_filmes['classificacao']; ?>">
            <option disabled selected>Selecione...</option>
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
          <textarea id="sinopse" name="sinopse" class="materialize-textarea" value="<?php echo $row_filmes['sinopse']; ?>"></textarea>
          <label for="sinopse">Sinopse</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="elenco" name="elenco" type="text" class="validate" value="<?php echo $row_filmes['elenco']; ?>">
          <label for="elenco">Elenco</label>
        </div>
        <div class="input-field col s6">
          <input id="diretor" name="diretor" type="text" class="validate" value="<?php echo $row_filmes['diretor']; ?>">
          <label for="diretor">Diretor</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="data_estreia" name="data_estreia" type="text" class="validate" value="<?php echo $row_filmes['data_estreia']; ?>">
          <label for="data_estreia">Data de Estreia</label>
        </div>
        <div class="input-field col s6">
          <input id="distribuidora" name="distribuidora" type="text" class="validate" value="<?php echo $row_filmes['distribuidora']; ?>">
          <label for="distribuidora">Distribuidora</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="trailer" name="trailer" type="text" class="validate" value="<?php echo $row_filmes['trailer']; ?>">
          <label for="trailer">Trailer</label>
        </div>
      </div>

      <button name="editar_filme" class="waves-effect waves-light btn" type="submit"><i class="fa fa-send"></i> Atualizar</button>
    </div>

    <script>
//Menu
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
  });

//Select
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