<div id="judul_content"><h2>LINK BERITA</h2></div>
<br>
<ul>
<?php
					$batas = 10;
					if (!empty($_GET['halaman']) )
					$halaman = mysql_real_escape_string($_GET['halaman']);
					$pembatas =0;

					if(empty($halaman))
					{
						$posisi=0;
						$halaman=1;
					}
					else
					{
						$posisi = ($halaman-1) * $batas;
					}
					
		$query = mysql_query("SELECT alumni.nama, shared_link.tag_link, shared_link.links, shared_link.time_shared FROM alumni, shared_link 
								WHERE alumni.no_alumni = shared_link.no_alumni ORDER BY shared_link.time_shared
								 DESC LIMIT $posisi,$batas") or die(mysql_error());
		$numberRow = mysql_num_rows($query);
		if($numberRow > 0 ){
			while($data = mysql_fetch_array($query)){		
?>	
			<div style="border-bottom:2px dotted black; margin-bottom:12px;">
				<span style="font-size:12px;font-weight:bold;">Diposting oleh : <? echo $data['nama'];?> , 
				<? echo $data['time_shared'];?>
				</span><br/><br/>
				
				<span style="font-size:16px; color:green;"><? echo $data['tag_link'];?></span>
				
				<p align="justify" style="font-family:verdana; font-size:15px;">
					<a href="<? echo $data['links'];?>" target="_blank"><? echo $data['links'];?></a>
				</p>
			</div><br/>
<?php
			}
			
								$query2 = "SELECT * FROM shared_link";
								$file = "./index.php?mod=home&opt=alumni&opts=berita";
								$hasil2 = mysql_query($query2);
								$jmldata = mysql_num_rows($hasil2);

								$jmlhalaman=ceil($jmldata/$batas);


								//link ke halaman sebelumnya (previous)
								if($halaman > 1)
								{
									$previous=$halaman-1;
									echo "<center><p><A HREF=".$file."&halaman=1&batas=$batas>Awal</A> | 
										<A HREF=".$file."&halaman=$previous&batas=$batas> Sebelumnya</A></p></center> ";
								}
								else
								{ 
									//echo "<center><p>Halaman : <a href=$file?halaman=$halaman>$halaman</a></p></center>";
								}

								$angka=($halaman > 3 ? " ... " : " ");
								for($i=$halaman-2;$i<$halaman;$i++)
								{
								  if ($i < 1) 
									  continue;
								  $angka .= "<center><p><a href=".$file."&halaman=$i&batas=$batas>$i</a></p></center> ";
								}

								$angka .= " <b>$halaman</b> ";
								for($i=$halaman+1;$i<($halaman+3);$i++)
								{
								  if ($i > $jmlhalaman) 
									  break;
								  $angka .= "<center><p><a href=".$file."&halaman=$i&batas=$batas>$i</a></p></center> ";
								}

								$angka .= ($halaman+2<$jmlhalaman ? " ...  
										  <center><p><a href=".$file."&halaman=$jmlhalaman&batas=$batas>$jmlhalaman</a></p></center> " : " ");

								echo "";

								//link kehalaman berikutnya (Next)
								if($halaman < $jmlhalaman)
								{
									$next=$halaman+1;
									echo "<center><p><a href=".$file."&halaman=$next&batas=$batas>Berikut </a> | 
								  <a href=".$file."&halaman=$jmlhalaman&batas=$batas>Akhir </a></p></center> ";
								}
								else
								{ 
									echo "";
								}
								
	}else{
		echo "<center><h3>Belum Ada Postingan Berita</h3></center>";
	}	
?>	
</ul>