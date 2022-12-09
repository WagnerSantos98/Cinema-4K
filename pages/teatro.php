<?php
include_once('../db/conexao.php');
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


    <!--Icons Material Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--JS Compiled Bootstrap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

            
    <title>Painel Sistema Integrado</title> 
</head>
<body>
    <!--Navbar-->   
    <nav class="red" style="padding: 0px 10px;">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo" >Sistema Integrado</a>

            <a href="#" class="sidenav-trigger" data-target="mobile-nav"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <li><a href="../index.php">Home</a></li>
                <li><a href="./eventos.php">Eventos</a></li>
                <li><a href="./cartaz.php">Editar Filmes</a></li>
                <li><a href="./teatro.php">Editar Teatros</a></li>
                <li><a href="./show.php">Editar Shows</a></li>
                <li><a href="./configuracoes.php">Configurações</a></li>
                <li><a href="./logout.php"><i class="material-icons">exit_to_app</i></a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-nav">
        <li><a href="./index.php">Home</a></li>
        <li><a href="./pages/cadastro.php">Eventos</a></li>
        <li><a href="./cartaz.php">Editar Filmes</a></li>
        <li><a href="./teatro.php">Editar Teatros</a></li>
        <li><a href="./show.php">Editar Shows</a></li>
        <li><a href="./pages/configuracoes.php">Configurações</a></li>
        <li><a href="logout.php"><i class="material-icons">exit_to_app</i></a></li>
    </ul> 
       
        
        
      
     <div class="container">
        <h1>
            Cartaz
        </h1>
        <?php
         if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
         }

        $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);

        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

        //Quantidade de itens por página
        $qnt_pagina = 2;

        $inicio = ($qnt_pagina * $pagina) - $qnt_pagina;

        $result_teatro =  "SELECT * FROM tb_teatro LIMIT $inicio, $qnt_pagina";
        $resultado_teatro = mysqli_query($con,$result_teatro);

        while($row_teatro = mysqli_fetch_assoc($resultado_teatro)){
            echo  "<img height='198' width='156' src='../upload_teatro/". $row_teatro['arquivo_peca'] ."'><br>";
            echo "" . $row_teatro['evento'] . "<br>";
            echo "" . $row_teatro['data_evento'] . "<br>";
            echo "<a class='waves-effect waves-light btn' href='../pages/editar_teatro.php?id=" . $row_teatro['id'] . "'>Editar</a>";
            echo "<a class='waves-effect waves-light btn modal-trigger' style='margin-left:15px;' href='../pages/excluir.php?id=" . $row_teatro['id'] . "'>Excluir</a><hr>";

        }

        

        //Paginação
        $result_pag = "SELECT COUNT(titulo) AS num_result FROM tb_cinema";
        $resultado_pag = mysqli_query($con,$result_pag);
        $row_pag = mysqli_fetch_assoc($resultado_pag);
        
        $qtd_pagina = ceil($row_pag['num_result'] / $qnt_pagina);

        //Limitar
        $max_links = 2;
        echo "<a href = 'teatro.php?pagina=1'>< </a>";
    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
        if($pag_ant >= 1){
            echo "<a href = 'teatro.php?pagina=$pag_ant'>$pag_ant</a>";
        }
    }
    echo "$pagina";

    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
        if($pag_dep <= $qtd_pagina){
            echo "<a href = 'teatro.php?pagina=$pag_dep'>$pag_dep</a>";
        }
    }
        echo "<a href = 'teatro.php?pagina=$qtd_pagina'> ></a>";
        ?>
     </div>
     



<script>
//Menu
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
  });

  
</script>
</body>
</html>