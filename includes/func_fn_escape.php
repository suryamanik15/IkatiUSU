<?php
	/*********************************************************************************
		File name		:		func_fn_escape.php
		Function name	:		func_fn_escape(str_escape)
		Parameter		:		str_escape	(string)
		Return			:		(string)
		Date created	:		23 July 2005
		Last modify		:		23 July 2005
		Description		:		func_fn_escape function removing . .. / \ character
								from the given string, apply for the string which 
								require for file path
	**********************************************************************************/
	
	
	
	function func_fn_escape($str_escape='')
	{
		if(!empty($str_escape))
		{
			$str_escape = str_replace("../", '', $str_escape);		// remove ../
			$str_escape = str_replace("./", '', $str_escape);		// remove ./
			$str_escape = str_replace("..", '', $str_escape);		// remove ..		
			$str_escape = str_replace(".", '', $str_escape);		// remove .
			$str_escape = str_replace("\\", '', $str_escape);		// remove \
			$str_escape = str_replace("<", '', $str_escape);
			$str_escape = str_replace(">", '', $str_escape);
			$str_escape = str_replace("'", '', $str_escape);
			return $str_escape;
		}
	}
?>