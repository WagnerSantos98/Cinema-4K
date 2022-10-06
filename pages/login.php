<?php 

include_once('../db/conexao.php');

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: ../index.php");
}

if (isset($_POST['submit'])) {
	$email_user = $_POST['email_user'];
	$senha = md5($_POST['senha']);

	$sql = "SELECT * FROM tb_usuario WHERE email_user='$email_user' AND senha='$senha'";
	$result = mysqli_query($con, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: ../index.php");
	} else {
		echo "<script>alert('Ooops! E-mail ou senha incorretos. ')</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../assests/css/login.css">
    

	<title>Login - Cinema 4K</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email_user" value="<?php echo $email_user; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Senha" name="senha" value="<?php echo $_POST['senha']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Esqueceu sua senha? <a href="/pages/recover.html" style="color:#38761d">Clique aqui</a>.</p>
		</form>
	</div>
</body>
</html>