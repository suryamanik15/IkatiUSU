<?php 
	include "erw.php";
	require "mailer/PHPMailerAutoload.php";
	//include "/mail/class.phpmailer.php";

	$no_alumni = mysql_real_escape_string($_GET['user']);
	$encode = mysql_real_escape_string($_POST['encode']);
	$pass = md5($_POST['pass1']);
	
	$q = mysql_query("SELECT * FROM alumni WHERE no_alumni = '$no_alumni'") or die(mysql_error());
	$user = mysql_fetch_array($q);
	
	$fullname = $user['nama'];
	
	$exp = explode('@',$user['email']); //fetch data email
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
	//set the qr code file name
	$exp = explode('.', $user['profpic']);
	$fname = $exp[0];
	
	//<center><img src=\"./libraries/qrcode/temp/".$fname.".png\" width=\"202\" height=\"90\" /></center><br/><br/>
	
	$body = "<center><h2>Konfirmasi Pendaftaran Email</h2></center>
	         <center><h3>Ikatan Alumni Teknologi Informasi USU</h3></center><br/><br/>
			 Terima Kasih Atas Registrasinya Saudara <b>".$fullname."</b><br/>
			 Dengan Terdaftarnya saudara ke sistem IKATI, saudara sudah berpartisipasi dalam memajukan Ikatan Alumni TI USU.<br/>
			 Berikut merupakan username dan password login sistem anda :<br/><br/>
			 Username : <b>". $no_alumni ."</b> <br/>
             Password : <b>" . $_POST['pass1'] . "</b><br/>			 
			";
	
	$subject = "KONFIRMASI REGISTRASI PORTAL ALUMNI TI USU";
		  
		  //mail($to, $subject, $body,$headers);
		  //ganti baris ini dengan email yang dituju
		  $to = $user['email'];
		  
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
					$mail->msgHTML(file_get_contents('mailer/examples/contents.html'), dirname(__FILE__));

					//Replace the plain text body with one created manually
					$mail->Body = $body;

		if(!$mail->send()) {
			//echo "Email : ".$email ."<br/>";
			//echo "Mailer Error: " . $mail->ErrorInfo;
?>
	
				<script language="javascript">
					var usr_encode = "<?php echo $encode; ?>";
					alert("Gagal koneksi via email !!");
					document.location.href="../index.php?mod=home&opt=data&usr="+usr_encode;
				</script>
			
<?php
		}else{
			//echo "Pengiriman email sukses";
			$encode = base64_encode($no_alumni);
			$process = "Mid";
			$md = md5($_POST['pass1']);
			$update = mysql_query("UPDATE tbl_login SET password='$md' WHERE no_alumni = '$no_alumni'") or die(mysql_error());
		
?>		
	
				<script language="javascript">
					var usr_encode = "<?php echo $encode; ?>";
					var phase = "<?php echo $process; ?>";
					alert("Proses registrasi selesai, silahkan cek email anda !!");
					document.location.href="../index.php?mod=home&opt=data&usr=" +usr_encode+ "&phase="+phase;
				</script>
			
<?php				
		}			
		
?>			