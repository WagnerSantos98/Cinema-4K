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
                        <span id="ing_setora_inteira">R$ 100,00</span>  
                    </div>
                    
                    <div class="input-field col s1">
                        <a class="btn setora_inteira btn-strepper-left grey" id="sub_setora_inteira"><i class="material-icons">remove</i></a> 
                    </div>
                    <div class="input-field col s1">
                        <input disabled class="validate" type="text" value="0" id="ticket_setora_inteira" tabindex="-1"> 
                    </div>
                    <div class="input-field col s1">
                        <a class="btn setora_inteira btn-strepper-right blue"  id="add_setora_inteira"><i class="material-icons">add</i></a>
                    </div>
                    <div class="input-field col s1">
                        <a class="btn btn-strepper-cart green" href="../content/ingrssos_show.php"  id="add_setora_inteira"><i class="material-icons">shopping_cart</i></a>
                    </div>
                </div>
              </div><hr id="hr">
              <div class="row">
                <div class="input-field col s12">
                    <div class="input-field col s6">
                        <p>MEIA ENTRADA</p>
                        <span id="ing_setora_meia">R$ 50,00</span>  
                    </div>
                    
                    <div class="input-field col s1">
                        <a class="btn setora_meia btn-strepper-left grey" id="sub_setora_meia"><i class="material-icons">remove</i></a> 
                    </div>
                    <div class="input-field col s1">
                        <input disabled class="validate" type="text" value="0" id="ticket_setora_meia" tabindex="-1"> 
                    </div>
                    <div class="input-field col s1">
                        <a class="btn setora_meia btn-strepper-right blue"  id="add_setora"><i class="material-icons">add</i></a>
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
                            <a class="btn setorb btn-strepper-left grey" id="sub_setorb"><i class="material-icons">remove</i></a> 
                        </div>
                        <div class="input-field col s1">
                            <input disabled class="validate" type="text" value="0" id="ticket_setorb" tabindex="-1"> 
                        </div>
                        <div class="input-field col s1">
                            <a class="btn setorb btn-strepper-right blue"  id="add_setorb"><i class="material-icons">add</i></a>
                        </div>
                        <div class="input-field col s1">
                            <a class="btn setorb btn-strepper-cart green"  id="add_setorb"><i class="material-icons">shopping_cart</i></a>
                        </div>
                    </div>
                  </div><hr id="hr">
                  <div class="row">
                    <div class="input-field col s12">
                        <div class="input-field col s6">
                            <p>MEIA ENTRADA</p>
                            <span id="ing_setorb">R$ 50,00</span>  
                        </div>
                        
                        <div class="input-field col s1">
                            <a class="btn setorb btn-strepper-left grey" id="sub_setorb"><i class="material-icons">remove</i></a> 
                        </div>
                        <div class="input-field col s1">
                            <input disabled class="validate" type="text" value="0" id="ticket_setorb" tabindex="-1"> 
                        </div>
                        <div class="input-field col s1">
                            <a class="btn setorb btn-strepper-right blue"  id="add_setorb"><i class="material-icons">add</i></a>
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
                            <span id="ing_camarote">R$ 100,00</span>  
                        </div>
                        
                        <div class="input-field col s1">
                            <a class="btn camarote btn-strepper-left grey" id="sub_camarote"><i class="material-icons">remove</i></a> 
                        </div>
                        <div class="input-field col s1">
                            <input disabled class="validate" type="text" value="0" id="ticket_camarote" tabindex="-1"> 
                        </div>
                        <div class="input-field col s1">
                            <a class="btn camarote btn-strepper-right blue"  id="add_camarote"><i class="material-icons">add</i></a>
                        </div>
                        <div class="input-field col s1">
                            <a class="btn camarote btn-strepper-cart green"  id="add_camarote"><i class="material-icons">shopping_cart</i></a>
                        </div>
                    </div>
                  </div><hr id="hr">
                  <div class="row">
                    <div class="input-field col s12">
                        <div class="input-field col s6">
                            <p>MEIA ENTRADA</p>
                            <span id="ing_camarote">R$ 50,00</span>  
                        </div>
                        
                        <div class="input-field col s1">
                            <a class="btn camarote btn-strepper-left grey" id="sub_camarote"><i class="material-icons">remove</i></a> 
                        </div>
                        <div class="input-field col s1">
                            <input disabled class="validate" type="text" value="0" id="ticket_camarote" tabindex="-1"> 
                        </div>
                        <div class="input-field col s1">
                            <a class="btn camarote btn-strepper-right blue"  id="add_camarote"><i class="material-icons">add</i></a>
                        </div>
                    </div>
                  </div>
                  
    
                    </div>
                    
      
                    
                  </div>
      
                </div>
              </div>
            </div>
        <!--Final Camarote-->


<script>
    //Setor A
    $(".setora_inteira").on("click tap", function(){

        var $button = $(this);
        var oldValue = $('#ticket_setora_inteira').val();

        if($button.attr("id") == "add_setora_inteira"){
            var newVal = parseFloat(oldValue) + 1;
        } else{
            if(oldValue > 0){
                var newVal = parseFloat(oldValue) - 1;
            }else{
                newVal = 0;
            }
        };

        $("#ticket_setora_inteira").val(newVal);
        document.getElementById('ticket_setora_inteira').innerHTML = newVal;
    });

    $("#sub_setora_inteira").on("click tap", function(){
        if($('#ticket_setora_inteira').val() === '0'){
            $(this).attr("disabled", true);
        }
    });

    $("#add_setora_inteira").on("click tap", function(){
        $("#sub_setora_inteira").removeAttr("disabled");
    });

    //Setor A - Meia
    $(".setora_inteira").on("click tap", function(){

var $button = $(this);
var oldValue = $('#ticket_setora_inteira').val();

if($button.attr("id") == "add_setora_inteira"){
    var newVal = parseFloat(oldValue) + 1;
} else{
    if(oldValue > 0){
        var newVal = parseFloat(oldValue) - 1;
    }else{
        newVal = 0;
    }
};

$("#ticket_setora_inteira").val(newVal);
document.getElementById('ticket_setora_inteira').innerHTML = newVal;
});

$("#sub_setora_inteira").on("click tap", function(){
if($('#ticket_setora_inteira').val() === '0'){
    $(this).attr("disabled", true);
}
});

$("#add_setora_inteira").on("click tap", function(){
$("#sub_setora_inteira").removeAttr("disabled");
});
    


    

//Setor B

</script>
</body>
</html>