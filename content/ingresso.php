<?php
include_once('../db/conexao.php');
session_start();

//Retorna o campos com valores do banco de dados
$id_filme = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_filme = "SELECT * FROM tb_cinema WHERE id = '$id_filme'";
$resultado_filme = mysqli_query($con, $result_filme);
$row_filmes = mysqli_fetch_assoc($resultado_filme);
    
//Venda 
if(isset($_POST['realizar_venda'])){
    $titulo = $_POST['titulo'];
    $duracao = $_POST['duracao'];
    $poltronas = $_POST['poltronas'];
    $qtde = $_POST['qtde'];
    $total = $_POST['total'];
    $sql_ingresso = "INSERT INTO tb_ingressos_cinema(titulo,duracao,poltronas,qtde,total)
    VALUES ('$titulo', '$duracao', '$poltronas', '$qtde', '$total');";
    $sql_ingressoss = mysqli_query($con, $sql_ingresso);
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Compiled and minified CSS -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet" />
     <link href="https://unpkg.com/materialize-stepper@3.0.0-beta.1.0.1/dist/css/mstepper.min.css" rel="stylesheet" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
 
     <!--Material Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
    <!-- Compiled Javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://unpkg.com/materialize-stepper@3.0.0-beta.1.0.1/dist/js/mstepper.min.js"></script>

    <!--JS Jquery Seats-->
    <link rel="stylesheet" href="../assests/css/seat-charts.css">
    <script src="../assests/js/jquery.seat-charts.min.js"></script>
    <script src="../assests/js/jquery.seat-charts.js"></script>
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

    .btn,
.btn-large,
.btn-small,
.btn-flat {
  border-radius: 4px;
  font-weight: 500;
}

.card:hover {
  box-shadow: 0px 10px 35px 0px rgba(0, 0, 0, 0.18);
}

.card {
  border-radius: 15px;
  box-shadow: 0px 5px 25px 0px rgba(0, 0, 0, 0.15);
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
                <li><a href="../pages/"><i class="material-icons">open_in_new</i></a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-nav">
        <li><a href="../pages/"><i class="material-icons">open_in_new</i></a></li>
    </ul>

    <div class="section grey lighten-5">
        <div class="container">
          <div class="row">
              <h3 class="light center-align blue-text">Comprar Ingresso</h3>
              <div class="card">
                <div class="card-content">
      
                  <ul class="stepper parallel horizontal">
                    <li class="step active">
                      <div class="step-title waves-effect waves-dark">Ingressos</div>
                      <div class="step-content">
                        <div class="row">
                        <img height='198' width='156' class="validate" src="../upload/<?php echo $row_filmes['arquivo']; ?>">
                        <p>Filme: <span id="title"></span><input id="titulo" hidden name="titulo" type="text" class="validate" value="<?php echo $row_filmes['titulo']; ?>"></p>
                        <p>Duração: <span id="timer"></span><input id="duracao" hidden name="duracao" type="text" class="validate" value="<?php echo $row_filmes['duracao']; ?>"></p>
                        <p>Data: <span>13/11/2022 - 19:00</span></p>
                                    
                        <p>
                          <label>
                            <input class="with-gap" name="group3" type="radio" checked />
                            <span>Inteira R$10,00</span>
                          </label>
                        </p>
                        <p>
                          <label>
                            <input class="with-gap" name="group3" type="radio" checked />
                            <span>Meia R$5,00</span>
                          </label>
                        </p>
                        </div>
                        <div class="step-actions">
                          <button class="waves-effect waves-dark btn blue next-step" data-feedback="anyThing">CONTINUAR</button>
                        </div>
                      </div>
                    </li>
                    <li class="step">
                      <div class="step-title waves-effect waves-dark">Lugares</div>
                      <div class="step-content">
                        <div class="row">
                          <!--Poltronas-->
                            <div class="container-fluid">        
                                <div class="demo">
                                    <div id="seat-map">
                                    <div class="front">TELA</div>					
                                </div>
                                
                                <div class="booking-details">
                                    <p>Filme: <span id="title"></span><input id="titulo" hidden name="titulo" type="text" class="validate" value="<?php echo $row_filmes['titulo']; ?>"></p>
                                    <p>Duração: <span id="timer"></span><input id="duracao" hidden name="duracao" type="text" class="validate" value="<?php echo $row_filmes['duracao']; ?>"></p>
                                    <p>Poltronas: </p>
                                    <ul id="selected-seats" name="poltronas"></ul>
                                    <p>Ingressos: <span id="counter" name="qtde">0</span></p>
                                    <p>Total: <b>R$<span id="total" name="total">0</span></b></p>
                                                                                        
                                    <div id="legend"></div>
                                </div>
                                <div style="clear:both"></div>
                                </div>

                            </div>
                        </div>
                        <div class="step-actions">
                          <button class="waves-effect waves-dark btn blue next-step">CONTINUAR</button>
                          <button class="waves-effect waves-dark btn-flat previous-step">VOLTAR</button>
                        </div>
                      </div>
                    </li>
                    <li class="step">
                      <div class="step-title waves-effect waves-dark">Pagamento</div>
                      <div class="step-content">
                        <div class="row">
                          
                        </div>
                        <div class="step-actions">
                          <button class="waves-effect waves-dark btn blue next-step">CONTINUAR</button>
                          <button class="waves-effect waves-dark btn-flat previous-step">VOLTAR</button>
                        </div>
                      </div>
                    </li>
                    <li class="step">
                        <div class="step-title waves-effect waves-dark">Conclusão</div>
                        <div class="step-content">
                          <div class="row">
                            <div class="input-field col s12">
                              <input id="nome" type="text" class="validate">
                              <label for="nome">Nome</label>
                            </div>
                            <div class="input-field col s12">
                              <input id="email" type="email" class="validate">
                              <label for="email">Email</label>
                            </div>
                            <div class="input-field col s12">
                              <input id="contato" type="text" class="validate" onkeypress="$(this).mask('(00) 00000-0009')">
                              <label for="contato">Contato</label>
                            </div>
                          </div>
                          <div class="step-actions">
                            <button class="waves-effect waves-dark btn green">COMPRAR</button>
                          </div>
                        </div>
                      </li>
                  </ul>
      
                </div>
              </div>
          </div>
        </div>
      </div>  
    
<script>
    //
    function detalhesFilmes(){ 
                              var titulo = document.getElementById('titulo').value; 
                              document.getElementById('title').innerHTML = titulo;
                              var duracao = document.getElementById('duracao').value; 
                              document.getElementById('timer').innerHTML = duracao;
                              var arquivo = document.getElementById('arquivo').value; 
                              document.getElementById('arq').innerHTML = arquivo;    
                          } 
                          window.onload = detalhesFilmes();
                          
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

    function anyThing(destroyFeedback) {
  setTimeout(function() {
    destroyFeedback(true);
  }, 1500);
}

function noThing(destroyFeedback) {
  setTimeout(function() {
    destroyFeedback(true);
  }, 10000);
}

var stepperDiv = document.querySelector('.stepper');
console.log(stepperDiv);
var stepper = new MStepper(stepperDiv);

var price = 10; //price
                      $(document).ready(function() {
                        var $cart = $('#selected-seats'), //Sitting Area
                        $counter = $('#counter'), //Votes
                        $total = $('#total'); //Total money
                        
                        var sc = $('#seat-map').seatCharts({
                          map: [  //Seating chart
                            'aaaaaaaaaa',
                                  'aaaaaaaaaa',
                                  '__________',
                                  'aaaaaaaa__',
                                  'aaaaaaaaaa',
                            'aaaaaaaaaa',
                            'aaaaaaaaaa',
                            'aaaaaaaaaa',
                            'aaaaaaaaaa',
                                  'aa__aa__aa'
                          ],
                          naming : {
                            top : false,
                            getLabel : function (character, row, column) {
                              return column;
                            }
                          },
                          legend : { //Definition legend
                            node : $('#legend'),
                            items : [
                              [ 'a', 'available',   'LI' ],
                              [ 'a', 'unavailable', 'OC']
                            ]					
                          },
                          click: function () { //Click event
                            if (this.status() == 'available') { //optional seat
                              $('<li>F'+(this.settings.row+1)+' A'+this.settings.label+'</li>')
                                .attr('id', 'cart-item-'+this.settings.id)
                                .data('seatId', this.settings.id)
                                .appendTo($cart);
                      
                              $counter.text(sc.find('selected').length+1);
                              $total.text(recalculateTotal(sc)+price);
                                    
                              return 'selected';
                            } else if (this.status() == 'selected') { //Checked
                                //Update Number
                                $counter.text(sc.find('selected').length-1);
                                //update totalnum
                                $total.text(recalculateTotal(sc)-price);
                                  
                                //Delete reservation
                                $('#cart-item-'+this.settings.id).remove();
                                //optional
                                return 'available';
                            } else if (this.status() == 'unavailable') { //sold
                              return 'unavailable';
                            } else {
                              return this.style();
                            }
                          }
                        });
                        //sold seat
                        
                        sc.get(['selec']).status('unavailable');
                          
                      });
                      //sum total money
                      function recalculateTotal(sc) {
                        var total = 0;
                        sc.find('selected').each(function () {
                          total += price;
                        });
                            
                        return total;
                      }




</script>
</body>
</html>