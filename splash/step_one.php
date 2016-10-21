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