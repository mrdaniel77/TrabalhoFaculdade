<?php
  //DEFINE AS CONFIGURAÇÕES DO BD
  $servername = 'localhost';
  $username = 'root';
  $password = '';
  $dbname = 'barbearia';

  //REALIZAR A CONEXÃO COM O BANCO
  $conexao = new mysqli($servername, $username, $password, $dbname);

  //CASO A CONEXÃO FALHAR, RETORNAR O ERRO
  if($conexao->connect_error){
    //MATA A CONEXÃO E RETORNA O ERRO
    die("Conexão falhou: ". $conexao->connect_error);
  }

?>