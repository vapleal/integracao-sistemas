<?php
/*
Script de conexão com o banco
Data criação: 09/08/2019
Data de alteração: 13/08/2019
    Alteração: removido instrução select do script
               acrescentado instrução try / catch
               testada conexão e erro de conexão
*/
    try{
        $con = new PDO(
            'mysql:dbname=goodgames; host=localhost',
            'root',
            '');       
        /*
        if($con){
            echo "Conexão com o banco de dados.";
        }
        */
    }
    catch(Exception $e){
        echo "Erro ao conectar -> " . $e;       
    }
?>