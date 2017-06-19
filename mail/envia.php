<?php

// Inclui o arquivo class.phpmailer.php localizado na pasta class
require_once("class.phpmailer.php");

echo $area =$_POST['area'];
echo $name =$_POST['name'];
echo $email_para = $_POST['email'];
echo $phone = $_POST['phone'];
echo $mensagem = $_POST['message'];


if(empty($_POST['area'])        ||
   empty($_POST['name'])        ||
   empty($_POST['email'])       ||
   empty($_POST['phone'])       ||
   empty($_POST['message']) ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
     
      echo "Dados Incompletos";
    return false;
   }
  
echo $area = strip_tags(htmlspecialchars($_POST['area']));   
echo $name = strip_tags(htmlspecialchars($_POST['name']));
echo $email_para = strip_tags(htmlspecialchars($_POST['email']));
echo $phone = strip_tags(htmlspecialchars($_POST['phone']));
echo $mensagem = strip_tags(htmlspecialchars($_POST['message']));

echo $area.'<br>';
echo $name.'<br>';
echo $email_para;
echo '<br>';
echo $phone.'<br>';
echo $mensagem.'<br>';


// Inicia a classe PHPMailer
$mail = new PHPMailer(true);

$mail->SMTPDebug = 1;

// Define os dados do servidor e tipo de conex�o
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem ser� SMTP

try {
     $mail->Host = 'smtp-mail.outlook.com'; // Endere�o do servidor SMTP (Autentica��o, utilize o host smtp.seudom�nio.com.br)
     $mail->SMTPAuth   = true;  // Usar autentica��o SMTP (obrigat�rio para smtp.seudom�nio.com.br)
     $mail->Port       = 587; //  Usar 587 porta SMTP
     $mail->Username = 'andrerosa77@hotmail.com'; // Usu�rio do servidor SMTP (endere�o de email)
     $mail->Password = 'pepeleg@l1'; // Senha do servidor SMTP (senha do email usado)

     //Define o remetente
     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail->SetFrom('andrerosa77@hotmail.com', 'Nome'); //Seu e-mail
     $mail->AddReplyTo('andrerosa77@hotmail.com', 'Nome'); //Seu e-mail
     $mail->Subject = 'Contato Site';//Assunto do e-mail

     $mensagem = 'Voce tem uma mensagem do Site.<br>
                  Detalhes:<br>
                  �rea: '.$area.'<br>
                  Name: '.$name.'<br>
                  Email: '.$email_para.'<br>
                  Phone: '.$phone.'<br>
                  Mensagem: '.$mensagem.'<br>';


     //Define os destinat�rio(s)
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail->AddAddress($email_para, 'Teste Mail');

     //Campos abaixo s�o opcionais
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
     //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // C�pia Oculta
     //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo


     //Define o corpo do email
     $mail->MsgHTML($mensagem);

     ////Caso queira colocar o conteudo de um arquivo utilize o m�todo abaixo ao inv�s da mensagem no corpo do e-mail.
     //$mail->MsgHTML(file_get_contents('arquivo.html'));

     $mail->Send();
     //echo "Mensagem enviada com sucesso</p>\n";
     //echo mail($to,$email_subject,$email_body,$headers);
     return true;

    //caso apresente algum erro � apresentado abaixo com essa exce��o.
    }catch (phpmailerException $e) {
      echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer


}
?>