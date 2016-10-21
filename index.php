<?php

error_reporting(E_ALL ^ E_NOTICE);

session_start();
/*if(!isset($_SESSION["old_guest"]))
{
	header("location:./splash.php");
	exit();
}*/
?>
	<script type="text/javascript" src="libraries/jquery-1.7.2.js"></script>
<?php
define('_FCEE_EXEC', '1');
define('K_BASE', dirname (__FILE__));
define('DS', DIRECTORY_SEPARATOR);
require_once(K_BASE.DS.'includes'.DS.'defines.php');
require_once(K_BASE.DS.'includes'.DS.'paging.php');
require_once(K_LIBRARIES.DS.'import.php');

//$sql_db->sql_close();
//$r = mysql_query("select * from level where id_level=1");
//$r1 = mysql_fetch/_row($r);
//echo $r1[0];
?>