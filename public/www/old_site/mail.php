<?php
$field_phone = $_POST['cf_fone'];
$field_pharmacy = $_POST['cf_pharmacy'];
$field_name = $_POST['cf_name'];

$field_email = $_POST['cf_email'];
$field_message = $_POST['cf_message'];

$mail_to = 'smutsiwegota@wts.co.zw';
$subject = 'Message wts website'.$field_name;

$body_message = 'From: '.$field_name."\n";
$body_message .= 'E-mail: '.$field_email."\n";

$body_message .= 'Message:'.$field_message."\n";


$headers = 'From: '.$field_email."\r\n";
$headers .= 'Reply-To: '.$field_email."\r\n";

$mail_status = mail($mail_to, $subject, $body_message, $headers);

if ($mail_status) { ?>
	<script language="javascript" type="text/javascript">
		
		window.location = 'contact_confirmation.html';
	</script>
<?php
}
else { ?>
	<script language="javascript" type="text/javascript">
		alert('Message failed. Please, try send another email');
		window.location = 'Contact.html';
	</script>
<?php
}
?>