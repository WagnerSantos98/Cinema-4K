<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Css Compiled Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/assentos.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


    <!--JS Compiled Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="../assets/js/app.js"></script>

    
    <title>Cinema 4K</title>

</head>
<body>
    <div class="d-flex" id="wrapper">
        <!--Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">Cinema 4K</div>
            <div class="list-gtoup list-group-flush">
                <a href="/index.html" class="list-group-item list-group-item-action list-group-item-light p-3">Home</a>
                <a href="/pages/cinemas.html" class="list-group-item list-group-item-action list-group-item-light p-3">Cinemas</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-light p-3">Teatros</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-light p-3">Shows</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-light p-3">Mais</a>
            </div>
        </div>
        <!--Page content wrapper-->
        <div id="page-content-wrapper"> 
            <!--Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#!">Action</a>
                                    <a class="dropdown-item" href="#!">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">Something else here</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                
                <div class="demo">
                    <div id="seat-map">
                     <div class="front">TELA</div>					
                 </div>
                 
                 <div class="booking-details">
                     <p>Filme: <span> Gingerclown</span></p>
                     <p>Duração: <span>November 3, 21:00</span></p>
                     <p>Assento: </p>
                     <ul id="selected-seats"></ul>
                     <p>Ingressos: <span id="counter">0</span></p>
                     <p>Total: <b>$<span id="total">0</span></b></p>
                             
                     <button class="checkout-button btn btn-primary">COMPRAR</button>
                             
                     <div id="legend"></div>
                 </div>
                 <div style="clear:both"></div>
            </div>

            </div>


            
            <script type="text/javascript" src="../assets/js/jquery.seat-charts.min.js"></script> 
</body>
</html>