<?php
/*
Script para alteração de console de jogos
Data criação: 27/08/2019
Data alteração:
    Alteração / Correção

*/
    // usa script de conexão com o banco
    require_once("condb.php");
    // variaveis 
    $descricao  = $_POST["desc"];
    $fabricante = $_POST["fab"];
    $midia      = $_POST["tpmidia"];
    $codigo     = $_POST["id"];
    // debug
    /*
     echo $descricao;
     echo $fabricante;
     echo $midia; 
    */
    try{
        $salvar = $con->prepare("UPDATE tb_console SET
                    desccons = :desccons, 
                    tpmidiacons = :tpmidiacons, 
                    fabricantecons = :fabricantecons 
                    WHERE idcons = :idcons");
        $salvar->execute(
            array(":desccons" => $descricao,
                  ":tpmidiacons" => $midia,
                  ":fabricantecons" => $fabricante,
                  ":idcons" => $codigo)
        );
        
        if($salvar->rowCount() > 0){
            echo "<script>
                    alert('Alteração efetuada com sucesso!');
                    window.location.href = 
                    'http://localhost/goodgames/listaCons.php';
                </script>";
        }
        else{
            echo "<script>
                    alert('Erro ao atualizar dados!');
                    window.location.href = 
                    'http://localhost/goodgames/listaCons.php';
                </script>";
        }       
    }
    catch(Exception $e){
        echo "Erro ao salvar informações -> " . $e;
    }
?>