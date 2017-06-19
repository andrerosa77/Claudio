<?php
// Check for empty fields

if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
     
	  echo "Dados Incompletos";
	return false;
   }
   
	
echo $name = strip_tags(htmlspecialchars($_POST['name']));
echo $email_address = strip_tags(htmlspecialchars($_POST['email']));
echo $phone = strip_tags(htmlspecialchars($_POST['phone']));
echo $message = strip_tags(htmlspecialchars($_POST['message']));


echo $name.'<br>';
echo $email_address.'<br>';
echo $phone.'<br>';
echo $message.'<br>';
	
// Create the email and send the message
$to = 'andrerosa77@hotmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contato do Site:  $name";
$email_body = "Voce tem uma mensagem do Site.\n\n"."Detalhes:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: andrerosa77@hotmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
echo mail($to,$email_subject,$email_body,$headers);
return true;			
?>
