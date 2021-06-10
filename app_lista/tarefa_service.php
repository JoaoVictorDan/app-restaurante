<?php


//CRUD
class TarefaService {

	private $conexao;
	private $tarefa;

	public function __construct(Conexao $conexao, Tarefa $tarefa) {
		$this->conexao = $conexao->conectar();
		$this->tarefa = $tarefa;
	}

	public function inserir() { //create
		$query = 'insert into tb_tarefas(tarefa)values(:tarefa)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
		$stmt->execute();
	}

	public function recuperar() { //read
		$query = '
			select 
				t.id, s.status, t.tarefa 
			from 
				tb_tarefas as t
				left join tb_status as s on (t.id_status = s.id)
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function atualizar() { //update

		$query = "update tb_tarefas set tarefa = ? where id = ?";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('tarefa'));
		$stmt->bindValue(2, $this->tarefa->__get('id'));
		return $stmt->execute(); 
	}

	public function remover() { //delete

		$query = 'delete from tb_tarefas where id = :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		$stmt->execute();
	}

	public function marcarRealizada() { //update

		$query = "update tb_tarefas set id_status = ? where id = ?";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('id_status'));
		$stmt->bindValue(2, $this->tarefa->__get('id'));
		return $stmt->execute(); 
	}

	public function recuperarTarefasPendentes() {
		$query = '
			select 
				t.id, s.status, t.tarefa 
			from 
				tb_tarefas as t
				left join tb_status as s on (t.id_status = s.id)
			where
				t.id_status = :id_status
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}public function inserirCadastroPromocao() { //create
		$query = 'insert into email_clientes (email,nome)values(:email,:nome)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':email', $this->tarefa->__get('email'));
		$stmt->bindValue(':nome', $this->tarefa->__get('nome'));
		$stmt->execute();
	}
	public function recuperarEmail() { //read
		$query = '
			select 
				t.id, s.status, t.tarefa 
			from 
				tb_tarefas as t
				left join tb_status as s on (t.id_status = s.id)
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
//	}public function inserirNomeCliente() { //create
//		$query = 'insert into email_clientes (nome)values(:nome)';
//		$stmt = $this->conexao->prepare($query);
//		$stmt->bindValue(':nome', $this->tarefa->__get('nome'));
//		$stmt->execute();
//	}
	/*
	public function logarEmail() {
		$query ='select * from tb_usuarios where email = :email';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':email', $this->tarefa->__get('email'));
	}
	public function logarSenha() {
		$query ='select * from tb_usuarios where senha = :senha';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':senha', $this->tarefa->__get('senha'));
		return $stmt->execute()
	}*/
}

?>