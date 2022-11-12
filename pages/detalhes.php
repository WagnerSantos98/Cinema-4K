<?php
include_once('../db/conexao.php');
session_start();

//Retorna o campos com valores do banco de dados
$id_filme = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_filme = "SELECT * FROM tb_cinema WHERE id = '$id_filme'";
$resultado_filme = mysqli_query($con, $result_filme);
$row_filmes = mysqli_fetch_assoc($resultado_filme);
    
//Link youtube
$link = 'http://youtube.com/embed/';

//Link do banco
$link_banco = $row_filmes['trailer'];
$link_final = '?rel=0';
 
//Link Completo
$link_completo = $link.$link_banco.$link_final;
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
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <title>Home Page</title>
<style>
    *{
        margin: 0;
        padding: 0;
    }

    body{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    .nav-wrapper{
        margin-top: -65px;
    }
    .block{
        height: 1200px;
        background-color: #eee;
        margin-bottom: 20px;
        padding: 60px 0;
        text-align: center;
    }
    .container .exibicao{
        border-radius: 8px;
        border: 3px solid #333;
        
    }
    /*Back to top button*/
    #button{
        display: inline-block;
        background-color: rgba(0, 0, 0, 0.7);
        width: 50px;
        height: 50px;
        text-align: center;
        border-radius: 4px;
        position: fixed;
        bottom: 30px;
        right: 30px;
        transition: background-color .3s,
            opacity .5s, visibility .5s;
        opacity: 0;
        visibility: hidden;
        z-index: 1000;
    }
    #button img{
        position: absolute;
        top: 50%;
        right: 15px;
        width: 20px;
        transform: translateY(-50%);
    }
   
    #button:hover{
        cursor: pointer;
        background-color: #333;
    }
    #button:active{
        background-color: #555;
    }
    #button.show{
        opacity: 1;
        visibility: visible;
    }
</style>
</head>

<body>
    <!--Navbar-->   
    <nav class="red" style="padding: 0px 10px;">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo" >Sistema Inegrado</a>

            <a href="#" class="sidenav-trigger" data-target="mobile-nav"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <li><a href="#" data-scroll="home">Home</a></li>
                <li><a href="#" data-scroll="cinema">Cinema</a></li>
                <li><a href="#" data-scroll="show">Show</a></li>
                <li><a href="#" data-scroll="teatro">Teatro</a></li>
                <li><a href="../pages/"><i class="material-icons">open_in_new</i></a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-nav">
        <li><a href="#" data-scroll="home">Home</a></li>
        <li><a href="#" data-scroll="cinema">Cinema</a></li>
        <li><a href="#" data-scroll="show">Show</a></li>
        <li><a href="#" data-scroll="teatro">Teatro</a></li>
        <li><a href="../pages/"><i class="material-icons">open_in_new</i></a></li>
    </ul>
   
    

    <!--Back to top button-->
    <a id="button"><img src="../assests/img/chevron-up-solid.svg"></a>

    <div class="container pt-10">
      <div class="row card">
        <div id="test1" class="col s12">
          <h3 class='header'>Datalhes do Filme</h3>
          <div class="container">
            <div class="row">
            <form class="col s12" method="POST" action="">
            
            <div class="row">
                <div class="input-field col s6">
                  <input id="titulo" hidden name="titulo" type="text" class="validate" value="<?php echo $row_filmes['titulo']; ?>">
                  <label>Título</label>
                  <p id="title" style="color: black;"></p>
                </div>
                <div class="input-field col s6">
                  <input id="genero" hidden name="genero" type="text" class="validate" value="<?php echo $row_filmes['genero']; ?>">
                  <label>Gênero</label>
                  <p id="gener"></p>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <input id="duracao" hidden  name="duracao" type="text" class="validate" value="<?php echo $row_filmes['duracao']; ?>">
                  <label>Duração</label>
                  <p id="timer"></p>
                </div>
                <div class="input-field col s6">
                <input id="classificacao" hidden  name="classificacao" type="text" class="validate" value="<?php echo $row_filmes['classificacao']; ?>">
                <label for="classificacao">Classificação Indicativa</label>
                <p id="classificacao_indicativa"></p>
                </div>
              </div>
              <div class="row">
              <div class="input-field col s6">
                  <input id="sinopse" hidden name="sinopse" type="text" class="validate" value="<?php echo $row_filmes['sinopse']; ?>">
                  <label for="sinopse">Sinope</label>
                  <p id="sinopse_filme"></p>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <input id="elenco" hidden name="elenco" type="text" class="validate" value="<?php echo $row_filmes['elenco']; ?>" disabled>
                  <label for="elenco">Elenco</label>
                  <p id="elenco_filme"></p>
                </div>
                <div class="input-field col s6">
                  <input id="diretor" hidden name="diretor" type="text" class="validate" value="<?php echo $row_filmes['diretor']; ?>">
                  <label for="diretor">Diretor</label>
                  <p id="diretor_filme"></p>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <input id="data_estreia" hidden name="data_estreia" type="text" class="validate" value="<?php echo $row_filmes['data_estreia']; ?>">
                  <label for="data_estreia">Data de Estreia</label>
                  <p id="estreia"></p>
                </div>
                <div class="input-field col s6">
                  <input id="distribuidora" hidden name="distribuidora" type="text" class="validate" value="<?php echo $row_filmes['distribuidora']; ?>">
                  <label for="distribuidora">Distribuidora</label>
                  <p id="distribuidora_filme"></p>
                </div>
              </div>
              <label for="trailer">Trailer</label>
              <div class="row">
                <div class="input-field col s6">
                    <div class="video-container">
                     <iframe width="560" height="315" src="<?php echo $link_completo;?>" frameborder="0" allowfullscreen></iframe>
-                    </div>
                </div>
              </div>

              <button name="comprar_ingresso" class="waves-effect waves-light btn" type="submit"><i class="fa fa-send"></i> Comprar</button>
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

    $("body").css("paddingTop", $(".nav-wrapper").innerHeight());

    $(function(){
        $(".nav-wrapper li a").click(function(e){
            "use strict";
            e.preventDefault();
            $("html, body").animate(
                {
                    scrollTop: $("#" + $(this).data("scroll")).offset().top + 1,
                },
                1000
            );
        });

            $(this)
            .addClass("active")
            .parent()
            .siblings()
            .find("a")
            .removeClass("active");

            $(window).scroll(function(){
            $(".block").each(function(){
                if($(window).scrollTop() >= $(this).offset().top){
                    var blockId = $(this).attr("id");
                    $(".nav-wrapper a").removeClass("active");
                    $('.nav-wrapper li a[data-scroll="' + blockId + '"]').addClass("active");
                }
            });
        });
    });

    //Back to top button
    var btn = $('#button');

    $(window).scroll(function(){
        if($(window).scrollTop() > 300){
            btn.addClass('show');
        }else{
            btn.removeClass('show');
        }
    });

    btn.on('click', function(e){
        e.preventDefault();
        $('html, body').animate({scrollTop:0},'500');
    });

    function detalhesFilmes(){ 
        var titulo = document.getElementById('titulo').value; 
        document.getElementById('title').innerHTML = titulo;
        var genero = document.getElementById('genero').value; 
        document.getElementById('gener').innerHTML = genero;
        var duracao = document.getElementById('duracao').value; 
        document.getElementById('timer').innerHTML = duracao;
        var classificacao = document.getElementById('classificacao').value; 
        document.getElementById('classificacao_indicativa').innerHTML = classificacao;

        var sinopse = document.getElementById('sinopse').value; 
        document.getElementById('sinopse_filme').innerHTML = sinopse;
        var elenco = document.getElementById('elenco').value; 
        document.getElementById('elenco_filme').innerHTML = elenco;
        var diretor = document.getElementById('diretor').value; 
        document.getElementById('diretor_filme').innerHTML = diretor;
        var data_estreia = document.getElementById('data_estreia').value; 
        document.getElementById('estreia').innerHTML = data_estreia;
        var distribuidora = document.getElementById('distribuidora').value; 
        document.getElementById('distribuidora_filme').innerHTML = distribuidora;   
    } 
    window.onload = detalhesFilmes();


</script>
</body>
</html>