<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	$idxoa=(int)$_GET['idxoa'];
	include("dbconnect.inc");
	$sql="select mahang,tenhang from sanpham where mahang='$idxoa'";
	$result=mysqli_query($link, $sql);
	$rows=@mysqli_fetch_array($result);
	if($rows['mahang']>0)
	{
		if($_SESSION["hang"]["$idxoa"])
		{
			unset($_SESSION["hang"]["$idxoa"]);
		}
		$_SESSION['mess']="Xóa sản phẩm [".$rows['tenhang']."] khỏi giỏ hàng thành công";
	}else{
		$_SESSION['mess']="Lỗi Xóa sản phẩm trong giỏ hàng";
	}	
	header('Location:index.php?action=4');
?>
	
