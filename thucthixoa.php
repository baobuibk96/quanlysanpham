<?php 
	if(isset($_GET['xoa']))
{
		include('dbconnect.inc');
		$mahang=$_GET['xoa'];
		$sql="delete from sanpham where mahang='$mahang'";
		$result=mysqli_query($link, $sql);
	if($result)
	{
?>
		<script language="javascript">
		window.alert("Xóa thành công");
		window.location="quanly-sanpham.html";
		</script>	
	<?php
	}
	else
	{
	?>
		<script language="javascript">
		window.alert("Xóa thất bại");
		window.location="index.php";
		</script>	
	<?php	
	}
}
	?>