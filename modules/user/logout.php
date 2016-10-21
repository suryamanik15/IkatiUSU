<?php
	session_start();
	
	include "./modules/erw.php";
	
	/* SET variabel session nomor alumni ke dalam variabel baru */
	$no_alumni = $_SESSION['no_alumni'];
	
//	unset($_SESSION["level"]);
	unset($_SESSION["username"]);
	unset($_SESSION["password"]);
	unset($_SESSION["login_admin"]);
//	unset($_SESSION["id_user"]);
//	unset($_SESSION["level"]);
//	unset($_SESSION["nama"]);
	session_destroy();
	
	$today = getdate(); // Fungsi untuk mengambil tanggal aktual (current date)
	$date = $today['year']."-".$today['mon']."-".$today['mday'];
	$waktu = $today['hours'].":".$today['minutes'].":".$today['seconds'];
	
	$q = mysql_query("UPDATE tbl_login SET out_date = '$date', out_time = '$waktu' WHERE no_alumni = '$no_alumni'") or die(mysql_error());
	
	if($q){
?>
		<script type="text/javascript">
			alert('Anda Telah Logout');
			document.location.href='./index.php';
		</script>
<?php
	}
?>	