<style type="text/css" media="all">@import "../../css/template.css";</style>
<?php
	define('_FCEE_EXEC', '1');
	require_once('../erw.php');
	
$r = mysql_query("select * from alumni where no_alumni='".$_GET["no_alumni"]."'");
$r1 = mysql_fetch_array($r);
?>
<table cellpadding="3" cellspacing="5" border="0" align="left" width="98%">
<tr>
	<td>
	<table cellpadding="3" cellspacing="1" id="tbl" width="95%">
    <tr id="tbl-content">
        <td>NO ALUMNI</td>
        <td><?php echo $r1["no_alumni"]; ?></td>
    </tr>
	<tr id="tbl-content">
        <td>NAMA</td>
        <td><?php echo $r1["nama"]; ?></td>
    </tr>
	
    <tr id="tbl-content">
        <td>JENIS KELAMIN</td>
        <td><?php
				echo $r1['jenkel'];
			?></td>
    </tr>
    <tr id="tbl-content">
        <td>ANGKATAN</td>
        <td><?php echo $r1["angkatan"]; ?></td>
    </tr>
    <tr id="tbl-content">
        <td>TAHUN LULUS</td>
        <td><?php echo $r1["tahun_lulus"]; ?></td>
    </tr>
	<tr id="tbl-content">
        <td>ALAMAT</td>
        <td><?php 
			echo $r1["alamat"].", Kelurahan ".$r1["kelurahan"]." Kecamatan ".$r1["kecamatan"]." Kab/Kota ".$r1["kab_kota"]." Provinsi ".$r1["provinsi"]; 
		?> 
		</td>
    </tr>
	<tr id="tbl-content">
        <td>NO HANDPHONE</td>
        <td><?php echo $r1["hp"]; ?></td>
    </tr>
	<tr id="tbl-content">
        <td>NO TELEPON</td>
        <td><?php echo $r1["telp"]; ?></td>
    </tr>
	<?php
		if($r1["pekerjaan"] == ""){
			echo "<tr id=\"tbl-content\"><td>PEKERJAAN</td><td>Masih Proses</td></tr>";
		}else{
	?>
	<tr id="tbl-content">
        <td>PEKERJAAN </td>
        <td><?php echo $r1["pekerjaan"]; ?></td>
    </tr>
    <tr id="tbl-content">
        <td>NAMA PERUSAHAAN</td>
        <td><?php 
			if($r1["nama_per"] != ""){
				echo $r1["nama_per"];
			}else{
				echo "On Process";
			}
		?></td>
    </tr>
    <tr id="tbl-content">
        <td>TEMPAT/ALAMAT PERUSAHAAN (TEMPAT BEKERJA)</td>
        <td><?php 
			if($r1["alamat_per"] != ""){
				echo $r1["alamat_per"];
			}else{	
				echo "-";
			}	
		?></td>
    </tr>
    <tr id="tbl-content">
        <td>FAX/EMAIL/TELP PERUSAHAAN (TEMPAT BEKERJA)</td>
        <td><?php
			if($r1["fax_em_telp"] != ""){
				echo $r1["fax_em_telp"]; 
			}else{
				echo "-";
			}
		?></td>
    </tr>
	<tr id="tbl-content">
        <td>POSISI/JABATAN</td>
        <td><?php
			if($r1["jabatan"] != ""){
				echo $r1["jabatan"]; 
			}else{
				echo "-";
			}	
		?></td>
    </tr>
	<?php
		}
	?>
   
    </table>
    </td>
</tr>
</table>