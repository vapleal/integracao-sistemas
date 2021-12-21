<html>
<head>
	<meta charset="utf-8">
	<title> Good Games </title>
	<link rel="stylesheet" href="script/style.css" >
	<style>
        table {
            color: white;
        }
    </style>
</head>
<body>
	<div class="content">
		<div class="col4">
			<img src="imagens/logo3.png" width="100%">
		</div>
		<div class="col2">
			<span class="logo-titulo"> Good Games </span>
		</br>
			<span class="logo-desc"> Jogos - Consoles - Acessórios - Dicas </span>
		</div>
		<div class="col1">
			<nav class="menu">
				<ul>
					<li><a href="index.html"> Home </a></li>
					<li><a href="quemSomos.html"> Quem somos </a></li>
					<li><a href="produtos.html"> Produtos </a></li>
					<li><a href="curiosidades.html"> Curiosidades </a></li>
					<li><a href="contato.html"> Contato </a></li>
				</ul>
			</nav>
		</div>
	<div class="col1">
		<h3> &nbsp;&nbsp;&nbsp;&nbsp;> Alterar > Console </h3>
	</div>
	<div id="formulario" class="col1">
		<form method="post" action="script/altDesenv.php">
			<fieldset>
				<legend>
					<label> &nbsp;&nbsp;Alteração de Console&nbsp;&nbsp; </label>
				</legend>
				<div class="conteudo-form">
                <br/>
                <br/>
				<?php
				// Preencher dados softhouse para edição
				require_once('script/condb.php');
				// capturar código da desenvolvedora
				$codigo = $_GET["cod"];
				try{
					// consulta qual sf vai ser editada
					$edita = $con->prepare(
					"SELECT * FROM tb_console WHERE idcons = " . $codigo
					);
					// executar consulta
					$edita->execute();
					// perecorrer linhas e pegar o resultado
					foreach($edita as $linhas){
						$descCon = $linhas[1];
						$fabCon = $linhas[3];
						$midiaCon = $linhas[2];
					}
				}
				catch(Exception $e){
					echo "Erro: " . $e;
				}
				?>

				<input type="hidden" name="id" id="id" 
					    value="<?php echo $codigo; ?>">
				
						<table width="500">
					<tr>
						<td width="100"><label for="desc"> Descrição: </label></td>
						<td width="400"><input type="text" id="desc" name="desc" 
						value="<?php echo $descCon; ?>" /></td>
                    </tr>
                    <tr>
						<td width="100"><label for="fab"> Fabricante: </label></td>
						<td width="400"><input type="text" id="fab" name="fab" 
						value="<?php echo $fabCon; ?>" /></td>
                    </tr>
                    <tr>
						<td width="100"><label for="midia"> Tipo de mídia: </label></td>
						<td width="400"><input type="text" id="tpmidia" name="tpmidia" 
						value="<?php echo $midiaCon; ?>" /></td>
					</tr>					
                </table>
                <br/>
                <br/>
				</div>
			</fieldset>
			<fieldset>
				<div class="conteudo-form">
                    <br/>
					<input type="submit" id="enviar" name="enviar"
						   value="  Alterar  " class="bt-enviar" />	
                    &nbsp;&nbsp;&nbsp;
                    <input type="reset" id="limpar" name="limpar"
                       value="  Cancelar  " class="bt-cancelar" />
                    <br/><br/>
				</div>
			</fieldset>
		</form>
	</div>
</body>
</html>