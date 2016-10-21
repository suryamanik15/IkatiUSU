<?php
	define('_FCEE_EXEC', '1');
	include("../../libraries/sql_db.php");
	$sql_db=new sql_db();
	if (!$sql_db)
	{
		die("Connection to database server failed!!!, contact you're administrator...");
	}
	
	
	function HeaderingExcel($filename)
	{
    	header("Content-type:application/vnd.ms-excel");
    	header("Content-Disposition:attachment;filename=$filename");
    	header("Expires:0");
    	header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
    	header("Pragma: public");
	}
	
	HeaderingExcel('LIST DAFTAR DATA ALUMNI.xls');
	
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
	$worksheet1->write_string(2,1,"LIST DAFTAR DATA ALUMNI",$fBesar);
	
	for ($i=2;$i<=8;$i++)
	{
		$worksheet1->write_blank(2,$i,$fBesar);
	}
	
	$worksheet1->write_string(4,1,"No",$fList_title);
	$worksheet1->write_string(4,2,"Nama",$fList_title);
	$worksheet1->write_string(4,3,"Jenis Kelamin",$fList_title);
	$worksheet1->write_string(4,4,"Angkatan",$fList_title);
	$worksheet1->write_string(4,5,"IPK",$fList_title);
	$worksheet1->write_string(4,6,"Tahun Lulus",$fList_title);
	$worksheet1->write_string(4,7,"Tahun Bekerja",$fList_title);
	$worksheet1->write_string(4,8,"Tempat Bekerja",$fList_title);
	$worksheet1->write_string(4,9,"Alamat",$fList_title);
	$worksheet1->write_string(4,10,"Email",$fList_title);
	$worksheet1->write_string(4,11,"Telepon",$fList_title);	
	//tabel content======================================================================================
	$i=1;
	$d = mysql_query("select * from alumni order by no_alumni asc");
	
	while($d1 = mysql_fetch_array($d))
	{
		$worksheet1->write_string(4+$i,1,$d1["no_alumni"],$fList);
		$worksheet1->write_string(4+$i,2,$d1["nama"],$fList);
		if($d1["jk"] == 1)
		{			
			$worksheet1->write_string(4+$i,3,"Pria",$fList);	
		}
		else if($d1["jk"] == 2){
			$worksheet1->write_string(4+$i,3,"Wanita",$fList);
		}	
		
		$worksheet1->write_string(4+$i,4,$d1["angkatan"],$fList);
		$worksheet1->write_string(4+$i,5,$d1["ipk"],$fList);
		$worksheet1->write_string(4+$i,6,$d1["tl"],$fList);
		$worksheet1->write_string(4+$i,7,$d1["thnbkrj"],$fList);
		$worksheet1->write_string(4+$i,8,$d1["tb"],$fList);
		$worksheet1->write_string(4+$i,9,$d1["alamat"],$fList);	
		$worksheet1->write_string(4+$i,10,$d1["email"],$fList);
		$worksheet1->write_string(4+$i,11,$d1["telepon"],$fList);
		
		$i++;
	}
	
	$workbook->close();
	
	$sql_db->sql_close();
?>
