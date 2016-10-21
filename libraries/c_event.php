<?php

defined( '_FCEE_EXEC' ) or die( 'Restricted access (CEVENT)' );

class c_event
{
	var $event_id;
	var $dest;
	var $errarr=array();
	
	function ECheck($mod, $op)
	{
		switch($mod)
		{
			case "auth" :
			{
				switch($op)
				{
					case "login" :
						$this->E_Set('A1');
						break;
					case "validasi" :
						$this->E_Set('A2');
						break;
					case "logout" :
						$this->E_Set('A2');
						break;
					case "edit_pass" :
						$this->E_Set('A3');
						break;
					case "validasi_pass" :
						$this->E_Set('A4');
						break;
					default :
						die('Restricted Access');
				}
				break;
			}
			break;
			case "home" :
			{
				switch($op)
				{
					case "main" :
						$this->E_Set('H1');
						break;
					case "alumni" :
						$this->E_Set('H2');
						break;
					case "thema" :
						$this->E_Set('H3');
						break;
					case "download" :
						$this->E_Set('H4');
						break;
					case "abstrack" :
						$this->E_Set('H5');
						break;
					case "paper" :
						$this->E_Set('H6');
						break;
					case "payment" :
						$this->E_Set('H7');
						break;
					case "profil" :
						$this->E_Set('H8');
						break;
					case "user" :
						$this->E_Set('H9');
						break;
					case "pembicara" :
						$this->E_Set('H10');
						break;
					case "peserta" :
						$this->E_Set('H11');
						break;
					case "contact" :
						$this->E_Set('H12');
						break;
					case "laporan" :
						$this->E_Set('H13');
						break;
					case "info_payment" :
						$this->E_Set('H14');
						break;
					case "stats" :
						$this->E_Set('H15');
						break;
					case "title" :
						$this->E_Set('H16');
						break;
					case "kuisioner" :
						$this->E_Set('H17');
						break;
					case "enval" :
						$this->E_Set('H18');
						break;
					case "data" :
						$this->E_Set('H19');
						break;
					case "RegAlumni" :
						$this->E_Set('H20');
						break;
					case "reset":
						$this->E_Set('H21');
						break;
					case "Password":
						$this->E_Set('H22');
						break;
					case "QRMenu":
						$this->E_Set('H23');
						break;
					case "Insert_Password":
						$this->E_Set('H24');
						break;		
					default :
						die('Restricted Access home cevent');
				}
				break;
			}
			break;
				
			default :
				die('Restricted Access');
		}
	}	
	
	function EProcess()
	{
		return include($this->dest);
	}
	
	function E_Set($id)
	{
		$this->event_id=$id;
		switch ($this->event_id)
		{
			case 'H1' :
				$this->dest=K_MODULES.DS.'home.php';
				break;
			case 'H2' :
				$this->dest=K_MODULES.DS.'home.php';
				break;
			case 'H3' :
				$this->dest=K_MODULES.DS.'home.php';
				break;
			case 'H4' :
				$this->dest=K_MODULES.DS.'home.php';
				break;
			case 'H5' :
				$this->dest=K_MODULES.DS.'home.php';
				break;
			case 'H6' :
				$this->dest=K_MODULES.DS.'home.php';
				break;
			case 'H7' :
				$this->dest=K_MODULES.DS.'home.php';
				break;
			case 'H8' :
				$this->dest=K_MODULES.DS.'home.php';
				break;
			case 'H9' :
				$this->dest=K_MODULES.DS.'home.php';
				break;
			case 'H10' :
				$this->dest=K_MODULES.DS.'home.php';
				break;
			case 'H11' :
				$this->dest=K_MODULES.DS.'home.php';
				break;
			case 'H12' :
				$this->dest=K_MODULES.DS.'home.php';
				break;
			case 'H13' :
				$this->dest=K_MODULES.DS.'home.php';
				break;
			case 'H14' :
				$this->dest=K_MODULES.DS.'home.php';
				break;
			case 'H15' :
				$this->dest=K_MODULES.DS.'home.php';
				break;
			case 'H16' :
				$this->dest=K_MODULES.DS.'home.php';
				break;
			case 'H17' :
				$this->dest=K_MODULES.DS.'nyaa.php';
				break;
			case 'H18' :
				$this->dest=K_MODULES.DS.'nyaa.php';
				break;
			case 'H19' :
				$this->dest=K_MODULES.DS.'dataalumni.php';
				break;
			case 'H20' :
				$this->dest=K_MODULES.DS.'registrasi.php';
				break;
			case 'H21' :
				$this->dest=K_MODULES.DS.'reset_pass.php';
				break;
			case 'H22' :
				$this->des=K_MODULES.DS.'password.php';	
				break;
			case 'H23' :
				$this->des=K_MODULES.DS.'qr_menu.php';	
				break;
			case 'H24' :
				$this->des=K_MODULES.DS.'password.php';	
				break;			
			case 'A1' : 
				$this->dest=K_MODULES.DS.'auth.php';
				break;
			case 'A2' : 
				$this->dest=K_MODULES.DS.'auth.php';
				break;
			case 'A3' : 
				$this->dest=K_MODULES.DS.'auth.php';
				break;
			case 'A4' : 
				$this->dest=K_MODULES.DS.'auth.php';
				break;
			default :
				die('Restricted Access cevent');
		}
	}
	
	function Get_Id()
	{
		return $this->event_id;
	}
}
?>