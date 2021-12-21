<?php
/*
Script para cadastro de console de jogos
Data criação: 13/08/2019
Data alteração:
    Alteração / Correção

*/
    // usa script de conexão com o banco
    require_once("condb.php");
    // variaveis 
    $descricao  = $_POST["desc"];
    $fabricante = $_POST["fab"];
    $midia      = $_POST["tpmidia"];
    // debug
    /*
     echo $descricao;
     echo $fabricante;
     echo $midia; 
    */
    try{
        $salvar = $con->prepare("INSERT INTO tb_console 
                    (desccons, tpmidiacons, fabricantecons) 
                    VALUES
                    (:desccons, :tpmidiacons, :fabricantecons)");
        $salvar->execute(
            array(":desccons" => $descricao,
                  ":tpmidiacons" => $midia,
                  ":fabricantecons" => $fabricante)
        );
        
        if($salvar->rowCount() > 0){
            echo "<script>
                    alert('Dados salvos com sucesso!');
                    window.location.href = 
                    'http://localhost/goodgames/cadConsole.html';
                </script>";
        }
        else{
            echo "<script>
                    alert('Erro ao salvar dados!');
                    window.location.href = 
                    'http://localhost/goodgames/cadConsole.html';
                </script>";
        }       
    }
    catch(Exception $e){
        echo "Erro ao salvar informações -> " . $e;
    }
?>