<?php
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST['submit']))
	{
		if(!empty($_POST['fname']) and !empty($_POST['lname']) and !empty($_POST['email']) and !empty($_POST['subject']) and !empty($_POST['message']))
		{

			$mail = new PHPMailer();

			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'asdasdasd@gmail.com'; //tu correo
			$mail->Password = 'asdasdasd'; // tu pass
			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;

			$mail->setFrom('ed.alvarz@gmail.com', 'web');// el correo desde donde se envia
			$mail->addAddress('ed.alvarz@gmail.com', 'Edgar'); // el que recibe

			$mail->Subject = 'Test Email via Mailtrap SMTP using PHPMailer';
			$mail->isHTML(true);
			$mailContent ="<p>name: ".$_POST['fname']."</p>
							<p>last name: ".$_POST['lname']."</p>
							<p>email: ".$_POST['email']."</p>
			    			<p>subject: ".$_POST['subject']."</p>
			    			<p>message: ".$_POST['message']."</p>";
			$mail->Body = $mailContent;

			if($mail->send()){
			    echo 'Message has been sent';
			}else{
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			}
		}
	}
	else{
	//redirecciona al index
	}
}
?>