<?php
if(isset($_POST)) {

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$contact_number = $_POST['contact_number'];
$company = $_POST['company'];
$title = $_POST['company_title'];
$package = $_POST['postval'];
$demo_request = $_POST['demo_request'];

session_start();


                    require_once "../lib/phpmailer/PHPMailerAutoload.php";
					//PHPMailer Object
					$mail = new PHPMailer;

					//From email address and name
					$mail->From = "website@wts.co.zw";
					$mail->FromName = "WTS Website Enquiry";

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
					$line .= "A Software enquiry has been submitted on the website by ".$name." for your attention.";
                    $line .= "<br/> ";
                    $line .= "<br/> ";
                    $line .= "Name : ".$name."<br/>";
                    $line .= "Surname : ".$surname."<br/>";
                    $line .= "Email : ".$email."<br/>";
                    $line .= "Contact number : ".$contact_number."<br/>";
                    $line .= "Company : ".$company."<br/>";
                    $line .= "Title : ".$title."<br/>";
                    $line .= "Software package : ".$package."<br/>";
                    $line .= "Demo request : ".$demo_request."<br/>";
                    $line .= "<br/> ";
                    $line .= "<br/> ";
					$mail->Subject = "WTS Website Enquiry";
					$mail->Body = $line;
					$mail->AltBody = "This is the plain text version of the email content";

					if(!$mail->send()) 
					{
					          header('Location: ../our_software');
							  $_SESSION['op_status'] = array('cls'=>'alert-danger', 'msg'=>'Enquiry could not be sent');exit();
						//echo 'Enquiry could not be sent';
					} 
					else 
					{
						       header('Location: ../our_software');
							   $_SESSION['op_status'] = array('cls'=>'alert-success', 'msg'=>'Enquiry sent successfully');                               
                               exit();
                        // echo 'Enquiry sent successfullyt';
					}


										   
}

?>