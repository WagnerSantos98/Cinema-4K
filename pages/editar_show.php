<?php
include_once('../db/conexao.php');
session_start();




//Retorna o campos com valores do banco de dados
$id_show = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_show = "SELECT * FROM tb_show WHERE id = '$id_show'";
$resultado_show = mysqli_query($con, $result_show);
$row_shows = mysqli_fetch_assoc($resultado_show);

//Alterar os dados dos fshows
if (isset($_POST['editar_show'])) {
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
  $atracao = filter_input(INPUT_POST, 'atracao', FILTER_SANITIZE_STRING);
  $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
  $local = filter_input(INPUT_POST, 'local', FILTER_SANITIZE_STRING);
  $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
  $horario = filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_STRING);
  $classificacao_etaria = filter_input(INPUT_POST, 'classificacao_etaria', FILTER_SANITIZE_STRING);
  $show_inteira = filter_input(INPUT_POST, 'show_inteira', FILTER_SANITIZE_NUMBER_FLOAT);
  $show_meia = filter_input(INPUT_POST, 'show_meia', FILTER_SANITIZE_NUMBER_FLOAT);
  


  $sql = "UPDATE tb_show SET atracao='$atracao', data='$data', local='$local', endereco='$endereco', horario='$horario', classificacao_etaria='$classificacao_etaria',
                               show_inteira='$show_inteira', show_meia='$show_meia' WHERE id = '$id'";
  $sql = mysqli_query($con, $sql);
  if(mysqli_affected_rows($con)){
    $_SESSION['msg'] = "<p style='color:green;'>Registro atualizado com sucesso</p>";
    header("Location: ../pages/show.php");
  }else{
    $_SESSION['msg'] = "<p style='color:red;'>Não foi possível atualizar o registro</p>";
    header("Location: ../pages/show.php");
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
                  <input id="id" name="id" type="hidden" class="validate" value="<?php echo $row_shows['id']; ?>">
                </div>
                <div class="input-field col s6">
                  <input id="atracao" name="atracao" type="text" class="validate" value="<?php echo $row_shows['atracao']; ?>">
                  <label for="atracao">Atração</label>
                </div>
                <div class="input-field col s6">
                  <input id="data" name="data" type="text" class="validate" value="<?php echo $row_shows['data']; ?>">
                  <label for="data">Data</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <input id="local"  name="local" type="text" class="local" value="<?php echo $row_shows['local']; ?>">
                  <label for="local">Local</label>
                </div>
                <div class="input-field col s12">
                  <input id="endereco" name="endereco" type="text" class="validate" value="<?php echo $row_shows['endereco']; ?>">
                  <label for="endereco">Endereço</label>
                </div>
              </div>
              <div class="row">
              <div class="input-field col s6">
                  <input id="horario" name="horario" type="text" class="validate" value="<?php echo $row_shows['horario']; ?>">
                  <label for="horario">Horário</label>
              </div>
              <div class="input-field col s6">
                  <select id="classificacao_atracao" name="classificacao_atracao" value="<?php echo $row_shows['classificacao_atracao']; ?>">
                    <option><?php echo $row_shows['classificacao_atracao']; ?></option>
                    <option>Livre</option>
                    <option>+10</option>
                    <option>+12</option>
                    <option>+14</option>
                    <option>+16</option>
                    <option>+18</option>
                  </select>
                <label>Classificação</label>
              </div>
              <div class="row">
              <div class="input-field col s6">
                  <input id="show_inteira" name="show_inteira" type="text" class="validate" value="<?php echo $row_shows['show_inteira']; ?>">
                  <label for="show_inteira">Valor ingresso inteira</label>
                </div>
                <div class="input-field col s6">
                  <input id="show_meia" name="show_meia" type="text" class="validate" value="<?php echo $row_shows['show_meia']; ?>">
                  <label for="show_meia">Valor ingresso meia</label>
                </div>
                </div>
                

              <button name="editar_show" class="waves-effect waves-light btn" type="submit"><i class="fa fa-send"></i> Atualizar</button>
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