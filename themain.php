<?php
	include("dbconnect.inc");
	$action=isset($_GET['action'])? $_GET['action']:"";
	
	switch($action)
	{
		case 1:
				include("dangnhap.php");
				break;
		case 11:
				include("dangnhapadmin.php");
				break;
		case 2:
				include("dangky.php");
				break;
		case 3:
				include("capnhathanghoa.php");
				break;
		case 4:
				include("giohang.php");
				break;
		case 5:
				include("timkiem.php");
				break;
		case 8:
				include("linkthoat.php");
				break;
		case 10:
				include("thongtin.php");
				break;
		case 101:  
				include("dangnhapadmin.php");
				break;		
		case 109:
				include("quanlydonhang.php");
				break;	
		case 121:
				include("quanlydonhangcuaban.php");
				break;			
		case 110:
				include("xoacartadmin.php");
				break;	
		case 111:
				include("quanlydanhmuc.php");
				break;	
		case 112:
				include("themdanhmuc.php");
				break;			
	}

	if(isset($_GET['ml']))
	{
		include "loaisanpham.php";
	}	
	if(isset($_GET['chitiet']))
	{
		include "chitietsanpham.php";
	}
	if(isset($_SESSION['hang']))
	{
		//include "giohang.php";
	}
	if(isset($_GET['sua']))
	{
		include "suathongtin.php";
	}
	if(isset($_GET['suadanhmuc']))
	{
		include "suadanhmuc.php";
	}
	if(isset($_GET['xoa']))
	{
		include "thucthixoa.php";
	}
	if(isset($_GET['xoadanhmuc']))
	{
		include "exexoadanhmuc.php";
	}
	if($_SERVER['REQUEST_URI']=="/index.php"||$_SERVER['REQUEST_URI']=="/")
	{
		include "loaisanpham.php"; 
	}
	?>                                                                                                                                                                                           