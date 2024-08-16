<?php
	//RESGATA A PÁGINA CONFIG.PHP
	include("config.php");
  
  //RESGATA O ID DA REQUEST
  $id = $_GET['id'];

  // CONSULTA SQL PARA DELETAR O CLIENTE
  $sql = "DELETE FROM clientes WHERE id = $id";

  //EXECUTA A QUERY PARA DELETAR
  if ($conexao->query($sql)) {
    //RETORNA A PAGINA INICIAL
    header('Location: ../index.php');
  } else {
    //RETORNA O ERRO
    die('Erro ao excluir o cliente: ' . $conexao->error);
  }
?>