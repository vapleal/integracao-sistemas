<?php
    // chamar arquivo externo
    require_once('Mailer\PHPMailerAutoload.php');
    require_once('script\conf.php');
    // instância de classe PHPMailer
    $mailer = new PHPMailer();

    echo "Página de envio de e-mail</br></br>";
    // Variaveis do formulário de e-mail
    $nome           = $_POST["nome"];
    $idade          = $_POST["idade"];
    $email          = $_POST["email"];
    $rua            = $_POST["rua"];
    $estado         = $_POST["estado"];
    $cidade         = $_POST["cidade"];
    $sexo           = $_POST["sexo"];
    $escolaridade   = $_POST["escolaridade"];
    // checkbox
    if (!isset($_POST["sp1"])){
        $sp1 = "";
    }
    else {
        $sp1 = $_POST["sp1"];
    }
    if (!isset($_POST["sp2"])) :
        $sp2 = "";
    else :
        $sp2 = $_POST["sp2"];
    endif;
    if (!isset($_POST["sp3"])){
        $sp3 = "";
    }
    else {
        $sp3 = $_POST["sp3"];
    }
    if (!isset($_POST["n64"])){
        $n64 = "";
    }
    else {
        $n64 = $_POST["n64"];
    }
    if (!isset($_POST["nwi"])){
        $nwi = "";
    }
    else {
        $nwi = $_POST["nwi"];
    }
    if (!isset($_POST["nwu"])){
        $nwu = "";
    }
    else {
        $nwu = $_POST["nwu"];
    }

    // exibição dos dados
    /*
    echo "</br>" . $nome;
    echo "</br>" . $idade;
    echo "</br>" . $email;
    echo "</br>" . $rua;
    echo "</br>" . $estado;
    echo "</br>" . $cidade;
    echo "</br>" . $sexo;
    echo "</br>" . $escolaridade;
    echo "</br>" . $sp1;
    echo "</br>" . $sp2;
    echo "</br>" . $sp3;
    echo "</br>" . $n64;
    echo "</br>" . $nwi;
    echo "</br>" . $nwu;
*/
    // mensagem do e-mail
    $mensagem  = "<html><body>";
    $mensagem .= "Nome: " . $nome . "<br/>";
    $mensagem .= "Idade: " . $idade . "<br/>";
    $mensagem .= "E-mail: " . $email . "<br/>";
    $mensagem .= "Endereço: " . $rua . "<br/>";
    $mensagem .= "</body></html>";

    // Envio dos dados
        // Dados de conexão com o servidor
    $mailer->isSMTP(); // protocolo de envio de e-mail
    $mailer->SMTPAuth = true;
    //$mailer->SMTPDebug  = 2;
    $mailer->Host = HOSTENVIO; // host de envio do gmail
    $mailer->Username = EMAIL; // seu e-mail
    $mailer->Password = ''; // senha do e-mail
    $mailer->SMTPSecure = "tls"; // criptografia dos dados
    $mailer->Port = 587; // porta de conexão do protocolo
        // dados de envio
    $mailer->setFrom(EMAIL);
    $mailer->addAddress(EMAIL, $nome);
    $mailer->AddReplyTo($email);
        // dados do formulário
    $mailer->IsHTML(true);
    $mailer->Subject = "Contato: " . $nome;
    $mailer->Body = $mensagem;

    if (!$mailer->Send()){
        echo "</br></br>Não funcionou</br>";
        echo $mailer->ErrorInfo;
    }
    else{
        //echo "</br></br>Funcionou";
        echo "
            <script> 
            alert('Obrigado pelo contato!');
            window.location.href = 'http://localhost/Projeto1';
            </script>
        ";
    }
?>