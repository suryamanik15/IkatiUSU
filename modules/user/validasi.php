<script type="text/javascript">
function balik(a)
{
	document.location.href=a;
}
</script>
<?php
include "./modules/erw.php";

$username = mysql_real_escape_string($_POST["username"]); // fungsi SQL untuk melakukan escape karakter tertentu
$password = mysql_real_escape_string($_POST["password"]); // fungsi SQL untuk melakukan escape krakter tertentu

$hasil_login = mysql_query("SELECT * from tbl_login where no_alumni='$username' and password=MD5('$password')") or die(mysql_error());
$baris_login = mysql_fetch_array($hasil_login);
$jumlah_baris = mysql_num_rows($hasil_login);

$ck = mysql_query("SELECT profpic FROM alumni WHERE no_alumni = '$username' ") or die(mysql_error());
$fetch = mysql_fetch_array($ck);
$profpic = $fetch['profpic'];
$lData = mysql_num_rows($ck);

// Keterangan waktu
$dt = getdate();
$ind = $dt['year']."-".$dt['mon']."-".$dt['mday']; // in date
$int = $dt['hours'].":".$dt['minutes'].":".$dt['seconds']; // in time

if($jumlah_baris == 1)
{
	session_start();
	$_SESSION["no_alumni"] = $baris_login["no_alumni"];
	$_SESSION["password"] = $baris_login["password"];
	$_SESSION["level"] = $baris_login["level"];
	$_SESSION["nama"] = $baris_login["nama"];
	$_SESSION["profpic"] = $profpic;

    mysql_query("UPDATE tbl_login SET in_date = '$ind', `in_time` = '$int' WHERE nim = '$baris_login[no_alumni]'");
?>
	<script type="text/javascript">
		alert('Anda berhasil login !!');
		document.location.href="./index.php?mode=home&opt=main&opts=utama";
	</script>
<?php
}
else
{
	
?>
	<script type="text/javascript">
		alert("Login gagal !!");
		balik('./index.php');
	</script>
<?php
}
?>