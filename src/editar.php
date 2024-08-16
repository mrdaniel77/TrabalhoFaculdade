<?php
  //RESGATA A PÁGINA CONFIG.PHP
  include("config.php");

  //RESGATA O ID DA REQUEST
  $id = $_GET['id'];

  //RESGATA OS DADOD DO CLIENTE PELO "ID"
  $sql = "SELECT * FROM clientes WHERE id = $id";
  $result = $conexao->query($sql);

  //TRANSFORMA OS DADOS RETORNADOS EM ARRAY
  $cliente = $result->fetch_assoc();

  //DEFINE CADA VALOR RESGATADO AO SEU INPUT
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nome = $conexao->real_escape_string($_POST['nome']);
      $email = $conexao->real_escape_string($_POST['email']);
      $cpf = $conexao->real_escape_string($_POST['cpf']);
      $genero = $conexao->real_escape_string($_POST['genero']);

      //ATUALIZA OS DADOS DO CLIENTE
      $sql = "UPDATE clientes SET nome = '$nome', email = '$email', cpf = '$cpf', genero = '$genero' WHERE id = $id";

      //EXECUTA A QUERY PARA EDITAR
      if ($conexao->query($sql)) {
        //RETORNA A PAGINA INICIAL
        header('Location: ../index.php');
      } else {
        die('Erro ao atualizar o cliente: ' . $conexao->error);
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <h2 class="my-4">Editar Cliente</h2>
      <form method="post">
        <div class="mb-3">
          <label for="nome" class="form-label">Nome:</label>
          <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" required>
        </div>
        <div class="mb-3">
          <label for="cpf" class="form-label">CPF:</label>
          <input type="text" class="form-control" id="cpf" name="cpf" value="<?= htmlspecialchars($cliente['cpf']) ?>" required>
        </div>
        <div class="mb-3">
          <label for="genero" class="form-label">Gênero:</label>
          <select class="form-select" id="genero" name="genero" required>
            <option value="M" <?= $cliente['genero'] === 'Masculino' ? 'selected' : '' ?>>Masculino</option>
            <option value="F" <?= $cliente['genero'] === 'Feminino' ? 'selected' : '' ?>>Feminino</option>                      
          </select>
        </div>
        <button class="btn btn-success" type="submit">Atualizar</button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
