<style type="text/css" media="all">@import "../../css/template.css";</style>
<?php
	define('_FCEE_EXEC', '1');
	require_once('../erw.php');
	
$r = mysql_query("select * from alumni where no_alumni='".$_GET["no_alumni"]."'");
$r1 = mysql_fetch_array($r);
?>
<form action="../../index.php?mod=home&opt=alumni&opts=validasi&mode=7&no_alumni=<?php echo $_GET["no_alumni"]; ?>" method="post">
<table cellpadding="3" cellspacing="5" border="0" align="left" width="98%">
<tr>
	<td>
	<table cellpadding="3" cellspacing="1" id="tbl" width="95%">
    <tr id="tbl-content">
        <td>NAME</td>
        <td><input type="text" name="nama" value="<?php echo $r1["nama"]; ?>" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
	<tr id="tbl-content">
        <td>TEMPAT LAHIR</td>
        <td><input type="text" name="tmp_lahir" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
	
    <tr id="tbl-content">
    	<td>JENIS KELAMIN</td>
        <td><select name="jk" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
        	<option value="0">Select Level</option>
            <option value="1"<?php if($r1["jk"] == 1) echo 'selected="selected"'; ?>>Pria</option>
            <option value="2"<?php if($r1["jk"] == 2) echo 'selected="selected"'; ?>>Wanita</option>
        </select></td>
    </tr>
    <tr id="tbl-content">
        <td>ANGKATAN</td>
        <td><input type="text" name="angkatan" value="<?php echo $r1["angkatan"]; ?>" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>IPK</td>
        <td><input type="text" name="ipk" value="<?php echo $r1["ipk"]; ?>" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>TAHUN LULUS</td>
        <td><input type="text" name="tl" value="<?php echo $r1["tl"]; ?>" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>TAHUN BEKERJA</td>
        <td><input type="text" name="thnbkrj" value="<?php echo $r1["thnbkrj"]; ?>" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>TEMPAT BEKERJA</td>
        <td><input type="text" name="tb" value="<?php echo $r1["tb"]; ?>" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>ALAMAT</td>
        <td><input type="text" name="alamat" value="<?php echo $r1["alamat"]; ?>" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>EMAIL</td>
        <td><input type="text" name="email" value="<?php echo $r1["email"]; ?>" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>TELEPON</td>
        <td><input value="<?php echo $r1["telepon"]; ?>" type="text" name="tlpn" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" size="40"></td>
    </tr>
    <tr id="tbl-content">
    	<td colspan="2" align="center"><input type="submit" value="EDIT"></td>
    </tr>
    </table>
    </td>
</tr>
</table>
</form>