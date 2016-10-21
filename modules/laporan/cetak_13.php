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
	
	HeaderingExcel('LIST_DAFTAR_PESERTA_SECARA_KESELURUHAN_YANG_TELAH_MELAKUKAN_PEMBAYARAN.xls');
	
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
	$worksheet1->write_string(2,1,"LIST DAFTAR PESERTA SECARA KESELURUHAN YANG TELAH MELAKUKAN PEMBAYARAN",$fBesar);
	
	for ($i=2;$i<=8;$i++)
	{
		$worksheet1->write_blank(2,$i,$fBesar);
	}
	
	$worksheet1->write_string(4,1,"No",$fList_title);
	$worksheet1->write_string(4,2,"Username",$fList_title);
	$worksheet1->write_string(4,3,"Name",$fList_title);
	$worksheet1->write_string(4,4,"Institusi",$fList_title);
	$worksheet1->write_string(4,5,"Negara",$fList_title);
	$worksheet1->write_string(4,6,"Status",$fList_title);
		
	//tabel content======================================================================================
	$i=1;
	$d = mysql_query("select * from tbl_peserta p, tbl_bayar b where p.id_peserta=b.id_peserta and b.terima=1 order by p.id_makalah asc, p.username asc");
	while($d1 = mysql_fetch_array($d))
	{
		$worksheet1->write_string(4+$i,1,$i,$fList);
		$worksheet1->write_string(4+$i,2,$d1["username"],$fList);
		$worksheet1->write_string(4+$i,3,$d1["nama"],$fList);
		$worksheet1->write_string(4+$i,4,$d1["institusi"],$fList);
		$worksheet1->write_string(4+$i,5,$d1["negara"],$fList);
		if($d1["id_makalah"] == 1)
		{			
			$worksheet1->write_string(4+$i,6,"Pembicara/Poster",$fList);	
		}
		else if($d1["id_makalah"] == 2)
			$worksheet1->write_string(4+$i,6,"Peserta",$fList);
		
		
		$i++;
	}
	
	$workbook->close();
	$sql_db->sql_close();

?>
