<?php 
	include "erw.php";
	
	
	// all of GET data
	$konfirmasi = mysql_real_escape_string($_GET['confirm']);
	$user = mysql_real_escape_string($_GET['usr']);
	//$en_p = mysql_real_escape_string($_GET['phase']);
	$no_alumni = base64_decode($user);
	//$phase = $en_p;
?>
<html>
<head>
	<title> FORM REGISTRASI ALUMNI </title>

<style type="text/css">
#box{
	width:960px;
	margin:auto;
	padding:50px;
	border:1px solid rgba(0,0,0,0.2);
	box-shadow: 5px 5px 5px rgba(0,0,0,0.5);
	background: #EAEAEA;
	text-align:justify;
}
#statper, #statper1, #statper2, #statper3, #statper4{
	display:none;
}
.confirm_p{
	font-size:21px; 
}
</style>
<script type="text/javascript" src="./modules/jquery-1.7.2.js"></script>
<script>
	$(document).ready(function(){
		$("input[name=opstat]").click(function(){
			var op = $(this).val();
			if(op == "Ya"){
				$("#statper").fadeIn(700);
				for(i=1; i <=4; i++){
					$("#statper"+i).fadeIn(700);
				}
			}else if(op == "No"){
				$("#statper").fadeOut(700);
				for(i=1; i <=4; i++){
					$("#statper"+i).fadeOut(700);
				}
			}
		});
		
		$('#frm_registrasi').submit(function(){
			var nim = document.register.nim.value;
			var nama = document.register.nama.value;
			var tmp_lahir = document.register.tmp_lahir.value;
			var hp = document.register.hp.value;
			var email = document.register.email.value;
			if(nim == ""){
				alert("Maaf Nim anda masih kosong !!");
				return false;
			}else if(nama == ""){
				alert("Maaf Field Nama Lengkap anda masih kosong !!");
				return false;
			}else if(tmp_lahir == ""){
				alert("Maaf Field tempat lahir jangan dikosongkan !!");
				return false;
			}else if(isNaN(hp)){
				alert("Maaf no Hp harus berupa digit atau angka!!");
				return false;
			}else if(hp == ""){
				alert("Maaf Field No Hp jangan kosong !!");
				return false;
			}else if(email == ""){
				alert("Maaf Field Email jangan dikosongkan !!");
				return false;
			}
			
		});
		
		/* aksi ketika form upload file disubmit */
		/*
		$('#frm_upload').submit(function(){
			var files = document.upload.profpic.value;
			if(files){
				alert('Maaf, File harus anda upload !!');
				return false;
			}
		});
		*/
	});
</script>
</head>
<body>
<?php
if(isset($konfirmasi) && $konfirmasi == "true"){
	$q = mysql_query("SELECT * FROM alumni WHERE no_alumni = '$no_alumni'") or die(mysql_error());
	$data = mysql_fetch_array($q);
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
			<form method="POST" action="modules/password.php?user=<?php echo $data['no_alumni'];?>">
				<table cellspacing="4">
					<tr>
						<td>Password</td>
						<td><input type="hidden" name="encode" value="<?php echo $en_p; ?>">
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
<?php
}else if($_GET['phase'] == "last"){
	/* Fetch data from database */
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
		
<?php
}else if($_GET['phase'] == "Mid"){
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

<?
}else if($_GET['phase'] == "Step_One"){
?>	
<div id="box">
<center>
<b>
FORM REGISTRASI ALUMNI</br>
PROGRAM STUDI TEKNOLOGI INFORMASI<br>
UNIVERSITAS SUMATERA UTARA<br>
</b></center>
</br></br>
<center>
<image src="./images/button/ikati.png" width="220" height="200" />
</center><br/><br/>
Kepada Yth.<br>
Saudara/i Alumni Program Studi Teknologi Informasi<br>
Universitas Sumatera Utara<br>
di<br>
Tempat<br>

<p>
Saudara alumni yang terhormat. Semoga Saudara dalam keadaan sehat dan sukses selalu. Guna keperluaan peningkatan hubungan baik antar sesama alumni, alumni dengan para mahasiswa yang masih aktif, oleh sebab itu dibuatlah portal alumni TI (SIKATI) USU. Untuk Saudara yang belum mendaftarkan dirinya ke Sistem ini bisa registrasi ke form registrasi di bawah ini. 
</p>
<br>

<form method="POST" action="./index.php?mod=home&opt=RegAlumni" enctype="multipart/form-data" id="frm_registrasi" name="register">
<table cellspacing="4">
<tr>
  <td>NIM</td>
  <td><input type="text" name="nim" value="<?php echo $nim = isset($_POST['nim']) ? $_POST['nim'] : ""; ?>" onChange="return checkNim();">
  <span style="color:red;"><i>*</i></span></td>
</tr>
<tr>
	<td>Nama Alumni</td>
	<td><input type="text" name="nama" value="<?php echo $nama = isset($_POST['nama']) ? $_POST['nama'] : ""; ?>">
	<span style="color:red;"><i>*</i></span>
	</td>
</tr>
<tr>
	<td>Tempat Lahir</td>
	<td><input type="text" name="tmp_lahir" value="<?php echo $tmp = isset($_POST['tmp_lahir']) ? $_POST['tmp_lahir'] : ""; ?>">
	<span style="color:red;"><i>*</i></span>
	</td>
</tr>
<tr>
	<td>Tanggal Lahir</td>
	<td><select name="year">
		<?php
			$cY = date('Y');
			for($y = 1950; $y <= $cY; $y++){
				echo "<option value=\"$y\">$y</option>";
			}
		?>	
		</select>&nbsp;
		<select name="month">
		<?php
			for($m = 1; $m <= 12; $m++){
				if($m < 10){	
					echo "<option value=\"$m\">0".$m."</option>";
				}else{
					echo "<option value=\"$m\">$m</option>";
				}	
			}
		?>	
		</select>&nbsp;
		<select name="day">
		<?php
			for($d = 1; $d <= 31; $d++){
				if($d < 10){	
					echo "<option value=\"$d\">0".$d."</option>";
				}else{
					echo "<option value=\"$d\">$d</option>";
				}	
			}
		?>	
		</select>&nbsp;
	</td>
</tr>
<tr>
	<td>Jenis Kelamin</td>
	<td><input type="radio" name="jenkel" value="Pria">Pria&nbsp;
		<input type="radio" name="jenkel" value="Wanita">Wanita
	</td>
	
</tr>
<tr>
	<td>Angkatan/Stambuk</td>
    <td><label for="textfield"></label>
      <select name="angkatan" id="angkatan">
<?php
			for($stam = 2007; $stam <= date('Y'); $stam++){
				echo "<option value=\"$stam\">$stam</option>";
			}
?>
      </select></td>
</tr>
<tr>
	<td>Tahun Lulus</td>
    <td><select name="tahun_lulus">
		<?php
			for($y = 2011; $y <= date('Y'); $y++){
				echo "<option value=\"$y\">$y</option>";
			}
		?>	
      </select></span>
      </td>
</tr>
<tr>
  <td>Alamat</td>
  <td>
    <textarea name="alamat" cols="45" rows="5"><?php echo $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';?></textarea>
	<span style="color:red;"><i>*</i></span>
	</td>
</tr>
<tr>
  <td>Kelurahan</td>
  <td>
    <input type="text" name="kelurahan" value="<?php echo $kel = isset($_POST['kelurahan']) ? $_POST['kelurahan'] : ""; ?>">
	<span style="color:red;"><i>*</i></span>
	</td>
</tr>
<tr>
  <td>Kecamatan</td>
  <td>
    <input type="text" name="kecamatan" value="<?php echo $kcm = isset($_POST['kecamatan']) ? $_POST['kecamatan'] : ""; ?>">
	<span style="color:red;"><i>*</i></span>
	</td>
</tr>
<tr>
  <td>Provinsi</td>
  <td>
    <input type="text" name="provinsi" value="<?php echo $prov = isset($_POST['provinsi']) ? $_POST['provinsi'] : ""; ?>">
	<span style="color:red;"><i>*</i></span>
	</td>
</tr>
<tr>
  <td>Kabupaten/kota</td>
  <td>
    <input type="text" name="kk" value="<?php echo $kk = isset($_POST['kk']) ? $_POST['kk'] : ""; ?>">
	<span style="color:red;"><i>*</i></span>
	</td>
</tr>
<tr>
  <td>No. Handphone</td>
  <td>
    <input type="text" name="hp" value="<?php echo $hp = isset($_POST['hp']) ? $_POST['hp'] : ""; ?>">
	<span style="color:red;"><i>*</i></span>
	</td>
</tr>
<tr>
  <td>No. Telepon</td>
  <td><input type="text" name="telp" value="<?php echo $telp = isset($_POST['telp']) ? $_POST['telp'] : ""; ?>"></td>
</tr>
<tr>
  <td>Email</td>
  <td><input type="text" name="email" value="<?php echo $email = isset($_POST['email']) ? $_POST['email'] : ""; ?>">
  <span style="color:red;"><i>*</i></span>
  </td>
</tr>
<tr>
  <td>Pekerjaan</td>
  <td><input type="text" name="kerja" value="<?php echo $job = isset($_POST['kerja']) ? $_POST['kerja'] : ""; ?>"></td>
</tr>
<tr>
	<td>Status Bekerja</td>
	<td><input type="radio" name="opstat" value="Ya">Bekerja&nbsp;
		<input type="radio" name="opstat" value="No">Tidak Bekerja
	</td>
</tr>
	<tr id="statper">
		<td>Nama Perusahaan</td>
		<td><input type="text" name="nama_per" value="<?php echo $per = isset($_POST['nama_per']) ? $_POST['nama_per'] : ""; ?>"></td>
	</tr>
	<tr id="statper1">
		<td>Alamat</td>
		<td><input type="text" name="alamat_per" value="<?php echo $alamat = isset($_POST['alamat_per']) ? $_POST['alamat_per'] : ""; ?>"></td>
	</tr>
	<tr id="statper2">
		<td>Telp/Fax/Email</td>
		<td><input type="text" name="kom_per" value="<?php echo $kom = isset($_POST['kom_per']) ? $_POST['kom_per'] : ""; ?>"></td>
	</tr>
	<tr id="statper3">
		<td>Website</td>
		<td>https://&nbsp;<input type="text" name="web_per" value="<?php echo $wp = isset($_POST['web_per']) ? $_POST['web_per'] : ""; ?>"></td>
	</tr>
	<tr id="statper4">
		<td>Jabatan</td>
		<td><input type="text" name="jab_per" value="<?php echo $jab_per = isset($_POST['jab_per']) ? $_POST['jab_per'] : ""; ?>"></td>
	</tr>
<!--	
<tr>
		<td>Upload Foto</td>
		<td><input type="file" name="profil"><span style="color:red;">*<i>Batas Ukuran File (25 MB)</i></span></td>
</tr>
-->
<tr>
	<td>Captcha :</td>
	<!-- kita tentukan letak dari skrip generate gambar -->
	<td><img src="modules/captcha/gambar.php" alt="gambar" /> </td>
</tr>
<tr>
	<td>Isikan Nilai Captcha:</td>
	<td><input name="nilaiCaptcha" value="" maxlength="9"/></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><input type="submit" value="Registrasi">
	&nbsp;<input type="reset" value="Reset"/>		
  </td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>Kembali ke <a href="index.php">Menu Utama</a></td>
</tr>
</table>
<table>
<tr>
	<th>&nbsp;</th>
</tr>
<tr>
  <td colspan="5">&nbsp;</td>
</tr>
<tr>
	<td colspan="5">&nbsp;</td>
</tr>
</form>
</div>
<?php
}
?>
</body> 
</html>