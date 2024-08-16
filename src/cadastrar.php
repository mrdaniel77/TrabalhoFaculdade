<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Barbearia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <h2 class="my-4">Barbearia</h2>
      <form action="cadastrar.php" method="post">
        <fieldset>
          <legend>Cadastro do Cliente</legend>                
          <div class="row">
            <div class="col-3  mb-3">
              <label for="nome" class="form-label">Nome:</label>
              <input type="text" class="form-control" id="nome" name="nome" required>
            </div>                
            <div class="col-5 mb-3">
              <label for="email" class="form-label">Email:</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>                
            <div class="col-4 mb-3">
              <label for="cpf" class="form-label">CPF:</label>
              <input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>                
            <div class="col-4 mb-3">
              <label for="genero" class="form-label">Gênero:</label>
              <select class="form-select" id="genero" name="genero" required>
                <option value="" disabled selected>Selecione...</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
              </select>
            </div>
          </div>
          <button class="btn btn-success" type="submit">Cadastrar</button>
        </fieldset>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

<?php
  //RESGATA A PÁGINA CONFIG.PHP
  include_once("config.php");   
    //VERIFICA SE EXISTE UMA REQUSIÇÃO E RESGATA SEUS VALORES
    if(!empty($_POST)){
      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $cpf = $_POST['cpf'];
      $genero = $_POST['genero'];      
      //INSERIR DADOS NO BANCO DE DADOS
      $sql = "INSERT INTO `clientes` (`nome`,`email`,`cpf`,`genero`)
              VALUES('{$nome}','{$email}','{$cpf}','{$genero}')";

      //CONEXÃO COM O BANCO ENVIANDO OS VALORES DA REQUISIÇÃO
      $result = $conexao->query($sql);

      //VERIFICA SE A CONEXÃO FOI REALIZADA
      if($result == true){
          echo"Salvo com sucesso!";
      }else{
          echo"Erro ao salvar".$sql."<br>".$conexao->error;
      }

      //FECHA A CONEXÃO
      $conexao->close();
      //RETORNA PARA A PAGINA INICIAL
      header('Location: ../index.php');
    }
?>