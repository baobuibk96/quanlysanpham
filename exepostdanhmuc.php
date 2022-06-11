<?php 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	$maloai2=false;
	if(strlen($_POST['tendanhmuc'])>0)
	{
		$tenhang=true;
	}
	else
	{
		$tenhang=false;
		$maloai2=false;
		$_SESSION['mess']="Bạn chưa nhập tên danh mục";
		header('Location:'.$_SERVER['HTTP_REFERER']);
	}
	if(strlen($_POST['maloai'])>0)
	{
		$maloai2=true;
	}
	else
	{
		$maloai2=false;
		$_SESSION['mess']="Bạn chưa nhập mã loại";
		header('Location:'.$_SERVER['HTTP_REFERER']);
		
	}	
	
	require("dbconnect.inc");
	if($tenhang&&$maloai2)
	{
		$tendanhmuc=$_POST['tendanhmuc'];
		$maloai=$_POST['maloai'];
		
		//check ma loaisp
		$sql="select * from loaisp where maloai='$maloai'";
		$result=mysqli_query($link, $sql);
		$rows=@mysqli_fetch_array($result);
		if($rows['maloai']!="")
		{
			$_SESSION['mess']="Lỗi Mã lọai [".$maloai."] đã tồn tại. Vui lòng nhập mã khác";
			return header('Location:'.$_SERVER['HTTP_REFERER']);
		}
		$sql="insert into loaisp(maloai,ten) 
						values('$maloai','$tendanhmuc')";									   
		$result=mysqli_query($link, $sql);
			if($result==1)
			{
				$_SESSION['mess']="Thêm Danh Mục thành công";
				header('Location:'.$_SERVER['HTTP_REFERER']);
			}
			else
			{
				$_SESSION['mess']="Lỗi thêm Danh Mục";
				header('Location:'.$_SERVER['HTTP_REFERER']);
			}
	}
	
?>