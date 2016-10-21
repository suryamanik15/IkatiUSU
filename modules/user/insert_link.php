<?php

	include "./modules/erw.php";
	
	$no_alumni = $_POST['no_alumni'];
	$title = mysql_real_escape_string($_POST['tag_link']);
	$link = mysql_real_escape_string($_POST['link']);
	
	/* date time */
	$dt = getdate();
	$tgl = $dt['year'] ."-". $dt['mon'] . "-" . $dt['mday'];
	$hour = $dt['hours'] . ":" . $dt['minutes'] . ":" . $dt['seconds'];
	$dateCap = $tgl ." ". $hour;
	
	/* cek auto ID number */
	$cek = mysql_query("SELECT MAX(id_link) as 'jum' FROM shared_link") or die(mysql_error());
	$row = mysql_fetch_array($cek);
	if($row['jum'] <= 0){
		$id = 1;
	}else{
		$id = $row['jum'] + 1;
	}
	
	$sql = "INSERT INTO shared_link(id_link,no_alumni,links,tag_link,time_shared) 
			VALUES('$id','$no_alumni','$link','$title','$dateCap')";
			
	$query = mysql_query($sql) or die(mysql_error());

	if($query){
?>
		<script>
			var title = "<? echo $title; ?>";
			alert('Link dengan judul '+title+'\n telah di submit.');
			document.location.href = "./index.php?mod=home&opt=user&opts=shared_link";
		</script>
<?		
	}else{
?>
		<script>
			alert('Error Proses, Link gagal di submit');
			document.location.href = "./index.php?mod=home&opt=user&opts=shared_link";
		</script>
<?	
	}	