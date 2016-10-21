<?php
include('../erw.php');
if($_POST)
{
			$q = $_POST['searchword'];
			$q = str_replace("@","",$q);
			$q = str_replace(" ","%",$q);
			$sql_res = mysql_query("select * from alumni where nama like '%$q%' ORDER BY nama ASC LIMIT 5") or die(mysql_error());
			$num_row = mysql_num_rows($sql_res);
			if($num_row <= 0){
				echo "Pengguna Tidak Ditemukan...";
			}else{
				while($row=mysql_fetch_array($sql_res))
				{
					$nama = $row['nama'];
					$email = $row['email'];
					$img = $row['profpic'];
					$kota = $row['kab_kota'];
?>
				<div class="display_box" >
					<img src="./modules/profpic/<?php echo $img; ?>" class="image" />
					<a href="#" class='addname' title='<?php echo $email; ?>'>
					<?php echo $nama; ?>&nbsp;<?php echo $email; ?> </a>
				</div>
<?php
				}
			}	
}
?>