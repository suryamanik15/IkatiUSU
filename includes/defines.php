<?php
/**
* @version		$Id: defines.php 10381 2008-06-01 03:35:53Z pasamio $
* @package		Joomla
* @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_FCEE_EXEC' ) or die( 'Restricted access (DEFINE)' );

/**
* Joomla! Application define
*/

//Global definitions
//Joomla framework path definitions
if (!defined('DS'))
{
	define('DS',DIRECTORY_SEPARATOR);
}
$parts = explode( DS, K_BASE );
//Defines
define( 'K_ROOT',			implode( DS, $parts ) );
define( 'K_MODULES',		K_ROOT.DS.'modules');
define( 'K_INCLUDES',       K_ROOT.DS.'includes');
define( 'K_SITE',			K_ROOT );
define( 'K_CSS',			K_ROOT.DS.'css');
define( 'K_CONFIGURATION', 	K_ROOT.DS.'configuration' );
//define( 'P_XMLRPC', 		P_ROOT.DS.'xmlrpc' );
define( 'K_LIBRARIES',	 	K_ROOT.DS.'libraries' );
define( 'K_FUNCTION' ,		K_LIBRARIES.DS.'function');
define( 'K_TITLE', 'SIKATI-USU');
//define( 'P_PLUGINS',		P_ROOT.DS.'plugins'   );
//define( 'P_THEMES'	   ,	P_BASE.DS.'templates' );
//define( 'P_CACHE',			P_BASE.DS.'cache');
?>