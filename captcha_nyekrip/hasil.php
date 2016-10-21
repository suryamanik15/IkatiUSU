<html>
<head>
  <title> Cek Hasil CAPTCHA </title>
</head>
	<body>
	  <p align="center"> Hasil Login <br/>
	<?
	    //memanggil lagi session untuk dimulai 
	    session_start();
	    if($_SESSION["Captcha"] != $_POST["nilaiCaptcha"]){
		    echo "Username anda ".$_POST["username"]; echo "<br />";
		    echo "Password anda ".$_POST["password"]; echo "<br />";
		    echo "Kode Captcha Anda Salah";
			}else{ // jika teryata lolos
			echo "Username anda ".$_POST["username"] ; echo "<br/>";
			echo "Password anda ".$_POST["password"]; echo "<br/>";
			echo "Kode Captcha Anda Benar";
			}
	?>
	  </p>
	</body>
</html>