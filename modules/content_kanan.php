<?php
	session_start();
	
	include "./modules/erw.php";
	
	// Initialize data of GET Method
	$mod = mysql_real_escape_string($_GET['mod']);
	$opt = mysql_real_escape_string($_GET['opt']);
	$opts = mysql_real_escape_string($_GET['opts']);
	
	if($mod == "home")
	{
		if($opt == "main"){
			//include("./modules/laporan/list.php");
			if($opts == "utama"){
				include('./modules/utama.php');
			}
		}	
		
		else if($opt == "profil")
		{
			if($opts == "profil")
				include("./modules/profil/edit.php");
			else if($opts == "validasi")
				include("./modules/profil/validasi.php");
		}
		else if($opt == "user")
		{
			if($opts == "list")
				include("./modules/login/list.php");
			else if($opts == "administrator")
				include("./modules/login/administrator.php");
			else if($opts == "validasi")
				include("./modules/login/validasi.php");
			else if($opts == "report")
				include("./modules/laporan/list.php");
			else if($opts == "monitoring")
				include('./modules/user/user_monitoring.php');
			else if($opts == "shared_link")
				include('./modules/user/shared_link.php');
			else if($opts == "autonews")
				include('./modules/e-news/tag_alumni_member.php');
		}
		else if($opt == "alumni")
		{
			if($opts == "list")
				include("./modules/alumni/list.php");
			else if($opts == "administrator")
				include("./modules/alumni/administrator.php");
			else if($opts == "validasi")
				include("./modules/alumni/validasi.php");
			else if($opts == "kuisioner")
				include("./modules/alumni/kuisioner.php");
			else if($opts == "berita")
				include("./modules/berita/news.php");
			else if($opts == "QRMenu")
				include("./modules/qr_menu.php");
			else if($opts == "Reg_Card")
				include("./modules/card/link.php");
			else if($opts == "MenuKartu")
				include("./modules/menu_kartu.php");
		}
		
		else
			die ("Restricted Access content kanan");
	}
	else
		die ("Restricted Access content kanan");
?>