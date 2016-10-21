<?php include "./modules/erw.php";
?>
<html>
<head>
	<title> KUISIONER UMPAN BALIK ALUMNI </title>
<script language='javascript'>
	function check(a){
		ab = document.getElementById('angkatan').value;
		document.location="./index.php?mod=home&opt=alumni&opts=kuisioner&angkatan="+ab;
	}

</script>
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
</style>
</head>
<body>
<div id="box">
<center><b>
KUISIONER UMPAN BALIK ALUMNI</br>
PROGRAM STUDI TEKNOLOGI INFORMASI<br>
UNIVERSITAS SUMATERA UTARA<br><br>
</b><img src="./images/button/ikati.png" width="150px" height="120px"/></center>
</br></br>
Kepada Yth.<br>
Bapak/Ibu Alumni Program Studi Teknologi Informasi<br>
Universitas Sumatera Utara<br>
di<br>
Tempat<br>

<p>
Saudara alumni yang terhormat. Semoga Saudara dalam keadaan sehat dan sukses selalu. Guna keperluaan peningkatan kualitas akademik Program Studi Teknologi Informasi Universitas Sumatera Utara, kami bermohon Saudara alumni bersedia meluangkan waktu mengisi formulir survey ini.
Kami sangat berharap Saudara dapat memberikan data survey ini dengan benar dan apa adanya. Atas perhatian dan kerja samanya, kami mengucapkan terima kasih. Semoga Saudara alumni diridhai Allah dan sukses selalu.
</p>
<br>
<b>Petunjuk Pengisian</b><br>
- Isilah data pada pertanyaan yang membutuhkan jawaban tertulis<br>
- Berilah tanda silang (X) pada pertanyaan yang memiliki lebih dari satu jawaban.<br>
<br>
<form method="POST" action="./index.php?mod=home&opt=enval">
<table>
<tr>
	<td>Angkatan/Stambuk</td>
	<td>: <select name="angkatan" id="angkatan" onChange="return check(1)">
	
<?php
if(empty($_GET["angkatan"]))
{
	$ad = "SELECT DISTINCT (angkatan) FROM alumni";
	echo "<option value='hidden'>PILIH ANGKATAN</option>";
}
else
{
	$a = $_GET['angkatan'];
	$ad = "SELECT DISTINCT (angkatan) FROM alumni where angkatan=$a";
}
$ad1 = mysql_query($ad);
$i=1;
while ($data1= mysql_fetch_array($ad1))
{
	echo "<option value='$data1[0]'> $data1[0]</option>\n";
	$i++;
}    
?></select>
</td>
</tr>
<tr>
	<td>Nama Alumni</td>
    <td>: <select name="no_alumni">
<?php 
	if(empty($_GET['angkatan']))
			echo "<option value=''> Pilih Angkatan Terlebih dahulu</option>";
	else
	{
		$angkatan = mysql_real_escape_string($_GET['angkatan']);
		$que = "SELECT nama from alumni where angkatan = '$angkatan' order by nama";
		$do = mysql_query($que);

		while($data = mysql_fetch_array($do))
		{ 
			echo "<option value='$data[nama]'> $data[nama]</option>\n";
		}
	}	
	?>
  </select></td>
</tr>
<tr>
	<td>Pekerjaan</td>
    <td>: <input type="text" name="pekerjaan"></td>
</tr>
</table>
<table>
<tr>
	<th> Nomor</th>
	<th> Aspek Penilaian </th>
	<th> Sangat Baik / Sangat Memadai </th>
	<th> Baik / Memadai </th>
	<th> Cukup / Sedang </th>
	<th> Rendah / Kurang Memadai </th>
</tr>
<tr>
	<td>1</td>
	<td>Kompetensi dosen </td>
	<td><input name="nomor1" type="radio" value="Sangat Baik">Sangat Baik </td>
	<td><input name="nomor1" type="radio" value="Baik">Baik </td>
	<td><input name="nomor1" type="radio" value="Cukup">Cukup</td>
	<td><input name="nomor1" type="radio" value="Rendah">Rendah</td>
</tr>
<tr>
	<td>2</td>
	<td>Kualitas proses pembelajaran</td>
	<td><input name="nomor2" type="radio" value="Sangat Baik">Sangat Baik </td>
	<td><input name="nomor2" type="radio" value="Baik">Baik </td>
	<td><input name="nomor2" type="radio" value="Cukup">Cukup</td>
	<td><input name="nomor2" type="radio" value="Rendah">Rendah</td>
</tr>
<tr>
	<td>3</td>
	<td>Kelengkapan fasilitas pembelajaran</td>
	<td><input name="nomor3" type="radio" value="Sangat Baik">Sangat Baik </td>
	<td><input name="nomor3" type="radio" value="Baik">Baik </td>
	<td><input name="nomor3" type="radio" value="Cukup">Cukup</td>
	<td><input name="nomor3" type="radio" value="Rendah">Rendah</td>
</tr>
<tr>
	<td>4</td>
	<td>Kualitas pelayanan administrasi akademik</td>
	<td><input name="nomor4" type="radio" value="Sangat Baik">Sangat Baik </td>
	<td><input name="nomor4" type="radio" value="Baik">Baik </td>
	<td><input name="nomor4" type="radio" value="Cukup">Cukup</td>
	<td><input name="nomor4" type="radio" value="Rendah">Rendah</td>
</tr>
<tr>
	<td>5</td>
	<td>Kesesuaian ilmu dengan praktik lapangan</td>
	<td><input name="nomor5" type="radio" value="Sangat Baik">Sangat Baik </td>
	<td><input name="nomor5" type="radio" value="Baik">Baik </td>
	<td><input name="nomor5" type="radio" value="Cukup">Cukup</td>
	<td><input name="nomor5" type="radio" value="Kurang Sesuai">Kurang Sesuai</td>
</tr>	
<tr>
	<td>6</td>
	<td>Masa Tunggu memperoleh pekerjaan pertama</td>
	<td><input name="nomor6" type="radio" value="1-6 Bulan">1-6 Bulan</td>
	<td><input name="nomor6" type="radio" value="6-12 Bulan">6-12 Bulan</td>
	<td><input name="nomor6" type="radio" value="12-18 Bulan">12-18 Bulan</td>
	<td><input name="nomor6" type="radio" value="> 18 Bulan">Lebih dari 18 Bulan</td>
</tr>
<tr>
	<td>7</td>
	<td>Penghasilan yang di peroleh</td>
	<td><input name="nomor7" type="radio" value="> 5 Juta">lebih dari 5 Juta/bulan</td>
	<td><input name="nomor7" type="radio" value="3-5 Juta">3-5 Juta/bulan</td>
	<td><input name="nomor7" type="radio" value="1-2 Juta">1-2 Juta/bulan</td>
	<td><input name="nomor7" type="radio" value="< 1 Juta">Kurang dari 1 Juta/bulan</td>
</tr>
<tr>
	<td colspan="5">Komentar</td>
</tr>
<tr>
	<td colspan="5"><textarea name="komentar" cols="80" rows="10"></textarea></td>
</tr>
<tr>
	<td colspan="5"><input type="submit" value="KIRIM KUISIONER">
</td>
</tr>
</form>
</table>
</div>
</body> 
</html>