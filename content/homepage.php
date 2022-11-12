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
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <title>Home Page</title>
</head>

<body>
    <!--Navbar-->   
    <nav class="red" style="padding: 0px 10px;">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo" >Sistema Inegrado</a>

            <a href="#" class="sidenav-trigger" data-target="mobile-nav"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <li><a href="#" data-scroll="home">Home</a></li>
                <li><a href="#" data-scroll="cinema">Cinema</a></li>
                <li><a href="#" data-scroll="show">Show</a></li>
                <li><a href="#" data-scroll="teatro">Teatro</a></li>
                <li><a href="../pages/login.php"><i class="material-icons">exit_to_app</i></a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-nav">
        <li><a href="#" data-scroll="home">Home</a></li>
        <li><a href="#" data-scroll="cinema">Cinema</a></li>
        <li><a href="#" data-scroll="show">Show</a></li>
        <li><a href="#" data-scroll="teatro">Teatro</a></li>
        <li><a href="../pages/login.php"><i class="material-icons">exit_to_app</i></a></li>
    </ul>

    <div id="home" class="block">
        <h2>Home</h2>
    </div>

    <div id="cinema" class="block">
        <h2>Cinema</h2><br>
    <!--Container Cinema-->
    <div class="container">
        <div class="exibicao"> 
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a class="active" href="#cartaz">Em Cartaz</a></li>
                        <li class="tab col s3"><a href="#breve">Em Breve</a></li>
                        
                    </ul>
                </div>
            <div id="cartaz" class="col s12">
            <?php
                    $result_cartaz =  "SELECT * FROM tb_cinema";
                    $resultado_cartaz = mysqli_query($con,$result_cartaz);

                    while($row_filme = mysqli_fetch_assoc($resultado_cartaz)){
                        echo "Título: " . $row_filme['titulo'] . "<br>";
                        echo "Gênero: " . $row_filme['genero'] . "<br>";
                        echo "Duração: " . $row_filme['duracao'] . "<br>";
                        echo "Classificação: " . $row_filme['classificacao'] . "<br>";
                        echo "Sinopse: " . $row_filme['sinopse'] . "<br><br><hr>";
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
        <h2>Show</h2>
    </div>
    <div id="teatro" class="block">
        <h2>Teatro</h2>
    </div>
    

    <!--Back to top button-->
    <a id="button"><img src="../assests/img/chevron-up-solid.svg"></a>

<script>
    $("body").css("paddingTop", $(".navbar").innerHeight());

    $(function(){
        $(".navbar li a").click(function(e){
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
                    $(".navbar a").removeClass("active");
                    $('.navbar li a[data-scroll="' + blockId + '"]').addClass("active");
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

    //Animation Tabs
    document.addEventListener("DOMContentLoaded", function(){
	    const tab = document.querySelector('.tabs');
	    M.Tabs.init(tab, {
	  swipeable: true,
	  duration: 300
	});
})
</script>
</body>
</html>