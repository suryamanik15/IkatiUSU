<?php
	session_start();
	/* Set the image file name */
	$fecth = explode('.',$_SESSION['profpic']);
	//$filename = $fecth[0] . ".png";
	$fname = "reg_card" . $fecth[0] . '.pdf';
?>
<div id="judul_content"><h2>Cetak Kartu Registrasi Alumni</h2></div>
<br>
<ul>
	<center>
		<img src="./modules/card/image/pdf.jpg" width="100px" height="100px" style="margin-bottom:15px;"/><br/>
		<span style="font-size:20px; font-family:verdana; color:green;">
			Kartu Registrasi IKATI USU dari user dengan nomor alumni : <? echo $_SESSION['no_alumni'];?>.
		<span><br/>
		<span style="font-size:14px; font-family:verdana;">
			Silahkan Unduh Kartu Registrasi melalui link di bawah ini.<br/>
			<a href="./modules/card/link.php" target="_blank">Download Kartu</a>.<br/>
			
		</span>
	</center>
</ul>