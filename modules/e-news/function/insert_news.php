<?php
	
	include "../../erw.php";
	require "../../mailer/PHPMailerAutoload.php";
	
	$mail_list = $_POST['email_list'];
	$title = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($_POST['title']) : mysql_escape_string($_POST['title']);
	$link =  function_exists("mysql_real_escape_string") ? mysql_real_escape_string($_POST['link']) : mysql_escape_string($_POST['link']);
	$mails = explode(' ', $mail_list);
	$clients = array();
	
	//echo "Daftar listing email<br/>";
	
	$index = 0;
	foreach($mails as $mail){
		$clients[$index] = $mail;
		$index++;
	}
	
	/* date time */
	$dt = getdate();
	$tgl = $dt['year'] ."-". $dt['mon'] . "-" . $dt['mday'];
	$hour = $dt['hours'] . ":" . $dt['minutes'] . ":" . $dt['seconds'];
	$dateCap = $tgl ." ". $hour;
	
	/* cek auto ID number */
	$cek = mysql_query("SELECT MAX(id_link) as 'jum' FROM shared_link") or die(mysql_error());
	$row = mysql_fetch_array($cek);
	if($row['jum'] <= 0){
		$id = 1;
	}else{
		$id = $row['jum'] + 1;
	}
	
	
		$q = mysql_query("SELECT * FROM alumni WHERE no_alumni = '". $_SESSION['no_alumni']. "'") or die(mysql_error());
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
		
		$body = "<center><h2>Kiriman Berita</h2></center><br/>
	        Saudara/i berbagi tautan berita dengan anda... <br/><br/>
			". $title ." <br/>
			" . $link ." <br/>
			Dikirim oleh ". $fullname .", pada ". $dateCap.".<br/>	
			";
	
	$subject = "KIRIMAN LINK INFO IKATI";
		  
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
					$mail->addAddress($clients, $clients);

					//Set the subject line
					$mail->Subject = $subject;
					
					//Read an HTML message body from an external file, convert referenced images to embedded,
					//convert HTML into a basic plain-text alternative body
					$mail->msgHTML(file_get_contents('../../mailer/examples/contents.html'), dirname(__FILE__));

					//Replace the plain text body with one created manually
					$mail->Body = $body;

		if(!$mail->send()) {
			//echo "Email : ".$email ."<br/>";
			//echo "Mailer Error: " . $mail->ErrorInfo;
?>
	
				<script language="javascript">
					alert("Gagal koneksi via email !!");
					document.location.href = "../../../index.php?mod=home&opt=user&opts=autonews";
				</script>
			
<?php
		}else{
		
		
		$sql = "INSERT INTO shared_link(id_link,no_alumni,links,tag_link,time_shared) 
				VALUES('$id','$no_alumni','$link','$title','$dateCap')";
			
			$query = mysql_query($sql); // query untuk insert data ke dalam tabel shared link
			
?>		
				<script language="javascript">
					alert("Proses registrasi selesai, silahkan cek email anda !!");
					document.location.href = "../../../index.php?mode=home&opt=main&opts=utama";
				</script>
			
<?php				
		}			
		
	
	