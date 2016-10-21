<?php
session_start();

header("Content-type: image/png");

//tentukan ukuran gambar
$gbr = imagecreate(200, 50);

//warna background gambar
imagecolorallocate($gbr, 167, 218, 239);

$grey = imagecolorallocate($gbr, 128, 128, 128);

$black = imagecolorallocate($gbr, 0, 0,0);

// tentukan font
$font = "monaco.ttf"; 

$_SESSION["Captcha"] = "";

// setting array karakter captcha
$alph = array('a','A','b','B','c','C','d','D','e','E','f','F','g','G','h','H','i','I','j','J','k','K','l','L','m','M','n','N',
				'o','O','p','P','q','Q','r','R','s','S','t','T','u','U','v','V','w','W','x','X','y','Y','z','Z');
				
// jumlah karakter array alphabet
$totAlph = count($alph) - 1;

// membuat nomor acak dan ditampilkan pada gambar
for($i=0; $i <= 8;$i++) {
	// jumlah karakter
	$nomor = rand(0, $totAlph);	
	
	$_SESSION["Captcha"].= $alph[$nomor];

	$sudut= rand(-25, 25);

	imagettftext($gbr, 20, $sudut, 8+15*$i, 25, $black, $font, $alph[$nomor]);

	// efek shadow
	imagettftext ($gbr, 20, $sudut, 9+15*$i, 26, $grey, $font, $alph[$nomor]);
}
//untuk membuat gambar 
imagepng($gbr); 
imagedestroy($gbr);
?>