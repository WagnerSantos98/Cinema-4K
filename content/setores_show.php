<?php
include_once('../db/conexao.php');
session_start();

//Retorna o campos com valores do banco de dados
$id_evento = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_evento = "SELECT * FROM tb_show WHERE id = '$id_evento'";
$resultado_evento = mysqli_query($con, $result_evento);
$row_eventos = mysqli_fetch_assoc($resultado_evento);

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
    <script src="../assests/js/teste.js"></script>
    

    <title>Sistema Inegrado</title>

    <style>
       
       input{
        align-items: center;
        justify-content: center;
        text-align: center;
       }
       
       .btn-sold{
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


        .quantityOne{
        width: 400px;
        height: 400px;

        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 50px;
        box-sizing: border-box;
    }
    .quantityOutput{
        font-size: 52px;
        font-weight: 400;
        color: #36323b;
        font-family:'Open Sans', sans-serif;
        width: 30%;
        text-align: right;
        margin-left: 50px;
    }
    .spinNumber{
        display: flex;
        justify-content: center;
        width: 70%;
    }
    .spinNumber .incrimentButton,.spinNumber .decrimentButton{
        width: 50px;
        height: 50px;
        background: transparent;
        border: transparent;
        text-align: center;
        font-size: 32px;
        font-weight: 400;
        color: #36323b;
        font-family:'Open Sans', sans-serif;
        margin: 0 15px;
        line-height: 50px;
        background: transparent;
        cursor: pointer;
        transition: .4s all ease-in-out;
    }
    .spinNumber .incrimentButton:hover,.spinNumber .decrimentButton:hover{
        background: #00a1a1;
    }
    .spinNumber input{
        width: 48px;
        height: 48px;
        background: transparent;
        border: 1px transparent;
        text-align: center;
        font-size: 24px;
        font-weight: 400;
        color: #36323b;
        font-family:'Open Sans', sans-serif;
        line-height: 48px;
        background: #c6f5f53b;


    }
    input:focus{
        outline: none;
    }
    .regularPrice{
        display: none;
    }
    </style>

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
                    <input id="atracao" hidden name="atracao" type="text" class="validate" value="<?php echo $row_eventos['atracao']; ?>">
                    <p>Título: <span  id="title"></span></p>
                    <input id="endereco" hidden name="endereco" type="text" class="validate" value="<?php echo $row_eventos['endereco']; ?>">
                    <p>Local: <span  id="location"></span></p>
                    <input id="data" hidden name="data" type="text" class="validate" value="<?php echo $row_eventos['data']; ?>">
                    <input id="horario" hidden name="horario" type="text" class="validate" value="<?php echo $row_eventos['horario']; ?>">
                    <p>Data e Horário: <span  id="data_atracao"></span> | <span  id="hora"></span></p>
                </div>
                <div class="input-field col s12">
                    <div>Ingressos</div>

                    <a type="button" id="mostrar" onclick="Mudarestado('minhaDiv')">Mostrar detalhes <i class="material-icons" id="down">arrow_drop_down</i></a>
                </div>
                <div class="input-field col s12"  id="minhaDiv" style="display:none">
                    <!--Setor A-->
                    <p>Setor A</p>
                    <p>Inteira 
                        <span>R$100,00</span>
                        <div class="quantity">
                            Quantity:
                            <button class="minus">-</button>
                            <em class="q-status">100</em>
                            <button class="plus">+</button>
                        </div>

                    </p>
                    
                    <p>Meia 
                        <span>R$50,00</span>
                       
                    </p><hr>

                    <!--Setor B-->
                    <p>Setor B</p>
                    <p>Inteira <span>R$100,00</span></p>
                    <p>Meia <span>R$50,00</span></p><hr>

                    <!--Camarote-->
                    <p>Camarote</p>
                    <p>Inteira <span>R$100,00</span></p>
                    <p>Meia <span>R$50,00</span></p>
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
                        <a class="waves-effect waves-light btn btn-sold green" style="font-weight: bold">CONTINUAR</a>
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

        <div class="quantityOne">
        <div class="spinNumber">
            <div class="decrimentButton">-</div>
              <input class="spinNumberOutput" type="text" readonly  min="0" max="10" value="1">
          <div class="incrimentButton">+</div>
            
        </div>
        
         <div class="regularPrice">150</div>
         <div class="quantityOutput">0</div>
    </div>

    <div class="quantityOne">
        <div class="spinNumber">
            <div class="decrimentButton decriment">-</div>
              <input class="spinNumberOutput spinNumberOut" type="text" readonly  min="0" max="10" value="1">
          <div class="incrimentButton incriment">+</div>
            
        </div>
        
         <div class="regularPrice price">10</div>
         <div class="quantityOutput quantity">0</div>
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
}

//Detalhes sobre a atração
function detalhesShows(){ 
                              var atracao = document.getElementById('atracao').value; 
                              document.getElementById('title').innerHTML = atracao;
                              var endereco = document.getElementById('endereco').value; 
                              document.getElementById('location').innerHTML = endereco;
                              var data = document.getElementById('data').value; 
                              document.getElementById('data_atracao').innerHTML = data;
                              var horario = document.getElementById('horario').value; 
                              document.getElementById('hora').innerHTML = horario;
                              var arquivo = document.getElementById('arquivo').value; 
                              document.getElementById('arq').innerHTML = arquivo;    
                          } 
                          window.onload = detalhesShows();

    //Setor A
    

</script>
</body>
</html>