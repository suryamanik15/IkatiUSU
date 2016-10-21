<style type="text/css" media="all">@import "../../css/template.css";</style>
<?php
	define('_FCEE_EXEC', '1');
	require_once('../../libraries/sql_db.php');
	$sql_db = new sql_db();
	
$r = mysql_query("select * from tbl_login where id_login='".$_GET["id_login"]."'");
$r1 = mysql_fetch_array($r);
?>
<form action="../../index.php?mod=home&opt=user&opts=validasi&mode=7&id_login=<?php echo $_GET["id_login"]; ?>" method="post">
<table cellpadding="3" cellspacing="5" border="0" align="left" width="98%">
<tr>
	<td>
	<table cellpadding="3" cellspacing="1" id="tbl" width="95%">
    <tr id="tbl-content">
        <td>NAME</td>
        <td><input type="text" name="nama" value="<?php echo $r1["nama"]; ?>" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>CONTACT</td>
        <td><input value="<?php echo $r1["contact"]; ?>" type="text" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" size="40" name="contact"></td>
    </tr>
    <tr id="tbl-content">
        <td>ADDRESS</td>
        <td><input value="<?php echo $r1["alamat"]; ?>" type="text" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" size="40" name="alamat"></td>
    </tr>
    <tr id="tbl-content">
    	<td>LEVEL</td>
        <td><select name="level" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
        	<option value="0">Select Level</option>
            <option value="1"<?php if($r1["level"] == 1) echo 'selected="selected"'; ?>>Administrator</option>
            <option value="2"<?php if($r1["level"] == 2) echo 'selected="selected"'; ?>>Data Entry</option>
        </select></td>
    </tr>
    <tr id="tbl-content">
        <td>USERNAME</td>
        <td><input type="text" name="username" value="<?php echo $r1["username"]; ?>" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>    
    <tr id="tbl-content">
        <td>PASSWORD</td>
        <td><input type="password" name="password" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>REPEAT PASSWORD</td>
        <td><input type="password" name="ulangi" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
    	<td colspan="2" align="center"><input type="submit" value="EDIT"></td>
    </tr>
    </table>
    </td>
</tr>
</table>
</form>