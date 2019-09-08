<?php
	class Diretorio {
		private $diretorio;

		public function __construct($diretorio){
			if(!is_dir($diretorio)) {
				mkdir($diretorio, 0777, true);
			}
			$this->diretorio = $diretorio;
		}

		public function getDiretorio(){
			return $this->diretorio;
		}

		public function setDiretorio($diretorio){
			$this->diretorio = $diretorio;
		}

		public function enviarArquivo($arquivo){
			$_FILES['arquivo'] = $arquivo;
			$_UP['pasta'] = $this->diretorio;
			$_UP['tamanho'] = 1024 * 1024 * 30;
			$_UP['erros'][0] = 'Não houve erro';
			$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
			$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
			$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
			$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
			if ($_FILES['arquivo']['error'] != 0) {
				die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
				exit; 
			}
			if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
				echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
			} else {
				$nome_final = $_FILES['arquivo']['name'];
				if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
					echo "Upload efetuado com sucesso!";
					echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
				} else {
					echo "Não foi possível enviar o arquivo, tente novamente";
				}
			}
		}

		public function listarArquivos() {
					$path = $this->diretorio;  
					echo ("Lista de Arquivos do diretório '<strong>".$path."</strong>':<br />"); 
					echo ("Clique no arquivo para Exibi-lo<br />");
					if ($handle = opendir($path)) {
							while($entry = readdir($handle)){
								if(is_dir($entry) != ".") {
									echo ("<a href=visualizer.php?arquivo=".$path.$entry.">".$entry."</a><br />"); 
								}
						} 
					}
					closedir($handle);
		}
		public function excluirArquivo($urlarquivo){
			unlink($urlarquivo);
			echo ('<script language="javascript">');
			echo ('alert("message successfully sent")');
			echo ('</script>');		
		}

	}
