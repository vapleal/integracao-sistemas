<?php
/*
Script para cadastro de desenvolvedor de jogos
Data criação: 13/08/2019
Data alteração:
    Alteração / Correção

*/
    // usa script de conexão com o banco
    require_once("condb.php");
    // variaveis 
    $descricao = $_POST["desc"];

    // debug
    // echo $descricao; 
    try{
        $salvar = $con->prepare("INSERT INTO tb_softhouse 
                    (descsh) 
                    VALUES (:softhouse)");
        $salvar->execute(
            array(":softhouse" => $descricao)
        );
        
        if($salvar->rowCount() > 0){
            $integra = fopen('../integra/sh_insert.txt','w');
            fwrite($integra, $descricao);
            fclose($integra);
            echo "Dados salvos com sucesso!";
        }
        else{
            echo "Erro ao salvar dados!";
        }       
    }
    catch(Exception $e){
        echo "Erro ao salvar informações -> " . $e;
    }


?>