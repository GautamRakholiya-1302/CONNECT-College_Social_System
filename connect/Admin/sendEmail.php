<?php
		require '../PHPMailer-master/PHPMailerAutoload.php';
		function sendEmail($email, $username, $password){
				$mail = new PHPMailer();
				$mail->SMTPDebug = 0;
				$mail->isSMTP();
				$mail->Host = "smtp.gmail.com";
				$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );
				$mail->SMTPAuth = TRUE;
				$mail->Username = "connect1014@gmail.com";
				$mail->Password = "Ticweb@1986";
				$mail->SMTPSecure = "false";
				$mail->Port = 587;
				$mail->From = "connect1014@gmail.com";
				$mail->FromName = "connect";
				$mail->addAddress($email);
				$mail->isHTML(true);
				$mail->Subject ="For Your Log In";
				$mail->Body = "<h4><b>Your Username : </b></h4>".$username."<br><h4><b>Password : </b></h4>".base64_decode($password);
				$mail->AltBody = "This is the plain text version of the email content";
				
				if($mail->send())
				{
					return true;
				}
				else
				{
					return false;
				} 
			}
?>