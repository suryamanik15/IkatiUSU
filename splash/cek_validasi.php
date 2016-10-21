<?php

	// Including all required classes
	include('../libraries/qrcode/qrlib.php');

	$no_alumni = mysql_real_escape_string($_GET['user']);
	
	// Foto Profile
	$fname = $_FILES['profpic']['name'];
	$fsize = $_FILES['profpic']['size'];
	$fsource = $_FILES['profpic']['tmp_name'];
	
	/* untuk direct link sebelumnya */
	$user_encode = base64_encode($_GET['user']);
	//echo "No Alumni anda : " . $_GET['user']. "<br/>";
	
		//explode ID Alumni to profpic image anda barcode image generator name
		$exp = explode('/',$_GET['user']);
		$filename = $exp[0]."-".$exp[1]."-".$exp[2].".png";
		$fname = $exp[0]."-".$exp[1]."-".$exp[2].".jpg";
		$basecode = base64_encode($no_alumni);
	
		//html PNG location prefix
		$PNG_WEB_DIR = '../libraries/qrcode/temp/';
		$qrcode_file = 	$PNG_WEB_DIR . $filename;
		$matrixPointSize = 4;
		$errorCorrection = 'L';
		$gener = QRcode::png($basecode, $qrcode_file, $errorCorrection, $matrixPointSize, 2); // proses generate file
		
		
	$fdes = "profpic/" .$fname;
	$upload = move_uploaded_file($fsource,$fdes);
	
	if($upload AND $gener){
		$phase = "last";
		
		header('Location:../index.php?mod=home&opt=data&usr='.$user_encode.'&phase=last');
	}