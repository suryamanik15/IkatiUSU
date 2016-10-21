<script type="text/javascript">

function Edit(a)
{
	var t = document.getElementById("peserta_"+a+"");
	if(t.innerHTML == '')
		t.innerHTML = '<iframe src="./modules/user/edit_user_mon.php?id_login='+a+'" width="500px" height="300px" frameborder="0" scrolling="auto" id="iframe_edit"></iframe>';
	else
		t.innerHTML = '';
}
function Kirim_Cari()
	{
		var y = '<?php echo mysql_real_escape_string($_GET["halaman"]); ?>';
		var s;
		s='./index.php?mod=home&opt=user&opts=monitoring';
		if(y > 1)
			s=s+'&halaman=1';
		if (document.fcari.cari.value!='')
		{
			s=s+'&cari='+document.fcari.cari.value;
		}
		document.location.href=s;
	}

	function Kirim_Cari1()
	{
		var y = '<?php echo mysql_real_escape_string($_GET["cari"]); ?>';
		var s;
		s='./index.php?mod=home&opt=user&opts=monitoring';
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
        <div id="judul_content"><h2>USER MONITORING PANEL</h2></div>
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
				
				$r = mysql_query("select alumni.no_alumni, alumni.nama, tbl_login.in_date, tbl_login.in_time, tbl_login.out_date, tbl_login.out_time
				FROM alumni,tbl_login where alumni.no_alumni = tbl_login.no_alumni AND alumni.no_alumni LIKE
				'%".$_GET["cari"]."%' OR alumni.nama LIKE '%".$_GET["cari"]."%'");
			}
			else
				$r = mysql_query("select alumni.no_alumni, alumni.nama, tbl_login.in_date, tbl_login.in_time, tbl_login.out_date, tbl_login.out_time
				FROM alumni,tbl_login where alumni.no_alumni = tbl_login.no_alumni");
				
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
				$r = mysql_query("select alumni.no_alumni, alumni.nama, tbl_login.in_date, tbl_login.in_time, tbl_login.out_date, tbl_login.out_time
				FROM alumni,tbl_login where alumni.no_alumni = tbl_login.no_alumni AND alumni.no_alumni LIKE
				'%".$_GET["cari"]."%' OR alumni.nama LIKE '%".$_GET["cari"]."%' ORDER BY alumni.no_alumni ASC 
				LIMIT ".$posisi.",".$batas."");
				
			}
			else
				$r = mysql_query("select alumni.no_alumni, alumni.nama, tbl_login.in_date, tbl_login.in_time, tbl_login.out_date, tbl_login.out_time
				FROM alumni,tbl_login where alumni.no_alumni = tbl_login.no_alumni ORDER BY alumni.no_alumni ASC 
				LIMIT ".$posisi.",".$batas."");
			
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
    </table>
	<table cellpadding="3" cellspacing="1" id="tbl" width="100%">
    <tr id="tbl-label">
    	<td width="3%" align="center">NO</td>
        <td>NO ALUMNI</td>
        <td>NAMA USER</td>
        <td>LOG IN DATE</td>
        <td>LOG IN TIME</td>
        <td>LOG OUT DATE</td>
		<td>LOG OUT TIME</td>
		<td colspan="2">AKSI</td>
    </tr>
    <?php
		$i = $posisi + 1;
		while($r1 = mysql_fetch_array($r))
		{
			echo '<tr id="tbl-content">';
			echo '<td align="center">'.$i.'</td>';
			echo '<td>'.$r1['no_alumni'].'</td>';
			echo '<td>'.$r1['nama'].'</td>';
			echo '<td>'.$r1['in_date'].'</td>';
			echo '<td>'.$r1['in_time'].'</td>';
			echo '<td>'.$r1['out_date'].'</td>';
			echo '<td>'.$r1['out_time'].'</td>';
			echo '<td align="center"><a href="javascript:Edit('.$r1["no_alumni"].')" class="judul">VIEW</a>'; ?> <a class="judul" href="./index.php?mod=home&opt=user&opts=validasi&mode=8&id_login=<?php echo $r1["no_alumni"]; ?>" onClick="return confirm('Apakah Anda yakin ingin menghapus data ini?' + '\n Username: ' + '<?php echo $r1["username"]; ?>' + '\n Nama: <?php echo $r1["nama"]; ?>\n\n' + 'Jika YA silahkan klik OK, Jika TIDAK klik CANCEL.')">HAPUS</a>
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