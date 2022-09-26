<?php

session_start();



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../assests/css/assentos.css">
    <link rel="stylesheet" href="../assests/css/style.css">

    <!--Icons Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


    <!--JS Compiled Bootstrap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../assests/js/app.js"></script>
            
    <title>Painel de Biblioteca</title> 
</head>
<body>
    <!--Navbar-->   
    <header class="main-header">
        <label for="btn-nav" class="btn-nav"><i class="fa fa-bars"></i></label>
        <input type="checkbox" id="btn-nav">
        

        <!--Logout--->
        <a class="navbar-brand" href="pages/logout.php" style="margin-left: 98%; color: #fff;" ><i class="fa-solid fa-right-from-bracket"></i></a>
        
        <nav>
          <ul class="navigation">
            <li>
                <a href="../index.php">Home</a>   
            </li>
            <li>
                <a href="../pages/ingressos.php">Ingressos</a>
            </li>
            <li>
                <a href="../pages/configuracoes.php">Configurações</a>
            </li>
            
          </ul>
        </nav>
        
      </header>

      <div class="container-fluid">
                
                <div class="demo">
                    <div id="seat-map">
                     <div class="front">TELA</div>					
                 </div>

                 
                 
                 <div class="booking-details">
                     <p>Filme: <span> Gingerclown</span></p>
                     <p>Duração: <span>November 3, 21:00</span></p>
                     <p>Assento: </p>
                     <ul id="selected-seats"></ul>
                     <p>Ingressos: <span id="counter">0</span></p>
                     <p>Total: <b>$<span id="total">0</span></b></p>
                             
                     <button class="checkout-button btn btn-primary">COMPRAR</button>
                             
                     <div id="legend"></div>
                 </div>
                 <div style="clear:both"></div>
            </div>

            </div>
  

            <script>
                //Animação Tabs
document.addEventListener("DOMContentLoaded", function(){
	const tab = document.querySelector('.tabs');
	M.Tabs.init(tab, {
	  swipeable: true,
	  duration: 300
	});
  })
            </script>

<script type="text/javascript" src="../assests/js/jquery.seat-charts.min.js"></script>
</body>
</html>