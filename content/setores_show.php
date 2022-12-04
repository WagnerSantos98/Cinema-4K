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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>  
    <script src="../assests/js/teste.js"></script>

    <title>Sistema Integrado</title>

    <style>
      body{
        background: #767676;
      }
       
       input{
        align-items: center;
        justify-content: center;
        text-align: center;
       }
       
       .btn-sold{
           margin-top: -60px;
           height: 42px;
           width: 255px;
           margin-left: -35px;
        }
        #card{
            position: absolute;
            height: 250px;
            width: 290px;
            margin-left: 40%;
            margin-top: -998px;
        }
        #card1{
            height:auto;
            width: 560px;
        }  
        #card2{
            position: absolute;
            height: auto;
            width: 290px;
            margin-left: 40%;
            margin-top: -740px;
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
        #inteiro,
        #meio{
          margin-left: 60px;
          margin-inline-end: 10px;
          outline: none;
        }   
        h6{
          font-weight: bold;
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
            <h2 class='header'>Carrinho</h2>
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
                    <h6>Ingeressos</h6>                  
                </div>
                <div class="input-field col s6">
                    <p>Inteira R$<span id="inteira"></span>
                    <div class="row stepper stepper--style-2 js-spinner">
                    <input id="show_inteira" hidden name="show_inteira" type="text" class="validate" value="<?php echo $row_eventos['show_inteira']; ?>">
                      <div class="input-field col s3">
                        <button type="button" class="btn grey" spinner-button="down">-</button>
                            </div>
                            <div class="input-field col s5">
                            <input  type="number" min="0" max="8" step="1" value="0" id="sh_inteiro" class="stepper__input" data-value="<?php echo $row_eventos['show_inteira']; ?>" onblur="transferirValor()">
                            </div>
                            <div class="input-field col s3">
                            <button type="button" class="btn light-blue lighten-2" spinner-button="up">+</button>
                      </div>
                    </div>
                    </p>

                    <p>Meia R$<span id="meia"></span>
                        <input id="show_meia"hidden name="show_meia" type="text" class="validate" value="<?php echo $row_eventos['show_meia']; ?>">
                        <div class="row stepper stepper--style-2 js-spinner">
                    <input id="show_inteira" hidden name="show_inteira" type="text" class="validate" value="<?php echo $row_eventos['show_meia']; ?>">
                      <div class="input-field col s3">
                        <button type="button" class="btn grey" spinner-button="down">-</button>
                            </div>
                            <div class="input-field col s5">
                            <input  type="number" min="0" max="8" step="1" value="0" id="sh_meio" class="stepper__input" data-value="<?php echo $row_eventos['show_meia']; ?>" onblur="transferirValor()">
                            </div>
                            <div class="input-field col s3">
                            <button type="button" class="btn light-blue lighten-2" spinner-button="up">+</button>
                      </div>
                    </div>
                    </p>                
                    
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
              <div class="input-field col s3">
              <p id="qtde_int">Inteira: <input id="inteiro" disabled></p>
              <p id="qtd_mei">Meio: <input id="meio" disabled></p>
              </div>              
              </div>         
                </div>
              </div>
            </div>
          </div>
        </div>
       
    

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
                <p>
                  <label>
                    <input name="group1" type="radio" disabled/>
                    <span><i class="fa-brands fa-pix" style="color:#2ebdae"></i> PIX</span>
                  </label>
                </p>
                <p>
                  <label>
                    <input name="group1" type="radio" checked />
                    <span><i class="fas fa-sack-dollar"></i> Dinheiro</span>
                  </label>
                </p>
                <p>
                  <label>
                    <input name="group1" type="radio" disabled/>
                    <span><i class="fas fa-barcode"></i> Boleto Bancário</span>
                  </label>
                </p>
                <p>
                  <label>
                    <input name="group1" type="radio" disabled/>
                    <span><i class="far fa-credit-card"></i> Cartão de Crédito</span>
                  </label>
                </p>
                <p>Total R$<span id="total" ></span></p>
                <span>Informe o valor:</span>
                <p><input class="validate" id="valor" ></p><br><br>

                <a class="waves-effect waves-light btn btn-sold green">CONTINUAR</a>
                </div>
                
            </div>     
              </div>
            </div>
          </div>
        </div>
    <!--Formas de Pagamento-->

    
     
    

       

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/stepper.js@1.0.3/dest/stepper.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });

  var stepp = document.getElementsByClassName('stepper__input');

for (var i = 0; i < stepp.length; i++) {
  stepp[i].onchange = function steppChange(evt) {
    var total = 0
    for (var j = 0; j < stepp.length; j++) {
      total += parseFloat(stepp[j].getAttribute('data-value') * stepp[j].value);
    }
        document.getElementById("total").innerText = total;

  }
}

function transferirValor(){
  $('#inteiro').val($('#sh_inteiro').val());
  $('#meio').val($('#sh_meio').val());
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
    var show_inteira = document.getElementById('show_inteira').value; 
    document.getElementById('inteira').innerHTML = show_inteira;  
    var show_meia = document.getElementById('show_meia').value; 
    document.getElementById('meia').innerHTML = show_meia;
    var total_ing = document.getElementById("total").value;
    document.getElementById('total_ingresso').innerHTML = total_ing; 
} 

window.onload = detalhesShows();


</script>
</body>
</html>