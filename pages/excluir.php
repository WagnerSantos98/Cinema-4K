<?php
include_once('../db/conexao.php');
session_start();


//Exclusão de Filme
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$sql = "DELETE FROM tb_cinema WHERE id = '$id'";
	$sql = mysqli_query($con, $sql);
	if(mysqli_affected_rows($con)){
		$_SESSION['msg'] = "<p style='color:green;'>Filme excluído com sucesso.</p>";
		header("Location: ../pages/editar_filme.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro ao excluir o filme.</p>";
		header("Location: ../pages/editar_filme.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um filme.</p>";
	header("Location: ../pages/editar_filme.php");
}

//Exclusão de Show
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$sql = "DELETE FROM tb_show WHERE id = '$id'";
	$sql = mysqli_query($con, $sql);
	if(mysqli_affected_rows($con)){
		$_SESSION['msg'] = "<p style='color:green;'>Show excluído com sucesso.</p>";
		header("Location: ../pages/editar_show.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro ao excluir o show.</p>";
		header("Location: ../pages/editar_show.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um show.</p>";
	header("Location: ../pages/editar_show.php");
}

//Exclusão de Teatro
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$sql = "DELETE FROM tb_teatro WHERE id = '$id'";
	$sql = mysqli_query($con, $sql);
	if(mysqli_affected_rows($con)){
		$_SESSION['msg'] = "<p style='color:green;'>Peça de teatro excluído com sucesso.</p>";
		header("Location: ../pages/editar_teatro.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro ao excluir a peça de teatro.</p>";
		header("Location: ../pages/editar_teatro.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar uma peça de teatro.</p>";
	header("Location: ../pages/editar_teatro.php");
}

//Exclusão de Usuario
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$sql = "DELETE FROM tb_usuario WHERE id = '$id'";
	$sql = mysqli_query($con, $sql);
	if(mysqli_affected_rows($con)){
		$_SESSION['msg'] = "<p style='color:green;'>Usuário excluído com sucesso.</p>";
		header("Location: ../pages/configuracoes.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro ao excluir o usuário.</p>";
		header("Location: ../pages/configuracoes.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário.</p>";
	header("Location: ../pages/configuracoes.php");
}