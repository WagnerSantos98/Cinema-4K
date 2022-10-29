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
		header("Location: ../pages/cartaz.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro ao excluir o filme.</p>";
		header("Location: ../pages/cartaz.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um filme</p>";
	header("Location: ../pages/cartaz.php");
}
