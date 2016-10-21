<?php
	defined('_FCEE_EXEC') or die("Restricted Access (Home)");
?>
<html>
<head>
<link rel="shortcut icon" href="./images/button/ikati.png" type="image/x-icon">
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
	
	
	if(isset($_SESSION['no_alumni']))
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
			if(document.login.username.value == '' || document.login.password.value == '')
				alert('username dan password tidak boleh kosong');
			else
				document.login.submit();
		}
	</script>
    <tr>
    	<td align="center" colspan=3><br><br>
        <form action="./index.php?mod=auth&opt=validasi" method="post" name="login">
				<table cellpadding="4" cellspacing="4">
				<tr>
					<td width="80px" id="tbl1">Username</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td id="tbl1">Password</td>
					<td><input type="password" name="password"</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="button" value="Login" onClick="cek_login();">&nbsp;&nbsp;<input type="reset" value="Reset"></td>
				</tr>
				</table><br><br>
        </td>
	</tr>
	<tr>
			<td colspan="2"><center><span><a href="./index.php?mod=home&opt=reset">Reset Password</a>&nbsp;|&nbsp;
			<a href='./index.php?mod=home&opt=data&phase=Step_One'>Registrasi Data Alumni</a></span></center></td>
	</tr>
    <?php
	}
	?>
    <tr>
    	<td colspan="2" style="border-top:10px solid rgba(0,45,0,0.8); font-size:16px; font-family:Comic San MS; margin-top:50px;">
		<center>
		Jl. Alumni No. 03 Kampus USU<br>
		Padang Bulan - Medan 20155<br>
		Sumatera Utara<br>
		Indonesia<br>
		Telp   : 061 - 8222129<br>
		Email : ikati.usumedan@gmail.com<br>
		</center></td>
    </tr>
	<!--
	<tr>
		<td colspan="2" style="border-top:5px solid rgba(0,45,0,0.8); font-size:12px; font-family:Verdana; margin-top:50px;">
			<span style="float:right;">
				<ul>
					<li>Tentang Sistem &nbsp;</li>
					<li>Visi Misi IKATI &nbsp;</li>
					<li>QR Code Anda &nbsp;</li>
				</ul>
			</span>
		</td>
	</tr>
	-->
    </table>
    </td>
</tr>
</table>
</body>
</html>
