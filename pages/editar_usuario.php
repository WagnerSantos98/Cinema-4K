<?php
include_once('../db/conexao.php');
session_start();


//Retorna o campos com valores do banco de dados
$id_usuario = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM tb_usuario WHERE id = '$id_usuario'";
$resultado_usuario = mysqli_query($con, $result_usuario);
$row_usuarios = mysqli_fetch_assoc($resultado_usuario);

//Alterar os dados dos filme
if (isset($_POST['atualizar_usuario'])) {
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
  $tipo_acesso = filter_input(INPUT_POST, 'tipo_acesso', FILTER_SANITIZE_STRING);
  $email_user = filter_input(INPUT_POST, 'email_user', FILTER_SANITIZE_EMAIL);
  $senha = filter_input(INPUT_POST, md5($_POST['senha'], FILTER_SANITIZE_STRING));



  $sql = "UPDATE tb_usuario SET username='$username',  tipo_acesso='$tipo_acesso', email_user='$email_user', senha='$senha' WHERE id = '$id'";
  $sql = mysqli_query($con, $sql);
  if(mysqli_affected_rows($con)){
    $_SESSION['msg'] = "<p style='color:green;'>Registro atualizado com sucesso</p>";
    header("Location: ../pages/editar_usuario.php");
  }else{
    $_SESSION['msg'] = "<p style='color:red;'>Não foi possível atualizar o registro</p>";
    header("Location: ../pages/editar_usuario.php");
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

    <!--Icons Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script src="../assests/js/app.js"></script>
            
    <title>Painel Sistema Integrado</title> 
</head> 
<body>
    <!--Navbar-->   
    <header class="main-header">
        <label for="btn-nav" class="btn-nav"><i class="fa fa-bars"></i></label>
        <input type="checkbox" id="btn-nav">
        

        <!--Logout---> 
        <a class="navbar-brand" href="pages/logout.php" style="margin-left: 98%; color: #fff;" ><i class="fa-solid fa-right-from-bracket"></i></a>
        
        <nav>
          <ul class="navigation">
            <li>
                <a href="../index.php">Home</a>   
            </li>
            <li>
                <a href="../pages/eventos.php">Eventos</a>
            </li>
            <li>
                <a href="../pages/cartaz.php">Cartaz/Em Breve</a>
            </li>
            <li>
                <a href="../pages/configuracoes.php">Configurações</a>
            </li>
            
          </ul>
        </nav>
        
      </header>

    <div class="container">
    <h2>Editar usuário</h2>
    <div class="row">
    <form class="col s12" method="POST" action="">
      <div class="row">
        <div class="input-field col s1">
          <input id="id" name="id" type="hidden" class="validate" value="<?php echo $row_usuarios['id']; ?>">
        </div>
        </div>
        <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" name="username" id="username" type="text" class="validate" value="<?php echo $row_usuarios['username']; ?>">
          <label for="username">Usuário</label>
        </div>
        <div class="input-field col s6">
            <select id="tipo_acesso" name="tipo_acesso" value="<?php echo $row_usuarios['tipo_acesso']; ?>">
              <option value="" disabled selected>Selecione...</option>
              <option>ADM</option>
              <option>USER</option>
            </select>
      <label>Nívl de acesso</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email_user" name="email_user" type="email" class="validate" value="<?php echo $row_usuarios['email_user']; ?>">
          <label for="email_user">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="senha" name="senha" type="password" class="validate">
          <label for="senha">Senha</label>
        </div>
      </div>

      <button name="atualizar_usuario" class="waves-effect waves-light btn" type="submit"><i class="fa fa-send"></i> Atualizar</button>

     <!-- <div class="alert card green lighten-4 green-text text-darken-4">
		<div class="card-content">
			<p><i class="material-icons">check_circle</i><span>This is an alert:</span> It has text within it.</p>
		</div>
	</div>-->
    </form>
  </div>
</div>

    <script>

//Select
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });



    </script>
    
</body>
</html>