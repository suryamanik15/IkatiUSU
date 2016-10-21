<?php
	$q = mysql_query("SELECT * FROM alumni WHERE no_alumni = '$no_alumni'") or die(mysql_error());
	$data = mysql_fetch_array($q);
	$encode = base64_encode($data['no_alumni']);
?>
<div id="box">
		<center><b>KONFIRMASI REGISTRASI ALUMNI</b></center><br/><br/>
		<center><img src="./images/button/ikati.png" width="150px" height="120px"/></center>
		<p class="confirm_p">
				Kepada Yth.<br/>
				Saudara <b><?php echo $data['nama']; ?></b>
				Registrasi Tahap Pertama Anda telah selesai.<br/>
				Silahkan Masukkan Password Anda Untuk Keperluan Login Akun Anda.<br/><br/>
				
				Silahkan Konfirmasi Password Anda Pada Form Dibawah ini.<br/>
		</p>
		<p>
			<form method="POST" action="modules/password.php?user=<?php echo $data['no_alumni'];?>" id="frm_password" name="password">
				<table cellspacing="4">
					<tr>
						<td>Password</td>
						<td><input type="hidden" name="encode" value="<?php echo $encode; ?>">
						<input type="password" name="pass1"></td>
					</tr>
					<tr>
						<td>Konfirmasi Passwod</td>
						<td><input type="password" name="pass2"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td colspan="2"><input type="submit" value="Submit">
						<input type="reset" value="Reset"></td>
					</tr>
				</table>
			</form>	
		</p>
	</div>