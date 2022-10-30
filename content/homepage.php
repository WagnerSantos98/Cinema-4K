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
<style>
    *{
        margin: 0;
        padding: 0;
    }

    body{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    .block{
        height: 1200px;
        background-color: #eee;
        margin-bottom: 20px;
        padding: 60px 0;
        text-align: center;
    }
    .navbar{
        list-style: none;
        margin: 0;
        padding: 0;
        background-color: rgba(0, 0, 0, 0.7);
        color: #eee;
        text-align: center;
        position: fixed;
        width: 100%;
        top: 0px;
        z-index: 90;
    }
    .navbar li{
        display: inline-block;
        padding: 15px;
    }
    .navbar li a{
        color: #eee;
        text-decoration: none;
    }
    .navbar li a.active{
        color: tomato;
    }
    .navbar li #login{
        color: black;  
    }
    .navbar a{
        display: inline-block;
        padding: 15px;
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
    <ul class="navbar">
        <li><a href="#" data-scroll="home">Home</a></li>
        <li><a href="#" data-scroll="cinema">Cinema</a></li>
        <li><a href="#" data-scroll="show">Show</a></li>
        <li><a href="#" data-scroll="teatro">Teatro</a></li>
        <li><a href="#" id="login" data-scroll="login">Login</a></li>
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