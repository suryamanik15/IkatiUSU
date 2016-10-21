<?php
	defined('_FCEE_EXEC') or die ( 'Restricted access2' );
	
	if(isset($_SESSION["level"])){
		if($_SESSION["level"] == 1){
			$user = "admin";
		}else if($_SESSION["level"] == 2){
			$user = "user";
		}
	}else{
		$user = "anonymous";
	}
?>