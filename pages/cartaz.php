<?php
include_once('../db/conexao.php');
session_start();

//Listar itens
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_filme = "SELECT * FROM tb_cinema WHERE id = '$id'";
$resultado_filme = mysqli_query($con, $result_filme);
$row_filmes = mysqli_fetch_assoc($resultado_filme);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../assests/css/style.css">

    <!--Icons Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!--JS Compiled Bootstrap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../assests/js/app.js"></script>
            
    <title>Painel Sistema Integrado</title> 
</head>
<body>
    <!--Navbar-->   
    <header class="main-header">
        <label for="btn-nav" class="btn-nav"><i class="fa fa-bars"></i></label>
        <input type="checkbox" id="btn-nav">
        

        <!--Logout--->
        <a class="navbar-brand" href="../pages/logout.php" style="margin-left: 98%; color: #fff;" ><i class="fa-solid fa-right-from-bracket"></i></a>
        
        <nav>
          <ul class="navigation">
            <li>
                <a href="../index.php">Home</a>   
            </li>
            <li>
                <a href="../pages/eventos.php">Eventos</a>
            </li>
            <li>
                <a href="../pages/cartaz.php">Cartaz/Em Breve</a>
            </li>
            <li>
                <a href="../pages/configuracoes.php">Configurações</a>
            </li>
            
          </ul>
        </nav>
        
      </header>
      
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

        $result_cartaz =  "SELECT * FROM tb_cinema LIMIT $inicio, $qnt_pagina";
        $resultado_cartaz = mysqli_query($con,$result_cartaz);

        while($row_filme = mysqli_fetch_assoc($resultado_cartaz)){
            echo "ID: " . $row_filme['id']. "<br>";
            echo "Código: " . $row_filme['codigo']. "<br>";
            echo "Titulo: " . $row_filme['titulo'] . "<br>";
            echo "Gênero: " . $row_filme['genero'] . "<br>";
            echo "Duração: " . $row_filme['duracao'] . "<br>";
            echo "Classificação: " . $row_filme['classificacao'] . "<br>";
            echo "Sinopse: " . $row_filme['sinopse'] . "<br>";
            echo "<a class='waves-effect waves-light btn' href='../pages/editar_filme.php?id=" . $row_filme['id'] . "'>Editar</a>";
            echo "<a class='waves-effect waves-light btn modal-trigger' href='../pages/excluir.php?id=" . $row_filme['id'] . "'>Excluir</a><hr>";

        }

        //Paginação
        $result_pag = "SELECT COUNT(codigo) AS num_result FROM tb_cinema";
        $resultado_pag = mysqli_query($con,$result_pag);
        $row_pag = mysqli_fetch_assoc($resultado_pag);
        
        $qtd_pagina = ceil($row_pag['num_result'] / $qnt_pagina);

        //Limitar
        $max_links = 2;
        echo "<a href = 'cartaz.php?pagina=1'>< </a>";
    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
        if($pag_ant >= 1){
            echo "<a href = 'cartaz.php?pagina=$pag_ant'>$pag_ant</a>";
        }
    }
    echo "$pagina";

    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
        if($pag_dep <= $qtd_pagina){
            echo "<a href = 'cartaz.php?pagina=$pag_dep'>$pag_dep</a>";
        }
    }
        echo "<a href = 'cartaz.php?pagina=$qtd_pagina'> ></a>";
        ?>
     </div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });

  
</script>
</body>
</html>