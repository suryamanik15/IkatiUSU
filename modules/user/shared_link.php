<?php
	$no_alumni = $_SESSION['no_alumni'];
	$sq1 = "SELECT * FROM alumni WHERE no_alumni = '$no_alumni'";
	$q = mysql_query($sq1) or die(mysql_error());
	$data = mysql_fetch_array($q);
?>
<div id="judul_content"><h2>FORM SHARING LINK BERITA</h2></div>
<br/>

<fieldset>
	<legend>Form Pengisian Link Berita</legend>
	<form action="./index.php?mod=home&opt=user&opts=insert_link" method="POST" enctype="multipart/form-data" >
		<table cellpadding="3" cellspacing="1" id="tbl" width="95%">
			<tr id="tbl-content">
			<td>PEMOSTING</td>
			<td><input type="hidden" name="no_alumni" value="<? echo $data['no_alumni'];?>" readonly="readonly" style="width:45%;">
				<span style="color:green;"><?php echo $data['nama'];?></span>
			</td>
			</tr>
			<tr id="tbl-content">
			<td>TAG JUDUL </td>
			<td><input type="text" name="tag_link" style="width:45%;"></td>
			</tr>
			<tr id="tbl-content">
			<td>LINK</td>
			<td><textarea name="link" cols="80" rows="10"></textarea> <span style="color:red;"><i>*harus diawali dengan http:// atau https://</i></span></td>
			</tr>
			<tr>
				<td colspan="2"><center><input type="submit" value="SUBMIT" /></center>
				</td>
			</tr>
		</table>
	</form>
</fieldset><br/><br/>

<fieldset>
	<legend>Link Yang Anda Share</legend>
	<?php
		$sql = "SELECT * FROM shared_link WHERE no_alumni = '".$_SESSION["no_alumni"]."'";
		$query = mysql_query($sql) or die(mysql_error());
		$num = mysql_num_rows($query);
		if($num <= 0){
			echo "<center><h3>Belum Ada Link yang anda submit.</h3></center>";
		}else{
			$index = 1;
	
			echo "<table cellpadding=\"3\" cellspacing=\"1\" id=\"tbl\" width=\"95%\">";
			echo "<tr>
				<td>Nomor</td>
				<td>Title Link</td>
				<td>Link URL</td>
				<td>Waktu Posting</td>
				<td>Aksi</td>
			</tr>";
	
			while($row = mysql_fetch_array($query)){
		
	
				echo "<tr id=\"tbl-content\">
				<td>". $index . "</td>
				<td>".$row['tag_link']."</td>
				<td>".$row['links']."</td>
				<td>".$row['time_shared']."</td>
				<td><a href=\"./index.php?mod=home&opt=user&opts=delete_link&id_link=".$row['id_link']."\">Hapus</a></td>
				</tr> ";
	
				$index++;
			}
		
		echo "</table><br/>";
		echo "<span>Jumlah link: ".$num ." data.</span>";
		}
	?>
		
</fieldset><br/><br/>