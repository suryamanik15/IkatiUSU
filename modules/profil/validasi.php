<?php
	session_start();
	// GET POST DATA
	$username = mysql_real_escape_string($_POST['username']);
	$nama = mysql_real_escape_string($_POST['nama']);
	$kontak = mysql_real_escape_string($_POST['contact']);
	$alamat = mysql_real_escape_string($_POST['alamat']);
	$password = mysql_real_escape_string($_POST['password']);
	$cpass = mysql_real_escape_string($_POST['ulangi']);
	
	// USER profile picture information
	$fname = $_FILES['profpic']['name'];
	$fsize = $_FILES['profpic']['size'];
	$fsource = $_FILES['profpic']['tmp_name']; //direktori foto berasal
	
	//check query data
	$cq = mysql_query("SELECT * FROM alumni WHERE no_alumni = '$username'") or die(mysql_error());
	$fetch = mysql_fetch_array($cq);
	$pp = "./modules/profpic/".$fetch['profpic'];
	
	//echo $username;
	if(file_exists($pp)){ // jika ada file dengan nama yang sama dihapus terlebih dahulu
		unlink($pp);
	}
	
	if($password != $cpass){
?>	
		<script>
			alert("Maaf!, Konfirmasi password anda masih salah");
			document.location.href="./index.php?mode=home&opt=profil&opts=profil";
		</script>
<?php
		exit;
		
	}else if($fsize > 25000000){
?>	
		<script>
			var fsize = "<?php echo round($fsize/(1024 * 1024), 3); ?>";
			alert("Maaf, ukuran file image anda melebihi batas.\nUkuran file anda "+ fsize +" MB");	
		</script>
<?php
		exit;	
	}else{
		
		$upload = move_uploaded_file($fsource, $pp); // proses upload file
		if($upload){
			$q = mysql_query("UPDATE alumni SET nama = '$nama',alamat = '$alamat', hp = '$kontak' WHERE no_alumni = '$username'")
			     AND mysql_query("UPDATE tbl_login SET password = '$password'") or die(mysql_error());
			if($q){
?>
				<script>
					alert("Data User telah diubah.");
					document.location.href="./index.php?mode=home&opt=profil&opts=profil";
				</script>
<?php				
			}else{
?>			
				<script>
					alert("Error, proses editing data user gagal !!"); 
					document.location.href="./index.php?mode=home&opt=profil&opts=profil";
				</script>
<?php				
			}	
		}else{
?>		
			<script>
				alert("Error, proses upload image gagal !!"); 
				document.location.href="./index.php?mode=home&opt=profil&opts=profil";
			</script>
<?php
		}
		
	}
?>