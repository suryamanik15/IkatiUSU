<script type="text/javascript">
function tambah()
{
	var t = document.getElementById("tambah");
	if(t.innerHTML == '')
		t.innerHTML = '<iframe src="./modules/login/tambah_administrator.php" width="500px" height="250px" frameborder="0" scrolling="auto" id="iframe_edit"></iframe>';
	else
		t.innerHTML = '';
}
function Edit(a)
{
	var t = document.getElementById("peserta_"+a+"");
	if(t.innerHTML == '')
		t.innerHTML = '<iframe src="./modules/login/edit_administrator.php?id_login='+a+'" width="500px" height="300px" frameborder="0" scrolling="auto" id="iframe_edit"></iframe>';
	else
		t.innerHTML = '';
}
function Kirim_Cari()
	{
		var y = '<?php echo $_GET["halaman"]; ?>';
		var s;
		s='./index.php?mod=home&opt=user&opts=administrator';
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
		s='./index.php?mod=home&opt=user&opts=administrator';
		if(y != '')
			s=s+'&cari='+y;
		s=s+'&halaman='+document.f2.halaman.value;
		document.location.href=s;
	}
</script>

<?php
if(isset($_SESSION['no_alumni']) && $_SESSION['level'] == 1)
{
	die("anda tidak bisa mengakses halaman ini");
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
        <div id="judul_content"><h2>LOGIN ADMINISTRATOR MANAGEMENT</h2></div>
    <br>
    <table cellpadding="0" cellspacing="0" width="100%" border="0">
    <tr><form name="fcari">
    	<td style="font-family:verdana;font-size:12px" id="tbl1">Username atau Nama : <input type="text" name="cari" style="font-family:verdana;font-size:12px">&nbsp;&nbsp;<input type="button" value="Cari" onClick="Kirim_Cari()"></td></form>
    </tr>
    <tr>
    	<td>
        <?php
		
			if(!empty($_GET["cari"]))
			{
				
				$r = mysql_query("select * from alumni where no_alumni LIKE '%".$_GET["cari"]."%' or nama LIKE '%".$_GET["cari"]."%'");
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
				$r = mysql_query("select * from alumni where no_alumni LIKE '%".$_GET["cari"]."%' or nama LIKE '%".$_GET["cari"]."%' order by no_alumni asc limit ".$posisi.",".$batas."");
			}
			else
				$r = mysql_query("select * from alumni order by no_alumni asc limit ".$posisi.",".$batas."");
			
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
    	<td id="tbl1"><a href="javascript:tambah()" class="judul">TAMBAH</a><br><br></td>
    </tr>
    <tr>
    	<td><div id="tambah"></div></td>
    </tr>
    </table>
	<table cellpadding="3" cellspacing="1" id="tbl" width="100%">
    <tr id="tbl-label">
    	<td width="3%" align="center">NO.</td>
        <td>NO ALUMNI</td>
        <td>NAMA</td>
        <td>ALAMAT</td>
        <td>KONTAK(HP/TELP)</td>
        <td>AKTIVITAS</td>
    </tr>
    <?php
		$i=$posisi + 1;
		while($r1 = mysql_fetch_array($r))
		{
			echo '<tr id="tbl-content">';
			echo '<td align="center">'.$i.'</td>';
			echo '<td>'.$r1['no_alumni'].'</td>';
			echo '<td>'.$r1['nama'].'</td>';
			echo '<td>'.$r1['alamat'].'</td>';
			if($r1['telp'] != '' && $r1['hp'] != ''){
				echo '<td>'.$r1['telp'].'('.$r1['hp'].')</td>';
			}else if($r1['telp'] == '' && $r1['hp'] != ''){
				echo '<td>'.$r1['hp'].'</td>';
			}else if($r1['telp'] != '' && $r1['hp'] == ''){
				echo '<td>'.$r1['telp'].'</td>';
			}else{
				echo '<td>&nbsp;-&nbsp;</td>';
			}			
			echo '<td align="center"><a href="javascript:Edit('.$r1["no_alumni"].')" class="judul">EDIT</a> /'; ?> <a class="judul" href="./index.php?mod=home&opt=user&opts=validasi&mode=8&id_login=<?php echo $r1["no_alumni"]; ?>" onClick="return confirm('Apakah Anda yakin ingin menghapus data ini?' + '\n Username: ' + '<?php echo $r1["username"]; ?>' + '\n Nama: <?php echo $r1["nama"]; ?>\n\n' + 'Jika YA silahkan klik OK, Jika TIDAK klik CANCEL.')">HAPUS</a>
            <?php
            echo '</td>';
			echo '</tr>';
			echo '<tr id="tbl-content">';
			echo '<td colspan="8"><div id="peserta_'.$r1["no_alumni"].'"></div></td>';
			echo '</tr>';
			$i++;
		}
	?>
    </table>
    </td>
</tr>
</table>