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
    <title>Sistema Inegrado</title>

    <style>
       
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
       }
       .btn-strepper-cart{
        border-radius: 3px;
        padding: 0;
        width: 150px;
        height: 42px;
        align-items: center;
       }
       
    </style>

</head>

<body>
    <!--Navbar-->   
    <nav class="blue" style="padding: 0px 10px;">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo" >Sistema Inegrado</a>

            <a href="#" class="sidenav-trigger" data-target="mobile-nav"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <li><a href="../pages/"><i class="material-icons">open_in_new</i></a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-nav">
        <li><a href="../pages/"><i class="material-icons">open_in_new</i></a></li>
    </ul>

     <!--Setor A-->
     <div class="container pt-10">
        <div class="row card">
          <div id="test1" class="col s12">
            <h3 class='header'>Setor A</h3>
            <div class="container">
              <div class="row">
                
              <form class="col s12" method="POST" action="">
              <div class="row">
                <div class="input-field col s12">
                    <div class="input-field col s6">
                        <p>INTEIRA</p>
                        <span id="ing_inteira">R$ 100,00</span>  
                    </div>
                    
                    <div class="input-field col s1">
                        <a class="btn inteira btn-strepper-left grey" id="sub_inteira"><i class="material-icons">remove</i></a> 
                    </div>
                    <div class="input-field col s1">
                        <input disabled class="validate" type="text" value="0" id="ticket_inteira" tabindex="-1"> 
                    </div>
                    <div class="input-field col s1">
                        <a class="btn inteira btn-strepper-right blue"  id="add_inteira"><i class="material-icons">add</i></a>
                    </div>
                    <div class="input-field col s1">
                        <a class="btn btn-strepper-cart green" href="../content/ingrssos_show.php"  id="add_inteira"><i class="material-icons">shopping_cart</i></a>
                    </div>
                </div>
              </div><hr id="hr">
              <div class="row">
                <div class="input-field col s12">
                    <div class="input-field col s6">
                        <p>MEIA ENTRADA</p>
                        <span id="ing_meia">R$ 50,00</span>  
                    </div>
                    
                    <div class="input-field col s1">
                        <a class="btn meia btn-strepper-left grey" id="sub_meia"><i class="material-icons">remove</i></a> 
                    </div>
                    <div class="input-field col s1">
                        <input disabled class="validate" type="text" value="0" id="ticket_meia" tabindex="-1"> 
                    </div>
                    <div class="input-field col s1">
                        <a class="btn meia btn-strepper-right blue"  id="add_meia"><i class="material-icons">add</i></a>
                    </div>
                </div>
              </div>
              

                </div>
                
  
                
              </div>
              <span style="float: right;">R$ 150,00</span>
            </div>
          </div>
        </div>
    <!--Setor A-->
    

        <!--Setor B-->
        <div class="container pt-10">
            <div class="row card">
              <div id="test1" class="col s12">
                <h3 class='header'>Setor B</h3>
                <div class="container">
                  <div class="row">
                    
                  <form class="col s12" method="POST" action="">
                  <div class="row">
                    <div class="input-field col s12">
                        <div class="input-field col s6">
                            <p>INTEIRA</p>
                            <span id="ing_inteira">R$ 100,00</span>  
                        </div>
                        
                        <div class="input-field col s1">
                            <a class="btn inteira btn-strepper-left grey" id="sub_inteira"><i class="material-icons">remove</i></a> 
                        </div>
                        <div class="input-field col s1">
                            <input disabled class="validate" type="text" value="0" id="ticket_inteira" tabindex="-1"> 
                        </div>
                        <div class="input-field col s1">
                            <a class="btn inteira btn-strepper-right blue"  id="add_inteira"><i class="material-icons">add</i></a>
                        </div>
                        <div class="input-field col s1">
                            <a class="btn inteira btn-strepper-cart green"  id="add_inteira"><i class="material-icons">shopping_cart</i></a>
                        </div>
                    </div>
                  </div><hr id="hr">
                  <div class="row">
                    <div class="input-field col s12">
                        <div class="input-field col s6">
                            <p>MEIA ENTRADA</p>
                            <span id="ing_meia">R$ 50,00</span>  
                        </div>
                        
                        <div class="input-field col s1">
                            <a class="btn meia btn-strepper-left grey" id="sub_meia"><i class="material-icons">remove</i></a> 
                        </div>
                        <div class="input-field col s1">
                            <input disabled class="validate" type="text" value="0" id="ticket_meia" tabindex="-1"> 
                        </div>
                        <div class="input-field col s1">
                            <a class="btn meia btn-strepper-right blue"  id="add_meia"><i class="material-icons">add</i></a>
                        </div>
                    </div>
                  </div>
                  
    
                    </div>
                    
      
                    
                  </div>
      
                </div>
              </div>
            </div>
        <!--Final Setor B-->

        <!--Camarote-->
        <div class="container pt-10">
            <div class="row card">
              <div id="test1" class="col s12">
                <h3 class='header'>Camarote</h3>
                <div class="container">
                  <div class="row">
                    
                  <form class="col s12" method="POST" action="">
                  <div class="row">
                    <div class="input-field col s12">
                        <div class="input-field col s6">
                            <p>INTEIRA</p>
                            <span id="ing_inteira">R$ 100,00</span>  
                        </div>
                        
                        <div class="input-field col s1">
                            <a class="btn inteira btn-strepper-left grey" id="sub_inteira"><i class="material-icons">remove</i></a> 
                        </div>
                        <div class="input-field col s1">
                            <input disabled class="validate" type="text" value="0" id="ticket_inteira" tabindex="-1"> 
                        </div>
                        <div class="input-field col s1">
                            <a class="btn inteira btn-strepper-right blue"  id="add_inteira"><i class="material-icons">add</i></a>
                        </div>
                        <div class="input-field col s1">
                            <a class="btn inteira btn-strepper-cart green"  id="add_inteira"><i class="material-icons">shopping_cart</i></a>
                        </div>
                    </div>
                  </div><hr id="hr">
                  <div class="row">
                    <div class="input-field col s12">
                        <div class="input-field col s6">
                            <p>MEIA ENTRADA</p>
                            <span id="ing_meia">R$ 50,00</span>  
                        </div>
                        
                        <div class="input-field col s1">
                            <a class="btn meia btn-strepper-left grey" id="sub_meia"><i class="material-icons">remove</i></a> 
                        </div>
                        <div class="input-field col s1">
                            <input disabled class="validate" type="text" value="0" id="ticket_meia" tabindex="-1"> 
                        </div>
                        <div class="input-field col s1">
                            <a class="btn meia btn-strepper-right blue"  id="add_meia"><i class="material-icons">add</i></a>
                        </div>
                    </div>
                  </div>
                  
    
                    </div>
                    
      
                    
                  </div>
      
                </div> ldlfldf
              </div>
            </div>
        <!--Final Camarote-->


<script>
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