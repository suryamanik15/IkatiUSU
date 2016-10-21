<?
	require 'PHPMailerAutoload.php';
	$to = $_POST['to'];
	$pesan = $_POST['pesan'];
	
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'ssl://smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 465;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'ssl';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "msc2015fmipausu@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "ikatiusu";

//Set who the message is to be sent from
$mail->setFrom('ikati.usumedan@gmail.com', 'IKATI USU');

//Set an alternative reply-to address
$mail->addReplyTo('ikati.usumedan@gmail.com', 'IKATI USU');

//Set who the message is to be sent to
$mail->addAddress($to, 'Surya');

//Set the subject line
$mail->Subject = 'TEST AJA';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('examples/contents.html'), dirname(__FILE__));

//Replace the plain text body with one created manually
$mail->Body = $pesan;

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>

<html>
<head>
	<title>FORM TEST EMAIL</title>
</head>
<body>
	<form action="index.php" method="POST">
		<table border="0">
			<tr>
				<td>Email Tujuan</td>
				<td> : </td>
				<td><input type="text" name="to"/></td>
			</tr>
			<tr>
				<td>Pesan</td>
				<td> : </td>
				<td><input type="text" name="pesan"/></td>
			</tr>
			<tr>
				<td colspan="3"><input type="submit" value="Submit"/></td>
			</tr>
		</table>
	</form>
</body>
</html>