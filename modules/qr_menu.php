<?
	/* Set the image file name */
	$fecth = explode('.',$_SESSION['profpic']);
	$filename = $fecth[0] . ".png";
?>
<div id="judul_content"><h2>QR Code Anda</h2></div>
<br>
<ul>
	
	<center>
		<img src="./libraries/qrcode/temp/<? echo $filename;?>' width="100px" height="100px" style="margin-bottom:15px;"/><br/>
		<span style="font-size:20px; font-family:verdana; color:green;">
			Nomor QR Code dari user <? echo $_SESSION['nama'];?> : <? echo $_SESSION['no_alumni'];?>.
		<span><br/>
		<span style="font-size:14px; font-family:verdana;">
			Silahkan Unduh image melalui link di bawah ini.<br/>
			<a href="<? echo './libraries/qrcode/temp/' . $filename;?>" target="_blank">Image QR Code</a>.<br/>
			<span style="font-size:11px; font-family:verdana;">File name : <i><? echo $filename;?></i></span>
		</span>
	</center>
</ul>