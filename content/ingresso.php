<?php
include_once('../db/conexao.php');
session_start();

//Retorna o campos com valores do banco de dados
$id_filme = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_filme = "SELECT * FROM tb_cinema WHERE id = '$id_filme'";
$resultado_filme = mysqli_query($con, $result_filme);
$row_filmes = mysqli_fetch_assoc($resultado_filme);


$result_poltrona = "SELECT * FROM tb_igressos_cinema WHERE poltrona = '2_10'";

    
//Venda 
if(isset($_POST['realizar_venda'])){
  $titulo = $_POST['titulo'];
  $duracao = $_POST['duracao'];
  $qtde = $_POST['qtde'];
  $total = $_POST['total'];
  $seat = (isset($_POST['seat']) ? $_POST['seat']:array());
  if(is_array($seat)){
    foreach($seat as $selectedOption){
      $sql_ingresso = "INSERT INTO tb_ingressos_cinema(titulo,duracao,poltrona,qtde,total)
      VALUES ('$titulo', '$duracao', '$selectedOption', '$qtde', '$total');";
      $sql_ingressos = mysqli_query($con, $sql_ingresso)
      or die ("<div class='alert alert-danger' role='alert'>You couldn't execute query</div>");
    }
    echo "  <div class='alert alert-success' role='success'>Congrats your booking has been done! Print the tickets <a target='_blank'>here</a>!</div>";
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
     <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet" />
     <link href="https://unpkg.com/materialize-stepper@3.0.0-beta.1.0.1/dist/css/mstepper.min.css" rel="stylesheet" />
 
     <!--Material Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="../assests/css/seat-charts.css">
 
    <!-- Compiled Javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://unpkg.com/materialize-stepper@3.0.0-beta.1.0.1/dist/js/mstepper.min.js"></script>

    

    <!--JS Jquery Seats-->
   
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="../assests/js/jquery.seat-charts.js"></script>
    <script type="text/javascript" src="../assests/js/jquery.seat-charts.min.js"></script>
<style>
    *{
        margin: 0;
        padding: 0;
    }    
</style>
</head>

<body>
    <!--Navbar-->   
    <nav class="blue" style="padding: 0px 10px;">
        <div class="nav-wrapper">
            <a href="../content/homepage.php" class="brand-logo" >LL TICKET</a>

            <a href="#" class="sidenav-trigger" data-target="mobile-nav"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <li><a href="../pages/login.php"><i class="material-icons">open_in_new</i></a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-nav">
        <li><a href="../pages/login.php"><i class="material-icons">open_in_new</i></a></li>
    </ul>

    <div class="section grey lighten-5">
      <div class="container">
        <div class="row">
        <form class="col s12" method="POST" action="" enctype="multipart/form-data">
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
                        <p>Data: <span id="data"></span><input id="data_estreia" hidden name="data_estreia" type="text" class="validate" value="<?php echo $row_filmes['data_estreia']; ?>"></p>
                      </div>
                      <div class="step-actions">
                        <button class="waves-effect waves-dark btn blue next-step" data-feedback="anyThing">Continuar</button>
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
                                    <p>Filme: <span id="title_lugares"></span><input id="titulo_lug" hidden name="titulo" type="text" class="validate" value="<?php echo $row_filmes['titulo']; ?>"></p>
                                    <p>Duração: <span id="timer_lugares"></span><input id="duracao_lug" hidden name="duracao" type="text" class="validate" value="<?php echo $row_filmes['duracao']; ?>"></p>
                                    <p>Poltronas: </p>
                                    <select id="selected-seats" name="seat[]"></select>
                                    <p>Ingressos: <span id="counter" name="qtde">0</span></p>
                                    <p>Total: <b>R$<span id="total" name="total">0</span></b></p>
                                    
                                    
                                    <div id="legend"></div>
                                </div>
                                <div style="clear:both"></div>
                                </div>

                            </div>
                      </div>
                      <div class="step-actions">
                        <button class="waves-effect waves-dark btn blue next-step">Continuar</button>
                        <button class="waves-effect waves-dark btn-flat previous-step">Voltar</button>
                      </div>
                    </div>
                  </li>
                  <li class="step">
                    <div class="step-title waves-effect waves-dark">Pagamento</div>
                    <div class="step-content">
                      <div class="row">
                      <div id="test1" class="col s12">
                        <h6 class='header'>Formas de Pagamento</h6>
                        <div class="container">
                          <div class="row">
                            
                          <form class="col s12" method="POST" action="">
                          <div class="row">
                            <div class="input-field col s12">
                            <p>
                              <label>
                                <input name="pix" type="radio" disabled/>
                                <span><i class="fa-brands fa-pix" style="color:#2ebdae"></i> PIX</span>
                              </label>
                            </p>
                            <p>
                              <label>
                                <input name="dinheiro" type="radio" checked />
                                <span><i class="fas fa-sack-dollar"></i> Dinheiro</span>
                              </label>
                            </p>
                            <p>
                              <label>
                                <input name="boleto" type="radio" disabled/>
                                <span><i class="fas fa-barcode"></i> Boleto Bancário</span>
                              </label>
                            </p>
                            <p>
                              <label>
                                <input name="cartao" type="radio" disabled/>
                                <span><i class="far fa-credit-card"></i> Cartão de Crédito</span>
                              </label>
                            </p>
                            <p>Total: <b>R$<span id="total_ingresso">0</span></b></p>
                            <p><input class="validate" id="valor" placeholder="Informe o valor" onkeyup="calcularValor()"></p>
                            <p>Troco R$ <span id="resultado"></span>
                            </div>
                          
                      </div>     
                        </div>
                      </div>
                        </div>
                      </div>
                      <div class="step-actions">
                        <button class="waves-effect waves-dark btn blue next-step"> Continuar</button>
                        <button class="waves-effect waves-dark btn-flat previous-step">Voltar</button>
                      </div>
                    </div>
                  </li>
                  <li class="step">
                    <div class="step-title waves-effect waves-dark">Conclusão</div>
                    <div class="step-content">
                    <div class="row">
                        <div class="input-field col s12">
                        <p>Filme: <span id="title_conclusao"></span><input id="titulo_conc" hidden name="titulo" type="text" class="validate" value="<?php echo $row_filmes['titulo']; ?>"></p>
                        <p>Duração: <span id="timer_conclusao"></span><input id="duracao_conc" hidden name="duracao" type="text" class="validate" value="<?php echo $row_filmes['duracao']; ?>"></p>
                        <p>Poltronas: </p>
                        <span id="selected-seats-conc" name="poltronas"></span>
                        
                        </div>
                      </div>
                      <div class="step-actions">
                        <button class="waves-effect waves-dark btn green" name="realizar_venda" type="submit">Finalizar!</button>
                      </div>
                    </div>
                  </li>
                </ul>

              </div>
            </div>
  </form>
        </div>
      </div>
    </div>

      
      <script href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.js"></script>
      <link rel="stylesheet" href="../assests/css/seat-charts.css">
    <script src="../assests/js/jquery.seat-charts.min.js"></script>
    <script src="../assests/js/jquery.seat-charts.js"></script>
<script>
   document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
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
 
function calcularValor(){
  var total = parseFloat(document.getElementById("total_ingresso").innerText, 10);
  var valor = parseFloat(document.getElementById("valor").value, 10);

    document.getElementById("resultado").innerText = valor - total;
}
   
var price = 10; //price
                      $(document).ready(function() {
                        var $cart = $('#selected-seats')//Sitting Area
                        $counter = $('#counter'), //Votes
                        $total = $('#total');
                        $total_ingresso = $('#total_ingresso'); //Total money
                        
                        var sc = $('#seat-map').seatCharts({
                          map: [  //Seating chart
                            'aaaaaaaaaa',
                                  'aaaaaaaaaa',
                                  '__________',
                                  'aaaaaaaaaa',
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
                              $('<option selected>F'+(this.settings.row+1)+' A'+this.settings.label+'</option>')
                                .attr('id', 'cart-item-'+this.settings.id)
                                .attr('value', this.settings.id)
                                .data('seatId', this.settings.id)
                                .appendTo($cart)
                                
                                
                      
                              $counter.text(sc.find('selected').length+1);
                              $counter.attr('value', sc.find('selected').length+1);

                              $total.text(recalculateTotal(sc)+price);
                              $total.attr('value', recalculateTotal(sc)+price);

                              $total_ingresso.text(recalculateTotal(sc)+price);
                                    
                              return 'selected';
                            } else if (this.status() == 'selected') { //Checked
                                //Update Number
                                $counter.text(sc.find('selected').length-1);
                                $counter.attr('value', sc.find('selected').length-1);
                                //update totalnum
                                $total.text(recalculateTotal(sc)-price);
                                $total.attr('value', recalculateTotal(sc)-price);
                                $total_ingresso.text(recalculateTotal(sc)-price);
                                  
                                //Delete reservation
                                //$('#cart-item-'+this.settings.id).remove();
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
                       sc.get(['1_1','1_4']).status('unavailable');
                          
                      });
                      //sum total money
                      function recalculateTotal(sc) {
                        var total = 0;
                        var total_ingresso = 0;
                        sc.find('selected').each(function () {
                          total += price;
                          total_ingresso += price;
                        });
                            
                        return total, total_ingresso;
                      }
 

</script>
<script>
function detalhesFilmes(){ 
  var titulo = document.getElementById('titulo').value; 
  document.getElementById('title').innerHTML = titulo;
  var duracao = document.getElementById('duracao').value; 
  document.getElementById('timer').innerHTML = duracao;
  var data_estreia = document.getElementById('data_estreia').value; 
  document.getElementById('data').innerHTML = data_estreia;
  var titulo_lug = document.getElementById('titulo_lug').value; 
  document.getElementById('title_lugares').innerHTML = titulo_lug;
  var duracao_lug = document.getElementById('duracao_lug').value; 
  document.getElementById('timer_lugares').innerHTML = duracao_lug;
  var titulo_conc = document.getElementById('titulo_conc').value; 
  document.getElementById('title_conclusao').innerHTML = titulo_conc;
  var duracao_conc = document.getElementById('duracao_conc').value; 
  document.getElementById('timer_conclusao').innerHTML = duracao_conc;
  var arquivo = document.getElementById('arquivo').value; 
  document.getElementById('arq').innerHTML = arquivo; 
} 
window.onload = detalhesFilmes(); 
</script>

</body>
</html>