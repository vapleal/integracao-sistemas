<?php
require_once('condb.php');

$titulo  = $_POST['desc'];
$resumo  = $_POST['res'];
$valor   = $_POST['valor'];
$desenv  = $_POST['desenv'];
$console = $_POST['console'];

// debug
/*
echo $titulo . "<br/>" .
     $resumo . "<br/>" .
     $valor  . "<br/>" .
     $desenv . "<br/>" .
     $console . "<br/>";
*/
    try{
        $salvar = $con->prepare('
            INSERT INTO tb_jogo 
             (titulojogo, resumojogo, valorjogo, 
              fk_softhouse, fk_console)
            VALUES
             (:titulojogo, :resumojogo, :valorjogo, 
              :fk_softhouse, :fk_console)
        ');
        $salvar->execute(
            array(
                ':titulojogo'=>$titulo, 
                ':resumojogo'=>$resumo, 
                ':valorjogo'=>$valor, 
                ':fk_softhouse'=>$desenv, 
                ':fk_console'=>$console
            )
        );
        // testar se os dados foram salvos no banco
        if($salvar->rowCount() > 0) {
            echo "
                <script>
                    alert('Dados salvos com sucesso!');
                    window.location.href = 
                    'http://localhost/goodgames/cadJogo.php';
                </script>
            ";
        } else {
            echo "
            <script>
                alert('Erro ao salvar!');
            </script>";
            print_r($salvar->errorInfo());
        }
    }
    catch(Exception $e){
        echo "
            <script>
                alert('Erro ao salvar\n'".$e.");
                window.location.href = 
                 'http://localhost/goodgames/cadJogo.php';
            </script>
        ";        
    }
?>