<?php

	include "./modules/erw.php";
	
	$id_link = mysql_real_escape_string($_GET['id_link']);
	
	$query = mysql_query("DELETE FROM shared_link WHERE id_link = '$id_link'");
	
	if($query){
?>
		<script>
			var id = "<? echo $id_link;?>";
			alert('ID link '+id+' telah dihapus !!');
			document.location.href = "./index.php?mod=home&opt=user&opts=shared_link";
		</script>
<?		
	}else{
?>
		<script>
			alert('Error, link gagal dihapus !!');
			document.location.href = "./index.php?mod=home&opt=user&opts=shared_link";
		</script>
<?	
	}