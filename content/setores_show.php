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
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <title>Sistema Inegrado</title>

    <style>
       
       input{
        align-items: center;
        justify-content: center;
        text-align: center;
       }
       .btn-strepper-right{
        border-radius: 3px;
        padding: 0;
        width: 42px;
        height: 42px;
        margin-left: -20px;
       }
       .btn-strepper-left{
        border-radius: 3px;
        padding: 0;
        width: 42px;
        height: 42px;
        margin-left: -15px;
       }
       .btn-strepper-cart{
        border-radius: 3px;
        padding: 0;
        width: 42px;
        height: 42px;
        align-items: center;
        margin-left: 15px;
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

     <!--Setor A-->
     <div class="container pt-10">
        <div class="row card">
          <div id="test1" class="col s12">
            <h3 class='header'>Setor A</h3>
            <div class="container">
              <div class="row">
                
              <form class="col s12" method="POST" action="">
              <div class="row">
                <div class="input-field col s12">
                    <div class="input-field col s6">
                        <p>INTEIRA</p>
                        <span id="ing_inteira">R$ 100,00</span>  
                    </div>
                    
                    <div class="input-field col s1">
                        <a class="btn inteira btn-strepper-left grey" id="sub_inteira"><i class="material-icons">remove</i></a> 
                    </div>
                    <div class="input-field col s3">
                        <input disabled class="validate" type="text" value="0" id="ticket_inteira" tabindex="-1"> 
                    </div>
                    <div class="input-field col s1">
                        <a class="btn inteira btn-strepper-right blue"  id="add_inteira"><i class="material-icons">add</i></a>
                    </div>
                    <div class="input-field col s1">
                        <a class="btn btn-strepper-cart green" href="../content/ingrssos_show.php"  id="add_inteira"><i class="material-icons">shopping_cart</i></a>
                    </div>
                </div>
              </div><hr id="hr">
              <div class="row">
                <div class="input-field col s12">
                    <div class="input-field col s6">
                        <p>MEIA ENTRADA</p>
                        <span id="ing_meia">R$ 50,00</span>  
                    </div>
                    
                    <div class="input-field col s1">
                        <a class="btn meia btn-strepper-left grey" id="sub_meia"><i class="material-icons">remove</i></a> 
                    </div>
                    <div class="input-field col s3">
                        <input disabled class="validate" type="text" value="0" id="ticket_meia" tabindex="-1"> 
                    </div>
                    <div class="input-field col s1">
                        <a class="btn meia btn-strepper-right blue"  id="add_meia"><i class="material-icons">add</i></a>
                    </div>
                </div>
              </div>
              

                </div>
                
  
                
              </div>
              <span style="float: right;">R$ 150,00</span>
            </div>
          </div>
        </div>
    <!--Setor A-->
    

        <!--Setor B-->
        <div class="container pt-10">
            <div class="row card">
              <div id="test1" class="col s12">
                <h3 class='header'>Setor B</h3>
                <div class="container">
                  <div class="row">
                    
                  <form class="col s12" method="POST" action="">
                  <div class="row">
                    <div class="input-field col s12">
                        <div class="input-field col s6">
                            <p>INTEIRA</p>
                            <span id="ing_inteira">R$ 100,00</span>  
                        </div>
                        
                        <div class="input-field col s1">
                            <a class="btn inteira btn-strepper-left grey" id="sub_inteira"><i class="material-icons">remove</i></a> 
                        </div>
                        <div class="input-field col s3">
                            <input disabled class="validate" type="text" value="0" id="ticket_inteira" tabindex="-1"> 
                        </div>
                        <div class="input-field col s1">
                            <a class="btn inteira btn-strepper-right blue"  id="add_inteira"><i class="material-icons">add</i></a>
                        </div>
                        <div class="input-field col s1">
                            <a class="btn inteira btn-strepper-cart green"  id="add_inteira"><i class="material-icons">shopping_cart</i></a>
                        </div>
                    </div>
                  </div><hr id="hr">
                  <div class="row">
                    <div class="input-field col s12">
                        <div class="input-field col s6">
                            <p>MEIA ENTRADA</p>
                            <span id="ing_meia">R$ 50,00</span>  
                        </div>
                        
                        <div class="input-field col s1">
                            <a class="btn meia btn-strepper-left grey" id="sub_meia"><i class="material-icons">remove</i></a> 
                        </div>
                        <div class="input-field col s3">
                            <input disabled class="validate" type="text" value="0" id="ticket_meia" tabindex="-1"> 
                        </div>
                        <div class="input-field col s1">
                            <a class="btn meia btn-strepper-right blue"  id="add_meia"><i class="material-icons">add</i></a>
                        </div>
                    </div>
                  </div>
                  
    
                    </div>
                    
      
                    
                  </div>
      
                </div>
              </div>
            </div>
        <!--Final Setor B-->

        <!--Camarote-->
        <div class="container pt-10">
            <div class="row card">
              <div id="test1" class="col s12">
                <h3 class='header'>Camarote</h3>
                <div class="container">
                  <div class="row">
                    
                  <form class="col s12" method="POST" action="">
                  <div class="row">
                    <div class="input-field col s12">
                        <div class="input-field col s6">
                            <p>INTEIRA</p>
                            <span id="ing_inteira">R$ 100,00</span>  
                        </div>
                        
                        <div class="input-field col s1">
                            <a class="btn inteira btn-strepper-left grey" id="sub_inteira"><i class="material-icons">remove</i></a> 
                        </div>
                        <div class="input-field col s3">
                            <input disabled class="validate" type="text" value="0" id="ticket_inteira" tabindex="-1"> 
                        </div>
                        <div class="input-field col s1">
                            <a class="btn inteira btn-strepper-right blue"  id="add_inteira"><i class="material-icons">add</i></a>
                        </div>
                        <div class="input-field col s1">
                            <a class="btn inteira btn-strepper-cart green"  id="add_inteira"><i class="material-icons">shopping_cart</i></a>
                        </div>
                    </div>
                  </div><hr id="hr">
                  <div class="row">
                    <div class="input-field col s12">
                        <div class="input-field col s6">
                            <p>MEIA ENTRADA</p>
                            <span id="ing_meia">R$ 50,00</span>  
                        </div>
                        
                        <div class="input-field col s1">
                            <a class="btn meia btn-strepper-left grey" id="sub_meia"><i class="material-icons">remove</i></a> 
                        </div>
                        <div class="input-field col s3">
                            <input disabled class="validate" type="text" value="0" id="ticket_meia" tabindex="-1"> 
                        </div>
                        <div class="input-field col s1">
                            <a class="btn meia btn-strepper-right blue"  id="add_meia"><i class="material-icons">add</i></a>
                        </div>
                    </div>
                  </div>
                  
    
                    </div>
                    
      
                    
                  </div>
      
                </div>
              </div>
            </div>
        <!--Final Camarote-->


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
    $(".inteira").on("click tap", function(){

        var $button = $(this);
        var oldValue = $('#ticket_inteira').val();

        if($button.attr("id") == "add_inteira"){
            var newVal = parseFloat(oldValue) + 1;
        } else{
            if(oldValue > 0){
                var newVal = parseFloat(oldValue) - 1;
            }else{
                newVal = 0;
            }
        };

        $("#ticket_inteira").val(newVal);
        document.getElementById('ticket_inteira').innerHTML = newVal;
    });

    $("#sub_inteira").on("click tap", function(){
        if($('#ticket_inteira').val() === '0'){
            $(this).attr("disabled", true);
        }
    });

    $("#add_inteira").on("click tap", function(){
        $("#sub_inteira").removeAttr("disabled");
    });


    $(".meia").on("click tap", function(){

var $button = $(this);
var oldValue = $('#ticket_meia').val();

if($button.attr("id") == "add_meia"){
    var newVal = parseFloat(oldValue) + 1;
} else{
    if(oldValue > 0){
        var newVal = parseFloat(oldValue) - 1;
    }else{
        newVal = 0;
    }
};

$("#ticket_meia").val(newVal);
document.getElementById('ticket_meia').innerHTML = newVal;
});

$("#sub_meia").on("click tap", function(){
if($('#ticket_meia').val() === '0'){
    $(this).attr("disabled", true);
}
});

$("#add_meia").on("click tap", function(){
$("#sub_meia").removeAttr("disabled");
});

//Setor B

</script>
</body>
</html>