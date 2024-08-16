<?php
	//RESGATA A PÁGINA CONFIG.PHP
	include("src/config.php");
	
	//RESGATAR VALORES DO BD E ARMAZENAR NA VARIAVEL
	$sql = "SELECT * FROM `barbearia`.`clientes`;";
	$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Barbearia</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
				<h2>Clientes</h2>
			<table class="table">				
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>E-mail</th>
						<th>CPF</th>
						<th>genero</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						//LOOP NAS INFOMAÇÕES DO BANCO
						if($result->num_rows >0){
							while($row = $result->fetch_assoc()){
					?>
						<!-- ALIMENTANDO A TABELA DINAMICAMENTE -->
						<tr>
							<td><?php echo $row['id'];?></td>
							<td><?php echo $row['nome'];?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['cpf'];?></td>
							<td><?php echo $row['genero'];?></td>
							<td>
								<a href="src/editar.php?id=<?php echo $row['id'];?>">Editar</a>
								<a href="src/deletar.php?id=<?php echo $row['id'];?>">Deletar</a>					
							</td>
						</tr>
					<?php }} ?>
				</tbody>
			</table>
			<button class="btn btn-success "><a href="src/cadastrar.php" style="color: inherit; text-decoration: none;">Novo cliente</a></button>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
	</body>
</html>