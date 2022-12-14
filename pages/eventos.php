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
  $sala = $_POST['sala'];

  $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
  $novo_nome = time() . $extensao;
  $diretorio = "../upload/";

  move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

  $sql_cinema = "INSERT INTO tb_cinema(titulo,genero,duracao,classificacao,sinopse,elenco,diretor,data_estreia,distribuidora,trailer,sala,arquivo)
  VALUES ('$titulo', '$genero', '$duracao', '$classificacao', '$sinopse', '$elenco', '$diretor', '$data_estreia', '$distribuidora', '$trailer', '$sala', '$novo_nome');";
  $sql_cinemas = mysqli_query($con, $sql_cinema);
}

//Cadastro de Peça de Teatro
if(isset($_POST['cadastrar_teatro'])){
  $evento = $_POST['evento'];
  $artista = $_POST['artista'];
  $classificacao_etaria = $_POST['classificacao_etaria'];
  $localizacao = $_POST['localizacao'];
  $data_evento = $_POST['data_evento'];
  $horario_evento = $_POST['horario_evento'];
  $teatro_inteira = $_POST['teatro_inteira'];
  $teatro_meia = $_POST['teatro_meia'];

  $extensao = strtolower(substr($_FILES['arquivo_peca']['name'],-4));
  $novo_nome = time() . $extensao;
  $diretorio = "../upload_teatro/";

  move_uploaded_file($_FILES['arquivo_peca']['tmp_name'], $diretorio.$novo_nome);

 
  $sql_teatro = "INSERT INTO tb_teatro(evento,artista,classificacao_etaria,arquivo_peca,localizacao,data_evento,horario_evento,teatro_inteira,teatro_meia)
  VALUES ('$evento', '$artista', '$classificacao_etaria','$novo_nome' '$localizacao', '$data_evento', '$horario_evento', '$teatro_inteira', '$teatro_meia');";
  $sql_teatros = mysqli_query($con, $sql_teatro);
}

//Cadastro de Show
if(isset($_POST['cadastrar_show'])){
  $atracao = $_POST['atracao'];
  $data = $_POST['data'];
  $local = $_POST['local'];
  $endereco = $_POST['endereco'];
  $horario = $_POST['horario'];
  $classificacao_atracao = $_POST['classificacao_atracao'];
  $show_inteira = $_POST['show_inteira'];
  $show_meia = $_POST['show_meia'];

  $extensao = strtolower(substr($_FILES['file_atracao']['name'], -4));
  $novo_nome = time() . $extensao;
  $diretorio = "../upload_show/";

  move_uploaded_file($_FILES['file_atracao']['tmp_name'], $diretorio.$novo_nome);

  $sql_show = "INSERT INTO tb_show(atracao,data,local,endereco,horario,classificacao_atracao,file_atracao, show_inteira, show_meia)
  VALUES ('$atracao', '$data', '$local', '$endereco', '$horario', '$classificacao_atracao', '$novo_nome', '$show_inteira', '$show_meia');";
  $sql_shows = mysqli_query($con, $sql_show);;
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
      #cinema{
        height: auto;
      }
      #card_cinema{
        height: 885px
      }
    </style>
            
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
                <li><a href="./eventos.php">Eventos</a></li>
                <li><a href="./cartaz.php">Editar Filmes</a></li>
                <li><a href="./teatro.php">Editar Teatros</a></li>
                <li><a href="./show.php">Editar Shows</a></li>
                <li><a href="./configuracoes.php">Configurações</a></li>
                <li><a href="./logout.php"><i class="material-icons">exit_to_app</i></a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-nav">
        <li><a href="./index.php">Home</a></li>
        <li><a href="./cadastro.php">Eventos</a></li>
        <li><a href="./cartaz.php">Editar Filmes</a></li>
        <li><a href="./teatro.php">Editar Teatros</a></li>
        <li><a href="./show.php">Editar Shows</a></li>
        <li><a href="./configuracoes.php">Configurações</a></li>
    </ul>

    <div class="container">
      <div class="row">
        <div class="col s12">
          <ul class="tabs">
            <li class="tab col s3"><a class="active" href="#cinema">Cinema</a></li>
            <li class="tab col s3"><a href="#teatro">Teatro</a></li>
            <li class="tab col s3"><a href="#show">Show</a></li>
          </ul>
        </div>

      <!--Cadatro de filmes-->
      <div id="cinema" class="col s12">

        <div class="container pt-10">
          <div class="row card" id="card_cinema">
            <div id="test1" class="col s12">
              <h3 class='header'>Cinema</h3>
              
              <div class="row">
                <form class="col s12"  method="POST" action="" enctype="multipart/form-data">
                  <div class="row">
                    <div class="input-field col s6">
                      <input id="titulo" name="titulo" type="text" class="validate">
                      <label for="titulo">Título</label>
                    </div>
                    <div class="input-field col s6">
                    <select id="genero" name="genero">
                        <option value="" disabled selected>Selecione...</option>
                        <option>Ação</option>
                        <option>Aventura</option>
                        <option>Animação</option>
                        <option>Comédia</option>
                        <option>Documentário</option>
                        <option>Drama</option>
                        <option>Fantasia</option>
                        <option>Ficção Científica</option>
                        <option>Romance</option>
                        <option>Suspense</option>
                        <option>Terror</option>
                        <option>Thriller</option>
                      </select>
                    <label>Classificação Indicativa</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                      <input id="duracao"  name="duracao" type="text" class="duracao">
                      <label>Duração</label>
                    </div>
                    <div class="input-field col s6">
                      <select id="classificacao" name="classificacao">
                        <option value="" disabled selected>Selecione...</option>
                        <option>Livre</option>
                        <option>+10</option>
                        <option>+12</option>
                        <option>+14</option>
                        <option id="">+16</option>
                        <option>+18</option>
                      </select>
                    <label>Classificação Indicativa</label>
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
                      <input id="trailer" name="trailer" type="text" placeholder="URL" class="validate">
                      <label for="trailer">Trailer</label>
                    </div>
                    <div class="input-field col s6">
                    <select id="sala" name="sala">
                        <option value="" disabled selected>Selecione...</option>
                        <option>Sala 01</option>
                        <option>Sala 02</option>
                    </select>
                    <label>Sala</label>
                    </div>
                    <div class="input-field col s6">
                      <div class="file-field input-field">
                        <div class="btn">
                          <span>File</span>
                          <input type="file" name="arquivo">
                        </div>
                        <div class="file-path-wrapper">
                          <input name="arquivo" class="file-path validate" type="text" placeholder="Insira o Poster do Show">
                        </div>
                      </div>
                    </div>
                  </div>

                  <button name="cadastrar_cinema" class="waves-effect waves-light btn" type="submit"><i class="fa fa-send"></i> Cadastrar</button>
                  
                </form>
              </div>
                
            </div>
          
          </div>
        </div>

      </div>

      <!--Cadastro peça de teatro-->
      <div id="teatro" class="col s12">
        
      <div class="container pt-10">
          <div class="row card">
            <div id="test1" class="col s12">
              <h3 class='header'>Teatro</h3>
              
              <div class="row">
                <form class="col s12"  method="POST" action="" enctype="multipart/form-data">
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
                        <select id="classificacao_etaria" name="classificacao_etaria">
                          <option value="" disabled selected>Selecione...</option>
                          <option>Livre</option>
                          <option>+10</option>
                          <option>+12</option>
                          <option>+14</option>
                          <option>+16</option>
                          <option>+18</option>
                        </select>
                      <label>Classificação Indicativa</label>
                      
                      </div>
                      <div class="input-field col s6">
                        <div class="file-field input-field">
                          <div class="btn">
                            <span>File</span>
                            <input type="file" name="arquivo_peca">
                          </div>
                          <div class="file-path-wrapper">
                            <input name="arquivo_peca" class="file-path validate" type="text" placeholder="Insira o Poster do Filme">
                          </div>
                        </div>
                      </div>
                      </div>
                    
                    <div class="row">
                    <div class="input-field col s12">
                        <input id="localizacao"  name="localizacao" type="text" class="validate">
                        <label for="localizacao">Localização</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s6">
                        <input id="data_evento"  name="data_evento" type="text" class="validate">
                        <label for="data_evento">Data da peça</label>
                      </div>
                      <div class="input-field col s6">
                        <input id="horario_evento"  name="horario_evento" type="text" class="horario">
                        <label for="horario_evento">Horário da peça</label>
                      </div>
                      
                    </div>
                    <div class="row">
                    <div class="input-field col s6">
                        <input id="teatro_inteira"  name="teatro_inteira" type="number" class="validate">
                        <label for="teatro_inteira">Valor Inteira</label>
                      </div>
                    <div class="input-field col s6">
                        <input id="teatro_meia"  name="teatro_meia" type="number" class="validate">
                        <label for="teatro_meia">Valor Meia</label>
                      </div>
                    </div>

                    <button name="cadastrar_teatro" class="waves-effect waves-light btn" type="submit"><i class="fa fa-send"></i> Cadastrar</button>
                    
                </form>
                </div>
              </div>
                
            </div>
          
          </div>
        </div>

      </div>

      <!--Cadastro peça de shows-->
      <div id="show" class="col s12">
      
      <div class="container pt-10">
          <div class="row card">
            <div id="test1" class="col s12">
              <h3 class='header'>Show</h3>
              
              <div class="row">
                <form class="col s12"  method="POST" action="" enctype="multipart/form-data">
                  <div class="row">
                    <div class="input-field col s6">
                      <input id="atracao" name="atracao" type="text" class="validate">
                      <label for="atracao">Atração</label>
                    </div>
                    <div class="input-field col s6">
                      <input id="data" name="data" type="text" class="validate">
                      <label for="data">Data</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                      <input id="local"  name="local" type="text" class="validate">
                      <label for="local">Local</label>
                    </div>
                    <div class="input-field col s6">
                    <input id="endereco"  name="endereco" type="text" class="validate">
                      <label for="endereco">Endereço</label>
                    </div>
                  </div>
                  <div class="row">
                  <div class="input-field col s6">
                      <input id="horario"  name="horario" type="text" class="horario">
                      <label>Horário</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                    <select id="classificacao_atracao" name="classificacao_atracao">
                        <option value="" disabled selected>Selecione...</option>
                        <option>Livre</option>
                        <option>+10</option>
                        <option>+12</option>
                        <option>+14</option>
                        <option>+16</option>
                        <option>+18</option>
                      </select>
                    <label>Classificação Indicativa</label>
                    </div>
                    <div class="input-field col s6">
                      <div class="file-field input-field">
                        <div class="btn">
                          <span>File</span>
                          <input type="file" name="file_atracao">
                        </div>
                        <div class="file-path-wrapper">
                          <input name="file_atracao" class="file-path validate" type="text" placeholder="Insira o Poster do Filme">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="input-field col s6">
                      <input id="show_inteira"  name="show_inteira" type="number" class="validate">
                      <label for="show_inteira">Valor Inteira</label>
                    </div>
                  <div class="input-field col s6">
                      <input id="show_meia"  name="show_meia" type="number" class="validate">
                      <label for="show_meia">Valor Meia</label>
                    </div>
                  </div>
                  
                  <button name="cadastrar_show" class="waves-effect waves-light btn" type="submit"><i class="fa fa-send"></i> Cadastrar</button>
                  
                </form>
              </div>
                
            </div>
          
          </div>
        </div>

      </div>

      </div>
    </div>
  <!--Final do container-->
    
      

    <script>
//Menu
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
  });

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