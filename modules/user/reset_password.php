<?php

	include "../erw.php";
	require "../mailer/PHPMailerAutoload.php";
	
	$no_alumni = mysql_real_escape_string($_POST['nim']);
	$o_pass = mysql_real_escape_string($_POST['old_password']);
	$n_pass = mysql_real_escape_string($_POST['pass1']);
	$c_new = mysql_real_escape_string($_POST['pass2']);
	
	/* cek query if same */
	$hash = md5($o_pass);
	$cek = mysql_query("SELECT * FROM tbl_login WHERE no_alumni = '$no_alumni' AND password = '$hash'");
	$num = mysql_num_rows($cek);
	
	if($num != 1){
?>	
		<script>
			alert('Maaf, password lama anda salah !!');
			document.location.href = "../../index.php?mod=home&opt=reset";
		</script>
<?	
		exit;
	}else if($n_pass != $c_new){
?>
		<script>
			alert('Konfirmasi password anda salah !!');
			document.location.href = "../../index.php?mod=home&opt=reset";
		</script>
	
<?	
		exit;
	}
	
	$row = mysql_fetch_array($cek);
	$email = $row['email'];
	$fullname = $row['nama'];
	
	$exp = explode('@',$email); //fetch data email
	$getTLD = $exp[1];
	
	if($getTLD == "gmail.com"){
		$p = 465;
		$h = "ssl://smtp.gmail.com";
	}else if($getTLD == "yahoo.com"){
		$p = 465;
		$h = "ssl://smtp.mail.yahoo.com";	
	}else if($getTLD == "outlook.com"){
		$p = 995;
		$h = "ssl://smtp.live.com";
	}else if($getTLD == "hotmail.com"){
		$p = 465;
		$h = "ssl://smtp.live.com";
	}
	
	$body = "<center><h2>Konfirmasi Pergantian Password</h2></center>
	         <center><h3>Ikatan Alumni Teknologi Informasi USU</h3></center><br/><br/>
			 Saudara/i <b>" .$fullname. "</b>, anda telah melakukan perubahan password akun IKATI USU<br/>
			 Berikut merupakan username dan password login sistem anda yang baru :<br/><br/>
			 Username : <b>". $no_alumni ."</b> <br/>
             Password : <b>" . $n_pass . "</b><br/>			 
			";
	
		$subject = "RESET PASSWORD AKUN IKATI USU MEDAN";
		  
		  //mail($to, $subject, $body,$headers);
		  //ganti baris ini dengan email yang dituju
		  $to = $email;
		  
		  //ganti dengan emailmu /email resmi website
		  $from = "ikati.usumedan@gmail.com";
		  $host = $h;
		  $port = $p;
		  //emailmu untuk login ke gmail
		  $usr = "ikati.usumedan@gmail.com";
		   
			//passwordmu waktu login gmail
			$password = "ikatiusu";
		 
		
					//Create a new PHPMailer instance
					$mail = new PHPMailer;

					//Tell PHPMailer to use SMTP
					$mail->isSMTP();

					//Enable SMTP debugging
					// 0 = off (for production use)
					// 1 = client messages
					// 2 = client and server messages
					$mail->SMTPDebug = 0;

					//Ask for HTML-friendly debug output
					$mail->Debugoutput = 'html';

					//Set the hostname of the mail server
					$mail->Host = $host;

					//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
					$mail->Port = $port;

					//Set the encryption system to use - ssl (deprecated) or tls
					$mail->SMTPSecure = 'ssl';

					//Whether to use SMTP authentication
					$mail->SMTPAuth = true;

					//Username to use for SMTP authentication - use full email address for gmail
					$mail->Username = $usr;

					//Password to use for SMTP authentication
					$mail->Password = $password;

					//Set who the message is to be sent from
					$mail->setFrom($usr, 'IKATI USU MEDAN');

					//Set an alternative reply-to address
					$mail->addReplyTo($usr, 'IKATI USU MEDAN');

					//Set who the message is to be sent to
					$mail->addAddress($to, $fullname);

					//Set the subject line
					$mail->Subject = $subject;
					
					//Read an HTML message body from an external file, convert referenced images to embedded,
					//convert HTML into a basic plain-text alternative body
					$mail->msgHTML(file_get_contents('../mailer/examples/contents.html'), dirname(__FILE__));

					//Replace the plain text body with one created manually
					$mail->Body = $body;

		if(!$mail->send()) {
			//echo "Email : ".$email ."<br/>";
			//echo "Mailer Error: " . $mail->ErrorInfo;
?>
	
				<script language="javascript">
					alert("Gagal koneksi via email !!");
					document.location.href="../../index.php?mod=home&opt=reset";
				</script>
			
<?php
		}else{
			$newPass = md5($c_new);
			mysql_query("UPDATE tbl_login SET password = '$newPass' WHERE no_alumni = '$no_alumni'") or die(mysql_error());
?>		
	
				<script language="javascript">
					alert("Reset Password berhasil, silahkan cek email anda !!");
					document.location.href="../../index.php?mod=home&opt=reset&confirm=success";
				</script>
			
<?php				
		}			
		
?>			
	