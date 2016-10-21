<?php
	// Including all required classes
	require_once('class/BCGFontFile.php');
	require_once('class/BCGColor.php');
	require_once('class/BCGDrawing.php');
	
	// Type of Barcode
	require_once('class/BCGcode128.barcode.php');
	$no_alumni = "AL0711";
	// Set warna background dan foreground
	$cloroFront = new BCGColor(0, 0, 0);
	$colorBack = new BCGColor(255, 255, 255);
	
	// Set Font Style
	$font = new BCGFontFile('font/Arial.ttf', 18);
	
	$code = new BCGcode128();
	$code->setScale(2); // Resolution
	$code->setThickness(30); // Thickness
	$code->setForegroundColor($colorFont); // Color of 	bars
	$code->setBackgroundColor($colorBack); // Color of spaces
	$code->setFont($font); // Font (or 0)
	$code->parse($no_alumni); // Text
	
	$draw = new BCGDrawing('bar_img/'.$no_alumni.'.png', $colorBack);
	
	$draw->setBarcode($code);
	$draw->draw();
	
	$draw->finish(BCGDrawing::IMG_FORMAT_PNG);
	
?>