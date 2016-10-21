<?php
 defined ('_FCEE_EXEC') or die ("Restricted Access");
switch ($_GET["mod"])
{
	case "home" :
		switch($_GET["opt"])
		{
			case "kuisioner" :
				include('./modules/kuisioner.php');
				break;
			case "enval" :
				include('./modules/enval.php');
				break;
			case "data" :
				include('./modules/dataalumni.php');
				break;
			case "insert_link" :
				include('./modules/user/insert_link.php');
                break;
			case "shared_link" :
				include('./modules/user/shared_link.php');
                break;			
			default :
				die ('Restricted Access');
		}
		break;
	default :
		die ('Restricted Access');
}
		
?>