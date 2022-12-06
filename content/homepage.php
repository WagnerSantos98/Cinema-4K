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

    <!--Material Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
    .nav-wrapper{
        margin-top: -65px;
    }
    .block{
        height: auto;
        margin-bottom: 20px;
        padding: 60px 0;
        text-align: center;
    }
    
    /*Back to top button*/
    #button{
        display: inline-block;
        background-color: rgba(33, 150, 243, 0.7);
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
        background-color: #2196f3;
    }
    #button:active{
        background-color: #0e599e;
    }
    #button.show{
        opacity: 1;
        visibility: visible;
    }

    input{
        align-items: center;
        justify-content: center;
        text-align: center;
       }
       .btn-strepper-right{
        border-radius: 3px;
        padding: 0;
        width: 42px;
        height: 42px;
       }
       .btn-strepper-left{
        border-radius: 3px;
        padding: 0;
        width: 42px;
        height: 42px;
        float: left;
       }
       .btn-strepper-cart{
        border-radius: 3px;
        padding: 0;
        width: 150px;
        height: 42px;
        align-items: center;
       }
       h3{
        text-align: justify;
       }
</style>
</head>

<body>
    <!--Navbar-->   
    <nav class="blue" style="padding: 0px 10px;">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo" >LL TICKET</a>

            <a href="#" class="sidenav-trigger" data-target="mobile-nav"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <li><a href="#" data-scroll="home">Home</a></li>
                <li><a href="#" data-scroll="cinema">Cinema</a></li>
                <li><a href="#" data-scroll="show">Show</a></li>
                <li><a href="#" data-scroll="teatro">Teatro</a></li>
                <li><a href="https://google.com"><i class="material-icons">open_in_new</i></a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-nav">
        <li><a href="#" data-scroll="home">Home</a></li>
        <li><a href="#" data-scroll="cinema">Cinema</a></li>
        <li><a href="#" data-scroll="show">Show</a></li>
        <li><a href="#" data-scroll="teatro">Teatro</a></li>
        <li><a href="../pages/"><i class="material-icons">open_in_new</i></a></li>
    </ul>
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
                        echo  "<img height='198' width='156' src='../upload/". $row_filme['arquivo'] ."'><br>";
                        echo "" . $row_filme['titulo'] . "<br>";
                        echo "" . $row_filme['data_estreia'] . "<br>";
                        echo "" . $row_filme['classificacao'] . "<br>";
                        echo "" . $row_filme['sala'] . "<br>";
                        echo "<a class='waves-effect waves-light btn' href='../pages/detalhes.php?id=" . $row_filme['id'] . "'>Detalhes</a>";
                        echo "<a class='waves-effect waves-light btn' href='../content/ingresso.php?id=" . $row_filme['id'] . "'>Comprar</a><br><br><hr>";
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

    //Animation Tabs
    document.addEventListener("DOMContentLoaded", function(){
	    const tab = document.querySelector('.tabs');
	    M.Tabs.init(tab, {
	  swipeable: true,
	  duration: 300
	});
})

//Modal
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });

/*Show - Sendo criado o script para compra de ingressos*/
//Setor A
$(".inteira").on("click tap", function(){

var $button = $(this);
var oldValue = $('#ticket_inteira').val();

if($button.attr("id") == "add_inteira"){
    var newVal = parseFloat(oldValue) + 1;
} else{
    if(oldValue > 0){
        var newVal = parseFloat(oldValue) - 1;
    }else{
        newVal = 0;
    }
};

$("#ticket_inteira").val(newVal);
document.getElementById('ticket_inteira').innerHTML = newVal;
});

$("#sub_inteira").on("click tap", function(){
if($('#ticket_inteira').val() === '0'){
    $(this).attr("disabled", true);
}
});

$("#add_inteira").on("click tap", function(){
$("#sub_inteira").removeAttr("disabled");
});


$(".meia").on("click tap", function(){

var $button = $(this);
var oldValue = $('#ticket_meia').val();

if($button.attr("id") == "add_meia"){
var newVal = parseFloat(oldValue) + 1;
} else{
if(oldValue > 0){
var newVal = parseFloat(oldValue) - 1;
}else{
newVal = 0;
}
};

$("#ticket_meia").val(newVal);
document.getElementById('ticket_meia').innerHTML = newVal;
});

$("#sub_meia").on("click tap", function(){
if($('#ticket_meia').val() === '0'){
$(this).attr("disabled", true);
}
});

$("#add_meia").on("click tap", function(){
$("#sub_meia").removeAttr("disabled");
});

//Setor B
</script>
</body>
</html>