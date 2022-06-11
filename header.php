<?php
	require("dbconnect.inc");
?>
<div id="menu" class="container">
  <ul class="main">
    <li><a href="index.php"><strong>Trang chủ</strong></a></li>
	<?php
	if(!isset($_SESSION['username']))
	{
	?>
    <li><div align="center"><a href="dangnhap.html"><strong>Đăng nhập</strong></a></li>
	 <li><div align="center"><a href="dangky.html"> <strong>Đăng ký</strong> </a></li>
    <?php
	}
	else
	{
	?>
	 <li><div align="center"><a href="thoat.html"><strong>Thoát</strong></a></li>
	 <?php 
	 if(!isset($_SESSION['loginadmin'])){
		 ?>
		 <li><div align="center"><a href="gio-hang.html"><strong>Giỏ hàng</strong> - <i><?php if(isset($_SESSION["hang"])){echo count($_SESSION["hang"]);}?></i> SP</a></li>
		 <li><div align="center"><a href="don-hang.html"><strong>Đơn hàng</strong></a></li>
		 <?php
		}
	 ?>
	
	<?php 
	}
	?>
	<?php
	if(isset($_SESSION['loginadmin']))
	{
	?>
	 <li><div align="center"><a href="themsanpham.html"> <strong>Thêm SP</strong> </a></li>
	 <li><div align="center"><a href="quanly-danhmuc.html"> <strong>Danh Mục</strong> </a></li>
	 <li><div align="center"><a href="quanly-sanpham.html"> <strong>Sản Phẩm</strong> </a></li>
	 <li><div align="center"><a href="don-hang-admin.html"> <strong>Đơn Hàng</strong> </a></li>
  <?php
  } ?>
  </ul>
  <?php 
	include("timkiem.php");
  ?>
</div>
