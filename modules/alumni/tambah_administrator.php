<style type="text/css" media="all">@import "../../css/template.css";</style>
<?php
	define('_FCEE_EXEC', '1');
	require_once('../../libraries/sql_db.php');
	$sql_db=new sql_db();
	
?>
<form action="../../index.php?mod=home&opt=alumni&opts=validasi&mode=9" method="post">
<table cellpadding="3" cellspacing="5" border="0" align="left" width="98%">
<tr>
	<td>
	<table cellpadding="3" cellspacing="1" id="tbl" width="95%">
    <tr id="tbl-content">
        <td>NAME</td>
        <td><input type="text" name="nama" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
    	<td>JENIS KELAMIN</td>
        <td><select name="jk" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
        	<option value="0">Select Level</option>
            <option value="1">Pria</option>
            <option value="2">Wanita</option>
        </select></td>
    </tr>
    <tr id="tbl-content">
        <td>ANGKATAN</td>
        <td><input type="text" name="angkatan" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>IPK</td>
        <td><input type="text" name="ipk" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>TAHUN LULUS</td>
        <td><input type="text" name="tl" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>TAHUN BEKERJA</td>
        <td><input type="text" name="thnbkrj" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>TEMPAT BEKERJA</td>
        <td><input type="text" name="tb" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>ALAMAT</td>
        <td><input type="text" name="alamat" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>EMAIL</td>
        <td><input type="text" name="email" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>TELEPON</td>
        <td><input type="text" name="tlpn" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" size="40"></td>
    </tr>
    <tr id="tbl-content">
    	<td colspan="2" align="center"><input type="submit" value="TAMBAH"></td>
    </tr>
    </table>
    </td>
</tr>
</table>
</form>