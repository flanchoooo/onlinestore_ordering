<?php


$cap = $_POST['cap'];
$name = $_POST['name'];
$number = $_POST['number'];
$company = $_POST['company'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if ($cap == "137")
{
//$strTo = 'info@genesisenergygroup.net';
$strTo = 'norman_nhando@yahoo.com';  
$strSubject = 'WTS website enquiry - '. $subject;



$strMessage  = 'Dear WTS'."\n";
$strMessage .= ''."\n";
$strMessage .= 'A Message has been sent from the website by '.''.$name.''.''.' with the following details'."\n";
$strMessage .= ''."\n";
$strMessage .= 'Name : '.$name."\n";
$strMessage .= 'Number : '.$number."\n";
$strMessage .= 'Email : '.$email."\n";
$strMessage .= 'Message: '.$message."\n";
$strMessage .= ''."\n";

$strMessage2  = nl2br($strMessage);

//*** Uniqid Session ***//  
$strSid = md5(uniqid(time()));  
  
$strHeader = "";  
$strHeader .= "From: ".$_POST["name"]."<".$_POST["name"].">\nReply-To: ".$_POST["email"]."";  
  
$strHeader .= "MIME-Version: 1.0\n";  
$strHeader .= "Content-Type: multipart/mixed; boundary=\"".$strSid."\"\n\n";  
$strHeader .= "This is a multi-part message in MIME format.\n";  
  
$strHeader .= "--".$strSid."\n";  
$strHeader .= "Content-type: text/html; charset=utf-8\n";  
$strHeader .= "Content-Transfer-Encoding: 7bit\n\n";  
$strHeader .= $strMessage2."\n\n";

  
$flgSend = @mail($strTo,$strSubject,null,$strHeader);  // @ = No Show Error //  
  
if($flgSend)
{  

header('location: ../contact?success=ok#order');

}

}

else {
    header('location: ../contact?success=error#order');
}

?>