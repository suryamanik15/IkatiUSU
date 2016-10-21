<style type="text/css" media="all">@import "../../css/template.css";</style>
<?php
	define('_FCEE_EXEC', '1');
	require_once('../../libraries/sql_db.php');
	$sql_db = new sql_db();
	
$id_login = mysql_real_escape_string($_GET["id_login"]);

$r = mysql_query("select alumni.no_alumni, alumni.nama, tbl_login.in_date, tbl_login.in_time, tbl_login.out_date, tbl_login.out_time
				FROM alumni,tbl_login where alumni.no_alumni = tbl_login.no_alumni AND tbl_login.no_alumni = '$id_login'")
				or die(mysql_error());
	
$r1 = mysql_fetch_array($r);
?>
<table cellpadding="3" cellspacing="5" border="0" align="left" width="98%">
<tr>
	<td>
	<table cellpadding="3" cellspacing="1" id="tbl" width="95%">
    <tr id="tbl-content">
        <td>NO ALUMNI</td>
        <td><input type="text" name="no_alumni" readonly="readonly" value="<?php echo $r1["no_alumni"]; ?>" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" size="40"></td>
    </tr>
    <tr id="tbl-content">
        <td>NAMA</td>
        <td><input value="<?php echo $r1["nama"]; ?>" type="text" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" size="40" name="nama"></td>
    </tr>
    <tr id="tbl-content">
        <td>LOG IN DATE</td>
        <td><input value="<?php echo $r1["in_date"]; ?>" type="text" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" size="40" name="in_date"></td>
    </tr>
    <tr id="tbl-content">
        <td>LOG IN TIME</td>
        <td><input value="<?php echo $r1["in_time"]; ?>" type="text" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" size="40" name="in_time"></td>
    </tr>
    <tr id="tbl-content">
        <td>LOG OUT DATE</td>
        <td><input value="<?php echo $r1["out_date"]; ?>" type="text" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" size="40" name="out_date"></td>
    </tr>
	<tr id="tbl-content">
        <td>LOG OUT TIME</td>
        <td><input value="<?php echo $r1["out_time"]; ?>" type="text" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" size="40" name="out_time"></td>
    </tr>
    </table>
    </td>
</tr>
</table>