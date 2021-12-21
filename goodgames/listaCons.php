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
		<h3> &nbsp;&nbsp;&nbsp;&nbsp;> Lista > Console </h3>
	</div>
	<div id="formulario" class="col1">
		<form method="post" action="#">
			<fieldset>
				<legend>
					<label> &nbsp;&nbsp;Lista de Consoles&nbsp;&nbsp; </label>
				</legend>
				<div class="conteudo-form">
                <br/>
                <br/>
                
				<table width="90%" border="1px">
                    <tr>
                        <td> Código </td>
                        <td> Descrição </td>
						<td> Fabricante </td>
						<td> Mídia </td>
                        <td> Editar </td>
                        <td> Excluir </td>
                    </tr>
				<?php
				require_once('script/condb.php');
				try{
					// criar sql de consulta
					$lista = $con->prepare(
						"SELECT * FROM tb_console ORDER BY desccons"
					);
					// executar consulta
					$lista->execute();
					// ler linhas da lista e criar tabela
					foreach($lista as $linhas){
						echo "<tr>
								<td> " . $linhas[0] . " </td>
								<td> " . $linhas[1] . " </td>
								<td> " . $linhas[3] . " </td>
								<td> " . $linhas[2] . " </td>
								<td> <a href='altCons.php?cod=" . $linhas[0] . "'> Editar </a> </td>
								<td> Exclui </td>
							  </tr>";
					}
				}
				catch(Exception $e){
					echo "Erro: " . $e;
				}
				?>	
                </table>
                
                <br/>
                <br/>
				</div>
			</fieldset>
			<fieldset>
				<div class="conteudo-form">
                    <br/>
					<input type="submit" id="enviar" name="enviar"
						   value="  Cadastrar  " class="bt-enviar" />	
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