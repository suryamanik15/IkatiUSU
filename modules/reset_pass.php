<?php
	defined('_FCEE_EXEC') or die("Restricted Access (Home)");
?>
<html>
<head>
<link rel="shortcut icon" href="./images/button/logo.png" type="image/x-icon">
<title><?php echo K_TITLE; ?></title>
<style type="text/css" media="all">@import "./css/template.css";</style>
</head>
<style>
	a{
		margin-top:10px;
		text-decoration:none;
	}
	a:hover{
		color:green;
	}
</style>
<body>
<table cellpadding="0" cellspacing="0" align="center" width="100%" border=0>
<tr>
	<td align="center" valign="top">
    <table cellpadding="0" cellspacing="0" align="center" width="960px" height='600px'	border=0>
    <tr>
    	<td colspan="2" style="border-bottom:10px solid rgba(0,45,0,0.8);"><img src="./images/webmenda_01.png"></td>
    </tr>
   
    <?php
		$message = mysql_real_escape_string($_GET['confirm']);
	
	if($_SESSION["login_admin"] == md5("login_admin_fcee"))
	{
	?>
    <tr>
    	<td width="189px" valign="top" background="./images/webmenda_09.jpg" style="background-position:left; background-repeat:repeat-y">
        	<?php
				include("./modules/menu_kiri.php");
			?>
        </td>
        <td valign="top" background="./images/webmenda_10.jpg" style="background-position:right; background-repeat:repeat-y">
        	<?php
				include("./modules/menu_kanan.php");
			?>
        </td>
    </tr>
    <?php
	}
	else
	{
	?>
    <script type="text/javascript">
		function cek_login()
		{
			var nim = document.login.nim.value;
			var oldP = document.login.old_password.value;
			var newP = document.login.pass1.value;
			var konf = document.login.pass2.value;
			
			if(nim == '' || oldP == '' || newP == '' || konf == ''){
				alert('Mohon Jangan di Kosongkan !!');
				return false;
				
			}else if(newP != konf){
				alert('Maaf Konfirmasi Password anda salah !!');
				document.login.old_password.value = "";
				document.login.pass1.value = "";
				document.login.pass2.value = "";
				return false;
				
			}	
			else{
				document.login.submit();
			}	
		}
	</script>
	<?php
		if($message == ""){
	?>
			<tr><td colspan="2" style="font-size:20px;"><center>RESET PASSWORD</center></td></tr>
			<tr>
				<td align="center" colspan=3><br><br>
				<form action="modules/user/reset_password.php" method="post" name="login">
						<table cellpadding="4" cellspacing="4">
						<tr>
							<td width="80px" id="tbl1">No Alumni </td>
							<td><input type="text" name="nim"></td>
						</tr>
						<tr>
							<td id="tbl1">Old Password</td>
							<td><input type="password" name="old_password"></td>
						</tr>
						<tr>
							<td id="tbl1">New Password</td>
							<td><input type="password" name="pass1"></td>
						</tr>
						<tr>
							<td id="tbl1">Confirm New</td>
							<td><input type="password" name="pass2"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="button" value="Submit" onClick="cek_login();">&nbsp;&nbsp;<input type="reset" value="Reset"></td>
						</tr>
						</table></form><br>
				</td>
				<td>&nbsp;</td>
			</tr>
			 <tr>
				<td colspan="2"><center><span><a href="./index.php?mod=home&opt=main">Login Portal</a>&nbsp;|&nbsp;
				<a href='./index.php?mod=home&opt=data'>Registrasi Data Alumni</a></span></center></td>
			</tr>
    <?php
		}else{
				echo "<tr><td colspan=\"2\" style=\"font-size:20px;font-weight:bold;\"><center>KONFIRMASI</center></td></tr>";
				echo "<tr><td align=\"center\" style=\"text-align:justify;font-size:15px;font-weight:bold;\" colspan=\"2\">
				<p>Password Anda Sudah Dirubah, Silahkan Cek Di Email Anda.<br/>
				</p></td></tr>";
				echo "<tr style='padding-bottom:30px; border:1px solid black; '>";
				echo "<td style='float:right; margin-right:20px;'><a href=\"./index.php?mod=home&opt=main\">Login Portal</a> </td>";
				echo "<td style='float:right; margin-right:20px;'><a href='./index.php?mod=home&opt=data'>Registrasi Data Alumni</a></td>";
				echo "</tr>";	
		}
	}
	?>
    <tr>
    	<td colspan="2" style="border-top:10px solid rgba(0,45,0,0.8); font-size:10px; font-family:Verdana; margin-top:50px;">
		<center>
		Jl. Alumni No. 03 Kampus USU<br>
		Padang Bulan - Medan 20155<br>
		Sumatera Utara<br>
		Indonesia<br>
		Telp   : 061 - 8222129<br>
		Email : tek.informasi@usu.ac.id<br>
		</center></td>
    </tr>
    </table>
    </td>
</tr>
</table>
</body>
</html>
