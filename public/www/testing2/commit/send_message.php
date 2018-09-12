<?php
if(isset($_POST)) {

$cap = $_POST['cap'];
$name = $_POST['name'];
$number = $_POST['number'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

session_start();

		if ($cap == "137")
		{
		                    require_once "../lib/phpmailer/PHPMailerAutoload.php";
							//PHPMailer Object
							$mail = new PHPMailer;

							//From email address and name
							$mail->From = "website@wts.co.zw";
							$mail->FromName = "WTS Website Message";

							//To address and name
							$mail->addAddress("customercare@wts.co.zw");
							//$mail->addAddress("norman_nhando@yahoo.com"); //Recipient name is optional

							//Address to which recipient will reply
							$mail->addReplyTo("customercare@wts.co.zw", "Reply");

							//CC and BCC
							//$mail->addCC("cc@example.com");
							//$mail->addBCC("bcc@example.com");

							//Send HTML or Plain Text email
							$mail->isHTML(true);

							$line = "Dear WTS,";
							$line .= "<br/> ";
							$line .= "<br/> ";
							$line .= "A Message has been sent from the website by ".$name." for your attention.";
		                    $line .= "<br/> ";
		                    $line .= "<br/> ";
		                    $line .= "Name : ".$name."<br/>";
		                    $line .= "Contact Number : ".$number."<br/>";
		                    $line .= "Email : ".$email."<br/>";
		                    $line .= "Subject : ".$subject."<br/>";
		                    $line .= "Message : ".$message."<br/>";
		                    $line .= "<br/> ";
		                    $line .= "<br/> ";
							$mail->Subject = "WTS Website Message - ".$subject;
							$mail->Body = $line;
							$mail->AltBody = "This is the plain text version of the email content";

							if(!$mail->send()) 
							{
							          header('Location: ../contact');
									  $_SESSION['op_status'] = array('cls'=>'alert-danger', 'msg'=>'Message could not be sent, please try again later.');exit();
								//echo 'Enquiry could not be sent';
							} 
							else 
							{
								       header('Location: ../contact');
									   $_SESSION['op_status'] = array('cls'=>'alert-success', 'msg'=>'Message sent successfully.');                               
		                               exit();
		                        // echo 'Enquiry sent successfullyt';
							}

		}
		else {
			  header('Location: ../contact');
		      $_SESSION['op_status'] = array('cls'=>'alert-danger', 'msg'=>'Invalid request');exit();
		}
										   
}

?>