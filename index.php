<?php 
require_once 'controller/Diretorio.php'; 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>webFtp</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="app">
		<h1>WebFTP</h1>
		<form enctype="multipart/form-data" action="index.php" method="POST">
			Selecione o arquivo: <input type="file" accept="image/*" name="btnFile"/></br>
			<input type="submit" value="Enviar arquivo" name="btnSubmit" disabled/>
			<?php 
				$botao = filter_input(INPUT_POST, "btnSubmit");
				if ($botao) {
					$arquivo = $_FILES['btnFile'];
					$diretorio = new Diretorio('uploads/');
					echo '</br>';
					$diretorio->enviarArquivo($arquivo);

					echo '</br>';
					echo '</br>';
                    echo '</br>';

					$diretorio->listararquivos();
				}
			?>
		</form>
		
	</div>
	<script src="./js/app.js"></script>
</body>
</html>