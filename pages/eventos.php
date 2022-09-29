<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../assests/css/style.css">

    <!--Icons Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Compiled and minified JavaScript -->
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
                <a href="../pages/eventos.php">Eventos</a>
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

    <div>
        <center><h2>Eventos e Shows</h2></center>
    </div>
    <div class="">
      <div class="carousel">
    <a class="carousel-item" href="#one!"><img src="../assests/img/beijo-em-franz-kafka.jpg"></a>
    <a class="carousel-item" href="#two!"><img src="../assests/img/PrimaveraSound_Destaques.jpg"></a>
    <a class="carousel-item" href="#three!"><img src="../assests/img/HS_SP_Extra_Eventim.png"></a>
    <a class="carousel-item" href="../pages/ingressos.php"><img src="../assests/img/maiara-maraisa.jpg"><div class="title-evento" style="color: #000;">MAIARA E MARAISA</div></a>
    <a class="carousel-item" href="#five!"><img src="../assests/img/jao-bnsp.jpg"></a>
  </div>
    </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
   var elems = document.querySelectorAll('.carousel');
   var instances = M.Carousel.init(elems, {
     indicators: true,
     padding: 200,
   });
 });
  </script>

</body>
</html>