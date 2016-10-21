<head>
<link rel="shortcut icon" href="./images/button/icon.png" type="image/x-icon">
<title><?php echo K_TITLE; ?></title>
<style type="text/css" media="all">@import "./css/template.css";</style>
</head>

<body>
<?php
 defined ('_FCEE_EXEC') or die ("Restricted Access");
switch ($_GET["mod"])
{
	case "auth" :
		switch($_GET["opt"])
		{
			case "validasi" :
				include(K_MODULES.DS.'user'.DS.'validasi.php');
				break;
			case "logout" :
				include(K_MODULES.DS.'user'.DS.'logout.php');
				break;
			default :
				die ('Restricted Access');
		}
		break;
	default :
		die ('Restricted Access');
		break;
}
		
?>
</body>