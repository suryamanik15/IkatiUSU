<?php 
	session_start();
	include "./modules/erw.php";
	
	$no_alumni = $_SESSION['no_alumni'];
	
?>
<table cellpadding="0" cellspacing="0" width="90%" align="left">
<tr>
	<td>
	<?php
	if($_SESSION['level'] == 1){
		$q = mysql_query("SELECT * FROM alumni WHERE no_alumni = '$no_alumni'") or die(mysql_error());
		$usr = mysql_fetch_array($q);
	?>
		<ul class="nav">
			<li><a href="./index.php?mode=home&opt=main&opts=utama">HOME</a></li>
            <li><a href="./index.php?mod=home&opt=alumni&opts=list">ALUMNI DATA</a></li>
            <li><a href="./index.php?mod=home&opt=user&opts=list">LOGIN MANAGEMENT</a></li>
            <li><a href="./index.php?mod=home&opt=profil&opts=profil">PROFIL USER</a></li>
			<li><a href="./index.php?mod=home&opt=user&opts=report">LAPORAN DATA ALUMNI</a></li>
			<li><a href="./index.php?mod=home&opt=user&opts=monitoring">MONITORING LOG USER</a></li>
			<li><a href="./index.php?mod=home&opt=shared_link">Link Berita</a></li>
			<!--<li><a href="">REPOSITORY TI</a></li>-->
            <li><a href="./index.php?mod=auth&opt=logout">LOGOUT</a></li>
			<li><a href=""><img src="./modules/profpic/<?php echo $usr['profpic'];?>" height="90" width="95"/> </a></li>
			<li>Hi, <span style="color:green; font-weight:bold;">
			<a href="./index.php?mod=home&opt=profil&opts=profil"><? echo $usr['nama']; ?></a>
			</span></li>
		</ul>
	<?php
	}else if($_SESSION['level'] == 2){
		$q = mysql_query("SELECT * FROM alumni WHERE no_alumni = '$no_alumni'") or die(mysql_error());
		$usr = mysql_fetch_array($q);
	?>	
		<ul class="nav">
			<li><a href="./index.php?mode=home&opt=main&opts=utama">Beranda</a></li>
			<li><a href="./index.php?mod=home&opt=alumni&opts=list">Data Alumni</a></li>
            <li><a href="./index.php?mod=home&opt=alumni&opts=kuisioner">Questioner</a></li>
			<li><a href="./index.php?mod=home&opt=user&opts=autonews">Kirim Berita</a></li>
            <li><a href="./index.php?mod=home&opt=profil&opts=profil">Profil User</a></li>
			<li><a href="./index.php?mod=home&opt=alumni&opts=berita">Berita</a></li>
			<!--<li><a href="./index.php?mod=home&opt=alumni&opts=QRMenu">QR Code Anda</a></li>-->
			<li><a href="./index.php?mod=home&opt=alumni&opts=MenuKartu">Kartu Registrasi IKATI</a></li>
			<!--<li><a href="">Repository TI</a></li>-->
            <li><a href="./index.php?mod=auth&opt=logout">Log Out</a></li>
			<li><a href=""><img src="<?php
				$profpic = 'modules/profpic/' . $usr['profpic'];
				if(!file_exists($profpic)){
					if($usr['jenkel'] == "Pria"){
						echo "modules/profpic/pria.jpg";
					}else{
						echo "modules/profpic/wanita.jpg";
					}
				}else{
					echo "modules/profpic/" . $usr['profpic'];
				}	
			
			?>" height="90" width="95"/> </a></li>
			<li>
			<li>Hi, <a href="./index.php?mod=home&opt=profil&opts=profil"><span style="color:green; font-weight:bold;">
			<?php echo $usr['nama']; ?></span></a>
			</li>
		</ul>
	<?php
	}else if($_SESSION['level'] == 3){
		$q = mysql_query("SELECT * FROM alumni WHERE no_alumni = '$no_alumni'") or die(mysql_error());
		$usr = mysql_fetch_array($q);
	?>
		<ul class="nav">
			<li><a href="./index.php?mode=home&opt=main&opts=utama">Beranda</a></li>
			<li><a href="./index.php?mod=home&opt=alumni&opts=list">Data Alumni</a></li>
            <li><a href="./index.php?mod=home&opt=alumni&opts=kuisioner">Questioner</a></li>
			<li><a href="./index.php?mod=home&opt=user&opts=autonews">Kirim Berita</a></li>
            <li><a href="./index.php?mod=home&opt=profil&opts=profil">Profil User</a></li>
			<li><a href="./index.php?mod=home&opt=alumni&opts=berita">Berita</a></li>
			<li><a href="./index.php?mod=home&opt=alumni&opts=QRMenu">QR Code Anda</a></li>
			<li><a href="./index.php?mod=home&opt=alumni&opts=MenuKartu">Kartu Registrasi IKATI</a></li>
			<!--<li><a href="">Repository TI</a></li>-->
            <li><a href="./index.php?mod=auth&opt=logout">Log Out</a></li>
			<li><a href=""><img src="<?php
				$profpic = 'modules/profpic/' . $usr['profpic'];
				if(!file_exists($profpic)){
					if($usr['jenkel'] == "Pria"){
						echo "modules/profpic/pria.jpg";
					}else{
						echo "modules/profpic/wanita.jpg";
					}
				}else{
					echo "modules/profpic/" . $usr['profpic'];
				}	
			
			?>" height="90" width="95"/> </a></li>
			<li>Hi, <a href="./index.php?mod=home&opt=profil&opts=profil"><span style="color:green; font-weight:bold;">
			<?php echo $usr['nama']; ?></span></a>
			</li>
		</ul>
	<?php	
	}
	?>	
    </td>
</tr>
</table>