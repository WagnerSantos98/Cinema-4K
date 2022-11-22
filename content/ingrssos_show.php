<?php
include_once('../db/conexao.php');
session_start();

//Retorna o campos com valores do banco de dados
$id_eventos = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_eventos = "SELECT * FROM tb_show WHERE id = '$id_eventos'";
$resultado_eventos = mysqli_query($con, $result_eventos);
$row_eventos = mysqli_fetch_assoc($resultado_eventos);

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
    <style>
        input{
         align-items: center;
         justify-content: center;
         text-align: center;
        }
        .btn{
           margin-top: 40px;
           height: 42px;
           width: 255px;
           margin-left: -35px;
        }
        #card{
            position: fixed;
            height: 345px;
            width: 290px;
            margin-left: 45%;
            margin-top: -530px;
        }
        #card1{
            height:auto;
            width: 560px;
        }  
        #card2{
            position: fixed;
            height: 145px;
            width: 290px;
            margin-left: 45%;
            margin-top: -170px;
        } 
        #down{
            color: #2196f3;
        }
        #mostrar{
            font-size: 14px;
            color: #000;
            text-decoration: underline #2196f3;
            cursor: pointer;
        }   
     </style>
    <title>Document</title>
</head>
<body>
  <!--Navbar-->   
  <nav class="blue" style="padding: 0px 10px;">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo" >Sistema Inegrado</a>

            <a href="#" class="sidenav-trigger" data-target="mobile-nav"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <li><a href="../pages/"><i class="material-icons">open_in_new</i></a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-nav">
        <li><a href="../pages/"><i class="material-icons">open_in_new</i></a></li>
    </ul>

     <!--Carrinho-->
    <div class="container pt-10">
        <div class="row card" id="card1">
          <div id="test1" class="col s12">
            <h6 class='header'>Carrinho</h6>
            <div class="container">
              <div class="row">
                
              <form class="col s12" method="POST" action="">
              <div class="row">
                <div class="input-field col s12">
                <img height='198' width='156' class="validate" src="../upload_show/<?php echo $row_eventos['file_atracao']; ?>">
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                    <p>Atração: <span id="title"><input id="titulo" hidden name="titulo" type="text" class="validate" value="<?php echo $row_eventos['atracao']; ?>"></span></p>
                    <span id="ing_inteira">[local]</span> 
                    <span id="ing_inteira">[data e horário]</span>
                    <span id="ing_inteira">[promotor]</span>
                </div>
                <div class="input-field col s12">
                    <div>Conteudo</div>

                    <a type="button" id="mostrar" onclick="Mudarestado('minhaDiv')">Mostrar detalhes <i class="material-icons" id="down">arrow_drop_down</i></a>
                </div>
                <div class="input-field col s12"  id="minhaDiv" style="display:none">
                    <p>[setor, tipo int ou meia] <span>R$ 50,00</span></p>
                </div>
                </div>
                
  
                
              </div>
            </div>
          </div>
        </div>
    <!--Carrinho-->

    <!--Resumo-->
    <div class="container pt-10">
        <div class="row card" id="card">
          <div id="test1" class="col s12">
            <h6 class='header'>Resumo</h6>
            <div class="container">
              <div class="row">
                
              <form class="col s12" method="POST" action="">
              <div class="row">
                <div class="input-field col s12">
                    <div class="input-field col s12">
                        <p>1 x [nome_atração] <span>R$ 50,00</span></p>
                        <span id="ing_inteira">[local]</span> 
                        <span id="ing_inteira">[data e horário]</span>  
                    </div>
                    <div class="input-field col s12">
                        <p>Total <span>R$ 50,00</span></p>
                    </div>
                    <div class="input-field col s6">
                        <a class="waves-effect waves-light btn green" style="font-weight: bold">CONTINUAR</a>
                    </div>
                </div>
                
              </div>
              <div class="row">
                <div class="input-field col s12">
                   
                </div>
              </div>
              

                </div>
                
  
                
              </div>
            </div>
          </div>
        </div>
    <!--Resumo-->

    <!--Formas de Pagamento-->
    <div class="container pt-10">
        <div class="row card" id="card2">
          <div id="test1" class="col s12">
            <h6 class='header'>Formas de Pagamento</h6>
            <div class="container">
              <div class="row">
                
              <form class="col s12" method="POST" action="">
              <div class="row">
                <div class="input-field col s12">
                    <div class="input-field col s12">
                        <img height="22" width="44.72" src="../assests/img/logo_visa.svg">
                        <img height="22" width="27.86" src="../assests/img/logo_mastercard.svg">
                        <img height="22" width="81.39" src="../assests/img/logo_diners.png"><br><br>
                        <img height="22" width="22" src="../assests/img/logo_amex.svg">
                        <img height="22" width="36.66" src="../assests/img/logo_elo.png">
                        <img height="22" width="81.92" src="../assests/img/logo_paypal.svg">
                    </div>
                </div>
                
            </div>     
              </div>
            </div>
          </div>
        </div>
    <!--Formas de Pagamento-->

    <script>
    function Mudarestado(el) {
        var display = document.getElementById(el).style.display;
            if (display == "none"){
                document.getElementById(el).style.display = 'block';
            }else{
                document.getElementById(el).style.display = 'none';
            }
    //Detalhes sobre a atração
    function detalhesShows(){ 
                              var atracao = document.getElementById('atracao').value; 
                              document.getElementById('title').innerHTML = atracao;
                              var duracao = document.getElementById('duracao').value; 
                              document.getElementById('timer').innerHTML = duracao;
                              var arquivo = document.getElementById('arquivo').value; 
                              document.getElementById('arq').innerHTML = arquivo;    
                          } 
                          window.onload = detalhesShows();
}
    </script>
</body>
</html>