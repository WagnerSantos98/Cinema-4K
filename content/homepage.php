<?php
include_once('../db/conexao.php');
session_start();

//Retorna o campos com valores do banco de dados
$id_filme = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_filme = "SELECT * FROM tb_cinema WHERE id = '$id_filme'";
$resultado_filme = mysqli_query($con, $result_filme);
$row_filmes = mysqli_fetch_assoc($resultado_filme);

//Retorna o campos com valores do banco de dados
$id_show = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_show = "SELECT * FROM tb_show WHERE id = '$id_show'";
$resultado_show = mysqli_query($con, $result_show);
$row_shows = mysqli_fetch_assoc($resultado_show);
    
//Link youtube
$link = 'http://youtube.com/embed/';

//Link do banco
$link_banco = $row_filmes['trailer'];
$link_final = '?rel=0';
 
//Link Completo
$link_completo = $link.$link_banco.$link_final;
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../assests/css/homepage.css">

    <!--Material Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <title>Home Page</title>

</head>

<body>
    <!--Navbar-->   
    <nav class="blue" style="padding: 0px 10px;">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo" >LL TICKET</a>

            <a href="#" class="sidenav-trigger" data-target="mobile-nav"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <li><a href="#" id="hom" data-scroll="home">Home</a></li>
                <li><a href="#" id="cin" data-scroll="cinema">Cinema</a></li>
                <li><a href="#" id="sho" data-scroll="show">Show</a></li>
                <li><a href="#" id="tea" data-scroll="teatro">Teatro</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-nav">
        <li><a href="#" data-scroll="home">Home</a></li>
        <li><a href="#" data-scroll="cinema">Cinema</a></li>
        <li><a href="#" data-scroll="show">Show</a></li>
        <li><a href="#" data-scroll="teatro">Teatro</a></li>
        <li><a href="../pages/login.php"><i class="material-icons">open_in_new</i></a></li>
    </ul>
    <div class="exit">
    <a href="../pages/login.php" type="button" ><i class="material-icons">open_in_new</i>  
    </div>
    

    <div id="home" class="block">
        <h2>Atrações</h2>
        <div class="carousel">
        <?php
                    $result_cartaz =  "SELECT * FROM tb_cinema";
                    $resultado_cartaz = mysqli_query($con,$result_cartaz);
                    

                    while($row_filme = mysqli_fetch_assoc($resultado_cartaz)){
                        echo  "<a class='carousel-item' href='../content/ingresso.php?id=" . $row_filme['id'] . "'><img height='198' width='156' src='../upload/". $row_filme['arquivo'] ."'><br>";
                        
                    }
                    $result_shows =  "SELECT * FROM tb_show";
                    $resultado_shows = mysqli_query($con,$result_shows);

                    while($row_show = mysqli_fetch_assoc($resultado_shows)){
                        echo  "<a class='carousel-item' href='../content/setores_show.php?id=" . $row_show['id'] . "'><img height='198' width='156' src='../upload_show/". $row_show['file_atracao'] ."'><br>";
                    }


                    ?>
    
  </div>
    </div>
    <div id="cinema" class="block">
        <h2>Cinema</h2><br>
    <!--Container Cinema-->
    <div class="container">
        <div class="exibicao"> 
            <div class="row">
            <div id="cartaz" class="col s12">
            <?php
                    $result_cartaz =  "SELECT * FROM tb_cinema";
                    $resultado_cartaz = mysqli_query($con,$result_cartaz);

                    while($row_filme = mysqli_fetch_assoc($resultado_cartaz)){
                        echo  "<br><img height='198' width='156' src='../upload/". $row_filme['arquivo'] ."'><br><br>";
                        echo "" . $row_filme['titulo'] . "<br>";
                        echo "" . $row_filme['data_estreia'] . "<br>";
                        echo "" . $row_filme['classificacao'] . "<br>";
                        echo "" . $row_filme['sala'] . "<br>";
                        echo "<a class='waves-effect waves-light btn' href='../pages/detalhes.php?id=" . $row_filme['id'] . "'>Detalhes</a>";
                        echo "<a style='margin-left: 25px;' class='waves-effect waves-light btn' href='../content/ingresso.php?id=" . $row_filme['id'] . "'>Comprar</a><br><br><hr>";
                    }
                    ?>
                    
            </div>
            <div id="breve" class="col s12">
                
            </div>
            </div>   
            
        </div>
    </div>

    </div>

    <div id="show" class="block">
        <h2>Show</h2><br>
         <!--Container Cinema-->
    <div class="container">
        <div class="exibicao"> 
            <div class="row">
            <div id="cartaz" class="col s12">
            <?php
                    $result_shows =  "SELECT * FROM tb_show";
                    $resultado_shows = mysqli_query($con,$result_shows);

                    while($row_show = mysqli_fetch_assoc($resultado_shows)){
                        echo  "<img height='198' width='156' src='../upload_show/". $row_show['file_atracao'] ."'><br>";
                        echo "" . $row_show['atracao'] . "<br>";
                        echo "" . $row_show['data'] . "<br>";
                        echo "" . $row_show['local'] . "<br>";
                        echo "" . $row_show['classificacao_atracao'] . "<br>";
                        echo "<a class='waves-effect waves-light btn' href='../content/setores_show.php?id=" . $row_show['id'] . "'>Comprar</a><br><br><hr>";
                    }
                    ?>
                    
            </div>
            <div id="breve" class="col s12">
                
            </div>
            </div>   
            
        </div>
    </div>            
    </div>

    <div id="teatro" class="block">
        <h2>Teatro</h2>
    </div>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h6>Sobre</h6>
                        <p class="text-justify"> 
                        [Texto sobre o sistema]</p>
                    </div>

                    <div class="col-xs-6 col-md-3">
                        <h3>Categorias</h3>
                        <ul class="footer-links">
                            <li>
                                <a href="http://scanfcode.com/category/c-language/">UI Design</a>
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
                        <a href="#">LL TICKET</a>
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
    

    <!--Back to top button-->
    <a id="button"><img src="../assests/img/chevron-up-solid.svg"></a>

    <!--Modal Cinema-->
    <div id="modal1" class="modal">
    <div class="modal-content">
    <div class="input-field col s6">
                  <input id="id" name="id" type="hidden" class="validate" value="<?php echo $row_filmes['id']; ?>">
                </div>
                <div class="row">
                <div class="input-field col s6">
                  <input id="trailer" name="trailer" type="text" class="validate" value="<?php echo $row_filmes['trailer']; ?>">
                  <label for="trailer">Trailer</label>
                </div>
              </div>
    
    <div class="video-container">
        <iframe width="560" height="315" src="<?php echo $link_completo;?>" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>

<script>
    //Carousel
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems);
  });
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




</script>
</body>
</html>