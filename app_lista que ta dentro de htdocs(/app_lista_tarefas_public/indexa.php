<?php

	$acao = 'recuperarTarefasPendentes';
	require 'tarefa_controler.php';

	/*
	echo '<pre>';
	print_r($tarefas);
	echo '</pre>';
	*/

?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Pedidos</title>

		<link rel="stylesheet" href="css/estilos.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<link rel="shortcut icon" href="img/logos.png" type="image/png">

		<script>


			function editar(id, txt_tarefa) {

				//criar um form de edição
				let form = document.createElement('form')
				form.action = 'indexa.php?pag=indexa&acao=atualizar'
				form.method = 'post'
				form.className = 'row'

				//criar um input para entrada do texto
				let inputTarefa = document.createElement('input')
				inputTarefa.type = 'text'
				inputTarefa.name = 'tarefa'
				inputTarefa.className = 'col-9 form-control'
				inputTarefa.value = txt_tarefa

				//criar um input hidden para guardar o id da tarefa
				let inputId = document.createElement('input')
				inputId.type = 'hidden'
				inputId.name = 'id'
				inputId.value = id

				//criar um button para envio do form
				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'col-3 btn btn-info'
				button.innerHTML = 'Atualizar'

				//incluir inputTarefa no form
				form.appendChild(inputTarefa)

				//incluir inputId no form
				form.appendChild(inputId)

				//incluir button no form
				form.appendChild(button)

				//teste
				//console.log(form)

				//selecionar a div tarefa
				let tarefa = document.getElementById('tarefa_'+id)

				//limpar o texto da tarefa para inclusão do form
				tarefa.innerHTML = ''

				//incluir form na página
				tarefa.insertBefore(form, tarefa[0])

			}

			function remover(id) {
				location.href = 'indexa.php?pag=indexa&acao=remover&id='+id;
			}

			function marcarRealizada(id) {
				location.href = 'indexa.php?pag=indexa&acao=marcarRealizada&id='+id;
			}
		</script>

	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.php">
					<img src="img/logos.png" width="50" height="50" class="d-inline-block align-top" alt="">
					App Pedidos
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="#">Pedidos em andamento</a></li>
						<a href="nova_tarefa.php"><li class="list-group-item">Novo pedido</li></a>
						<a href="todas_tarefas.php"><li class="list-group-item">Todos pedidos</li></a>
						<a href="cardapio.html"><li class="list-group-item">Cardápio</li></a>
						<a href="criar_promocao.php"><li class="list-group-item">Criar promoção</li></a>
						<a href="index.php"><li class="list-group-item">Ir ao início</li></a>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Pedidos em Andamento</h4>
								<hr />

								<? foreach($tarefas as $indice => $tarefa) { ?>
									<div class="row mb-3 d-flex align-items-center tarefa">
										<div class="col-sm-9" id="tarefa_<?= $tarefa->id ?>">
											<?= $tarefa->tarefa ?>
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $tarefa->id ?>)"></i>
											<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $tarefa->id ?>, '<?= $tarefa->tarefa ?>')"></i>
											<i class="fas fa-check-square fa-lg text-success" onclick="marcarRealizada(<?= $tarefa->id ?>)"></i>
										</div>
									</div>

								<? } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>