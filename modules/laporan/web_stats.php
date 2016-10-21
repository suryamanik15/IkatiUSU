<?php

	function HeaderingExcel($filename)
	{
    	header("Content-type:application/vnd.ms-excel");
    	header("Content-Disposition:attachment;filename=$filename");
    	header("Expires:0");
    	header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
    	header("Pragma: public");
	}
	
	$host = mysql_connect("localhost", "etmcorg", "7slt967hTT");
	mysql_select_db("etmcorg_fcee", $host);
	
	
	
	HeaderingExcel('WEB_STATS.xls');
	
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
	$worksheet1->write_string(2,1,"WEB STATS",$fBesar);
	
	for ($i=2;$i<=8;$i++)
	{
		$worksheet1->write_blank(2,$i,$fBesar);
	}
	
	$worksheet1->write_string(4,1,"No",$fList_title);
	$worksheet1->write_string(4,2,"IP",$fList_title);
	$worksheet1->write_string(4,3,"NEGARA",$fList_title);
	$worksheet1->write_string(4,4,"TANGGAL",$fList_title);
		
	//tabel content======================================================================================
	$i=1;
	
	$tanggal = $_GET["tanggal"];
	$tanggal1 = $_GET["tanggal1"];
	
	if($tanggal != '' and $tanggal1 != '')
		$d = mysql_query("select * from vw_web_stats where tanggal between '$tanggal' and '$tanggal1' order by tanggal desc");
	elseif($tanggal != '' and $tanggal1 == '')
		$d = mysql_query("select * from vw_web_stats where tanggal >= '$tanggal' order by tanggal desc");
	elseif($tanggal == '' and $tanggal1 != '')
		$d = mysql_query("select * from vw_web_stats where tanggal <= '$tanggal' order by tanggal desc");
	else
		$d = mysql_query("select * from vw_web_stats order by tanggal desc");
		
	while($d1 = mysql_fetch_array($d))
	{
		$worksheet1->write_string(4+$i,1,$i,$fList);	
		$worksheet1->write_string(4+$i,2,$d1["ip"],$fList);
		$worksheet1->write_string(4+$i,3,$d1["negara"],$fList);
		
		$date = explode("-", $d1["tanggal"]);
		$date1 = $date[2]."-".$date[1]."-".$date[0];
		
		$worksheet1->write_string(4+$i,4,$date1,$fList);
		$i++;
	}
	
	$workbook->close();


?>