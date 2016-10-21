<style type="text/css" media="all">@import "../../css/template.css";</style>
<?php
	define('_FCEE_EXEC', '1');
	require_once('../../libraries/sql_db.php');
	$sql_db=new sql_db();
	
?>
<form action="../../index.php?mod=home&opt=user&opts=validasi&mode=9" method="post">
<table cellpadding="3" cellspacing="5" border="0" align="left" width="98%">
<tr>
	<td>
	<table cellpadding="3" cellspacing="1" id="tbl" width="95%">
    <tr id="tbl-content">
        <td>NAME</td>
        <td><input type="text" name="nama" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>CONTACT</td>
        <td><input type="text" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" size="40" name="contact"></td>
    </tr>
    <tr id="tbl-content">
        <td>ADDRESS</td>
        <td><input type="text" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" size="40" name="alamat"></td>
    </tr>
    <tr id="tbl-content">
    	<td>LEVEL</td>
        <td><select name="level" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
        	<option value="0">Select Level</option>
            <option value="1">Administrator</option>
        </select></td>
    </tr>
    <tr id="tbl-content">
        <td>USERNAME</td>
        <td><input type="text" name="username" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>    
    <tr id="tbl-content">
        <td>PASSWORD</td>
        <td><input type="password" name="password" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
    	<td colspan="2" align="center"><input type="submit" value="TAMBAH"></td>
    </tr>
    </table>
    </td>
</tr>
</table>
</form>