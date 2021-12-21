<html>
<head>
	<meta charset="utf-8">
	<title> Good Games </title>
	<link rel="stylesheet" href="script/style.css" >
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
		<h3> &nbsp;&nbsp;&nbsp;&nbsp;> Alteração > Jogo </h3>
	</div>
	<div id="formulario" class="col1">
		<form name="" method="post" action="#">
	<?php
	// Preencher dados do jogo para edição
	require_once('script/condb.php');
	// capturar código do jogo
	$codigo = $_GET["cod"];
	try{
		// consulta qual jogo vai ser editado
		$edita = $con->prepare(
		"SELECT * FROM tb_jogo WHERE idjogo = " . $codigo
		);
		// executar consulta
		$edita->execute();
		// perecorrer linhas e pegar o resultado
		foreach($edita as $linhas){
			$titulo = $linhas[1];
			$resumo = $linhas[2];
			$valor = $linhas[3];
			$sf = $linhas[4];
			$cs = $linhas[5];
		}
	}
	catch(Exception $e){
		echo "Erro: " . $e;
	}
	?>
		<input type="hidden" name="codigo"
		id="codigo" value="<?php echo $codigo; ?>">
			<fieldset>
				<legend>
					<label> &nbsp;&nbsp;Alteração de Jogo&nbsp;&nbsp; </label>
				</legend>
				<div class="conteudo-form">
                <br/>
                <br/>
				<table width="500">
					<tr>
						<td width="150"><label for="desc"> Título: </label></td>
						<td width="350"><input type="text" id="desc" name="desc" 
							   value="<?php echo $titulo; ?>" /></td>
                    </tr>
                    <tr>
						<td width="150"><label for="res"> Resumo: </label></td>
						<td width="350"><input type="text" id="res" name="res" 
							value="<?php echo $resumo; ?>" /></td>
                    </tr>
                    <tr>
						<td width="150"><label for="valor"> Preço (R$): </label></td>
						<td width="350"><input type="text" id="valor" name="valor" 
							value="<?php echo $valor; ?>" /></td>
                    </tr>
                    <tr>
                        <td width="150"><label for="cons"> Console: </label></td>
							<td width="350">
								<select name="console" id="console">
									
									<?php
										require_once('script/condb.php');
										try{
											$console = $con->prepare('
												SELECT * FROM tb_console ORDER BY fabricantecons, desccons
											');
											$console->execute();
											foreach($console as $linha){
												if ($cs == $linha[0]) {
													echo "<option value=".$linha[0].
													  " selected>".$linha[3] . " - " . $linha[1].
													  "</option>";
												}
												else{
													echo "<option value=".$linha[0].
													  ">".$linha[3] . " - " . $linha[1].
													  "</option>";
												}
											}
										}
										catch(Exception $e){
											echo $e;
										}
									?>
								</select>
							</td>
                    </tr>
                    <tr>
                        <td width="150"><label for="dev"> Desenvolvedora: </label></td>
							<td width="350">
							<select name="desenv" id="desenv">
							<?php
								try{
									$desenv = $con->prepare('
										SELECT * FROM tb_softhouse ORDER BY descsh
									');
									$desenv->execute();
									foreach($desenv as $linha){
										if($sf == $linha[0]){
											echo "<option value=".$linha[0].
												" selected>".$linha[1]."</option>";
										}
										else{
											echo "<option value=".$linha[0].
												">".$linha[1]."</option>";
										}
									}
								}
								catch(Exception $e){
									echo $e;
								}
							?>
							</select>
							</td>
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