<?php
include_once('../db/conexao.php');
session_start();

//Retorna o campos com valores do banco de dados
$id_filme = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_filme = "SELECT * FROM tb_cinema WHERE id = '$id_filme'";
$resultado_filme = mysqli_query($con, $result_filme);
$row_filmes = mysqli_fetch_assoc($resultado_filme);

$id_ingresso = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_ingresso = "SELECT * FROM tb_ingesso_cinema WHERE id = '$id_ingresso'";
$resultado_ingresso = mysqli_query($con, $result_ingresso);
$row_ingressos = mysqli_fetch_assoc($resultado_ingresso);
    
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
    <nav class="red" style="padding: 0px 10px;">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo" >LL TICKET</a>

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
            <h3 class="light center-align blue-text">Comprar Ingresso</h3>
            <div class="card">
              <div class="card-content">

               
                  
                      <div class="row">
                      <form class="col s12" method="POST" action="" enctype="multipart/form-data">
                        <!--Poltronas-->
                        <div class="container-fluid">        
                                <div class="demo">
                                    <div id="seat-map">
                                    <div class="front">TELA</div>					
                                </div>
                                
                                <div class="booking-details">
                                    
                                    <p>Filme: <span id="title_lugares"></span><input id="titulo_lug"  name="titulo" type="text" class="validate" value="<?php echo $row_filmes['titulo']; ?>"></p>
                                    <p>Duração: <span id="timer_lugares"></span><input id="duracao_lug"  name="duracao" type="text" class="validate" value="<?php echo $row_filmes['duracao']; ?>"></p>
                                    <p>Poltronas: </p>
                                    <select id="selected-seats" name="seat[]" ></select>
                                    <p>Ingressos: <input id="counter" name="qtde"></p>
                                    <p>Total: <b>R$<input  id="total" name="total"></b></p>
                                    
                                    
                                    <div id="legend"></div>
                                   
                                </div>
                                <div style="clear:both"></div>
                                </div>
                                <button class="waves-effect waves-dark btn grey" name="realizar_venda">Teste</button>

                            </div>
</form>
                      </div>
                      <div class="step-actions">
                      <button class="waves-effect waves-dark btn grey" name="realizar_venda">Teste</button>
                        <!--<button class="waves-effect waves-dark btn blue next-step">Continuar</button>
                        <button class="waves-effect waves-dark btn-flat previous-step">Voltar</button>-->
                      </div>
                    </div>
                  </li>
                 
                    

              </div>
            </div>
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
                        sc.get([<?php echo $row_ingressos['poltrona']; ?>]).status('unavailable');
                          
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