<?php
if(!isset($_SESSION['no_alumni']))
{
	unset($_SESSION["no_alumni"]);
	session_destroy();
	die("anda tidak bisa mengakses halaman ini");
?>
	<script type="text/javascript">
		alert('Anda tidak dapat mengakses halaman ini');
		document.location.href='./index.php';
	</script>
<?php
	exit();
}

$r = mysql_query("select * from alumni where no_alumni='".$_SESSION["no_alumni"]."'");
$r1 = mysql_fetch_array($r);
?>
<form action="./index.php?mod=home&opt=profil&opts=validasi" method="post" enctype="multipart/form-data">
<table cellpadding="3" cellspacing="5" border="0" align="left" width="98%">
<tr>
	<td>
    <div id="judul_content"><h2>PROFIL</h2></div>
    <br>
	<table cellpadding="3" cellspacing="1" id="tbl" width="95%">
    <tr id="tbl-content">
        <td>USERNAME</td>
        <td><input type="text" name="username" value="<?php echo $r1["no_alumni"]; ?>" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px" size="40" readonly="readonly"></td>
    </tr>
    <tr id="tbl-content">
        <td>NAME</td>
        <td><input type="text" name="nama" value="<?php echo $r1["nama"]; ?>" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>CONTACT</td>
        <td><input type="text" name="contact" value="<?php echo $r1["hp"]; ?>" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>ADDRESS</td>
        <td><input type="text" name="alamat" value="<?php echo $r1["alamat"]; ?>" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
	<tr id="tbl-content">
        <td>GANTI PROFIL PICTURE <span style="color:red;"><i>*Batas Maksimum File Image 25 MB</i></span></td>
        <td><input type="file" name="profpic" ><?php echo $r1['profpic']; ?></input>
		</td>
    </tr>
    <tr id="tbl-content">
        <td>PASSWORD</td>
        <td><input type="password" name="password" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>ULANGI PASSWORD</td>
        <td><input type="password" name="ulangi" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
    	<td colspan="2"><input type="submit" value="EDIT"></td>
    </tr>
    </table>
    </td>
</tr>
</table>
</form>