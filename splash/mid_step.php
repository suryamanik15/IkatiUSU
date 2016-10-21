<?php
	$q = mysql_query("SELECT * FROM alumni WHERE no_alumni = '$no_alumni'") or die(mysql_error());
	$data = mysql_fetch_array($q);
?>
<div id="box">
		<center><b>TAHAP VALIDASI REGISTRASI IKATI</b></center><br/><br/>
		<center><img src="./images/button/ikati.png" width="150px" height="120px"/></center>
		<p class="confirm_p">
				Kepada Yth.<br/>
				Saudara <b><?php echo $data['nama']; ?></b>
				Sebagai tanda validasi dari tahap registrasi anda dalam keanggotaan IKATI USU.<br/>
				Silahkan Upload Foto Profil Anda.<br/>
		</p>
		<p>
			<form method="POST" action="modules/cek_validasi.php?user=<?php echo $data['no_alumni'];?>" id="frm_upload" name="upload" enctype="multipart/form-data">
				<table cellspacing="4">
					<tr>
						<td>Upload File Foto :</td>
						<td><input type="file" name="profpic">
						<span style="color:red;"><i>*Maksmum Ukuran Foto adalah 50 KB.</i></span>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" value="Upload Foto">
						</td>
					</tr>
				</table>
			</form>	
		</p>
		
	</div>