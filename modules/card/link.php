<?php
session_start();
$nama = "Ikatan Alumni Teknologi Informasi";
include("mpdf.php");
include("../erw.php");

$exp = explode('.',$_SESSION['profpic']);
$fname= $exp[0] . ".png";

$mpdf = new mPDF('c','A4','','',32,25,47,47,10,10); 

$mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins

$header = '
<table width="100%" style="border-bottom: 4px solid green; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000088;"><tr>
<td width="28%"><span style="font-size:14pt;"><img src="image/ikati.jpg" height="80px" width="90px"></span></td>
<td width="44%" align="center" style="font-family:verdana; font-size:14px; color:black;">'.$nama.' <br/>
Universitas Sumatera Utara<br/>
Jl.Universitas No 3, Kampus USU<br/>
Padang Bulan, Medan<br/>
Sumatera Utara<br/>
</td>
<td width="28%" style="text-align: right;"><img src="image/logo_usu.jpg" height="80px" width="90px"></td>
</tr></table>
';

$footer = '<div align="center" style="border-top:4px solid green; width:100%;">Copyright &copy; By Ikatan Alumni Teknologi Informasi 

		Universitas Sumatera Utara (IKATI USU) Medan.</div>';

$mpdf->SetHTMLHeader($header);
//$mpdf->SetHTMLHeader($headerE,'E');
$mpdf->SetHTMLFooter($footer);
//$mpdf->SetHTMLFooter($footerE,'E');

/* Set Up the Query Variabel */
$query = mysql_query("SELECT * FROM alumni WHERE no_alumni = '$_SESSION[no_alumni]'") or die(mysql_error());
$fetch = mysql_fetch_array($query);

$html = '
<center><img src="../../libraries/qrcode/temp/'.$fname.'" height="100px" width="100px"><br/><br/>

<center><h3>KARTU ANGGOTA IKATAN ALUMNI TEKNOLOGI UNIVERSITAS SUMATERA UTARA</h3></center>
<span style="font-family:verdana; font-size:14px;">Harap Tunjukkan Kartu ini sebagai tanda registrasi.</span>
<p>
	<table border = "0" cellspacing="5" cellpadding="2">
		<tr>
			<td>No.Alumni</td>
			<td> : </td>
			<td>'. $fetch['no_alumni'].'</td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td> : </td>
			<td>'. $fetch['nama'] .'</td>
		</tr>
		<tr>
			<td>Tempat/Tanggal Lahir</td>
			<td> : </td>
			<td>' . $fetch['tempat_lahir'] . ', '. $fetch['tanggal_lahir'] .'</td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td> : </td>
			<td>' . $fetch['jenkel']. '</td>
		</tr>
		<tr>
			<td>Angkatan</td>
			<td> : </td>
			<td>' . $fetch['angkatan']. '</td>
		</tr>
		<tr>
			<td>Tahun Lulus</td>
			<td> : </td>
			<td>' . $fetch['tahun_lulus']. '</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td> : </td>
			<td>' . $fetch['alamat']. '</td>
		</tr>
		<tr>
			<td>Kelurahan</td>
			<td> : </td>
			<td>' . $fetch['kelurahan']. '</td>
		</tr>
		<tr>
			<td>Kecamatan</td>
			<td> : </td>
			<td>' . $fetch['kecamatan']. '</td>
		</tr>
		<tr>
			<td>Kabupaten/Kota</td>
			<td> : </td>
			<td>' . $fetch['kab_kota']. '</td>
		</tr>
		<tr>
			<td>No.Telp (HP)</td>
			<td> : </td>
			<td>' . $fetch['telp']. ' ('.$fetch['hp'].')</td>
		</tr>
		<tr>
			<td>Email</td>
			<td> : </td>
			<td>' . $fetch['email']. '</td>
		</tr>
		<tr>
			<td>Foto Diri</td>
			<td> : </td>
			<td><img src="../profpic/'.$fetch['profpic'] .'" width="85px" height="95px"/></td>
		</tr>
	</table>
</p>
';

$mpdf->WriteHTML($html);

$output_file = "./modules/card_data/reg_card" . $exp[0] . ".pdf";
$mpdf->Output($output_file,'I');
exit;

?>