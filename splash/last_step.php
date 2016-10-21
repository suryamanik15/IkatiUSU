<?php
	$q = mysql_query("SELECT * FROM alumni WHERE no_alumni = '$no_alumni'") or die(mysql_error());
	$data = mysql_fetch_array($q);
?>
<div id="box">
		<center><b>KONFIRMASI REGISTRASI IKATI USU</b></center><br/><br/>
		<center><img src="./images/button/ikati.png" width="150px" height="120px"/></center>
		<p class="confirm_p">
				Kepada Yth.<br/>
				Saudara <b><?php echo $data['nama']; ?></b>
				Registrasi Anda Sudah Selesai dan Berhasil di Proses.<br/>
				Silahkan Cek Konfirmasi Registrasi Alumni Anda di Email.<br/>
				Email Address : <a href="mailto:<?php echo $data['email'];?>"><?php echo $data['email']; ?></a>.<br/><br/><br/>
				
				Terima Kasih dan Silahkan Invite Kembali Kawan-kawan Alumni Kita.<br/>
				Yang Belum Melakukan Registrasi..<br/>
				Silahkan Login ke Dalam Sistem di <a href="./">Sini</a>.<br/>
		</p>
		
	</div>