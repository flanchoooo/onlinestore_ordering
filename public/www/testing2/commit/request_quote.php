<?php
if(isset($_POST)) {

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$contact_number = $_POST['contact_number'];
$package = $_POST['postval'];


session_start();


                    require_once "../lib/phpmailer/PHPMailerAutoload.php";
					//PHPMailer Object
					$mail = new PHPMailer;

					//From email address and name
					$mail->From = "website@wts.co.zw";
					$mail->FromName = "WTS Website - Hardware";

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
					$line .= "A Hardware quote request has been submitted on the website by ".$name." for your attention.";
                    $line .= "<br/> ";
                    $line .= "<br/> ";
                    $line .= "Name : ".$name."<br/>";
                    $line .= "Surname : ".$surname."<br/>";
                    $line .= "Email : ".$email."<br/>";
                    $line .= "Contact number : ".$contact_number."<br/>";
                    $line .= "Hardware package : ".$package."<br/>";
                    $line .= "<br/> ";
                    $line .= "<br/> ";
					$mail->Subject = "WTS Website Hardware quote request";
					$mail->Body = $line;
					$mail->AltBody = "This is the plain text version of the email content";

					if(!$mail->send()) 
					{
					          header('Location: ../hardware');
							  $_SESSION['op_status'] = array('cls'=>'alert-danger', 'msg'=>'Quote request could not be sent, please try again later.');exit();
						//echo 'Enquiry could not be sent';
					} 
					else 
					{
						       header('Location: ../hardware');
							   $_SESSION['op_status'] = array('cls'=>'alert-success', 'msg'=>'Quote request sent successfully.');                               
                               exit();
                        // echo 'Enquiry sent successfullyt';
					}


										   
}

?>