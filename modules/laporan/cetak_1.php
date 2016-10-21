<?php	
	
	function HeaderingExcel($filename)
	{
    	header("Content-type:application/vnd.ms-excel");
    	header("Content-Disposition:attachment;filename=$filename");
    	header("Expires:0");
    	header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
    	header("Pragma: public");
	}
	
	define('_FCEE_EXEC', '1');
	include("../../libraries/sql_db.php");
	$sql_db=new sql_db();
	if (!$sql_db)
	{
		die("Connection to database server failed!!!, contact you're administrator...");
	}
	
	
	HeaderingExcel('LIST_DAFTAR_CALON_PEMAKALAH_YANG_MENGIRIMKAN_ABSTRAK_SECARA_KESELURUHAN.xls');
	
	require_once('../../libraries/excel-lib/OLEwriter.php');	
	require_once('../../libraries/excel-lib/BIFFwriter.php');
	require_once('../../libraries/excel-lib/Worksheet.php');
	require_once('../../libraries/excel-lib/Workbook.php');		
	
	
	$workbook=new Workbook("-");
	
	$fJudul=& $workbook->add_format();
	$fJudul->set_bold();
	

	$fList=& $workbook->add_format();
	$fList->set_border(1);
	
	$fList_title=& $workbook->add_format();
	$fList_title->set_border(1);
	$fList_title->set_bold();
	$fList_title->set_merge();
		
	$fBesar=& $workbook->add_format();
	$fBesar->set_bold();
	
	$worksheet1 =& $workbook->add_worksheet("Sheet 1");
	/*
	$worksheet1->set_column(1,1,5);
	
	
	for ($i=2;$i<8;$i++)
	{
		$worksheet1->set_column(1,$i,15);
	}
	
	$worksheet1->set_column(1,8,20);
	*/
	$worksheet1->merge_cells(1,1,1,8);
	$worksheet1->write_string(2,1,"LIST DAFTAR CALON PEMAKALAH YANG MENGIRIMKAN ABSTRAK SECARA KESELURUHAN",$fBesar);
	
	for ($i=2;$i<=8;$i++)
	{
		$worksheet1->write_blank(2,$i,$fBesar);
	}
	
	$worksheet1->write_string(4,1,"No",$fList_title);
	$worksheet1->write_string(4,2,"Username",$fList_title);
	$worksheet1->write_string(4,3,"Name",$fList_title);
	$worksheet1->write_string(4,4,"Institusi",$fList_title);
	$worksheet1->write_string(4,5,"Negara",$fList_title);
	$worksheet1->write_string(4,6,"Title",$fList_title);
	$worksheet1->write_string(4,7,"First Name",$fList_title);
	$worksheet1->write_string(4,8,"Last Name",$fList_title);
	$worksheet1->write_string(4,9,"Institution",$fList_title);
	$worksheet1->write_string(4,10,"Address",$fList_title);
	$worksheet1->write_string(4,11,"City",$fList_title);
	$worksheet1->write_string(4,12,"Country",$fList_title);
	$worksheet1->write_string(4,13,"E-mail",$fList_title);
	$worksheet1->write_string(4,14,"Telephone",$fList_title);
	$worksheet1->write_string(4,15,"Fax",$fList_title);
	$worksheet1->write_string(4,16,"Mobile Phone",$fList_title);
		
	//tabel content======================================================================================
	$i=1;
	$j=1;
	$d = mysql_query("select a.id_abstrack, p.username, p.nama, p.institusi, p.negara, a.title from tbl_peserta p, tbl_abstrack a where p.id_peserta=a.id_peserta order by p.username asc");
	while($d1 = mysql_fetch_array($d))
	{
		$c = mysql_query("select * from tbl_author where id_abstrack='".$d1["id_abstrack"]."'");
		$c2 = mysql_num_rows($c)-1;
		
		$worksheet1->merge_cells(4+$j,1,4+$j+$c2,1);
		$worksheet1->write_string(4+$j,1,$i,$fList);
		for($f=1; $f<=$c2; $f++)
			$worksheet1->write_blank(4+$j+$f,1,$fList);
		
		$worksheet1->merge_cells(4+$j,2,4+$j+$c2,2);
		$worksheet1->write_string(4+$j,2,$d1["username"],$fList);
		for($f=1; $f<=$c2; $f++)
			$worksheet1->write_blank(4+$j+$f,2,$fList);
		
		$worksheet1->merge_cells(4+$j,3,4+$j+$c2,3);
		$worksheet1->write_string(4+$j,3,$d1["nama"],$fList);
		for($f=1; $f<=$c2; $f++)
			$worksheet1->write_blank(4+$j+$f,3,$fList);
		
		$worksheet1->merge_cells(4+$j,4,4+$j+$c2,4);
		$worksheet1->write_string(4+$j,4,$d1["institusi"],$fList);
		for($f=1; $f<=$c2; $f++)
			$worksheet1->write_blank(4+$j+$f,4,$fList);
		
		$worksheet1->merge_cells(4+$j,5,4+$j+$c2,5);
		$worksheet1->write_string(4+$j,5,$d1["negara"],$fList);
		for($f=1; $f<=$c2; $f++)
			$worksheet1->write_blank(4+$j+$f,5,$fList);
		
		$worksheet1->merge_cells(4+$j,6,4+$j+$c2,6);
		$worksheet1->write_string(4+$j,6,$d1["title"],$fList);
		for($f=1; $f<=$c2; $f++)
			$worksheet1->write_blank(4+$j+$f,6,$fList);
		
		$k=0;
		while($c1 = mysql_fetch_array($c))
		{
			$worksheet1->write_string(4+$j+$k,7,$c1[2],$fList);
			$worksheet1->write_string(4+$j+$k,8,$c1[3],$fList);
			$worksheet1->write_string(4+$j+$k,9,$c1[4],$fList);
			$worksheet1->write_string(4+$j+$k,10,$c1[5],$fList);
			$worksheet1->write_string(4+$j+$k,11,$c1[6],$fList);
			$worksheet1->write_string(4+$j+$k,12,$c1[7],$fList);
			$worksheet1->write_string(4+$j+$k,13,$c1[8],$fList);
			$worksheet1->write_string(4+$j+$k,14,$c1[9],$fList);
			$worksheet1->write_string(4+$j+$k,15,$c1[10],$fList);
			$worksheet1->write_string(4+$j+$k,16,$c1[11],$fList);
			
			$k++;
		}
		
		$i++;
		$j= $j+1+$c2;
	}
	
	$workbook->close();

	$sql_db->sql_close();
?>
