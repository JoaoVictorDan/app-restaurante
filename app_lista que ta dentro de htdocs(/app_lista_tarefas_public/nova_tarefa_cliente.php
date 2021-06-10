<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Pedidos</title>

		<link rel="stylesheet" href="css/estilos.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<link rel="shortcut icon" href="img/logos.png" type="image/png">
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.php">
					<img src="img/logos.png" width="50" height="50" class="d-inline-block align-top" alt="">
					App pedidos
				</a>
			</div>
		</nav>

		<? if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1 ) { ?>
			<div class=" pt-2 text-white d-flex justify-content-center" style="background-color: #1a98ca;">
				<h5>Pedido realizado com sucesso!</h5>
			</div>
		<? } ?>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="#">Novo pedido</a></li>
						<a href="todas_tarefas_clientes.php"><li class="list-group-item">Todos pedidos</li></a>
						<a href="cardapio.html"><li class="list-group-item">Cardápio</li></a>
						<a href="promocoes.php"><li class="list-group-item">Para receber promoções</li></a>
						<a href="index.php"><li class="list-group-item">Ir ao início</li></a>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Novo pedido</h4>
								<hr />

								<form method="post" action="tarefa_controler.php?acao=inserira">
									<div class="form-group">
										<label>Descrição do pedido:</label>
										<input type="text" class="form-control" name="tarefa" placeholder="Exemplo:X-Bacon   obs:sem salada">
									</div>

									<button class="btn btn-success" style="background-color: #1a98ca;">Cadastrar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>