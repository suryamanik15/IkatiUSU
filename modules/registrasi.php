<?php 
session_start();
include "erw.php";
// koneksi via mysqli API
//$db = new mysqli("it.usu.ac.id","ti","itpasswordit","db_ikati");

// Including all required classes
include('./libraries/qrcode/qrlib.php');
	
// POST Data
$nim = mysql_real_escape_string($_POST['nim']);
$nama = mysql_real_escape_string($_POST['nama']);
$tmp_lahir = mysql_real_escape_string($_POST['tmp_lahir']);
$tgl_lahir = mysql_real_escape_string($_POST['year']."-".$_POST['month']."-".$_POST['day']);
$jenkel = mysql_real_escape_string($_POST['jenkel']);
$angkatan = mysql_real_escape_string($_POST['angkatan']);
$lulus = mysql_real_escape_string($_POST['tahun_lulus']);
$alamat = mysql_real_escape_string($_POST['alamat']);
$kelurahan = mysql_real_escape_string($_POST['kelurahan']);
$kecamatan = mysql_real_escape_string($_POST['kecamatan']);
$provinsi = mysql_real_escape_string($_POST['provinsi']);
$kab_kota = mysql_real_escape_string($_POST['kk']);
$hp = mysql_real_escape_string($_POST['hp']);
$telp = mysql_real_escape_string($_POST['telp']);
$email = mysql_real_escape_string($_POST['email']);
$pekerjaan = mysql_real_escape_string($_POST['kerja']);

if($pekerjaan == ""){
	$pekerjaan = "On Process";
}
// data perusahaan
$nama_per = mysql_real_escape_string($_POST['nama_per']);
if($nama_per == ""){
	$nama_per = "-";
}
$alamat_per  = ($_POST['alamat_per'] == "")? "-" : mysql_real_escape_string($_POST['alamat_per']);
$kom = ($_POST['kom_per'] == "") ? "-" : mysql_real_escape_string($_POST['kom_per']);
$website = ($_POST['web_per'] == "") ? "-" : mysql_real_escape_string($_POST['web_per']);
$jabatan = ($_POST['jab_per'] == "") ? "-" : mysql_real_escape_string($_POST['jab_per']);

$level = 2;
// Foto Profile
/*
$fname = $_FILES['profil']['name'];
$fsize = $_FILES['profil']['size'];
$fsource = $_FILES['profil']['tmp_name']; //direktori foto berasal
*/


	// cek niali dari captcha
	if($_SESSION["Captcha"] != $_POST["nilaiCaptcha"]){
?>	
		<script>
			alert("Maaf Nilai Captcha Salah !!");
			document.location.href="./index.php?mod=home&opt=data&phase=Step_One";
		</script>
<?	
		exit;
	}
	

// Data Waktu Login
$dt = getdate();
$date = $dt['year']."-".$dt['mon']."-".$dt['mday'];
$waktu = $dt['hours'].":".$dt['minutes'].":".$dt['seconds'];	

// Pengecekan ID Number
$cek1  = mysql_query("SELECT * FROM alumni") or die(mysql_error());
$cek2 = mysql_query("SELECT * FROM alumni WHERE angkatan = '$angkatan'") or die(mysql_error());
$jum1 = mysql_num_rows($cek1);
$jum2 = mysql_num_rows($cek2);
//untuk menentukan nomor urut pendaftaran
if($jum1 <= 0){
	$nomor = "001";
}else if($jum1 > 0 && $jum1 < 10){
	$nomor = "00".($jum1 + 1);
}else if($jum1 >= 10 && $jum1 < 100){
	$nomor = "0". ($jum1 + 1);
}else{
	$nomor = $jum1 + 1;
}

// untuk menentukan alumni ke berapa pada angkatan tersebut
if($jum2 <= 0){
	$no_al_ang = "001";
}else if($jum2 > 0 && $jum2 < 10){
	$no_al_ang  = "00".($jum2 + 1);
}else if($jum2 >= 10 && $jum2 < 100){
	$no_al_ang  = "0". ($jum2 + 1);
}else{
	$no_al_ang  = $jum2 + 1;
}

	// Pola ID Alumni
	$IDAlumni = $nomor."/".$angkatan."/".$no_al_ang; // ID Alumni

	//explode ID Alumni to profpic image anda barcode image generator name
		$exp = explode('/',$IDAlumni);
		$filename = $exp[0]."-".$exp[1]."-".$exp[2].".png";
		$fname = $exp[0]."-".$exp[1]."-".$exp[2].".jpg";
		// Validasi registrasi
		
			//$fdes = "./modules/profpic/".$fname;
			// Melakukan proses upload dan encode NIM
			//$upload = move_uploaded_file($fsource,$fdes);
			
			$query1 = "INSERT INTO alumni(no_alumni,nama,tempat_lahir,`tanggal_lahir`,jenkel,angkatan,tahun_lulus,alamat,kelurahan,kecamatan,provinsi,kab_kota,hp,telp,email,pekerjaan,nama_per,alamat_per,fax_em_telp,web_per,jabatan,profpic) VALUES('$IDAlumni','$nama','$tmp_lahir','$tgl_lahir','$jenkel','$angkatan','$lulus','$alamat','$kelurahan','$kecamatan',
'$provinsi','$kab_kota','$hp','$telp','$email','$pekerjaan','$nama_per','$alamat_per','$kom','$website','$jabatan','$fname')";
					 
			$query2 = "INSERT INTO tbl_login(no_alumni,password,level,`in_date`,in_time) VALUES('$IDAlumni','$password','$level','$date','$waktu')";	
			
				$do = mysql_query($query1);
				$user_encode = base64_encode($IDAlumni);
				if($do){	
				//html PNG location prefix
					mysql_query($query2);
					
?> 
					<script type="text/javascript">
						var usr_encode = "<?php echo $user_encode; ?>";
						alert("Registrasi Tahap Pertama Sukses !!");
						document.location.href = "./index.php?mod=home&opt=data&confirm=true&usr="+usr_encode;
					</script>
					
<?php
				}else{
?>
					<script type="text/javascript">
						alert("Gagal Registrasi Data Alumni");
						document.location.href="./index.php?mod=home&opt=data&phase=Step_One";
					</script>
<?php					
				}
			
			session_destroy();
?> 
			