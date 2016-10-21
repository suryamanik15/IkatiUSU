<?php

	$no_alumni = mysql_real_escape_string($_GET['user']);
	
	// Foto Profile
	$fname = $_FILES['profpic']['name'];
	$fsize = $_FILES['profpic']['size'];
	$ftype = $_FILES['profpic']['type'];
	$fsource = $_FILES['profpic']['tmp_name'];
	
	/* untuk direct link sebelumnya */
	$user_encode = base64_encode($no_alumni);
	
	echo $ftype ."<br/>";
	//echo "Size : ". $fsize. "<br/>";
	
	if($fsize > 50000){
			echo "File Terlalu besar !!";
	}else if($ftype == 'image/jpeg' || $ftype == 'image/png' || $ftype == 'image/pjpeg'){
			/* untuk direct link sebelumnya */
		$user_encode = base64_encode($_GET['user']);
		//echo "No Alumni anda : " . $_GET['user']. "<br/>";
	
		//explode ID Alumni to profpic image anda barcode image generator name
		$exp = explode('/',$_GET['user']);
		$filename = $exp[0]."-".$exp[1]."-".$exp[2].".png";
		$fname = $exp[0]."-".$exp[1]."-".$exp[2].".jpg";
		$basecode = base64_encode($no_alumni);
		
		$fdes = "profpic/" . $fname;
		$upload = move_uploaded_file($fsource,$fdes);
	
		if($upload){
			$phase = "last";
		
			header("Location:../index.php?mod=home&opt=data&usr=".$user_encode."&phase=".$phase);
		}
	}else{
		
		echo "Invalid Type and Size";
	}