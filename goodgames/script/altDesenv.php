<?php
/*
Script para alteração de desenvolvedor de jogos
Data criação: 27/08/2019
Data alteração:
    Alteração / Correção

*/
    // usa script de conexão com o banco
    require_once("condb.php");
    // variaveis 
    $descricao = $_POST["desc"];
    $codigo = $_POST["id"];
    // debug
    // echo $descricao; 
    try{
        $salvar = $con->prepare("UPDATE tb_softhouse SET 
                    descsh = :softhouse
                    WHERE idsh = :idsh");
        $salvar->execute(
            array(":softhouse" => $descricao,
                  ":idsh" => $codigo)
        );
        
        if($salvar->rowCount() > 0){
            echo "Alteração efetuada com sucesso!";
        }
        else{
            echo "Erro ao alterar dados!";
        }       
    }
    catch(Exception $e){
        echo "Erro ao salvar informações -> " . $e;
    }


?>