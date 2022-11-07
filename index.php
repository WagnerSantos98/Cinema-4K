<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    

    <!--Icons Font Awesome-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    
                
    <title>Painel Sistema Integrado</title> 
</head>
<body>
    <!--Navbar-->   
    <nav class="red" style="padding: 0px 10px;">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo" >Sistema Inegrado</a>

            <a href="#" class="sidenav-trigger" data-target="mobile-nav"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <li><a href="index.php">Home</a></li>
                <li><a href="pages/eventos.php">Eventos</a></li>
                <li><a href="pages/cartaz.php">Cartaz/Em Breve</a></li>
                <li><a href="pages/configuracoes.php">Configurações</a></li>
                <li><a href="pages/logout.php"><i class="material-icons">exit_to_app</i></a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="pages/cadastro.php">Eventos</a></li>
        <li><a href="pages/cartaz.php">Cartaz/Em Breve</a></li>
        <li><a href="pages/configuracoes.php">Configurações</a></li>
        <li><a href="logout.php"><i class="material-icons">exit_to_app</i></a></li>
    </ul>

          
    
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
  });

</script>
</body>
</html>