<?php 
	if(isset($_GET['xoadanhmuc']))
{
		include('dbconnect.inc');
		$mahang=$_GET['xoadanhmuc'];
		
		$sql2="select * from loaisp where maloai='$mahang'";
		$result2=mysqli_query($link, $sql2);
		$rows=@mysqli_fetch_array($result2);
		if($rows['maloai']=="")
		{
			$_SESSION['mess']="Không tìm thấy danh mục";
			header('Location:'.$_SERVER['HTTP_REFERER']);
		}		
		$sql="delete from loaisp where maloai='$mahang'";
		$result=mysqli_query($link, $sql);
	if($result)
	{
		$_SESSION['mess']="Xóa thành công";
		header('Location:'.$_SERVER['HTTP_REFERER']);
	}
	else
	{
		$_SESSION['mess']="Xóa thất bại";
		header('Location:'.$_SERVER['HTTP_REFERER']);
	}
}
	?>