<?php 
require_once 'controller/Diretorio.php'; 
git ?>
<!DOCTYPE html>
<html lang="pt-br">
<meta charset="UTF-8">
<head>
	<title>webFtp</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="tudo">
		<h1>WebFTP</h1>
		<form enctype="multipart/form-data" action="index.php" method="post">
			Selecione o arquivo: <input name="arquivo" type="file" /></br>
			<input type="submit" value="Enviar arquivo" name="btenviar" />

			<?php 
				$botao = filter_input(INPUT_POST, "btenviar");
				if ($botao) {
					$arquivo = $_FILES['arquivo'];
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
	
</body>
</html>