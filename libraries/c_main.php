<?php
	
defined( '_FCEE_EXEC' ) or die( 'Restricted access1' );

class c_main
{
	var $mod;
	var $opt;
	
	function __construct()
	{
		if (!isset($_GET["mod"]) or !isset($_GET["opt"]))
		{
			//$GLOBALS["_PMAIN"]=array();
			$this->mod="home";
			$this->opt="main";
			$_GET["mod"]="home";
			$_GET["opt"]="main";
		}else
		{
			$this->mod=$_GET["mod"];
			$this->opt=$_GET["opt"];
			//$this->mod=$GLOBALS["_PMAIN"]["M"];
			//$this->opt=$GLOBALS["_PMAIN"]["O"];
		}
	}
	
	function Get_Stat($id)
	{
		switch($id)
		{
			case 1 :
				return $this->mod;
				break;
			case 2 :
				return $this->opt;
				break;
			default:
				return false;
				break;
		}
	}
	
	function Set_Stat($m,$o)
	{
		$this->mod=$m;
		$this->opt=$o;
		//$this->Reg_Stat();
	}
	
	//function Reg_Stat()
	//{
		//$GLOBALS["_PMAIN"]["M"]=$this->mod;
		//$GLOBALS["_PMAIN"]["O"]=$this->opt;
		//return true;
	//}
}	
	
?>