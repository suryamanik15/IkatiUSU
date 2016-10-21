<?php
	
	function login_num_row(){
		$query = mysql_query("SELECT * FROM tbl_login") or die(mysql_error());	
		$num = mysql_num_rows($query);
		
		return $num;
	}

	function alumni_num_row(){
		$query = mysql_query("SELECT * FROM alumni") or die(mysql_error());
		$num = mysql_num_rows($query);
		
		return $num;
	}	

?>