<?php

  require "../../../app_lista/tarefa_model.php";
  require "../../../app_lista/tarefa_service.php";
  require "../../../app_lista/conexao.php";

  $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

	if($acao == 'inserir' ) {
		$tarefa = new Tarefa();
		$tarefa->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->inserir();

		header('Location: nova_tarefa.php?inclusao=1');
	
	} else if($acao == 'recuperar') {
		
		$tarefa = new Tarefa();
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperar();
	
	} else if($acao == 'atualizar') {

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_POST['id'])
			->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		if($tarefaService->atualizar()) {
			
			if( isset($_GET['pag']) && $_GET['pag'] == 'indexa') {
				header('location: indexa.php');	
			} else {
				header('location: todas_tarefas.php');
			}
		}


	} else if($acao == 'remover') {

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->remover();

		if( isset($_GET['pag']) && $_GET['pag'] == 'indexa') {
			header('location: indexa.php');	
		} else {
			header('location: todas_tarefas.php');
		}
	
	} else if($acao == 'marcarRealizada') {

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id'])->__set('id_status', 2);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->marcarRealizada();

		if( isset($_GET['pag']) && $_GET['pag'] == 'indexa') {
			header('location: indexa.php');	
		} else {
			header('location: todas_tarefas.php');
		}
	
	} else if($acao == 'recuperarTarefasPendentes') {
		$tarefa = new Tarefa();
		$tarefa->__set('id_status', 1);
		
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperarTarefasPendentes();
	}elseif($acao == 'entrarAdm'){
		header('location: entraradm.php');
	}elseif($acao == 'logarAdm'){
		if($_POST['email'] == 'admin@admin' && $_POST['senha'] == 'admin'){
			header('location: indexa.php');
		}else{
			header('location: entraradm.php?inclusao=1');
		}
	}elseif($acao == 'entrarCliente'){
			header('location: nova_tarefa_cliente.php');
	}else if($acao == 'removera') {

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->remover();

		if( isset($_GET['pag']) && $_GET['pag'] == 'indexa') {
			header('location: indexa.php');	
		} else {
			header('location: todas_tarefas_clientes.php');
		}
	}elseif($acao == 'inserira' ) {
		$tarefa = new Tarefa();
		$tarefa->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->inserir();

		header('Location: nova_tarefa_cliente.php?inclusao=1');
	
	}else if($acao == 'atualizara') {

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_POST['id'])
			->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		if($tarefaService->atualizar()) {
			
			if( isset($_GET['pag']) && $_GET['pag'] == 'indexa') {
				header('location: indexa.php');	
			} else {
				header('location: todas_tarefas_clientes.php');
			}
		}
	}elseif($acao == 'logarCliente' ) {
		if(empty($_POST['email_cliente'] && $_POST['nome_cliente'])){
			header('Location: promocoes.php?inclusao=1');
		}else{
			$tarefa = new Tarefa();
			$tarefa->__set('email', $_POST['email_cliente']);
			$tarefa->__set('nome', $_POST['nome_cliente']);
	
			$conexao = new Conexao();
	
			$tarefaService = new TarefaService($conexao, $tarefa);
			$tarefaService->inserirCadastroPromocao();
	
				//$tarefa = new Tarefa();
				//$tarefa->__set('email,nome', $_POST['nome_cliente','email']);
		
				//$conexao = new Conexao();
		
				//$tarefaService = new TarefaService($conexao, $tarefa);
				//$tarefaService->inserirNomeCliente();
		
			header('Location: promocoes.php?inclusao=2');
		}
		
		}
	

		/*elseif($acao == 'logarAdm'){
		$tarefa = new Tarefa();
		$tarefa->__set('email',$_GET['email']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->logarEmail();
	}elseif($acao == 'logarAdm'){
		$tarefa = new Tarefa();
		$tarefa->__set('senha',$_GET['senha']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->logarSenha();
	}*/


?>