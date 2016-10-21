<?php
defined('_FCEE_EXEC') or die ( 'Restricted access2' );

require_once(K_LIBRARIES.DS.'c_level.php');
require_once(K_LIBRARIES.DS.'c_main.php');
require_once(K_LIBRARIES.DS.'sql_db.php');
require_once(K_LIBRARIES.DS.'c_event.php');

$c_main=new c_main;
$c_event=new c_event;
$c_event->ECheck($c_main->Get_Stat(1),$c_main->Get_Stat(2));
$c_event->EProcess();

?>