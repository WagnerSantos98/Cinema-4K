<?php
include_once('../db/conexao.php');
session_start();

//Cadastro de Peça de Teatro

    $evento = $_POST['evento'];
    $artista = $_POST['artista'];
    $localizacao = $_POST['localizacao'];
    $classi = $_POST['classi'];
    $sql_teatro = "INSERT INTO tb_teatro(evento,artista,localizacao,classi)
    VALUES ('$evento', '$artista', '$localizacao', '$classi');";
    $sql_teatros = mysqli_query($con, $sql_teatro);
  
?>