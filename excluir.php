<?php require_once 'controller/Diretorio.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<meta charset="UTF-8">
<head>
	<title>webFtp</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="app">
		<h1>WebFTP</h1>
		
			<?php 
				$urlarquivo = $_GET['file'];
				
				$diretorio = new Diretorio('uploads/');
	
				$diretorio->excluirArquivo($urlarquivo);
				header("Location: index.php"); 
			?>
		

		<a href="index.php">Voltar</a>
	</div>
	
</body>
</html>