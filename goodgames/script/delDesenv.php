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
    $codigo = $_POST["id"];
    // debug
    // echo $descricao; 
    try{
        $salvar = $con->prepare("DELETE FROM tb_softhouse
                                WHERE idsh = :idsh");
        $salvar->execute(
            array(":idsh" => $codigo)
        );
        
        if($salvar->rowCount() > 0){
            echo "Exclusão efetuada com sucesso!";
        }
        else{
            echo "Erro ao excluir dados!"
             . print_r($salvar->errorInfo());
        }       
    }
    catch(Exception $e){
        echo "Erro ao salvar informações -> " . $e;
    }


?>