<?php		
			require("dbconnect.inc");
			echo "<script>console.log('Debug Objects: " . "fdecj" . "' );</script>";
			$maloai= isset($_GET["ml"])?$_GET["ml"]:"";
			$timkiem= isset($_POST["timkiemsanpham"])?$_POST["timkiemsanpham"]:"";
			$dk="";
			if($maloai)
			{
				$dk="where maloai='$maloai'";
			}
			if($timkiem)
			{
				$dk="where tenhang like '%$timkiem%' or mahang='$timkiem'";
			}
			
			include("clspage.php");
			$paging = new Paging; 
			$limit =30;
			// Tổng số mẫu tin 
			$paging->findTotal($link,'sanpham'); 
			// Tổng số trang 
			$paging->findPages($limit); 
			// Bắt đầu từ mẫu tin 
			$start =$paging->rowStart($limit); 
			// Trang hiện tại 
			$curpage = ($start/$limit)+1;
	
			$sql= "select * from sanpham $dk order by mahang desc limit ".$start.",".$limit;
			
			$result= @mysqli_query($link, $sql);
			echo "<script>console.log('Debug Objects: " . "fdecj" . "' );</script>";
			if($timkiem!=""&&mysqli_num_rows($result)==0)
			{
				$_SESSION['mess']="Không tìm thấy sản phẩm :[".$timkiem."] Vui lòng tìm lại!";
				return header('Location:index.php');
			}
?>
	<form id="form1" name="form1" method="post" action="">
  <div class="wappper_sanpham">
  <ul class="product">
   <?php
   	while($rows=mysqli_fetch_array($result))
	{
		//$link="index.php?chitiet=".$rows['mahang']."&alias:".$rows['alias'].".html";
       // $link="sp-".$rows['alias'].$rows['mahang'].".html";
		$link="san-pham-".$rows['mahang'].".html";
   ?>
		<li class="box-1 span4"> 
            <a href="<?php echo $link;?>" title="<?php echo $rows['tenhang'];?>">
				<div class="title">				
					<h2 class="head_sp"><?php echo $rows['tenhang'];?></h2>
				</div>
			</a>
            <div class="product thumbnail" style="height:149px;">
                <img src="images/sanpham/<?php echo $rows['hinhanh'];?>" alt="<?php echo $rows['tenhang'];?>" width="240px" height="147px">
                <a href="<?php echo $link;?>" title="<?php echo $rows['tenhang'];?>">
                   
                </a>
            </div>
			<p class="home-text hidden-xs clear">
				<?php echo $rows['slogan'];?>
			</p>
            <div class="fot-box">
                <p class="price">
					<span class="new-price"><?php echo number_format($rows['giatien']);?> đ</span>
				</p>
                <a class="button" href="<?php echo $link;?>">Xem chi tiết<i class="fa fa-angle-double-right"></i></a>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
		</li>
	   <?php
	}
	?>
	</ul>
	 <div class="fpage">
	 <?php 
		echo $paging->pagesList($curpage);
	 ?>
	 </div>
</div>
</form>
