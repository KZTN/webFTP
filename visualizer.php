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
				$urlarquivo = $_GET['arquivo'];	
				$diretorio = new Diretorio('uploads/');
            	echo("<img src=".$urlarquivo.">");
				echo("<a href=download.php?file=".$urlarquivo.">Baixar</a>");
				echo("<a href=excluir.php?file=".$urlarquivo.">Excluir</a>");

			?>
		

		<a href="index.php">Voltar</a>
	</div>
	
</body>
</html>