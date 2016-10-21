<?
	$index = 1;
	?>
			<table cellpadding="3" cellspacing="1" id="tbl" width="95%">
			<tr>
				<td>Nomor</td>
				<td>Title Link</td>
				<td>Link URL</td>
				<td>Waktu Posting</td>
				<td>Aksi</td>
			</tr>
	<?
			while($row = mysql_fetch_array($query)){
		
	?>	
				<tr id="tbl-content">
				<td><? echo $index;?></td>
				<td><? echo $row['tag_link'];?></td>
				<td><? echo $row['links'];?></td>
				<td><? echo $row['time_shared'];?></td>
				<td><a href="./index.php?mod=home&opt=user&opts=delete_link&id_link=<?echo $row['id_link'];?>">Hapus</a></td>
				</tr>
	<?
				$index++;
			}
	?>	
			</table>