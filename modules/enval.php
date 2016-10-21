<?php
include "erw.php";
$no_alumni = $_SESSION["no_alumni"];
$nomor1 = $_POST['nomor1'];
$nomor2 = $_POST['nomor2'];
$nomor3 = $_POST['nomor3'];
$nomor4 = $_POST['nomor4'];
$nomor5 = $_POST['nomor5'];
$nomor6 = $_POST['nomor6'];
$nomor7 = $_POST['nomor7'];
$pekerjaan = $_POST['pekerjaan'];
$komentar = $_POST['komentar'];

$aksi = "";

$cek = mysql_query("SELECT * FROM tbl_jwb_kuisioner WHERE id_alumni = '$no_alumni'") or die(mysql_error());
$num = mysql_num_rows($cek);

if($num == 1){
?>
		<script>
			alert('Maaf, anda sebelumnya sudah mengisi form questioner\n silahkan tunggu konfirmasi admin !!');
			document.location.href = "./index.php?mode=home&opt=main&opts=utama";
		</script>
<?
			exit;
}

/* Set the auto number ID */
$cek2 = mysql_query("SELECT COUNT(id_kuisioner) as 'jumlah' FROM tbl_jwb_kuisioner") or die(mysql_error());
$row = mysql_fetch_array($cek2);
if($row['jumlah'] <= 0){
	$id = 1;
}else{
	$id = $row['jumlah'] + 1;
}

$query = "INSERT INTO tbl_jwb_kuisioner(id_kuisioner,id_alumni, pekerjaan, nomor1, nomor2, nomor3, nomor4, nomor5, nomor6, nomor7, komentar)  
			VALUES('$id','$no_alumni','$pekerjaan','$nomor1','$nomor2','$nomor3','$nomor4','$nomor5','$nomor6','$nomor7','$komentar')";

$do = mysql_query($query);

if($do)
{
	?> 
	<script type="text/javascript">
		alert("Berhasil melakukan pengisian Kuisioner Umpan Balik Alumni");
		document.location="./index.php?mode=home&opt=main&opts=utama";
	</script>
	<?php
} else
{
	?> 
	<script type="text/javascript">
		alert("Error!!, Penginputan kuisioner gagal");
		document.location="./index.php?mod=home&opt=kuisioner";
	</script>
	<?php
}
?>