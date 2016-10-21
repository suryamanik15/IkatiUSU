<!DOCTYPE html>
<?php
error_reporting(0);
session_start();

?>
<html class="gaya" lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<title>Alumni - Teknologi Informasi USU</title>
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/gaya.css" rel="stylesheet">
		<script src="js/jquery-1.11.0.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</head>

<body>
	<?php
		if(isset($_SESSION['username']))
		{
		
		?>
			<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                </button><img class="navbar-left" src="img/usu.png">
                <a class="navbar-brand" href="#">Alumni Teknologi Informasi</a>
            </div>
			
			<div class="collapse navbar-collapse dropdown" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					
					<li>
						<a href="index.php?page=home">Home</a>
					</li>
					<li>
						<a href="index.php?page=direktori">Direktori</a>
					</li>
					<li>
						<a href="index.php?page=about">About</a>
					</li>
					<li>
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                Pengaturan
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#">Edit Akun</a></li>
				<li class="divider"></li>
				<li><a href="#">Ganti Password</a></li>
				<li class="divider"></li>
                <li><a href="#">Log Out</a></li>
            </ul>
            </div>
					</li>
				</ul>
			</div>
	</nav>
		<?php
		}
		else
		{
		?>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                </button><img class="navbar-left" src="img/usu.png">
                <a class="navbar-brand" href="#">Alumni Teknologi Informasi</a>
            </div>
			
			<div class="collapse navbar-collapse dropdown" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="ikati/">Masuk Sistem</a>
					</li>
					<li>
						<a href="#">Tentang IKATI</a>
					</li>
					
				</ul>
			</div>
	</nav>
		<?php
		}
		?>
		<?php
		session_start();
		include "site/koneksi.php";
		$username = $_SESSION['username'] ;
		$nama = $_SESSION['nama'] ;
		$angkatan = $_GET['ang'];
		//$nama_cari = $_GET['nama'];
		$nama_cari = $_POST['nama'];
		$batas=30;
		$id=$_SESSION['username']; 
		$halaman=$_GET['halaman'];
		if(empty($halaman)){
			$posisi=0;
			$halaman=1;
		}
		else{
		$posisi = ($halaman-1) * $batas;
		}
		if(isset($_GET['page']))
		{
			?>
			<div class="container">
		
			<div class="row" id="content">
				
			<br><br><br>
			<?php
			error_reporting(0);
			switch ($_GET['page'])
			{
				case 'home':
					include "site/home.php";
				break;
				case 'berita':
					include "site/berita.php";
				break;
				case 'acara':
					include "site/acara.php";
				break;
				case 'lowongan':
					include "site/lowongan.php";
				break;
				case 'posting':
					include "site/posting.php";
				break;
				case 'postingan':
					include "site/postingan_saya.php";
				break;
				case 'direktori':
					include "site/direktori.php";
				break;
				case 'about':
					include "site/about.php";
				break;
				case 'edit':
					include "site/edit.php";
				break;
				case 'password':
					include "site/password.php";
				break;
				case 'reg':
					include "site/registrasi.php";
				break;
				case 'reg2':
					include "site/registrasi2.php";
				break;
			}
			?>
				</div>
					
				   <footer>
						<div class="row">
							<div class="col-lg-12"><hr>
								<p>Copyright &copy; Alumni Teknologi Informasi 2014</p>
							</div>
							
						</div>
						
					</footer>
				</div>	
			<?php
		}
		else if($_GET['page']=='' && $_SESSION['username'] !='')
		{
			?>
			<div class="container">
		
			<div class="row" id="content">
				
			<br><br><br>
			<?php
			error_reporting(0);
			include "site/home.php";
			?>
				</div>
					
				   <footer>
						<div class="row">
							<div class="col-lg-12"><hr>
								<p>Copyright &copy; Alumni Teknologi Informasi 2014</p>
							</div>
							
						</div>
						
					</footer>
				</div>	
			<?php
		}
	?> 


</body>

</html>