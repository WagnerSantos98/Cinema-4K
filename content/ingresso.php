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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../assests/css/seat-charts.css">

    <!--Material Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="../assests/js/jquery.seat-charts.js"></script>
    <script type="text/javascript" src="../assests/js/jquery.seat-charts.min.js"></script>
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
                <li><a href="../pages/"><i class="material-icons">open_in_new</i></a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-nav">
        <li><a href="../pages/"><i class="material-icons">open_in_new</i></a></li>
    </ul>
    
     <!-- Page content-->
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
                             
                     <button type="submit" class="checkout-button btn" name="realizar_venda">COMPRAR</button>
                             
                     <div id="legend"></div>
                 </div>
                 <div style="clear:both"></div>
            </div>

            </div>


            
            <script type="text/javascript" src="../assests/js/jquery.seat-charts.js"></script> 

    <script>
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
	
	sc.get([]).status('unavailable');
		
});
//sum total money
function recalculateTotal(sc) {
	var total = 0;
	sc.find('selected').each(function () {
		total += price;
	});
			
	return total;
}

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
        var duracao = document.getElementById('duracao').value; 
        document.getElementById('timer').innerHTML = duracao;  
    } 
    window.onload = detalhesFilmes();

</script>
</body>
</html>