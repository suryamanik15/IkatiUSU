<?php
if($_GET["mode"] == 1) //edit pembicara
{
    if($_POST["username"] == '' or $_POST["nama"] == '' or $_POST["institusi"] == '' or $_POST["negara"]=='')
    {
    ?>
		<script type="text/javascript">
			alert('completed form');
			parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=pembicara';
		</script>
    <?php
        exit();
    }
    
    $r = mysql_query("select username from tbl_peserta where username='".$_POST["username"]."' and id_peserta<>'".$_GET["id_peserta"]."'");
    if(mysql_num_rows($r) >= 1)
    {
    ?>
		<script type="text/javascript">
			alert('username already exists');
			parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=pembicara';
		</script>
    <?php
        exit();
    }
    
    if($_POST["password"] == '')
    {
        $r = mysql_query("update tbl_peserta set username='".$_POST["username"]."', nama='".$_POST["nama"]."', institusi='".$_POST["institusi"]."', negara='".$_POST["negara"]."' where id_peserta='".$_GET["id_peserta"]."'");
        if($r)
        {
        ?>
            <script type="text/javascript">
                alert('success');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=pembicara';
            </script>
        <?php
            exit();
        }
        else
        {
        ?>
            <script type="text/javascript">
                alert('failed');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=pembicara';
            </script>
        <?php
            exit();
        }
    }
    else if($_POST["password"] != '')
    {
        if($_POST["password"] != $_POST["ulangi"])
        {
        ?>
            <script type="text/javascript">
                alert('not the same password repeated');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=pembicara';
            </script>
        <?php
            exit();
        }
        
        $password = md5($_POST["password"]).md5("FCEE_ABSTRACK").md5("register");
        
        $r = mysql_query("update tbl_peserta set username='".$_POST["username"]."', nama='".$_POST["nama"]."', negara='".$_POST["negara"]."', institusi='".$_POST["institusi"]."', password='".$password."' where id_peserta='".$_GET["id_peserta"]."'");
        
        if($r)
        {
        ?>
            <script type="text/javascript">
                alert('success');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=pembicara';
            </script>
        <?php
            exit();
        }
        else
        {
        ?>
            <script type="text/javascript">
                alert('failed');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=pembicara';
            </script>
        <?php
            exit();
        }
    }
}
else if($_GET["mode"] == 2) // delete pembicara
{
	if($_GET["id_peserta"] != '')
	{
		$d = mysql_query("delete from tbl_peserta where id_peserta='".$_GET["id_peserta"]."'");
		if($d)
		{
			$t = mysql_query("select abstrack from tbl_abstrack where id_peserta='".$_GET["id_peserta"]."'");
			while($t1 = mysql_fetch_array($t))
			{
				unlink("../upload/abstrack/".$t1["abstrack"]);
			}
			
			$t = mysql_query("select paper from tbl_paper where id_peserta='".$_GET["id_peserta"]."'");
			while($t1 = mysql_fetch_array($t))
			{
				unlink("../upload/paper/".$t1["paper"]);
			}
			
			$t = mysql_query("select bayar from tbl_bayar where id_peserta='".$_GET["id_peserta"]."'");
			while($t1 = mysql_fetch_array($t))
			{
				unlink("../upload/pembayaran/".$t1["bayar"]);
			}
			
			mysql_query("delete from tbl_abstrack where id_peserta='".$_GET["id_peserta"]."'");
			mysql_query("delete from tbl_paper where id_peserta='".$_GET["id_peserta"]."'");
			mysql_query("delete from tbl_bayar where id_peserta='".$_GET["id_peserta"]."'");
		?>
			<script type="text/javascript">
                alert('success');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=pembicara';
            </script>
        <?php	
            exit();
		}
		else
		{
		?>
			<script type="text/javascript">
                alert('failed');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=pembicara';
            </script>
        <?php	
            exit();
		}
	}
	else
	{
	?>
    	<script type="text/javascript">
			alert('failed');
			parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=pembicara';
		</script>
    <?php	
		exit();
	}
}
if($_GET["mode"] == 3) // TAMBAH PEMBICARA	
{
	$nama = $_POST["nama"];
	$institusi = $_POST["institusi"];
	$negara = $_POST["negara"];
	$makalah = 1;
	$username = $_POST["username"];
	$password = md5($_POST["password"]).md5("FCEE_ABSTRACK").md5("register");
	
	if($makalah == '0' or $nama == '' or $negara == '' or $institusi == '' or $username == '' or $password == '')
	{
	?>
    	<script type="text/javascript">
			alert("complete the form");
			parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=pembicara';
		</script>
    <?php
		exit();
	}
	
	$r = mysql_query("select username from tbl_peserta where username='".$username."'");
	if(mysql_num_rows($r) >= 1)
	{
	?>
    	<script type="text/javascript">
			alert("username already exists");
			parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=pembicara';
		</script>
    <?php
		exit();
	}
	$status = 0;
	if($makalah == 2)
		$status = 2;	
	$r = mysql_query("insert into tbl_peserta (nama, id_makalah, institusi, negara, username, password, status) values ('$nama', '$makalah', '$institusi', '$negara', '$username', '$password', '$status')");
	
	if($r)
	{
	?>
    	<script type="text/javascript">
			alert("success");
			parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=pembicara';
		</script>
    <?php
		exit();
	}
	else
	{
	?>
    	<script type="text/javascript">
			alert("failed");
			parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=pembicara';
		</script>
    <?php
		exit();
	}
}
else if($_GET["mode"] == 4) //edit peserta
{
    if($_POST["username"] == '' or $_POST["nama"] == '' or $_POST["institusi"] == '' or $_POST["negara"]=='')
    {
    ?>
    <script type="text/javascript">
        alert('completed form');
        parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=peserta';
    </script>
    <?php
        exit();
    }
    
    $r = mysql_query("select username from tbl_peserta where username='".$_POST["username"]."' and id_peserta<>'".$_GET["id_peserta"]."'");
    if(mysql_num_rows($r) >= 1)
    {
    ?>
    <script type="text/javascript">
        alert('username already exists');
        parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=peserta';
    </script>
    <?php
        exit();
    }
    
    if($_POST["password"] == '')
    {
        $r = mysql_query("update tbl_peserta set username='".$_POST["username"]."', nama='".$_POST["nama"]."', institusi='".$_POST["institusi"]."', negara='".$_POST["negara"]."' where id_peserta='".$_GET["id_peserta"]."'");
        if($r)
        {
        ?>
            <script type="text/javascript">
                alert('success');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=peserta';
            </script>
        <?php
            exit();
        }
        else
        {
        ?>
            <script type="text/javascript">
                alert('failed');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=peserta';
            </script>
        <?php
            exit();
        }
    }
    else if($_POST["password"] != '')
    {
        if($_POST["password"] != $_POST["ulangi"])
        {
        ?>
            <script type="text/javascript">
                alert('not the same password repeated');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=peserta';
            </script>
        <?php
            exit();
        }
        
        $password = md5($_POST["password"]).md5("FCEE_ABSTRACK").md5("register");
        
        $r = mysql_query("update tbl_peserta set username='".$_POST["username"]."', nama='".$_POST["nama"]."', negara='".$_POST["negara"]."', institusi='".$_POST["institusi"]."', password='".$password."' where id_peserta='".$_GET["id_peserta"]."'");
        
        if($r)
        {
        ?>
            <script type="text/javascript">
                alert('success');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=peserta';
            </script>
        <?php
            exit();
        }
        else
        {
        ?>
            <script type="text/javascript">
                alert('failed');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=peserta';
            </script>
        <?php
            exit();
        }
    }
}
else if($_GET["mode"] == 5) // delete peserta
{
	if($_GET["id_peserta"] != '')
	{
		$d = mysql_query("delete from tbl_peserta where id_peserta='".$_GET["id_peserta"]."'");
		if($d)
		{		
			$t = mysql_query("select bayar from tbl_bayar where id_peserta='".$_GET["id_peserta"]."'");
			while($t1 = mysql_fetch_array($t))
			{
				unlink("../upload/pembayaran/".$t1["bayar"]);
			}
			
			mysql_query("delete from tbl_bayar where id_peserta='".$_GET["id_peserta"]."'");
		?>
			<script type="text/javascript">
                alert('success');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=peserta';
            </script>
        <?php	
            exit();
		}
		else
		{
		?>
			<script type="text/javascript">
                alert('failed');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=peserta';
            </script>
        <?php	
            exit();
		}
	}
	else
	{
	?>
    	<script type="text/javascript">
			alert('failed');
			parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=peserta';
		</script>
    <?php	
		exit();
	}
}
if($_GET["mode"] == 6) // TAMBAH PESERTA	
{
	$nama = $_POST["nama"];
	$institusi = $_POST["institusi"];
	$negara = $_POST["negara"];
	$makalah = 2;
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
	
	if($makalah == '0' or $nama == '' or $negara == '' or $institusi == '' or $username == '' or $password == '')
	{
	?>
    	<script type="text/javascript">
			alert("complete the form");
			parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=peserta';
		</script>
    <?php
		exit();
	}
	
	$r = mysql_query("select username from tbl_peserta where username='".$username."'");
	if(mysql_num_rows($r) >= 1)
	{
	?>
    	<script type="text/javascript">
			alert("username already exists");
			parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=peserta';
		</script>
    <?php
		exit();
	}
	$status = 0;
	if($makalah == 2)
		$status = 2;	
	$r = mysql_query("insert into tbl_peserta (nama, id_makalah, institusi, negara, username, password, status) values ('$nama', '$makalah', '$institusi', '$negara', '$username', '$password', '$status')");
	
	if($r)
	{
	?>
    	<script type="text/javascript">
			alert("success");
			parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=peserta';
		</script>
    <?php
		exit();
	}
	else
	{
	?>
    	<script type="text/javascript">
			alert("failed");
			parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=peserta';
		</script>
    <?php
		exit();
	}
}
else if($_GET["mode"] == 7) //edit administrator
{
    if($_POST["nama"] == '' or $_POST["angkatan"] == '' or $_POST["ipk"] == '' or $_POST["tl"] == '' or $_POST["tb"]=='' or $_POST["jk"] == '0')
    {
    ?>
    <script type="text/javascript">
        alert('completed form');
        parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=administrator';
    </script>
    <?php
        exit();
    }
        
    else if($_POST["alamat"] == '' or $_POST["email"] == '' or $_POST["tlpn"]== '')
    {
        $r = mysql_query("update tbl_alumni set nama='".$_POST["nama"]."', jk='".$_POST["jk"]."', angkatan='".$_POST["angkatan"]."', ipk='".$_POST["ipk"]."', tl='".$_POST["tl"]."', thnbkrj='".$_POST["thnbkrj"]."', tb='".$_POST["tb"]."' where no_alumni='".$_GET["no_alumni"]."'");
        if($r)
        {
        ?>
            <script type="text/javascript">
                alert('success');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=administrator';
            </script>
        <?php
            exit();
        }
        else
        {
        ?>
            <script type="text/javascript">
                alert('failed');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=administrator';
            </script>
        <?php
            exit();
        }
    }
	
	else if($_POST["alamat"] != '' or $_POST["email"] != '' or $_POST["tlpn"] != '')
    {
        $r = mysql_query("update tbl_alumni set nama='".$_POST["nama"]."', jk='".$_POST["jk"]."', angkatan='".$_POST["angkatan"]."', ipk='".$_POST["ipk"]."', tl='".$_POST["tl"]."', thnbkrj='".$_POST["thnbkrj"]."', tb='".$_POST["tb"]."', alamat='".$_POST["alamat"]."', email='".$_POST["email"]."', telepon='".$_POST["tlpn"]."' where no_alumni='".$_GET["no_alumni"]."'");
        if($r)
        {
        ?>
            <script type="text/javascript">
                alert('success');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=administrator';
            </script>
        <?php
            exit();
        }
        else
        {
        ?>
            <script type="text/javascript">
                alert('failed');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=administrator';
            </script>
        <?php
            exit();
        }
    }
}


else if($_GET["mode"] == 8) // delete administrator
{
	if($_GET["no_alumni"] != '')
	{
		$d = mysql_query("delete from tbl_alumni where no_alumni='".$_GET["no_alumni"]."'");
		if($d)
		{		
		?>
			<script type="text/javascript">
                alert('success');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=administrator';
            </script>
        <?php	
            exit();
		}
		else
		{
		?>
			<script type="text/javascript">
                alert('failed');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=administrator';
            </script>
        <?php	
            exit();
		}
	}
	else
	{
	?>
    	<script type="text/javascript">
			alert('failed');
			parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=administrator';
		</script>
    <?php	
		exit();
	}
}
if($_GET["mode"] == 9) // TAMBAH ADMINISTRATOR	
{
	$nama = $_POST["nama"];
	$jk = $_POST["jk"];
	$angkatan = $_POST["angkatan"];
	$ipk = $_POST["ipk"];
	$tl = $_POST["tl"];
	$thnbkrj = $_POST["thnbkrj"];
	$tb = $_POST["tb"];
	$alamat = $_POST["alamat"];
	$email = $_POST["email"];
	$tlpn = $_POST["tlpn"];
	
	
	if($nama == '' or $angkatan == '' or $ipk =='' or $tl == '' or $tb =='' or $jk == '0')
    {
    ?>
    <script type="text/javascript">
        alert('completed form');
        parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=administrator';
    </script>
    <?php
        exit();
    }
        
    else if($alamat == '' or $email == '' or $tlpn == '')
    {
        $r = mysql_query("insert into tbl_alumni (nama, jk, angkatan, ipk, tl, thnbkrj, tb) values ('$nama', '$jk', '$angkatan', '$ipk', '$tl', '$thnbkrj', '$tb')");
        if($r)
        {
        ?>
            <script type="text/javascript">
                alert('success');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=administrator';
            </script>
        <?php
            exit();
        }
        else
        {
        ?>
            <script type="text/javascript">
                alert('failed');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=administrator';
            </script>
        <?php
            exit();
        }
    }
	
	else if($alamat != '' or $email != '' or $tlpn != '')
    {
        $r = mysql_query("insert into tbl_alumni (nama, jk, angkatan, ipk, tl, thnbkrj, tb, alamat, email, telepon) values ('$nama', '$jk', '$angkatan', '$ipk', '$tl', '$thnbkrj', '$tb', '$alamat', '$email', '$tlpn')");
        if($r)
        {
        ?>
            <script type="text/javascript">
                alert('success');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=administrator';
            </script>
        <?php
            exit();
        }
        else
        {
        ?>
            <script type="text/javascript">
                alert('failed');
                parent.parent.document.location.href='./index.php?mod=home&opt=alumni&opts=administrator';
            </script>
        <?php
            exit();
        }
	}
}