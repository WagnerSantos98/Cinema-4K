<?php
include_once('../db/conexao.php');
session_start();




//Retorna o campos com valores do banco de dados
$id_teatro = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_teatro = "SELECT * FROM tb_teatro WHERE id = '$id_teatro'";
$resultado_teatro = mysqli_query($con, $result_teatro);
$row_teatros = mysqli_fetch_assoc($resultado_teatro);

//Alterar os dados dos fteatros
if (isset($_POST['editar_teatro'])) {
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
  $evento = filter_input(INPUT_POST, 'evento', FILTER_SANITIZE_STRING);
  $artista = filter_input(INPUT_POST, 'artista', FILTER_SANITIZE_STRING);
  $classificacao_etaria = filter_input(INPUT_POST, 'classificacao_etaria', FILTER_SANITIZE_STRING);
  $localizacao = filter_input(INPUT_POST, 'localizacao', FILTER_SANITIZE_STRING);
  $data_evento = filter_input(INPUT_POST, 'data_evento', FILTER_SANITIZE_STRING);
  $horario_evento = filter_input(INPUT_POST, 'horario_evento', FILTER_SANITIZE_STRING);
  $teatro_inteira = filter_input(INPUT_POST, 'teatro_inteira', FILTER_SANITIZE_NUMBER_FLOAT);
  $teatro_meia = filter_input(INPUT_POST, 'teatro_meia', FILTER_SANITIZE_NUMBER_FLOAT);
  


  $sql = "UPDATE tb_teatro SET evento='$evento', artista='$artista', classificacao_etaria='$classificacao_etaria', localizacao='$localizacao', data_evento='$data_evento', horario_evento='$horario_evento',
                               teatro_inteira='$teatro_inteira', teatro_meia='$teatro_meia' WHERE id = '$id'";
  $sql = mysqli_query($con, $sql);
  if(mysqli_affected_rows($con)){
    $_SESSION['msg'] = "<p style='color:green;'>Registro atualizado com sucesso</p>";
    header("Location: ../pages/teatro.php");
  }else{
    $_SESSION['msg'] = "<p style='color:red;'>Não foi possível atualizar o registro</p>";
    header("Location: ../pages/teatro.php");
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
            <a href="#" class="brand-logo" >Sistema Integrado</a>

            <a href="#" class="sidenav-trigger" data-target="mobile-nav"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <li><a href="../index.php">Home</a></li>
                <li><a href="eventos.php">Eventos</a></li>
                <li><a href="./cartaz.php">Editar Filmes</a></li>
                <li><a href="./teatro.php">Editar Teatros</a></li>
                <li><a href="./show.php">Editar Shows</a></li>
                <li><a href="configuracoes.php">Configurações</a></li>
                <li><a href="logout.php"><i class="material-icons">exit_to_app</i></a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-nav">
        <li><a href="../index.php">Home</a></li>
        <li><a href="cadastro.php">Eventos</a></li>
        <li><a href="./cartaz.php">Editar Filmes</a></li>
        <li><a href="./teatro.php">Editar Teatros</a></li>
        <li><a href="./show.php">Editar Shows</a></li>
        <li><a href="configuracoes.php">Configurações</a></li>
        <li><a href="logout.php"><i class="material-icons">exit_to_app</i></a></li>
    </ul>

    <div class="container pt-10">
      <div class="row card">
        <div id="test1" class="col s12">
          <h3 class='header'>Editar Show</h3>
          <div class="container">
            <div class="row">
            <form class="col s12" method="POST" action="">
            
            <div class="row">
            <div class="input-field col s6">
                  <input id="id" name="id" type="hidden" class="validate" value="<?php echo $row_teatros['id']; ?>">
                </div>
                <div class="input-field col s6">
                  <input id="evento" name="evento" type="text" class="validate" value="<?php echo $row_teatros['evento']; ?>">
                  <label for="evento">Evento</label>
                </div>
                <div class="input-field col s6">
                  <input id="artista" name="artista" type="text" class="validate" value="<?php echo $row_teatros['artista']; ?>">
                  <label for="artista">Artista</label>
                </div>
              </div>
              <div class="row">
              <div class="input-field col s6">
                  <select id="classificacao_etaria" name="classificacao_etaria" value="<?php echo $row_teatros['classificacao_etaria']; ?>">
                    <option><?php echo $row_teatros['classificacao_etaria']; ?></option>
                    <option>Livre</option>
                    <option>+10</option>
                    <option>+12</option>
                    <option>+14</option>
                    <option>+16</option>
                    <option>+18</option>
                  </select>
                <label>Classificação</label>
              </div>
                <div class="input-field col s12">
                  <input id="localizacao" name="localizacao" type="text" class="validate" value="<?php echo $row_teatros['localizacao']; ?>">
                  <label for="localizacao">Endereço</label>
                </div>
              </div>
              <div class="row">
              <div class="input-field col s6">
                  <input id="data_evento" name="data_evento" type="text" class="validate" value="<?php echo $row_teatros['data_evento']; ?>">
                  <label for="data_evento">Data</label>
              </div>
              <div class="input-field col s6">
                  <input id="horario_evento" name="horario_evento" type="text" class="validate" value="<?php echo $row_teatros['horario_evento']; ?>">
                  <label for="horario_evento">Data</label>
              </div>
              <div class="row">
              <div class="input-field col s6">
                  <input id="teatro_inteira" name="teatro_inteira" type="text" class="validate" value="<?php echo $row_teatros['teatro_inteira']; ?>">
                  <label for="teatro_inteira">Valor ingresso inteira</label>
                </div>
                <div class="input-field col s6">
                  <input id="teatro_meia" name="teatro_meia" type="text" class="validate" value="<?php echo $row_teatros['teatro_meia']; ?>">
                  <label for="teatro_meia">Valor ingresso meia</label>
                </div>
                </div>
                

              <button name="editar_teatro" class="waves-effect waves-light btn" type="submit"><i class="fa fa-send"></i> Atualizar</button>
            </div>

          </div>
        </div>
      </div>
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
  $(".duracao").mask("00:00:00");
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