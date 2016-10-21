<script type="text/javascript">
function tambah()
{
	var t = document.getElementById("tambah");
	if(t.innerHTML == '')
		t.innerHTML = '<iframe src="./modules/alumni/tambah_administrator.php" width="500px" height="400px" frameborder="0" scrolling="auto" id="iframe_edit"></iframe>';
	else
		t.innerHTML = '';
}
function Edit(a)
{
	var t = document.getElementById("peserta_"+a+"");
	if(t.innerHTML == '')
		t.innerHTML = '<iframe src="./modules/alumni/edit_administrator.php?no_alumni='+a+'" width="500px" height="450px" frameborder="0" scrolling="auto" id="iframe_edit"></iframe>';
	else
		t.innerHTML = '';
}

function View(a)
{
	var t = document.getElementById("peserta_"+a+"");
	if(t.innerHTML == '')
		t.innerHTML = '<iframe src="./modules/alumni/view_administrator.php?no_alumni='+a+'" width="600px" height="300px" frameborder="0" scrolling="auto" id="iframe_edit"></iframe>';
	else
		t.innerHTML = '';
}

function Kirim_Cari()
	{
		var y = '<?php echo $_GET["halaman"]; ?>';
		var s;
		s='./index.php?mod=home&opt=alumni&opts=administrator';
		if(y>1)
			s=s+'&halaman=1';
		if (document.fcari.cari.value!='')
		{
			s=s+'&cari='+document.fcari.cari.value;
		}
		document.location.href=s;
	}

	function Kirim_Cari1()
	{
		var y = '<?php echo $_GET["cari"]; ?>';
		var s;
		s='./index.php?mod=home&opt=alumni&opts=administrator';
		if(y != '')
			s=s+'&cari='+y;
		s=s+'&halaman='+document.f2.halaman.value;
		document.location.href=s;
	}
	function showa(a){
		alert(a);
	}
</script>

<?php
// User Privilege Classification
	if(isset($_SESSION["level"])){
		if($_SESSION["level"] == 1){
			$user = "admin"; //untuk menentukan hak akses administrator
		}else if($_SESSION["level"] == 2){
			$user = "user"; // untuk menentukan hak akses user biasa
		}else if($_SESSION["level"] == 3){
			$user = "suser"; // untuk menentukan hak akses spesial user
		}
	}else{
		$user = "anonymous";
	}
	
if(isset($_SESSION['no_alumni']) && $user != "user")
{
	die("anda tidak bisa mengakses halaman ini, status user = ".$user);
?>
	<script type="text/javascript">
		alert('Anda tidak dapat mengakses halaman ini');
		document.location.href='./index.php';
	</script>
<?php
	exit();
}
?>
<table cellpadding="3" cellspacing="5" border="0" align="left" width="98%">
<tr>
	<td>
        <div id="judul_content"><h2>ALUMNI DATA</h2></div>
    <br>
    <table cellpadding="0" cellspacing="0" width="100%" border="0">
    <tr><form name="fcari">
    	<td style="font-family:verdana;font-size:12px" id="tbl1">Username atau Nama : <input type="text" name="cari" style="font-family:verdana;font-size:12px">&nbsp;&nbsp;<input type="button" value="Cari" onClick="Kirim_Cari()"></td>
    </tr></form>
    <tr>
    	<td>
        <?php
		
			if(!empty($_GET["cari"]))
			{
				$r = mysql_query("select * from alumni where angkatan LIKE '%".$_GET["cari"]."%' or nama LIKE '%".$_GET["cari"]."%'");
			}
			else
				$r = mysql_query("select * from alumni");
				
			$batas = 20;
			$halaman = $_GET["halaman"];
			
			if(empty($halaman))
			{
				$posisi = 0;
				$halaman = 1;
			}
			else
				$posisi = ($halaman - 1) * $batas;
							
			$jmldata = mysql_num_rows($r);
			$jmlhal  = ceil($jmldata/$batas);

			if(!empty($_GET["cari"]))
			{
				$r = mysql_query("select * from alumni where angkatan LIKE '%".$_GET["cari"]."%' or nama LIKE '%".$_GET["cari"]."%' order by nama asc limit ".$posisi.",".$batas."");
			}
			else
				$r = mysql_query("select * from alumni order by nama asc limit ".$posisi.",".$batas."");
			
			echo '<form name=f2><span style="font:Verdana;font-size:12px;">';
			echo '<span style=font-family:verdana;font-size:12px> Halaman: <select name=halaman onchange="javascript:Kirim_Cari1();">';
			echo '<option value="'.$halaman.'" selected="selected">'.$halaman.'</option>';
				for($i = 1; $i <= $jmlhal; $i++)
					if ($i!=$halaman)
					{
						echo '<option values="'.$i.'">'.$i.'</option>';
					}
			echo '</option>';
			echo '</select>';
			echo ' dari '.$jmlhal.' Halaman</span>';
			echo '</span></form>';
					
		?>
        </td>
    </tr>
    <tr>
		<?php
		if($user == "admin"){	
		?>
			<td id="tbl1"><a href="javascript:tambah()" class="judul">TAMBAH</a><br><br></td>
		<?php
		}
		?>	
    </tr>
    <tr>
    	<td><div id="tambah"></div></td>
    </tr>
    </table>
	<table cellpadding="3" cellspacing="1" id="tbl" width="100%">
    <tr id="tbl-label">
    	<td width="3%" align="center">NO ALUMNI</td>
        <td>NAMA</td>
        <td>ANGKATAN</td>
        <td>TAHUN LULUS</td>
        <td>TEMPAT BEKERJA</td>
		<td>VIEW</td>
		<td colspan="2">EDIT/HAPUS</td>
		
    </tr>
    <?php
		$i=$posisi + 1;
		while($r1 = mysql_fetch_array($r))
		{
			echo '<tr id="tbl-content">';
			echo '<td align="center">'.$r1["no_alumni"].'</td>';
			echo '<td>'.$r1["nama"].'</td>';
			echo '<td>'.$r1["angkatan"].'</td>';
			echo '<td>'.$r1["tahun_lulus"].'</td>';
			if($r1["nama_per"] != ""){
				echo '<td>'.$r1["nama_per"].'</td>';
			}else{
				echo '<td>On Process</td>';	
			}?>
				<td align="center"><a href="javascript:View('<?php echo $r1["no_alumni"]; ?>')" class="judul">VIEW</a>
			<?php
			if($user == "admin"){?>
				<td align="center"><a href="javascript:Edit("<?php echo $r1["no_alumni"]; ?>")" class="judul">EDIT</a>  <a class="judul" href="./index.php?mod=home&opt=alumni&opts=validasi&mode=8&no_alumni=<?php echo $r1["no_alumni"]; ?>" onClick="return confirm('Apakah Anda yakin ingin menghapus data ini?' + '\n Nama: <?php echo $r1["nama"]; ?>\n\n' + 'Jika YA silahkan klik OK, Jika TIDAK klik CANCEL.')">HAPUS</a>
            <?php
				echo '</td>';
			}else if($_SESSION['no_alumni'] == $r1['no_alumni']){?>
			<td align="center"><a href="javascript:Edit('<?php echo $r1["no_alumni"]; ?>')" class="judul">EDIT</a> <a class="judul" href="./index.php?mod=home&opt=alumni&opts=validasi&mode=8&no_alumni=<?php echo $r1["no_alumni"]; ?>" onClick="return confirm('Apakah Anda yakin ingin menghapus data ini?' + '\n Nama: <?php echo $r1["nama"]; ?>\n\n' + 'Jika YA silahkan klik OK, Jika TIDAK klik CANCEL.')">HAPUS</a>
			<?php
				echo '</td>';
			}	
			echo '</tr>';
			echo '<tr id="tbl-content">';
			echo '<td colspan="9"><div id="peserta_'.$r1["no_alumni"].'"></div></td>';
			echo '</tr>';
		}
	?>
    </table>
    </td>
</tr>
</table>