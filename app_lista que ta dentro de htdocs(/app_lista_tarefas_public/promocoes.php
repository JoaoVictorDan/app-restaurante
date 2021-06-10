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
			let tarefa = document.getElementById('tarefa_' + id)

			//limpar o texto da tarefa para inclusão do form
			tarefa.innerHTML = ''

			//incluir form na página
			tarefa.insertBefore(form, tarefa[0])

		}

		function remover(id) {
			location.href = 'indexa.php?pag=indexa&acao=remover&id=' + id;
		}

		function marcarRealizada(id) {
			location.href = 'indexa.php?pag=indexa&acao=marcarRealizada&id=' + id;
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
	<?php if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
		<div class=" pt-2 text-white d-flex justify-content-center" style="background-color:red;">
			<h5>!!Email ou Nome não preenchido</h5>
		</div>
		<? } ?>
	<?php if (isset($_GET['inclusao']) && $_GET['inclusao'] == 2) { ?>
		<div class=" pt-2 text-white d-flex justify-content-center" style="background-color:green;">
			<h5>!!Cadastrado com Sucesso!</h5>
		</div>
		<? } ?>
		<div class="col-md-9">
			<div class="container pagina">
				<div class="row">
					<form name="logar" method="post" action="tarefa_controler.php?acao=logarCliente">
                        <label>Email</label>
						<input type="email" class="form-control" name="email_cliente" placeholder="email">
                        <label>Nome</label>
						<input type="text" class="form-control" name="nome_cliente" placeholder="nome">

						<br />
						<button class="btn btn-success" style="background-color: #1a98ca;color:black;">Enviar</button>
						<hr />
					</form>
				</div>
				<div class="row">
					<a href="nova_tarefa_cliente.php"><button class="btn btn-success" style="background-color: #1a98ca;">Voltar</button></a>


				</div>
			</div>
		</div>
</body>

</html> <?php
		//if(empty($_POST ['email'] )&& empty($_POST["senha"])){
		//		exit();
		// }else{
		//   caso();
		//}
		?>