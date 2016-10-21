<?php 
	include "erw.php";
	
	
	// all of GET data
	$konfirmasi = mysql_real_escape_string($_GET['confirm']);
	$user = mysql_real_escape_string($_GET['usr']);
	//$en_p = mysql_real_escape_string($_GET['phase']);
	$no_alumni = base64_decode($user);
	//$phase = $en_p;
?>
<html>
<head>
	<title> FORM REGISTRASI ALUMNI </title>

<style type="text/css">
#box{
	width:960px;
	margin:auto;
	padding:50px;
	border:1px solid rgba(0,0,0,0.2);
	box-shadow: 5px 5px 5px rgba(0,0,0,0.5);
	background: #EAEAEA;
	text-align:justify;
}
#statper, #statper1, #statper2, #statper3, #statper4{
	display:none;
}
.confirm_p{
	font-size:21px; 
}
</style>
<script type="text/javascript" src="./modules/jquery-1.7.2.js"></script>
<script>
	$(document).ready(function(){
		$("input[name=opstat]").click(function(){
			var op = $(this).val();
			if(op == "Ya"){
				$("#statper").fadeIn(700);
				for(i=1; i <=4; i++){
					$("#statper"+i).fadeIn(700);
				}
			}else if(op == "No"){
				$("#statper").fadeOut(700);
				for(i=1; i <=4; i++){
					$("#statper"+i).fadeOut(700);
				}
			}
		});
		
		$('#frm_registrasi').submit(function(){
			var nim = document.register.nim.value;
			var nama = document.register.nama.value;
			var tmp_lahir = document.register.tmp_lahir.value;
			var hp = document.register.hp.value;
			var email = document.register.email.value;
			if(nim == ""){
				alert("Maaf Nim anda masih kosong !!");
				return false;
			}else if(nama == ""){
				alert("Maaf Field Nama Lengkap anda masih kosong !!");
				return false;
			}else if(tmp_lahir == ""){
				alert("Maaf Field tempat lahir jangan dikosongkan !!");
				return false;
			}else if(isNaN(hp)){
				alert("Maaf no Hp harus berupa digit atau angka!!");
				return false;
			}else if(hp == ""){
				alert("Maaf Field No Hp jangan kosong !!");
				return false;
			}else if(email == ""){
				alert("Maaf Field Email jangan dikosongkan !!");
				return false;
			}
			
		});
		
		/* aksi ketika form upload file disubmit */
		/*
		$('#frm_upload').submit(function(){
			var files = document.upload.profpic.value;
			if(files){
				alert('Maaf, File harus anda upload !!');
				return false;
			}
		});
		*/
		$('#frm_password').submit(function(){
			var pass1 = document.password.pass1.value;
			var pass2 = document.password.pass2.value;
			if(pass1 == '' || pass2 == ''){
				alert('Maaf, Anda harus mengisi password');
				return false;
			}else if(pass1 != pass2){
				alert('Maaf, Konfirmasi password anda salah !!');
				return false;
			}
		});
	});
</script>
</head>
<body>
<?php
	//echo "TEST<br/>";
	if ($_GET['phase'] == "Step_One"){
		include "step_one.php";
	}else if($_GET['phase'] == "Mid"){
		include "mid_step.php";
	}else if($_GET['phase'] == "last"){
		include "last_step.php";
	}else if($konfirmasi == "true"){
		include "confirm_true.php";
	}
?>	
</body> 
</html>	