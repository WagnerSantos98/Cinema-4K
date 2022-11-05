<?php

include_once('../db/conexao.php');
session_start();

error_reporting(0);
//Cadastro Usuário
if (isset($_POST['cadastrar_usuario'])) {
	$username = $_POST['username'];
	$tipo_acesso = $_POST['tipo_acesso'];
  $email_user = $_POST['email_user'];
	$senha = md5($_POST['senha']);

		$sql = "SELECT * FROM tb_usuario WHERE email_user='$email_user'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO tb_usuario (username, tipo_acesso, email_user, senha)
					VALUES ('$username', '$tipo_acesso', '$email_user', '$senha')";
			$result = mysqli_query($con, $sql);
			if ($result) {
				echo "<script>alert('Wow! Registro do usuário concluído.')</script>";
				$username = "";
        $tipo_acesso = "";
				$email_user = "";
				$_POST['senha'] = "";
			} else {
				echo "<script>alert('Woops! Algo errado aconteceu.')</script>";
			}
		} else {
			echo "<script>alert('Woops! E-mail já existe.')</script>";
		}
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
    

    <!--Icons Materialize and Material Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="../assests/js/app.js"></script>
            
    <title>Painel Sistema Integrado</title> 
</head>
<body>

    <!--Navbar-->   
    <nav class="red" style="padding: 0px 10px;">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo" >Sistema Inegrado</a>

            <a href="#" class="sidenav-trigger" data-target="mobile-nav"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <li><a href="../index.php">Home</a></li>
                <li><a href="./eventos.php">Eventos</a></li>
                <li><a href="./cartaz.php">Cartaz/Em Breve</a></li>
                <li><a href="./configuracoes.php">Configurações</a></li>
                <li><a href="./logout.php"><i class="material-icons">exit_to_app</i></a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-nav">
        <li><a href="./index.php">Home</a></li>
        <li><a href="./cadastro.php">Eventos</a></li>
        <li><a href="./cartaz.php">Cartaz/Em Breve</a></li>
        <li><a href="./configuracoes.php">Configurações</a></li>
    </ul>

      <!--Tabs Materialize-->
      <div class="container">

        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="#cad_usuario">Cadastro de usuário</a></li>
                    <li class="tab col s3"><a  href="#control_usuario">Controle de acesso</a></li>
                </ul>
            </div>
        <!--Cadastro de Usuário-->
        <div id="cad_usuario" class="col s12">
        <div class="row">
    <form class="col s12" method="POST" action="">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" name="username" id="username" type="text" class="validate">
          <label for="username">Usuário</label>
        </div>
        <div class="input-field col s6">
            <select id="tipo_acesso" name="tipo_acesso">
              <option value="" disabled selected>Selecione...</option>
              <option>ADM</option>
              <option>USER</option>
            </select>
      <label>Nívl de acesso</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email_user" name="email_user" type="email" class="validate">
          <label for="email_user">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="senha" name="senha" type="password" class="validate">
          <label for="senha">Senha</label>
        </div>
      </div>

      <button name="cadastrar_usuario" class="waves-effect waves-light btn" type="submit"><i class="fa fa-send"></i> Cadastrar</button>

     <!-- <div class="alert card green lighten-4 green-text text-darken-4">
		<div class="card-content">
			<p><i class="material-icons">check_circle</i><span>This is an alert:</span> It has text within it.</p>
		</div>
	</div>-->
    </form>
  </div>

        </div>

        <div id="control_usuario" class="col s12">
          <div class="container">
            <h2>Usuários Cadastrados</h2>
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

        $result_cartaz =  "SELECT * FROM tb_usuario LIMIT $inicio, $qnt_pagina";
        $resultado_cartaz = mysqli_query($con,$result_cartaz);

        while($row_usuario = mysqli_fetch_assoc($resultado_cartaz)){
            echo "Username: " . $row_usuario['username']. "<br>";
            echo "Tipo de Acesso: " . $row_usuario['tipo_acesso'] . "<br>";
            echo "Email: " . $row_usuario['email_user'] . "<br>";
            echo "<a class='waves-effect waves-light btn' href='../pages/editar_usuario.php?id=" . $row_usuario['id'] . "'>Editar</a>";
            echo "<a class='waves-effect waves-light btn modal-trigger' href='../pages/excluir.php?id=" . $row_usuario['id'] . "'>Excluir</a><hr>";

        }

        //Paginação
        $result_pag = "SELECT COUNT(codigo) AS num_result FROM tb_usuario";
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
          
        </div>
      
 

    <script>
//Animação Tabs
    document.addEventListener("DOMContentLoaded", function(){
	    const tab = document.querySelector('.tabs');
	    M.Tabs.init(tab, {
	  swipeable: true,
	  duration: 300
	});
})

//Select
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });

//Alerts 

  //Alert
$(".btn").click(() => {
	Map.toast({
		html: 'Cadastro realizado com sucesso!'
	});
});

//Table and Pagination
$(document).ready(function(){
  $('#myTable').pageMe({
    pagerSelector:'#myPager',
    activeColor: 'blue',
    prevText:'Anterior',
    nextText:'Seguinte',
    showPrevNext:true,
    hidePageNumbers:false,
    perPage:10
  });
});

//Menu
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
  });

</script>

</body>
</html>