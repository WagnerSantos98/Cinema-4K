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
    <link rel="stylesheet" href="../assests/css/style.css">

    <!--Icons Materialize and Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
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
                <a href="../pages/ingressos.php">Ingressos</a>
            </li>
            <li>
                <a href="../pages/configuracoes.php">Configurações</a>
            </li>
            
          </ul>
        </nav>
        
      </header>

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
        
       
	<!--<input type="text" id="search" placeholder="Type to search..." />-->
        <table cellpadding="1" cellspacing="1" class="table table-hover" id="myTable">
          <thead>
            <tr>
              <th>nombre</th>
              <th>apellido</th>
              <th>edad</th>
              <th>mail</th>
            </tr>
          </thead>
          <tbody >
           
           
            
            	<td>Joshua</td>
            	<td>Obrien</td>
            	<td>69</td>
            	<td>varius.et@consequat.ca</td>
            </tr>
            <tr>
            	<td>Clark</td>
            	<td>Evans</td>
            	<td>37</td>
            	<td>Integer.in@odioauctorvitae.co.uk</td>
            </tr>
            <tr>
            	<td>Andrew</td>
            	<td>Mccullough</td>
            	<td>70</td>
            	<td>eu.nibh.vulputate@magna.co.uk</td>
            </tr>
            <tr>
            	<td>Nolan</td>
            	<td>Thompson</td>
            	<td>44</td>
            	<td>dolor.sit@quisurnaNunc.net</td>
            </tr>
            </tbody>
          </table>
          <div class="col s12 m7 l6 pagination">
            <div id="pagination-long"></div>
            <div id="pagination-short"></div>
        </div>
      </div>
      <div class="col s12 m2 l2">
        More info in <a href="https://github.com/pinzon1992/materialize_table_pagination">GITHUB</a>
      </div>
    </div>
            
            
            
            </tbody>
          </table>
          <div class="col-md-12 center text-center">
	    <span class="left" id="total_reg"></span>
            <ul class="pagination pager" id="myPager"></ul>
          </div>
      </div>
      
    </div>

        </div>
        
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
</script>

</body>
</html>