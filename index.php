<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: pages/login.php");
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
    <link rel="stylesheet" href="assests/css/index.css">
    

    <!--Material Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.3.0/introjs.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.3.0/intro.min.js"></script>
       
    <title>Painel Sistema Integrado</title> 
</head>
<body>
    
    <!--Navbar-->   
    <nav class="red" style="padding: 0px 10px;" data-step="1" data-intro="Essa é a barra de tarefas principal">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo" >Sistema Integrado</a>

            <a href="#" class="sidenav-trigger" data-target="mobile-nav"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <li><a href="index.php">Home</a></li>
                <li><a href="pages/eventos.php" class="eventos" data-step="2" data-intro="Clianco sobre este botão temos acesso a inserção de eventos.">Eventos</a></li>
                <li><a href="pages/cartaz.php" class="cartaz" data-step="3" data-intro="Este botão é dedicado a edição de filmes.">Editar Filmes</a></li>
                <li><a href="pages/teatro.php" class="teatro" data-step="4" data-intro="Este botão é dedicado a edição de peças ou apresentações.">Editar Teatros</a></li>
                <li><a href="pages/show.php" class="show" data-step="5" data-intro="Este botão é dedicado a edição de shows e eventos na parte musical.">Editar Shows</a></li>
                <li><a href="pages/configuracoes.php" class="config" data-step="6" data-intro="Clicando aqui tem acesso a criação de usuários e todo controle de nível de acesso.">Configurações</a></li>
                <li><a href="pages/logout.php" class="logout" data-step="7" data-intro="Clicando aqui você sai de forma segura do nosso sistema."><i class="material-icons">exit_to_app</i></a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="pages/cadastro.php">Eventos</a></li>
        <li><a href="pages/cartaz.php">Editar Filmes</a></li>
        <li><a href="pages/teatro.php">Editar Teatros</a></li>
        <li><a href="pages/show.php">Editar Shows</a></li>
        <li><a href="pages/configuracoes.php">Configurações</a></li>
        <li><a href="logout.php"><i class="material-icons">exit_to_app</i></a></li>
    </ul>

   
    <!--Button start tour-->
    <div class="button-tour">
    <img src="img/capa.png">
    </div>
    <div class="butto-tour">
    <button id="iniciar-tour" class="btn-tour">Como usar</button>
    </div>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h6>Sobre</h6>
                        <p class="text-justify"> 
                        O sistema LL TICKET, foi desenvolvido com a função de centralizar todas as atividades relacionadas
                    a eventos em um único local. Algumas funcionalidades estão fazes finais e teste sendo melhorado dia após dia,
                    com projeto futuro para uma versão mobile.</p>
                    </div>

                    <div class="col-xs-6 col-md-3">
                        <h3>Contato</h3>
                        <ul class="footer-links">
                            <li>
                                <a href="#">(11)99195-8787</a>
                                <p class="contact">
                                <a href="mailto:llticket.sytem@gmail.com">ll@ticket.com.br</a>
                                </p>
                            </li>
                        </ul>
                    </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2022 All Rights Reserved by
                        <a href="../content/homepage.php">LL TICKET</a>
                        <p class="developer">Desenvolvido por 💻 Leonardo Amaro Nascimento & Leonardo da Silva Domingues
                    </p>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
                    </ul>
                </div>
            </div>
        </div>
    </footer>
          
    
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
  });

  document.getElementById("iniciar-tour").onclick = function() {
    introJs().setOptions({
        showProgress: true,
        nextLabel: 'Avançar',
        prevLabel: 'Voltar',
        doneLabel:'Concluir',
        skipLabel: 'Pular',
    }).start(); 
};
</script>
</body>
</html>