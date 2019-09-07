<?php
	class Pessoa {
		private $idPessoa;
		private $nome;
		private $idade;

		public function __construct($idPessoa, $nome, $idade){
			$this->idPessoa = $idPessoa;
			$this->nome = $nome;
			$this->idade = $idade;
		}

		public function getIdPessoa(){
			return $this->idPessoa;
		}

		public function getNome(){
			return $this->nome;
		}

		public function getIdade(){
			return $this->idade;
		}

		public function setIdPessoa($idPessoa){
			$this->idPessoa = $idPessoa;
		}

		public function setNome($nome){
			$this->nome = $nome;			
		}

		public function setIdade($idade){
			$this->idade = $idade;
		}

		public function getAnoNascimento(){

			$anoatual = date("Y");
			return $anoatual - $this->idade;
		}
	}